<?php

namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Commands\Command;

class Invoker
{
    private $command;
    
    public function processInput(string $input): string
    {
        $colonIndex = strpos($input, ':');
        if ($colonIndex) {
            $mainCommand = substr($input, 0, $colonIndex);
            $subCommand = substr($input, $colonIndex + 1);
        }
        
        $commands = "BinaryStudioAcademy\\Game\\Commands\\";
        $command_class = $commands . ucfirst($mainCommand ?? $input) . 'Command';
        if (! class_exists($command_class)) {
            return 'There is no command '. $input;
        } else {
            $this->setCommand(new $command_class($subCommand ?? null));
            return $this->run();
        }
    }

    public function setCommand(Command $cmd): void
    {
        $this->command = $cmd;
    }

    public function run(): string
    {
        return $this->command->execute();
    }
}
