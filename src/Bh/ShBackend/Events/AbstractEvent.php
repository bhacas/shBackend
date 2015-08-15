<?php

namespace Bh\ShBackend\Events;

/**
 * Description of AbstractEvent
 *
 * @author Bartłomiej Hacaś <b.hacas@kontaktenergia.pl>
 * @package CRM 2.0
 */
abstract class AbstractEvent
{

    public $devices = array();

    public function addDevice(\Bh\ShBackend\Devices\AbstractArduino $device)
    {
        $this->devices[] = $device;
        return $this->devices;
    }

    public function setDevices(array $devices)
    {
        $this->devices = $devices;
        return $this->devices;
    }

    abstract public function condition();

    abstract public function action();

}
