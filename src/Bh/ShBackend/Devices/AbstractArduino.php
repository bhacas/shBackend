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

    public function getEvents()
    {
        $events = \Bh\ShBackend\Logger\LoggerMysql::getInstance()->getLogs($this->ip);
        foreach ($events as &$e) {
            $e['text'] = self::translate($e['event'], $e['value']);
        }
        return json_encode($events);
    }

    public static function translate($event, $value)
    {

        switch ($event) {
            case 'l1':
                switch ($value) {
                    case 0:
                        return 'Wyłączenie światła 1';
                    default:
                        return 'Włączenie światła 1';
                }
            case 'l2':
                switch ($value) {
                    case 0:
                        return 'Wyłączenie światła 2';
                    default:
                        return 'Włączenie światła 2';
                }
            case 's1':
                switch ($value) {
                    case 0:
                        return 'Wyłączenie kontaktu 1';
                    default:
                        return 'Włączenie kontaktu 1';
                }
            case 's2':
                switch ($value) {
                    case 0:
                        return 'Wyłączenie kontaktu 2';
                    default:
                        return 'Włączenie kontaktu 2';
                }
            case 's3':
                switch ($value) {
                    case 0:
                        return 'Wyłączenie kontaktu 3';
                    default:
                        return 'Włączenie kontaktu 3';
                }
            case 's4':
                switch ($value) {
                    case 0:
                        return 'Wyłączenie kontaktu 4';
                    default:
                        return 'Włączenie kontaktu 4';
                }
            case 't1':
                return 'Odczyt temperatury: ' . ($value / 10) . '°C';
            case 'h1':
                return 'Odczyt wilgotności: ' . ($value / 10) . '%';
        }
    }

}
