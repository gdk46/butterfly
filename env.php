<?php
/* CONSTANTES DO BANCO */
define('DB_HOST', 'localhost');
define('DB_DATABASE', 'test');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');


if (file_exists(__DIR__ . '\autoload.php')) {
    include __DIR__ . '\autoload.php';
} else {
    die('Falha ao carregar autoload!');
}
