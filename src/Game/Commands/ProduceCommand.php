<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Storage;

class ProduceCommand extends Command
{
    private $resourceType;
    private $resources;
    
    public function __construct(string $resourceType)
    {
        $this->resourceType = $resourceType;
        $this->resources = &Storage::$storage['resources'];
    }

    public function produce(string $resource): void
    {
        $this->resources[$resource] += 1;
    }
    
    public function execute(): string
    {
        if (! array_key_exists($this->resourceType, $this->resources)) {
            return 'Invalid product!';
        }

        switch ($this->resourceType) {
            case 'metal':
               if ($this->resources['iron'] > 0 && $this->resources['fire'] > 0) {
                   $this->produce($this->resourceType);
                   $this->resources['iron'] -= 1;
                   $this->resources['fire'] -= 1;
                   return ucfirst($this->resourceType) . ' added to inventory.';
               } else {
                   $msg = 'You need to mine: ' . ($this->resources['iron'] == 0 ? 'iron,' : '') . 'fire.';  
                   return $msg;
               }
        }
    }
}
