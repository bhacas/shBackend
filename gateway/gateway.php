<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

require __DIR__ . '/../vendor/autoload.php';

$ip = $_SERVER['REMOTE_ADDR'];

if (apc_exists('device'.$ip)) {
    apc_delete('device'.$ip);
}

$test = Bh\ShBackend\Devices\DevicesManager::getInstance()->getDevice($ip);

Bh\ShBackend\Events\EventsManager::getInstance()->run();