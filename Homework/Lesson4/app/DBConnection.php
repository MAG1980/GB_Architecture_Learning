<?php
interface IDBConnection{
    function getStorage(): Storage;
}
abstract class DBConnection implements IDBConnection
{
   abstract function getStorage(): Storage;
}