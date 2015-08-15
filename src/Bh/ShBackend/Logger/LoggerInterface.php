<?php

namespace Bh\ShBackend\Logger;

/**
 * Description of LoggerInterface
 *
 * @author Bartłomiej Hacaś <b.hacas@kontaktenergia.pl>
 * @package CRM 2.0
 */
interface LoggerInterface
{

    public function log($device, $event, $value);

}
