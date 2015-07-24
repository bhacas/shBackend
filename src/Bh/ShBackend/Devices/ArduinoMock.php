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
    
    public function turnLight1Off()
    {
        $this->send('l1', 0);
    }
    
    public function turnLight1On()
    {
        $this->send('l1', 1);
    }

}
