<?php

class ProductEntity
{
    //Каждое из полей соответствует записи в БД
    protected CategoryEntity $category;
    protected VendorEntity $vendor;

    public function getCategory()
    {
        if (is_null($this->category)) {
            $this->category = (new CategoryRepository())->findById($this->categoryId);
        }
        return $this->category;
    }
}

class CategoryRepository
{
    public function findById()
    {

    }
}

class VendorRepository
{
    public function findById()
    {

    }
}

class ProductRepository
{
    public function findById()
    {

    }
}

/*
 * В момент запроса нет ясности, потребуется ли весь объём данных целиком (требуются ли данные, хранящиеся в полях $category и $vendor.
  Если загружать сразу всё - большой объём данных, т.к. появятся транзитные данные (связи). Это "повесит" БД.
  Если дополнительные данные загружать отдельно - растёт количество подключений к БД.
*/

//Usage example
$product = (new ProductRepository())->findById(21);
$product->getCategory('конкретная категория');

/*
 * Пример Ghost - сохранить в поле category объект класса CategoryRepository, у которого заполнена только часть
данных, например, только id.
*/