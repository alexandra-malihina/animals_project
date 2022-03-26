<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class BuildProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'build:project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Первоначальная сборка проекта';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Первый запуск проекта');

        $this->info('Миграции...');
        $this->call('migrate');

        $this->info('Заполнение таблиц данными...');
        Artisan::call('db:seed AnimalsSeeder');

        $this->info('Завершение выполнения команды...');
        $this->info('Проект готов!');
        return 0;
    }
}
