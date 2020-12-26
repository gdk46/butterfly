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
 * Utilizado para indentificar alguns tipos de dados 
 * 
 *
 * @package Util\Structure
 * @category Configurations
 * @version 1.0
 */

namespace Util\DataType;


abstract class DataType
{
    /**
     * indentificar tipo de dado
     *
     * @param string $data
     * @return string
     */
    public static function analyzeType($data)
    {
        $data = strtoupper($data);
        switch ($data) {
            case 'TINYINT':
                return "int";
                break;
                
            case 'SMALLINT':
                return "int";
                break;

            case 'MEDIUMINT':
                return "int";
                break;
                
            case 'INT':
                return "int";
                break;

            case 'BIGINT':
                return "int";
                break;
                
            case 'DECIMAL':
                return "int";
                break;

            case 'DOUBLE':
                return "double";
                break;
                
            case 'REAL':
                return "int";
                break;
            case 'BIT':
                return "int";
                break;
                
            case 'BOOLEAN':
                return "bool";
                break;

            case 'SERIAL':
                return "int";
                break;
                
            case 'CHAR':
                return "string";
                break;

            case 'VARCHAR':
                return "string";
                break;
                
            case 'TINYTEXT':
                return "string";
                break;

            case 'TEXT':
                return "string";
                break;
                
            case 'MEDIUMTEXT':
                return "string";
                break;

            case 'LONGTEXT':
                return "string";
                break;
                
            case 'BINARY':
                return "string";
                break;

            case 'VARBINARY':
                return "string";
                break;
                
            case 'TINYBLOB':
                return "string";
                break;

            case 'BLOB':
                return "string";
                break;
                
            case 'MEDIUMBLOB':
                return "string";
                break;

            case 'LONGBLOB':
                return "string";
                break;
            
            default:
                return "Não indetificado";
                break;
        }
    } 
}