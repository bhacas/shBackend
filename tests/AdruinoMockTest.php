<?php

/**
 * Description of Bedroom1RoomManagerTest
 *
 * @author Bartłomiej Hacaś <b.hacas@kontaktenergia.pl>
 * @package CRM 2.0
 */
class ArduinoMockTest extends PHPUnit_Framework_TestCase
{
    public function testTurnLight1On()
    {
        $device = new \Bh\ShBackend\Devices\ArduinoMock();
        $device->turnLight1Off();
        $this->assertEquals($device->get('l1'), 0);
        $device->turnLight1On();
        $this->assertEquals($device->get('l1'), 1);
    }
}
