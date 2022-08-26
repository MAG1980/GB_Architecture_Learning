<?php

declare(strict_types = 1);

namespace Model\Repository;

use Model\Entity;

class Product
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
     * Поиск продуктов по массиву id
     *
     * @param  int[]  $ids
     * @return Entity\Product[]
     */
    public function search(array $ids = []): array
    {
        if (!count($ids)) {
            return [];
        }

        $productList = [];

        //Перебираем массив id, чтобы вернуть соответствующие им сущности
        foreach ($ids as $id) {
            try {
                //Пытаемся получить нужный объект из глобального хранилища
                $productList[] = $this->identityMap->get("Product", $id);
            } catch (EmptyCacheException $e) {
                //Возвращаем из источника данных (БД) информацию о Product
                $item = $this->getDataFromSource(['id' => $id]);

                //Порождаем объект Product и добавляем его во временный массив
                $newProduct=new Entity\Product($item['id'], $item['name'], $item['price']);
                $productList[] = $newProduct;

                //Добавляем порождённый объект Product в глобальное хранилище
                $this->identityMap->add($newProduct);
            }
        }

        return $productList;
    }

    /**
     * Получаем все продукты и добавляем их в глобальное хранилище
     *
     * @return Entity\Product[]
     */
    public function fetchAll(): array
    {
        $productList = [];
        foreach ($this->getDataFromSource() as $item) {
            $newProduct=new Entity\Product($item['id'], $item['name'], $item['price']);
            $productList[] = $newProduct;
            $this->identityMap->add($newProduct);
        }

        return $productList;
    }

    /**
     * Получаем продукты из источника данных
     *
     * @param array $search
     *
     * @return array
     */
    private function getDataFromSource(array $search = [])
    {
        $dataSource = [
            [
                'id' => 1,
                'name' => 'PHP',
                'price' => 15300,
            ],
            [
                'id' => 2,
                'name' => 'Python',
                'price' => 20400,
            ],
            [
                'id' => 3,
                'name' => 'C#',
                'price' => 30100,
            ],
            [
                'id' => 4,
                'name' => 'Java',
                'price' => 30600,
            ],
            [
                'id' => 5,
                'name' => 'Ruby',
                'price' => 18600,
            ],
            [
                'id' => 8,
                'name' => 'Delphi',
                'price' => 8400,
            ],
            [
                'id' => 9,
                'name' => 'C++',
                'price' => 19300,
            ],
            [
                'id' => 10,
                'name' => 'C',
                'price' => 12800,
            ],
            [
                'id' => 11,
                'name' => 'Lua',
                'price' => 5000,
            ],
        ];

        if (!count($search)) {
            return $dataSource;
        }

        $productFilter = function (array $dataSource) use ($search): bool {
            return in_array($dataSource[key($search)], current($search), true);
        };

        return array_filter($dataSource, $productFilter);
    }
}
