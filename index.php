<?php

require __DIR__ . '/vendor/autoload.php';

$test = new Bh\ShBackend\Devices\ArduinoMock();

var_dump($test->get('l1'));
$test->turnLight1On();
var_dump($test->get('l1'));
die;
