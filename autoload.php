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
    $baseDir = [
        __DIR__ . DIRECTORY_SEPARATOR . $class . '.php',
    ];


    // use a quantidade de item do array como referencia, procure
    for ($i = 0; $i < count($baseDir); $i++) {


        // substitua \\ por / no index do directorio base  
        $class = str_replace('\\', DIRECTORY_SEPARATOR, $baseDir[$i]);


        // debugger
        // echo $i."<br/>";
        // echo "<br/>".$baseDir[$i]."<br/>";
        // echo "<br/>".$class."<br/>";


        // se o arquivo existir e não for um directório, exija-o 
        if (file_exists($class) && !is_dir($class)) {
            include $class;
        }
    }
}

spl_autoload_register('autoload');
