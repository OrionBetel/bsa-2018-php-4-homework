<?php

namespace BinaryStudioAcademy\Game\Commands;

class ExitCommand extends Command
{
    public function execute(): void
    {
        exit(PHP_EOL . 'Goodbye!' . PHP_EOL);
    }
}
