<?php

namespace BinaryStudioAcademy\Game;

final class Storage
{
    public static $storage;

    public static function get()
    {
        if (static::$storage) {
            return static::$storage;

        } else {
            static::$storage = [
                'modules' => [
                    'shell' => [
                        'isBuild' => false,
                        'scheme' => [
                            'metal',
                            'fire'
                        ]
                    ],
                    'porthole' => [
                        'isBuild' => false,
                        'scheme' => [
                            'sand',
                            'fire'
                        ]
                    ],
                    'control_unit' => [
                        'isBuild' => false,
                        'scheme' => [
                            'ic',
                            'wires'
                        ]
                    ],
                    'engine' => [
                        'isBuild' => false,
                        'scheme' => [
                            'metal',
                            'carbon',
                            'fire'
                        ]
                    ],
                    'launcher' => [
                        'isBuild' => false,
                        'scheme' => [
                            'water',
                            'fire',
                            'fuel'
                        ]
                    ],
                    'tank' => [
                        'isBuild' => false,
                        'scheme' => [
                            'metal',
                            'fuel'
                        ]
                    ],
                    'ic' => [
                        'isBuild' => false,
                        'scheme' => [
                            'metal',
                            'silicon'
                        ]
                    ],
                    'wires' => [
                        'isBuild' => false,
                        'scheme' => [
                            'copper',
                            'fire'
                        ]
                    ]
                ],
    
                'resources' => [
                    'metal' => 0,
                    'iron' => 0,
                    'fire' => 0,
                    'sand' => 0,
                    'silicon' => 0,
                    'copper' => 0,
                    'carbon' => 0,
                    'water' => 0,
                    'fuel' => 0,
                    'ic' => 0,
                    'wires' => 0
                ]
            ];
        }    
    }
}
