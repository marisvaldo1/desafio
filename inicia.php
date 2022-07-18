<?php

    // Definições iniciais.
    define('RAIZ', str_replace('\\', '/', __DIR__) . '/');
    include 'vendor/autoload.php';
    include RAIZ . 'public/ini.php';

    define('SITE', $_SERVER['REQUEST_SCHEME'] . '://' . str_replace('//', '/', $_SERVER['HTTP_HOST'] . '/' . str_replace([$_SERVER['DOCUMENT_ROOT'], '/'], '', 'desafio') . '/'));