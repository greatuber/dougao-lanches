<?php

namespace App\Console\Commands;

use App\Models\Toggle;
use Illuminate\Console\Command;

class ClosedLanchonete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'closedLanchonete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'fechar a lanchonete';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $toggle = Toggle::first();

        if($toggle->is_open) {
            $toggle->update(['is_open' => false]);
        }
    }
}
