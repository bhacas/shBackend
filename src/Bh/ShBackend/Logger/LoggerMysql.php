<?php

namespace Bh\ShBackend\Logger;

use \Bh\ShBackend\Db\MysqlConnection;

/**
 * Description of LoggerMysql
 *
 * @author Bartłomiej Hacaś <b.hacas@kontaktenergia.pl>
 * @package CRM 2.0
 */
class LoggerMysql implements LoggerInterface
{

    public $db;
    private static $oInstance = false;

    public static function getInstance()
    {
        if (self::$oInstance == false) {
            self::$oInstance = new LoggerMysql(MysqlConnection::getInstance());
        }
        return self::$oInstance;
    }

    private function __construct(\PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function log($device, $event, $value)
    {
        $selectQuery = 'SELECT value FROM history WHERE ip = "' . $device. '" AND event = "' . $event . '" ORDER BY id DESC LIMIT 1';
        $result = $this->db->query($selectQuery)->fetch(\PDO::FETCH_ASSOC);
        
        if (!$result || $result['value'] != $value) {
            $query = 'INSERT INTO history (ip, event, value) VALUES ("' . $device . '", "' . $event . '", ' . $value . ');';
            $this->db->query($query);
        }
    }

}
