<?php

namespace Bh\ShBackend\Events;

/**
 * Description of AlertEvent
 *
 * @author Bartłomiej Hacaś <b.hacas@kontaktenergia.pl>
 * @package CRM 2.0
 */
class AlertEvent extends AbstractEvent
{
    
    public function __construct()
    {
        $this->addDevice(\Bh\ShBackend\Devices\DevicesManager::getInstance()->getDevice('127.0.0.1'));
    }

    public function action()
    {
        foreach (\Bh\ShBackend\Devices\DevicesManager::getInstance()->getAllDevices() as $d) {
            $d->send('l1', 1);
            $d->send('l2', 1);
            $d->send('b1', 0);
        }
    }

    public function condition()
    {
        foreach ($this->devices as $d) {
            if ($d->get('c1') == 1 || $d->get('c2') == 1) {
                return true;
            }
            return false;
        }
    }

}
