<?php

if (PHP_VERSION < 7){
    echo '<h2>Для работы программы необходим PHP версии 7 или вышеПрограмма работает только на/h2><br>
В данный момент используется версия' . PHP_VERSION;
    die();
}

// включаем отображение всех ошибок
error_reporting (E_ALL);
ini_set('display_errors', 1);


// Назначаем константы
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__ . DS . '..');


// Подключаем автозагрузку и регистрируем в стеке
try {
    $loader = ROOT . DS. 'core' . DS . 'loader.php';
    if (!is_readable($loader)){
        throw new Exception('<b>Не найден файл</b><br>' . $loader . '<p><b>');
    }
    require_once $loader;
    spl_autoload_register(['\Core\Loader', 'autoloader']);
} catch (Exception $e) {
    echo '<p><b>Ошибка в файле:</b><br>' . $e->getFile() . '</p>';
    die($e->getMessage());
}


// Запускаем приложение
\Core\Router::Run();


