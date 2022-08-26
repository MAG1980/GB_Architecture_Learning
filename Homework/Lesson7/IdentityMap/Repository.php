<?php
/*
 * Является DataMapper-ом, т.к. полученные из БД данные инкапсулирует в объект класса Entity
 * */
class Repository
{
    protected $storage;

    /**
     * @param $storage
     */
    public function __construct($storage)
    {
        $this->storage = $storage;
    }

    public function findById(int $id): Entity
    {
        $sql = "...";
        $data=$this->storage->query($sql);
        return new Entity($data);
    }
}

//Объект бизнес-логики приложения
class Entity{
}

$repository=new Repository();
$userEntity=$repository->findById(3);
//.................
//Повторное обращение к БД - плохая практика
$userEntity=$repository->findById(3);