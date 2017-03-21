<?php
/**
 * Created by PhpStorm.
 * User: trushkov
 * Date: 21.02.2017
 * Time: 22:36
 */

namespace Vendor\Core;


class Router
{
    public static function Run()
    {
        echo '<h3>Конструктор РОУТЕРА</h3>';
        $db = Db::Connect();
        var_dump($db);


    }
}