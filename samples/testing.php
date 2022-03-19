<?php

require(__DIR__ . '/../vendor/autoload.php');

$a = new \devtranet\adminsystem\AdminSystem([
    'database' => [
        'host' => 'localhost',
        'user' => 'dbuser',
        'options' => [
            'char' => 'UTF8'
        ]
    ]
]);
