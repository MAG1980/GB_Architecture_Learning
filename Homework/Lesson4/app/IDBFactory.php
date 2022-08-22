<?php
interface IDBFactory
{
    public function getConnection():IDBConnection;
    public function getQuery():IDBQueryBuilder;
    public function getRecord():IDBRecord;
}