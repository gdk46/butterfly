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
 * Armazena as configurações de acesso a banco de dados todos os ambientes
 * necessários.
 *
 * @package Util\Structure
 * @category Configurations
 * @version 1.0
 */

namespace Util\Structure;

abstract class StructureDao
{

    /**
     * modelos de Dao para acessar objetos do banco de dados
     *
     * @param String $nameClass
     * @param String $nameTable
     * @return String
     */
    static public function modeloDao($nameObj)
    {
        
        return '<?php

        namespace Dao;
        
        use Util\Database\Crud;
        
        class '.ucfirst($nameObj).'Dao
        {
        
            private $crud;
            private $table;
            
            public function __construct()
            {
                $this->crud = new Crud();
                $this->table = "'.$nameObj.'";
            }
        
        
            /**
             * Insert data from a table
             *
             * 
             * @param string $table
             * @param array $dataArr
             * @param bool $debuger
             * @return string
             */
            public function create(array $dataArr, bool $debuger = false)
            {
                $result = $this->crud->create($this->table, $dataArr, $debuger = false);
                return (!$result) ?? "Erro";
            }
        
        
            /**
             * reading data from a table
             *
             * 
             * @param string $query
             * @param bool $debuger
             * @return string
             */   
            public function read(string $query = NULL, bool $debuger = false)
            {
                $result = $this->crud->read($this->table, $query = NULL, $debuger = false);
                return (!$result) ?? "Erro";
            }
        
        
            /**
             * update or increment data from a table
             *
             * 
             * @param array $dataArr
             * @param string $query
             * @param bool $debuger
             * @return string
             */   
            public function update(array $dataArr, string $query = NULL, bool $debuger = false)
            {
                $result = $this->crud->create($this->table, $dataArr, $debuger = false);
                return (!$result) ?? "Erro";
            }
        
        
            /**
             * Delete data from a table
             *
             * 
             * @param string $query
             * @param bool $debuger
             * @return string
             */  
            public function delete(string $query = NULL, bool $debuger = false)
            {
                $result = $this->crud->delete($this->table, $query = NULL, $debuger = false);
                return (!$result) ?? "Erro";
            }
        }
        ';        
    }
    
}
