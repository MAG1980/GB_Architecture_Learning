<?php

class PostgreSQLFactory implements IDBFactory
{

    public function getConnection(): IDBConnection
    {
        return new PostgreSQLStorage();
    }

    public function getQuery(): IDBQueryBuilder
    {
        return new PostgreSQLQueryBuilder();
    }

    public function getRecord(): IDBRecord
    {
        return new PostgreSQLRecord();
    }
}