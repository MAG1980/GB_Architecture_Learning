<?php

class UserMapper
{
    //Классо-адаптер, осуществляющий работу с конкретной СУБД, например, MySQLStorageAdapter
    private $storageAdapter;

    public function __construct(IStorageAdapter $storage)
    {
        $this->storageAdapter = $storage;
    }

    //Получение объекта из БД по ключу
    public function findById(int $id): User
    {
        $result = $this->storageAdapter->find($id);
        if ($result === null) {
            throw new Exception('User #'.$id.' not found');
        }
        return $this->mapRowToUser($result);
    }

    /* Преобразует ключи данных, полученных из БД, из наименований ключей, принятых в БД, к наименования ключей, принятым в приложении.*/
    private function mapRowToUser(array $row): User
    {
        return new User($row['username'], $row['email']);
    }
}

