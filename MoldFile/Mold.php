<?php

namespace Butterfly\MoldFile;

abstract class Mold
{
    public const AUTOLOAD = '
        <?php

        /**
         * Implementação específica do projeto.
         *
         * @param string $ class O nome totalmente qualificado da classe.
         * @return void
         */

        function autoload($class)
        {
            // directórios especificos para requisição dos namespace
            $base_dir = [
                __DIR__ . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . $class . ".php",
                __DIR__ . DIRECTORY_SEPARATOR . "Environment" . DIRECTORY_SEPARATOR . $class . ".php",
                __DIR__ . DIRECTORY_SEPARATOR . "app\Util" . DIRECTORY_SEPARATOR . $class . ".php",
                __DIR__ . DIRECTORY_SEPARATOR . "app\Libs" . DIRECTORY_SEPARATOR . $class . ".php",
            ];

            // use a quantidade de item do array como referencia, procure
            for ($i = 0; $i < count($base_dir); $i++) {

                // substitua \\ por / no index do directorio base  

                $class = str_replace("\\\", DIRECTORY_SEPARATOR, $base_dir[$i]);

                // debugger
                // echo "<br/>".$base_dir[$i]."<br/>";

                // se o arquivo existir e não for um directório, exija-o 
                if (file_exists($class) && !is_dir($class)) {
                    include $class;
                }
            }
        }

        spl_autoload_register("autoload");
    ';

    public const COMPOSER = '
        {
            "name": "user/app",
            "license": "MIT",
            "description": "",
            "authors": [
                {
                    "name": "",
                    "email": "Test@gmail.com"
                }
            ],
            "require": {
                "twig/twig": "^3.1"
            }
        }
    ';

    public const ENV = '
        <?php

        namespace Config;
        
        abstract class Env 
        {
            public const DB_FEATURE = [
                "db_drive" => "mysql",
                "db_port" => 3306,
                "db_name" => "test",
                "db_host" => "localhost",
                "db_username" => "root",
                "db_passwd" => "",
                "db_charset" => "utf8",
            ];
        }
    ';

    public const HTACCESS = '
        Options +FollowSymLinks -Indexes
        RewriteEngine On
        
        RewriteCond %{HTTP:Authorization} .
        RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
        
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteRule ^ index.php [L]
    ';

    public const GITIGNORE = '
        app/Vendor
    ';
}