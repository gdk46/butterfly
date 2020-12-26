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
 * Armazena as configurações o modelo de banco de dados
 *
 *
 * @package Util\Structure
 * @category Configurations
 * @version 1.0
 */

namespace Util\Structure;

use Util\DataType\DataType;

class StructureModel
{
    private $conn;
    private $tableName;

    /** 
     * @param Abstract $connexao
     * @param String $tableName
     */
    public function __construct($connexao, $tableName)
    {
        $this->conn  = $connexao;
        $this->tableName = $tableName;
    }

    /** 
     * @param String $str
     * @return String
     */
    private function StrReplace($str)
    {
        return preg_replace("/[^A-Za-z]/", "", $str);
    }


    /** 
     * @param String $tableName
     * @return String
     */
    public function model()
    {
        $sql_table       = "DESC {$this->tableName}";
        $structure_table = $this->conn->prepare($sql_table);
        $structure_table->execute();
        $table           = $structure_table->fetchAll();
        


        $model_file = '
        <?php
        namespace Model;
        
        class ' . ucfirst($this->tableName) . '{';
        foreach ($table as $column) {
            $model_file .= '
                private $' . $column[0] . ';';
        }

        foreach ($table as $column) {
            $model_file .= '
                /**
                 * @return ' . DataType::analyzeType($this->StrReplace($column[1])) . '
                */
                public function get' . ucfirst($column[0]) . '(){
                    return $this->' . $column[0] . ';
                }
                
                /**
                 * @param ' . DataType::analyzeType($this->StrReplace($column[1])) . ' $' . $column[0] . '
                 * @return ' . $this->StrReplace($column[1]) . '
                */
                public function set' . ucfirst($column[0]) . '($' . $column[0] . '){
                    return $this->' . $column[0] . ' = $' . $column[0] . ';
                }
            ';
        }
        $model_file .= '}
        
        ';

        return trim($model_file);
    }
}
