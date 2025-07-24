<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Deputado;
use App\Jobs\SyncDeputadoDespesasJob;

class SyncDespesas extends Command
{
    protected $signature = 'sync:despesas';
    protected $description = 'Sincroniza as despesas dos deputados utilizando jobs em fila';

    public function handle()
    {
        $this->info('Iniciando sincronização das despesas...');

        $deputados = Deputado::all();

        foreach ($deputados as $deputado) {
            SyncDeputadoDespesasJob::dispatch($deputado);
            $this->info("Job de despesas criada para deputado: {$deputado->nome}");
        }

        $this->info('Todas as jobs foram disparadas para a fila.');
    }
}

