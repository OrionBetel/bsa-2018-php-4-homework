<?php

namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Contracts\Io\Reader;
use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\Invoker;
use BinaryStudioAcademy\Game\Storage;

class Game
{
    public function start(Reader $reader, Writer $writer): void
    {
        
        include 'title.php';
        $writer->writeln($title);
        $storage = Storage::get();

        while (1) {
            $writer->write('Enter your command: ');
            $input = trim($reader->read());
            $output = (new Invoker())->processInput($input);
            $writer->writeln($output);
        }    
    }

    public function run(Reader $reader, Writer $writer): void
    {
        $storage = Storage::get();
        $input = trim($reader->read());
        $output = (new Invoker())->processInput($input);
        $writer->writeln($output);
    }
}
