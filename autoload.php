<?php

function AutoLoader(string $className) {
    // Получаем путь к файлу класса
    $filePath = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';

    // Проверяем, существует ли файл класса
    if (file_exists($filePath)) {
        require_once $filePath;
        return true;
    }

    return false;
}

spl_autoload_register('AutoLoader');
