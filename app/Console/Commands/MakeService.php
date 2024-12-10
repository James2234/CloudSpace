<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeService extends GeneratorCommand
{
    protected $name = 'make:service';
    protected $description = 'Create a new service class that extends BaseService';
    protected $type = 'Service';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        // 引入自定义模板
        return base_path('stubs/service.stub');
    }

    /**
     * Determine the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Services';
    }

    /**
     * Get the path to the file.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        return base_path('' . str_replace('\\', '/', $name) . '.php');
    }
}
