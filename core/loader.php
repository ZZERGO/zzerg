<?php


namespace Vendor\Core;


class Loader
{
    public static function autoloader($classname)
    {
        try{
            $file = ROOT . DS . strtolower($classname) . '.php';
            if (!is_readable($file)){
                throw new \Exception('Не удаётся найти файл<br>' . $file . '<br>с классом ' . $classname);
            }
            require_once $file;
        } catch (\Exception $err){
            echo '<h3>ОСТАНОВКА ПРОГРАММЫ</h3>';
            die($err->getMessage());
        }
    }
}