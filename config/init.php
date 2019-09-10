<?php
//Файл инициализации конфигов для дальнейшей передачи в Base

$base = require __DIR__ . '/config.base.php';
$db = require __DIR__ . '/config.db.php';

return [
    'base' => $base,
    'db' => $db
];

