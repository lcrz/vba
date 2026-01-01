<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class crud extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:make {model : Nombre del modelo}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Añade el codigo para CRUD en vistas y controladores';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $model = $this->argument('model');
        $name = $this->ask('What is your name?');
        $this->info('The command was successful!');
        return Command::SUCCESS;
    }
}
