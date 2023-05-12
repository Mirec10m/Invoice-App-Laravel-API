<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeServiceCommand extends GeneratorCommand
{
    protected $signature = 'make:service {name}';
    protected $description = 'Create a new service class to handle business logic';

    public function getStub(): string
    {
        return app_path() . '/Console/Stubs/service.stub';
    }

    public function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Services';
    }

    public function replaceClass($stub, $name): string
    {
        $stub = parent::replaceClass($stub, $name);

        return str_replace("ClassName", $this->argument('name'), $stub);
    }
}
