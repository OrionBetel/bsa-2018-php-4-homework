<?php

namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Storage;

class Builder
{
    public static function build(string $module): string
    {
        $moduleScheme = Storage::$storage['modules'][$module]['scheme'];
        
        $missedResources = [];

        foreach ($moduleScheme as $resource) {
            $item = Storage::$storage['resources'][$resource];
            if ($item == 0) {
                array_push($missedResources, $resource);
            }
        }

        if (count($missedResources)) {
            return 'Inventory should have: ' . implode(',', $missedResources) .'.';
        }

        Storage::$storage['modules'][$module]['isBuild'] = true;

        if ($module == 'ic' || $module == 'wires') {
            Storage::$storage['resources'][$module] += 1;
        }

        for ($i = 0, $length = count($moduleScheme); $i < $length; $i++) {
            Storage::$storage['resources'][$moduleScheme[$i]] -= 1;
        }
        
        return ucfirst($module) . ' is ready!' . self::isSpaceshipReady();
    }

    private function isSpaceshipReady(): string
    {
        $readyModulesQuantity = 0;

        foreach (Storage::$storage['modules'] as $module) {
            if (! $module['isBuild']) {
                break;
            }
            $readyModulesQuantity += 1;
        }

        if ($readyModulesQuantity == count(Storage::$storage['modules'])) {
            $wonMsg = ' => You won!';
        } else {
            $wonMsg = '';
        }

        return $wonMsg;
    }
}
