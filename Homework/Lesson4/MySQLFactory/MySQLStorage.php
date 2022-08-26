<?php

class MySQLStorage extends Storage
{

    function query(string $aql): array
    {
        return ['MySQLStorage', []];
    }
}