<?php
include "INotification.php";
include "Order.php";
include "Notification.php";
include "SmsNotification.php";
include "EmailNotification.php";

echo "Производится оформление заказа без отправки уведомлений.\n";
$orderWithoutNotification = new Order(5);
$orderWithoutNotification->notify();
echo "\n";

echo "Производится оформление заказа с уведомлением по SMS.\n";
$orderWithSmsNotification = new SmsNotification(
    new Order(7)
);
$orderWithSmsNotification->notify();
echo "\n";

echo "Производится оформление заказа с уведомлением по email.\n";
$orderWithEmailNotification = new EmailNotification(
    new Order(11)
);
$orderWithEmailNotification->notify();
echo "\n";

echo "Производится оформление заказа с уведомлением по SMS и email.\n";
$orderWithSmsEmailNotification = new EmailNotification(
    new SmsNotification(
        new Order(15)
    )
);
$orderWithSmsEmailNotification->notify();
echo "\n";

//Декораторы можно "вкладывать" друг в друга в произвольном порядке
echo "Производится оформление заказа с уведомлением по email и SMS.\n";
$orderWithSmsEmailNotification = new SmsNotification(
    new EmailNotification(
        new Order(21)
    )
);
$orderWithSmsEmailNotification->notify();
