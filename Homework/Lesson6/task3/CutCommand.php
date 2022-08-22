<?php

class CutCommand implements ICommand
{

    /**
     * @return mixed
     */
    public function execute()
    {
        echo "Вырезание текста";
    }
}