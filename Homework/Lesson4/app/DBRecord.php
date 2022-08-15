<?php

interface IDBRecord{
    public function getRecord(int $id):array;
}
abstract class DBRecord implements IDBRecord
{
   abstract public function getRecord(int $id):array;
}