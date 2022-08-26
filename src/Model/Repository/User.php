<?php

declare(strict_types=1);

namespace Model\Repository;

use Model\Entity;

class User
{
    //Ссылка на глобальное хранилище сущностей
    private IdentityMap $identityMap;

    /**
     * @param  IdentityMap  $identityMap  - глобальное хранилище сущностей
     */
    public function __construct(IdentityMap $identityMap)
    {
        $this->identityMap = $identityMap;
    }

    /**
     * Получаем пользователя по идентификатору
     *
     * @param  int  $id
     * @return Entity\User|null
     */
    public function getById(int $id): ?Entity\User
    {
        //Пытаемся получить пользователя из глобального хранилища сущностей по id
        try {
            return $this->identityMap->get("User", $id);
        } catch (EmptyCacheException $e) {
            foreach ($this->getDataFromSource(['id' => $id]) as $user) {
                $userObject = $this->createUser($user);
                $this->identityMap->add($userObject);
                return $userObject;
            }
        }
        return null;
    }

    /**
     * Получаем пользователя по логину
     *
     * @param  string  $login
     * @return Entity\User
     */
    public function getByLogin(string $login): ?Entity\User
    {
        //Пытаемся получить пользователя из глобального хранилища сущностей по login
        try {
            return $this->identityMap->get("User", $login);
        } catch (EmptyCacheException $e) {
            foreach ($this->getDataFromSource(['login' => $login]) as $user) {

                if ($user['login'] === $login) {
                    $userObject = $this->createUser($user);
                    $this->identityMap->add($userObject);
                    return $userObject;
                }
            }
        }

        return null;
    }

    /**
     * Фабрика по созданию сущности пользователя
     *
     * @param  array  $user
     * @return Entity\User
     */
    private function createUser(array $user): Entity\User
    {
        $role = $user['role'];

        return new Entity\User(
            $user['id'],
            $user['name'],
            $user['login'],
            $user['password'],
            new Entity\Role($role['id'], $role['title'], $role['role'])
        );
    }

    /**
     * Получаем пользователей из источника данных
     *
     * @param  array  $search
     *
     * @return array
     */

    //Возвращает элементы массива данных источника, присутствующие в массиве искомых данных
    private function getDataFromSource(array $search = [])
    {
        $admin = ['id' => 1, 'title' => 'Super Admin', 'role' => 'admin'];
        $user = ['id' => 1, 'title' => 'Main user', 'role' => 'user'];
        $test = ['id' => 1, 'title' => 'For test needed', 'role' => 'test'];

        //Хранилище данных
        $dataSource = [
            [
                'id' => 1,
                'name' => 'Super Admin',
                'login' => 'root',
                'password' => '$2y$10$GnZbayyccTIDIT5nceez7u7z1u6K.znlEf9Jb19CLGK0NGbaorw8W', // 1234
                'role' => $admin
            ],
            [
                'id' => 2,
                'name' => 'Doe John',
                'login' => 'doejohn',
                'password' => '$2y$10$j4DX.lEvkVLVt6PoAXr6VuomG3YfnssrW0GA8808Dy5ydwND/n8DW', // qwerty
                'role' => $user
            ],
            [
                'id' => 3,
                'name' => 'Ivanov Ivan Ivanovich',
                'login' => 'i**extends',
                'password' => '$2y$10$TcQdU.qWG0s7XGeIqnhquOH/v3r2KKbes8bLIL6NFWpqfFn.cwWha', // PaSsWoRd
                'role' => $user
            ],
            [
                'id' => 4,
                'name' => 'Test Testov Testovich',
                'login' => 'testok',
                'password' => '$2y$10$vQvuFc6vQQyon0IawbmUN.3cPBXmuaZYsVww5csFRLvLCLPTiYwMa', // testss
                'role' => $test
            ],
        ];

        //Если массив поиска не задан, то возвращаем все данные из хранилища
        if (!count($search)) {
            return $dataSource;
        }

        //Возвращает массив, состоящий из элементов, присутствующих в источнике данных и массиве запроса
        $productFilter = function (array $dataSource) use ($search): bool {
            return (bool) array_intersect($dataSource, $search);
        };

        //Фильтрует элементы массива данных источника с помощью callback-функции
        return array_filter($dataSource, $productFilter);
    }
}
