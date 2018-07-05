<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Storage;
use BinaryStudioAcademy\Game\Builder;

class BuildCommand extends Command
{
    private $module;
    private $modules;
    
    public function __construct(string $module)
    {
        $this->module = $module;
        $this->modules = Storage::get()['modules'];
    }
    
    public function execute(): string
    {
        if (! array_key_exists($this->module, $this->modules)) {
            return 'There is no such spaceship module.';
        }

        if ($this->modules[$this->module]['isBuild']) {
            return 'Attention! ' . ucfirst($this->module) . ' is ready.';
        }

        return Builder::build($this->module);
    }
}
