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
 * @package Pattern
 * @category Configurations
 * @version 1.0
 */

namespace Butterfly\Patterns;

use Butterfly\DataType\DataType;
use Butterfly\Sanitize\Sanitize;

class Model
{
    /** 
     * @param String $name Name class
     * @param array $data Extraction of data from array that generate get, set and vars
     * @return String
     */
    public function moldModel(String $name, array $data)
    {
        
        $attr = "";
        $get  = "";
        $set  = "";

        for ($i=0; $i < count($data); $i++) {
            $type  = DataType::analyzeType(Sanitize::strReplace($data[$i]['type']));
            $field = $data[$i]['field'];

            $attr .= "
            public {$type} $"."{$field};";


            $get .= "
            /**
             * @return {$type}
            */
            public function get".ucfirst($field).'()
            {return $this->'.$field.';}';


            $set .= "
            /**
             * @param {$type} {$field}
             * @return {$type}
            */
            public function set".ucfirst($field);            
            $set .= "({$type} $"."{$field}): {$type}";
            $set .='
            {return $this->'.$field.' = $'.$field.';}
            ';
        }
        $class = "
        <?php
        namespace Model;

        class ".ucfirst($name)."
        {
            {$attr}

            {$get}

            {$set}
        }
        ";
        
        return $class;
    }
}