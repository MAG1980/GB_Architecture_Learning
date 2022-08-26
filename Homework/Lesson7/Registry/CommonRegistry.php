<?php

class CommonRegistry
{
    private $connection;
    private $session;
    private $request;

    private static $Instance;

    public function __construct()
    {
    }

    static function Instance()
    {
        if (!isset(static::$Instance)) {
            static::$Instance = new static();
        }
        return static::$Instance;
    }

    /**
     * @return mixed
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param  mixed  $connection
     */
    public function setConnection($connection): void
    {
        $this->connection = $connection;
    }

    /**
     * @return mixed
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @param  mixed  $session
     */
    public function setSession($session): void
    {
        $this->session = $session;
    }

    /**
     * @return mixed
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param  mixed  $request
     */
    public function setRequest($request): void
    {
        $this->request = $request;
    }

    /**
     * @return mixed
     */
    public static function getInstance()
    {
        return self::$Instance;
    }

    /**
     * @param  mixed  $Instance
     */
    public static function setInstance($Instance): void
    {
        self::$Instance = $Instance;
    }
}

//Usage example
CommonRegistry::Instance()->getConnection();

