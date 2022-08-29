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
            echo 'Название каталога: '. $divider . $dirName . "\n";

            $dirPath=$iterator->getPathname();
            explorer($dirPath, $divider);
        } else {
            echo 'Имя файла: ' . $divider . $iterator->getBaseName() . "\n";
//            echo 'Путь к файлу: ' . $iterator->key() . "\n\n";
        }
    }
};

explorer("/home/alexey/PhpstormProjects/GB_Architecture_Learning/Homework/",'');
