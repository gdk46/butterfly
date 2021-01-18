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
 * @package Pattern
 * @category Configurations
 * @version 1.0
 */

namespace Butterfly\Patterns;

class Dao
{

    /**
     * Dao models to access database objects
     *
     * @param String $nameObj  Name from calss
     * @param String $primaryKey primary key from table 
     * @return String
     */
    public function moldDao(string $nameObj, string $primaryKey = "id")
    {
        return '
        <?php
        namespace Dao;
        
        use Crud\Database\Crud;
        use Model\\'.ucfirst($nameObj).';
        
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
             * @param string $table
             * @param array $dataArr
             * @param bool $debuger
             * @return string
             */
            public function create(array $dataArr, bool $debuger = false)
            {
                $result = $this->crud->create($this->table, $dataArr, $debuger);
                return (!$result) ?? "Erro";
            }
        
        
            /**
             * reading data from a table
             *
             * @param string $query
             * @param bool $debuger
             * @return array|boll
             */   
            public function read(string $query = NULL, bool $debuger = false)
            {
                $result = $this->crud->getConnect()->read($this->table, $query, $debuger);
                while($row = $result->fetchObject("'.ucfirst($nameObj).'")){
                    $arrReturn[] = $row;
                }
        
                return $arrReturn;
            }
        
        
            /**
             * update or increment data from a table
             *
             * @param array $dataArr
             * @param int $id
             * @param string $primaryKey
             * @param bool $debuger
             * @return string
             */   
            public function update(array $dataArr, int $id, string $primaryKey = "'.$primaryKey.'", bool $debuger = false)
            {
                $query  = "$primaryKey = $id";
                $result = $this->crud->getConnect()->update($this->table, $dataArr, $query, $debuger);
                return (!$result) ?? "Erro";
            }
        
        
            /**
             * Delete data from a table
             *
             * @param int $id
             * @param string $primaryKey
             * @param bool $debuger
             * @return string
             */  
            public function delete(int $id, string $primaryKey = "'.$primaryKey.'", bool $debuger = false)
            {
                $query  = "$primaryKey = $id";
                $result = $this->crud->getConnect()->delete($this->table, $query, $debuger);
                return (!$result) ?? "Erro";
            }


            /**
             * Search the table
             * 
             * @param string $value
             * @return Array
             */
            public function search($value): Array
            {
                $sql = "SELECT * FROM '.$nameObj.' WHERE id LIKE %{$value}%";
                $sql .= " or nome LIKE %{$value}%";

                $result = $this->pdo->query($sql);
                while($row = $result->fetchObject("'.ucfirst($nameObj).'")){
                    $arrRetorno[] = $row;
                }

                return $arrRetorno;
            }
        }
        ';        
    }
    
}
