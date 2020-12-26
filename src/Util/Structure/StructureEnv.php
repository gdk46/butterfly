<?php
/**
 * Gleisson Neves - Copyright (c) Gleisson Neves (https://github.com/gdk46)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author     Gleisson Neves (https://github.com/gdk46)
 * @copyright  Copyright (c) Gleisson Neves (https://github.com/gdk46)
 * @license    http://www.opensource.org/licenses/mit-license.php MIT License
 */


/**
 * Armazena as configurações de ambientes
 * 
 *
 * @package Util\Structure
 * @category variables environment 
 * @version 1.0
 */

namespace Util\Structure;

abstract class StructureEnv
{


    static public function variablesEnv()
    {

        return "<?php

        ini_set('display_errors', 1);
        ini_set('display_startup_erros', 1);
        error_reporting(E_ERROR);
        

        /** 
         *  CONSTANTES DO BANCO 
         */
        define('DB_HOST', 'localhost');
        define('DB_DATABASE', 'test');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', '');


        /** 
        * OUTRAS CONSTANTES 
        */
        define('DS', DIRECTORY_SEPARATOR);
        define('DIR_APP', __DIR__);
        define('DIR_PROJETO', 'meu-projeto');


        if (file_exists( __DIR__.'\autoload.php')) {
            include __DIR__.'\autoload.php';
        } else {    
            die('Falha ao carregar autoload!');
        }
        ";
    }


    static public function autoload()
    {

        return '<?php

            /**
             * AUTOLOAD DE CLASSES DENTRO DO PACOTE "Class"
             * 
             * @param $classe
             */
            function autoload($classe)
            {
                $diretorioBase = DIR_APP . DS;
                $classe = $diretorioBase . "src" . DS . str_replace("\\\", DS, $classe) . ".php";
                
                // debugger
                // echo $classe."<br/>";
                
                
                if (file_exists($classe) && !is_dir($classe)) {
                    include $classe;
                }
            }
            
            spl_autoload_register("autoload");
        ';
    }


    /**
     * modelos de Dao de conexão ao banco de dados
     *     
     */
    static public function connectDao()
    {
        return '<?php
            namespace Dao;

            use PDO;
            use PDOException;

            class Connect
            {

                /**
                 * Undocumented function
                 *
                 * @return void
                 */
                private function connectDb()
                {
                    try {
                        return new PDO(
                            "mysql:host=" . DB_HOST . "; dbname=" . DB_DATABASE . ";", DB_USERNAME, DB_PASSWORD
                        );
                    } catch (PDOException $exception) {
                        throw new PDOException($exception->getMessage());
                    }
                }


                /**
                 * Undocumented function
                 *
                 * @return object|PDO
                 */
                public function getConnect()
                {
                    return $this->connectDb();
                }
            }
            
        ';        
    }
       

}