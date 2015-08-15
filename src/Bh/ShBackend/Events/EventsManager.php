<?php

namespace Bh\ShBackend\Events;

/**
 * Description of EventsManager
 *
 * @author Bartłomiej Hacaś <b.hacas@kontaktenergia.pl>
 * @package CRM 2.0
 */
class EventsManager
{
    private static $oInstance = false;
    
    public $events = array();

    public static function getInstance()
    {
        if (self::$oInstance == false) {
            self::$oInstance = new EventsManager();
        }
        return self::$oInstance;
    }
    
    private function __construct()
    {
        $this->events[] = new AlertEvent();
    }
    
    public function run()
    {
        foreach ($this->events as $e) {
            if ($e->condition()) {
                $e->action();
            }
        }
    }


}
