<?php

class PostgreSQLStorage extends Storage
{

    function query(string $aql): array
    {
        return ['PostgreSQLStorage', []];
    }
}