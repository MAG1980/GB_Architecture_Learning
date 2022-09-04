<?php

if(is_null($_GET['path'])){
    echo "<p>Введите путь к каталогу, содержимое которого Вы хотите просмотреть:</p>";
    echo "<form><input name='path' type='text' placeholder='Путь к каталогу'><button type='submit'>Отправить</button> </form>";
}else{
    explorer($_GET['path'], '');
}



function explorer($path, $divider)
{
    $iterator = new DirectoryIterator($path);



    foreach ($iterator as $item) {

        if ($item->isDot()) {
            continue;
        }
        if ($item->isDir()) {

            $dirName = $iterator->getBaseName();
            $dirPath = $iterator->getPathname();

            echo "<form><input hidden name='path' value='".$dirPath."'/><br> <input type='submit' value='".$divider
                ."📁".$dirName."'>"."</input></form>";

            $divider .= '-';
            explorer($dirPath, $divider);
        } else {
            echo "<p>".$divider.$iterator->getBaseName()."</p>";
        }
    }
};


