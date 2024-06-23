<?php
require "vendor/autoload.php";

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

// соединение с сервером
$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel    = $connection -> channel();

// объявление очереди
$channel -> queue_declare('hello', false, false, false, false);

echo " [*] Waiting for messages. To exit press CTRL+C\n";

$callback = static function ($msg) {
	echo ' [x] Received ', $msg -> body, "\n";
};

$channel -> basic_consume('hello', '', false, true, false, false, $callback);

while (count($channel -> callbacks)) {
	$channel -> wait();
}