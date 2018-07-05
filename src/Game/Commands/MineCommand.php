<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Storage;

class MineCommand extends Command
{
    private $resourceType;
    
    public function __construct(string $resourceType)
    {
        $this->resourceType = $resourceType;
    }

    public static function mine(string $resource): void
    {
        Storage::$storage['resources'][$resource] += 1;
    }
    
    public function execute(): string
    {
        if (! array_key_exists($this->resourceType, Storage::$storage['resources'])) {
            return 'No such resource.';
        } else {
            static::mine($this->resourceType);
            return ucfirst($this->resourceType) . ' added to inventory.';
        } 
    }
}
