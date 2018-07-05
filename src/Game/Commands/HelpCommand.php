<?php

namespace BinaryStudioAcademy\Game\Commands;

class HelpCommand extends Command
{
    private $commandList = <<<CMDLIST

help                            List of available commands
status                          Display available resources and modules to be build
build:<spaceship_module>        Build spaceship module
scheme:<spaceship_module>       Display info about what modules and/or resources are needed to build the module
mine:<resource_name>            Add resource to the storage
produce:<combined_resource>     Produce combined resource   
exit                            Exit the game

CMDLIST;

    public function execute(): string
    {
        return $this->commandList;    
    }
}
