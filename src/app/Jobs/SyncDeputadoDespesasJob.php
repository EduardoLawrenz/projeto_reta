<?php

namespace App\Jobs;

use App\Models\Deputado;
use App\Models\Despesa;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class SyncDeputadoDespesasJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $deputado;

    public function __construct(Deputado $deputado)
    {
        $this->deputado = $deputado;
    }

    public function handle()
    {
        $url = "https://dadosabertos.camara.leg.br/api/v2/deputados/{$this->deputado->id_externo}/despesas?itens=100";

        $response = Http::get($url);

        if (!$response->successful()) {
            // Log ou tratar erro
            return;
        }

        $dados = $response->json()['dados'];

        foreach ($dados as $item) {
            Despesa::updateOrCreate(
                [
                    'deputado_id' => $this->deputado->id,
                    'data_documento' => $item['dataDocumento'] ?? null,
                    'valor' => $item['valorDocumento'] ?? 0,
                    'fornecedor' => $item['fornecedor'] ?? null,
                ],
                [
                    'tipo_despesa' => $item['tipoDespesa'] ?? null,
                    'url_documento' => $item['urlDocumento'] ?? null,
                ]
            );
        }
    }
}