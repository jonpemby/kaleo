<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;

class Init extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'init
        {--m|migrations=./migrations : Path in which to store migration files}
        {--t|table=migrations : Table in which to store migrations}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Initialize Kaleo with a configuration file';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $migrations_path = $this->option('migrations');

        $table = $this->option('table');

        file_put_contents(getcwd() . '/kaleo.config.php', "<?php

return [
    'migrations' => '$migrations_path',

    'table' => '$table',

    'database' => [
        'host' => env('DB_HOST', ''),
        'user' => env('DB_USER', ''),
        'password' => env('DB_PASSWORD', ''),
        'db' => env('DB_NAME', ''),
        'port' => env('DB_PORT'),
    ],
];"
        );

        $this->info('Kaleo configuration file created successfully');
    }
}
