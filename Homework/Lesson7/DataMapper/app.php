<?php

//Usage example
//Возвращает данные о пользователе, полученные из БД, преобразованные к структуре данных приложения
public function testDataMapper(IStorageAdapter $adapter)
{
    //Получаем маппер, умеющий работать с конкретной БД благодаря полученному адаптеру
    $mapper = new UserMapper($adapter);
    $user = $mapper->findById(1);
}
