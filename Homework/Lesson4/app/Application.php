<?php

class Application
{
    protected $connection;
    protected $query;
    protected $record;

    /**
     * @param $connection
     * @param $query
     * @param $record
     */
    public function __construct(IDBFactory $factory)
    {
        $this->connection = $factory->getConnection();
        $this->query = $factory->getQuery();
        $this->record = $factory->getRecord();
    }


}