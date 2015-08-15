<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

require __DIR__ . '/../vendor/autoload.php';

$ip = $_GET['ip'];
$type = $_GET['t'];
$value = $_GET['v'];

$device = Bh\ShBackend\Devices\DevicesManager::getInstance()->getDevice($ip);
$device->send($type, $value);

header('Content-type: Application/json');
echo $device->getAsJson();

