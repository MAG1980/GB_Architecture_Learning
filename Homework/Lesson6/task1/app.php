<?php
include "IObservable.php";
include "IObserver.php";
include "JobExchange.php";
include "JobSeeker.php";

$jobSeeker1 = new JobSeeker(1,"Pete", "pete@gmail.com", 12);
$jobSeeker2 = new JobSeeker(2,"Jack", "jack@gmail.com", 23);
$jobSeeker3 = new JobSeeker(3,"Ivan", "ivan@mail.ru", 34);

$jobExchange = new JobExchange([], [
    (object) ["id"=>1,"name"=>"Backend", "salary"=>1200],
    (object) ["id"=>2,"name"=>"Frontend", "salary"=>1100]
]);
$jobExchange->displayInfo("vacancies");
$jobExchange->displayInfo("observers");

$jobExchange->attach($jobSeeker1);
$jobExchange->attach($jobSeeker2);
$jobExchange->attach($jobSeeker3);

$jobExchange->displayInfo("vacancies");
$jobExchange->displayInfo("observers");

$jobExchange->addJob("Tester",900);
$jobExchange->removeJob(1);
$jobExchange->detach(2);