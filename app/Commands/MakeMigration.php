<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;
use App\Facades\Kaleo;

class MakeMigration extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'make {name : CamelCased migration name to use}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Create a new migration';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Kaleo::createMigration($this->argument('name'), []);
        $this->info('Generated the migration!');
    }
}
