<?php

namespace App\Console\Commands;

use App\Models\Toggle;
use Illuminate\Console\Command;

class ToggleLanchoneteStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'OpenLanchonete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'abrir e fechar lanchonete automaticamente';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $toggle = Toggle::first();

         if (!$toggle->is_open)
            {
              $toggle->update(['is_open' => true]);
               
            }


            $this->info('Status da lanchonete atualizado com sucesso.');
    }
}
