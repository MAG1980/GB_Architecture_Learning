<?php

interface IStorage
{
    function query(string $aql): array;
}

class Storage implements IStorage
{

    function query(string $aql): array
    {
        return [];
    }
}