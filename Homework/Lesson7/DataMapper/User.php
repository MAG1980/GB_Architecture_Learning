<?php

//Инкапсулирует данные о пользователе и методы для работы с ними.
class User
{
    private $email;
    private $username;

    public function __construct(string $username, string $email)
    {
        $this->email = $email;
        $this->username = $username;
    }

    public function getEmail()
    {/**/
    }

    public function getUserName()
    {/**/
    }
}
