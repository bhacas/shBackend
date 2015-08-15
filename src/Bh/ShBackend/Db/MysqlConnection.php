<?php

namespace Bh\ShBackend\Db;

/**
 * Description of MysqlConnection
 *
 * @author Bartłomiej Hacaś <b.hacas@kontaktenergia.pl>
 * @package CRM 2.0
 */
class MysqlConnection extends \PDO
{

    protected static $dsn = 'mysql:host=localhost;dbname=shBackend;charset=utf8';
    protected static $username = 'root';
    protected static $password = 'a11111';
    private static $oInstance = false;

    public static function getInstance()
    {
        if (self::$oInstance == false) {
            self::$oInstance = new MysqlConnection(self::$dsn, self::$username, self::$password);
            self::$oInstance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        return self::$oInstance;
    }

}
