<?php
/**
 * Created by PhpStorm.
 * User: trushkov
 * Date: 20.02.2017
 * Time: 16:11
 */

namespace Core;

/**
 * Class Config
 * @package Vendor\Core
 * @property $db Конфиг к базе данных
 * @property $routers Маршруты для маршрутизатора
 */
class Config
{
    private static $instance = null;
    private static $data = [];


    private function __construct()
    {

    }


    public static function getInstance()
    {
        if (self::$instance == null){
            self::$instance = new self();
        }
        return self::$instance;
    }


    public function __set($name, $value)
    {
        if (!isset(self::$data[$name])){
            self::$data[$name] = $value;
        }
    }

    public function __get($name)
    {
        if (isset(self::$data[$name])){
            return self::$data[$name];
        }
        $file = ROOT . DS . 'config' . DS . $name . '.config.php';

        try{
            if (!is_file($file) | !is_readable($file)){
                throw  new \Exception('<h3>Нет доступа к файлу: <br></h3>' . $file);
            }
            return self::$data[$name] = require_once $file;
        } catch (\Exception $err){
            echo '<h2>Ошибка</h2>в файле: ' . $err->getFile() . '<br>Строка: ' . $err->getLine();
            die($err->getMessage() . '');
        }
    }

    public function __isset($name)
    {
        if (!isset(self::$data[$name])){
            return false;
        }
        return true;
    }


}