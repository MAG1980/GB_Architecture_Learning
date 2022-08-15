<?php

class MySQLFactory implements IDBFactory
{

    public function getConnection(): IDBConnection
    {
        return new MySQLStorage();
    }

    public function getQuery(): IDBQueryBuilder
    {
        return new MySQLQueryBuilder();
    }

    public function getRecord(): IDBRecord
    {
        return new MySQLRecord();
    }
}