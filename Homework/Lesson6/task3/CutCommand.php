<?php

class CutCommand implements ICommand
{
    private $action = "вырезание текста";
    /**
     * @return mixed
     */
    public function execute()
    {
        echo "Выполняется команда {$this->action}. ";
        $this->log($this->action);
        echo PHP_EOL;
    }

    /**
     * @return mixed
     */
    public function unDo()
    {
        echo "Выполняется отмена команды {$this->action}.\n";
    }

    /**
     * @return mixed
     */
    public function reDo()
    {
        echo "Повторно выполняется команда {$this->action}.\n";
    }


    protected function log(){
        echo "Производится логирование команды {$this->action}.";
    }
}