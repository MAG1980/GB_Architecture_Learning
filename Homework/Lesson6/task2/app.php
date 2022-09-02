<?php
include "IPaymentStrategy.php";
include "Order.php";
include "QiwiPayment.php";
include "WebMoneyPayment.php";
include "YandexPayment.php";

$qiwiService = new Order(
    new QiwiPayment()
);
$webMoneyService = new Order(
    new WebMoneyPayment()
);
$yandexService = new Order(
    new YandexPayment()
);

$qiwiService->pay(145, "8-989-234-34-23");
$webMoneyService->pay(534, "8-929-347-14-36");
$yandexService->pay(67, "8-950-344-67-45");