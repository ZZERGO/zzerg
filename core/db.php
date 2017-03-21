<?php
/**
 * Created by PhpStorm.
 * User: trushkov
 * Date: 20.02.2017
 * Time: 17:44
 */

namespace Core;


class Db
{
    private $config = [];
    private static $instance = null;

    private function __construct()
    {
        $config = Config::getInstance();
        $this->config = $config->db;

        $username = $this->config['dbuser'];
        $passwd = $this->config['dbpass'];
        $dbtype = $this->config['dbtype'];
        $dbhost = $this->config['dbhost'];
        $dbname = $this->config['dbname'];
        $option = [];

        try{
            $dsn = $dbtype . ':host=' . $dbhost . ';dbname=' . $dbname;
            self::$instance = new \PDO($dsn, $username, $passwd, $option);
        } catch (\PDOException $err){
            echo '<h2>Не удаётся подключиться к базе данных</h2>' . $err->getMessage();
        }
    }


    public static function Connect()
    {
        if (null == self::$instance){
            new self();
        }
        return self::$instance;
    }


}