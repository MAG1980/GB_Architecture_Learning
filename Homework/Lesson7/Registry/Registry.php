<?php

class Registry
{
    private static $Instance;
    private $object;

    public function __construct($object)
    {
        $this->object = $object;
    }

    static function getInstance()
    {
        if (!isset(static::$Instance)) {
            static::$Instance = new static();
        }
        return static::$Instance;
    }

    /**
     * @return mixed
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param  mixed  $object
     */
    public function setObject($object): void
    {
        $this->object = $object;
    }

}