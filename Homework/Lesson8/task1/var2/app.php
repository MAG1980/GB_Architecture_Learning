<?php

function explorer($path)
{
    $directoryIterator = new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS);
    $iterator = new RecursiveIteratorIterator($directoryIterator, RecursiveIteratorIterator::SELF_FIRST);

    iterate($iterator);
}

function iterate($iterator)
{
    foreach ($iterator as $item) {
        if ($item->isDir()) {
            echo 'Название каталога: ' . $iterator->getBaseName() . "\n";
            echo 'Путь к каталогу: ' . $iterator->key() . "\n\n";
        } else {
            echo 'Имя файла: ' . $iterator->getBaseName() . "\n";
            echo 'Путь к файлу: ' . $iterator->key() . "\n\n";
        }
    }
}

explorer(__DIR__);
