<?php

namespace App;

class KaleoService
{
    protected $config = [];

    public function __construct($config = [])
    {
        $this->config = $config;
    }

    public function createMigration($name, $options = [])
    {
        $merged = $this->mergeCommandOptionsWithDefaults($options);

        $merged->put('name', snake_case($name));

        return $this->generateMigration($merged);
    }

    protected function mergeCommandOptionsWithDefaults($options)
    {
        return collect($this->config)->merge(collect($options)->filter());
    }

    protected function generateMigration($opts)
    {
        $this->maybeCreateMigrationsPath($opts);

        $files = collect(['up', 'down'])->map(function ($suffix) use ($opts) {
            return "{$opts['migrations']}/" . $this->generateMigrationName($opts['name']) . $suffix;
        });

        foreach ($files as $file) $this->createMigrationFile($file);
    }

    protected function generateMigrationName($name)
    {
        return date('Ymdis') . '_' . $name . '_';
    }

    protected function maybeCreateMigrationsPath($opts)
    {
        if (! file_exists($opts['migrations'])) {
            throw_unless(mkdir($opts['migrations']), new \Exception('Failed to create migrations directory'));
        }
    }

    protected function createMigrationFile($fileName)
    {
        file_put_contents($fileName, '');
    }
}
