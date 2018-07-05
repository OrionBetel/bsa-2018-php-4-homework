<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Storage;

class StatusCommand extends Command
{
    public function execute(): string
    {
        $storage = Storage::$storage;
        
        $status = PHP_EOL . 'You have: ' . PHP_EOL;
        
        foreach ($storage['resources'] as $resourceName => $resourceQuantity) {
            $status .= $resourceName . ' - ' . $resourceQuantity . PHP_EOL;
        }

        $status .= PHP_EOL . 'Modules ready: ' . PHP_EOL;

        foreach ($storage['modules'] as $moduleName => $moduleProps) {
            if ($moduleProps['isBuild']) {
                $status .= $moduleName . PHP_EOL;
            }
        }

        $status .= PHP_EOL . 'Modules to build: ' . PHP_EOL;

        foreach ($storage['modules'] as $moduleName => $moduleExists) {
            if (! $moduleExists['isBuild']) {
                $status .= $moduleName . PHP_EOL;
            }
        }

        $status .= PHP_EOL;

        return $status;
    }
}
