<?php

interface IDBQueryBuilder
{
    public function create(string $sql): bool;

    public function read(string $sql): array;

    public function update(string $sql): bool;

    public function delete(string $sql): bool;

    public function query(string $sql): array;

}


class DBQueryBuilder implements IDBQueryBuilder
{
    public function create(string $sql): bool
    {
        return true || false;
    }

    public function read(string $sql): array
    {
        return [];
    }

    public function update(string $sql): bool
    {
        return true || false;
    }

    public function delete(string $sql): bool
    {
        return true || false;
    }

    public function query(string $sql): array
    {
        return [];
    }
}