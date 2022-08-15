<?php

class OracleStorage extends Storage
{

    function query(string $aql): array
    {
        return ['OracleStorage', []];
    }
}