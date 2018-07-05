<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Storage;

class SchemeCommand extends Command
{
    private $module;
    private $modules;

    public function __construct(string $module)
    {
        $this->module = $module;
        $this->modules = Storage::$storage['modules'];
    }

    public function execute(): string
    {    
        if (! array_key_exists($this->module, $this->modules)) {
            return 'There is no such spaceship module.';
        } else {
            $msg = ucfirst($this->module) . ' => ';
            $msg .= implode('|', $this->modules[$this->module]['scheme']);
            return $msg;
        }
    }
}
