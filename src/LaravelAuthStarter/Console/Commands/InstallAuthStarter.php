<?php

namespace Kneipp\LaravelAuthStarter\Console\Commands;

use Illuminate\Console\Command;

class InstallAuthStarter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kneipp:auth';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scaffold basic login and registration views and routes with steroids';

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
     * @return mixed
     */
    public function handle()
    {
        if ($this->app->environment() == 'local') {
            exec('php artisan make:auth');
            exec('php artisan vendor:publish --provider="Kneipp\LaravelAuthStarter\LaravelAuthStarterServiceProvider"');
            exec('php artisan migrate');
            exec('composer dump-autoload');
            exec('php artisan db:seed --class=LaravelAuthStarterTableSeeder');
        }
    }
}
