#!/usr/bin/env php
<?php

// шебанг, чмод+x, секция "bin" добавить файл, файлу убрать расширение php, дамп автолоад, мейкфайл алиас

// инклуд либы
require_once "./vendor/autoload.php";

//use Otus\Hw6\BalanceChecker;
use Alexm\BalanceChecker; // путь соотносится в autoload_classmap.php

// принять параметры. $opt из строки. или из ввода - readline
$filename = "./" . 'line.txt';
//var_dump($argv);
// при вызове скрипта с параметрами
if (isset($argv[1])) {
    $filename = "./" . $argv[1];
}

// проверка что файл есть и непустой. валидация параметров
if (!file_exists($filename)) {
    echo "file is not exist";
    exit;
}

// проверяем наличие содержимого в файле, считывая содержимое файла в строку
$line = file_get_contents($filename);
if ($line == false) {
    echo "file is empty";
    exit;
}

// вызов либы с файлом
//$pathFile = '';
//$res = "";
$res = new BalanceChecker();
//print_r($line);
// показать ответ
if ($res->checkBalance($line)) {
    echo "true !";
} else {
    echo "false !";
}
