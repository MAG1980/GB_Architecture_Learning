<?php

class RegistryStorage
{
    private static $instance;
    private $storage = [];
    private $allowedKeys = [
        "connection",
        "session",
        "request"
    ];

    static function Instance()
    {
        if (!isset(staic::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    public function getStorage($key)
    {
        return $this->storage->$key;
    }

    public function setStorage($key,$value)
    {
        if(in_array($key, $this->allowedKeys)){
            $this->storage[$key]=$value;
        }else{
            throw new Exception("Недопустимый тип данных!");
        }

    }
}