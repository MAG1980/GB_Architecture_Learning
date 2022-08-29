<?php


 function explorer ($path, $divider)
{
    $iterator = new DirectoryIterator($path);

    $divider .='-';
    foreach ($iterator as $item) {

        if($item->isDot()){
            continue;
        }
        if ($item->isDir()) {

            $dirName=$iterator->getBaseName();
            echo  $divider . $dirName . "\n";

            $dirPath=$iterator->getPathname();
            explorer($dirPath, $divider);
        } else {
            echo  $divider . $iterator->getBaseName() . "\n";
//            echo 'Путь к файлу: ' . $iterator->key() . "\n\n";
        }
    }
};

explorer(__DIR__,'');
