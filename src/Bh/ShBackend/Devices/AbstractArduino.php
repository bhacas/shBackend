<?php

namespace Bh\ShBackend\Devices;

/**
 * Description of AbstractArduino
 *
 * @author Bartłomiej Hacaś <b.hacas@kontaktenergia.pl>
 * @package CRM 2.0
 */
class AbstractArduino
{

    protected $connection = null;
    protected $ip = null;
    protected $properties = array();
    private $inited = false;

    public function __construct()
    {
        if (!$this->inited) {
            $this->sync();
            $this->inited = true;
        }
    }

    public function sync($state = null)
    {
        if (!$state) {
            $state = json_decode(file_get_contents($this->connection), true);
        }

        foreach ($state as $s => $v) {
            $this->set($s, $v);
        }
    }

    public function send($property, $value)
    {
        if (apc_exists('device' . $this->ip)) {
            apc_delete('device' . $this->ip);
        }

        $url = $this->connection . '?type=' . $property . '&value=' . $value;

        $state = json_decode(file_get_contents($url), true);
        $this->sync($state);
    }

    public function set($property, $value)
    {
        $this->properties[$property] = $value;
        \Bh\ShBackend\Logger\LoggerMysql::getInstance()->log($this->ip, $property, $value);
        return $this;
    }

    public function get($property)
    {
        return $this->properties[$property];
    }
    
    public function getAsJson()
    {
        return json_encode($this->properties);
    }

}
