<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

require __DIR__ . '/vendor/autoload.php';

$ip = $_SERVER['REMOTE_ADDR'];

$test = Bh\ShBackend\Devices\DevicesManager::getInstance()->getDevice($ip);

var_dump($test); die;