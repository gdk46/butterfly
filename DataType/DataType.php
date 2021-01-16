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

namespace Butterfly\DataType;


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
        switch ($data) {
            case 'tinyint':
            case 'smalllint':
            case 'mediumint':
            case 'int':
            case 'biging':
            case 'bit':
            case 'serial':
                return "int";
                break;

            case 'double':
                return "double";
                break;

            case 'decimal':
            case 'real':
                return "float";
                break;

            case 'bollean':
                return "bool";
                break;

            case 'char':
            case 'varchar':
            case 'tinytext':
            case 'text':
            case 'mediumtext':
            case 'longtext':
            case 'binary':
            case 'varbinary':
            case 'tinyblob':
            case 'blob':
            case 'mediumblob':
            case 'longblob':
            default:
                return "string";
                break;
        }
    }
}
