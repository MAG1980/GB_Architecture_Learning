<?php

class OracleFactory implements IDBFactory
{

    public function getConnection(): IDBConnection
    {
        return new OracleStorage();
    }

    public function getQuery(): IDBQueryBuilder
    {
        return new OracleQueryBuilder();
    }

    public function getRecord(): IDBRecord
    {
        return new OracleRecord();
    }
}