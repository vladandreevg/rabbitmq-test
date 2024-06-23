<?php
require "vendor/autoload.php";

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

// соединение с сервером
$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel    = $connection -> channel();

// объявление очереди
$channel -> queue_declare('hello', false, false, false, false);

// отправка сообщения
$msg = new AMQPMessage('Hello World!');

$channel -> basic_publish($msg, '', 'hello');

// закрытие соединения
$channel -> close();
$connection -> close();

echo " [x] Sent 'Hello World!'\n";