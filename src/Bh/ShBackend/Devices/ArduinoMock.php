<?php

namespace Bh\ShBackend\Devices;

/**
 * Description of ArduinoMock
 *
 * @author Bartłomiej Hacaś <b.hacas@kontaktenergia.pl>
 * @package CRM 2.0
 */
class ArduinoMock extends AbstractArduino
{

    protected $connection = 'http://localhost/arduinoMock/api.php';
    protected $ip = '127.0.0.1';

}
