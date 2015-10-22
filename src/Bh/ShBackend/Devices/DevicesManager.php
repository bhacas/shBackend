<?php

namespace Bh\ShBackend\Devices;

/**
 * Description of DevicesManager
 *
 * @author Bartłomiej Hacaś <b.hacas@kontaktenergia.pl>
 * @package CRM 2.0
 */
class DevicesManager
{

    private static $oInstance = false;
    public $devicesIds = array(
        '127.0.0.1',
        '192.168.1.112'
    );

    public static function getInstance()
    {
        if (self::$oInstance == false) {
            self::$oInstance = new DevicesManager();
        }
        return self::$oInstance;
    }

    private function __construct()
    {
        
    }

    public function getAllDevices()
    {
        $ret = array();

        foreach ($this->devicesIds as $deviceIp) {
            $ret[$deviceIp] = $this->getDevice($deviceIp);
        }

        return $ret;
    }

    public function getDevice($deviceIp)
    {
        $apcRes = false;
        $device = apc_fetch('device'.$deviceIp, $apcRes);
        if ($apcRes) {
            return $device;
        }

        switch ($deviceIp) {
            case '127.0.0.1':
                $arduino = new ArduinoMock();
                break;
            case '192.168.1.112':
                $arduino = new ArduinoMock();
                break;
            default:
                throw new \LogicException('Unknown device: ' . $deviceName);
        }

        apc_store('device'.$deviceIp, $arduino);
        return $arduino;
    }

}
