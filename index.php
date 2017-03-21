<?php

// Назначаем константы
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__);


// Подключаем приложение
try{
    $initfile = ROOT . DS . 'app' . DS . 'init.php';
    if (!is_readable($initfile)){
        throw new Exception('Файл инициализации недоступен:<br>' . $initfile . '<h3>Остановка программы</h3>');
    }
    require_once $initfile;
} catch (Exception $error){
    die(
        '<h3>Ошибка в файле ' . $error->getFile() . '<br>' .
        'Строка: ' . $error->getLine() . '</h4>' .
        $error->getMessage()
    );
}

