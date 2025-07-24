<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Deputado;
use Illuminate\Support\Facades\Http;

class SyncDeputados extends Command
{
    protected $signature = 'sync:deputados';
    protected $description = 'Sincroniza os deputados da API da Câmara dos Deputados';

    public function handle()
    {
        $this->info('Buscando deputados da API...');

        $response = Http::get('https://dadosabertos.camara.leg.br/api/v2/deputados', [
            'itens' => 100, // 100 por página
        ]);

        if (!$response->successful()) {
            $this->error('Erro ao acessar a API da Câmara');
            return 1;
        }

        $deputados = $response->json()['dados'];

        foreach ($deputados as $dep) {
            Deputado::updateOrCreate(
                ['id_externo' => $dep['id']],
                [
                    'nome' => $dep['nome'],
                    'sigla_partido' => $dep['siglaPartido'],
                    'sigla_uf' => $dep['siglaUf'],
                    'url_foto' => $dep['urlFoto']
                ]
            );
        }

        $this->info('Deputados sincronizados com sucesso!');
        return 0;
    }
}
