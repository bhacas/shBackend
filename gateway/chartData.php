<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

require __DIR__ . '/../vendor/autoload.php';

$ip = $_GET['ip'];
$event = $_GET['event'];

header('Content-type: Application/json');
echo Bh\ShBackend\Devices\DevicesManager::getInstance()->getDevice($ip)->getEvents($event);

