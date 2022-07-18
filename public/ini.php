<?php

//Definições principais
ini_set('display_errors', 0);
error_reporting(E_ALL ^ E_NOTICE);
include RAIZ . 'public/functions.php';
spl_autoload_register('autoload');
header('Content-type: text/html; charset=utf-8');

define('SITE', $_SERVER['REQUEST_SCHEME'] . '://' . str_replace('//', '/', $_SERVER['HTTP_HOST'] . '/' .
        str_replace([$_SERVER['DOCUMENT_ROOT'], '/'], '', RAIZ) . '/'));

App\db\MySQL::inicia();