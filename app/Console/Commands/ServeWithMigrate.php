<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ServeWithMigrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'serve:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run migrate:fresh --seed and then start the server';

    public function __construct(){
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Ejecutar migrate:fresh --seed
        $this->call('migrate:fresh', ['--seed' => true]);

        // Iniciar el servidor
        $this->call('serve');
    }
}
