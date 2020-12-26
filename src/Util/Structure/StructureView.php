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
 * Armazena as configurações de acesso a camada de visão
 * 
 *
 * @package Util\Structure
 * @category Configurations
 * @version 1.0
 */

namespace Util\Structure;

class StructureView
{
    private $conn;
    private $tableName;

    /** 
     * @param PDO $connexao
     * @param String $tableName
     */
    public function __construct($connexao, $tableName)
    {
        $this->conn  = $connexao;
        $this->tableName = $tableName;
    }


    /**
     * @return String
     */
    public function viewInput()
    {
        $sqlTable       = "DESC {$this->tableName}";
        $structureTable = $this->conn->prepare($sqlTable);
        $structureTable->execute();
        $table          = $structureTable->fetchAll();

        $viewInput = '
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="description" content="">
            <meta name="keywords" content="">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <form action="" method="POST">
        ';
        foreach ($table as $column) {
            $viewInput .= '
                <span>' . $column[0] . '</span>
                <input type="text" name="' . $column[0] .'"/>

            ';
        }
        $viewInput .= '
            </form>
        </body>
        </html>
        ';
        return trim($viewInput);
    }


    /**
     * @return String
     */
    public function viewTable()
    {
        $sqlTable       = "DESC {$this->tableName}";
        $structureTable = $this->conn->prepare($sqlTable);
        $structureTable->execute();
        $table          = $structureTable->fetchAll();

        $viewInput = '
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="description" content="">
            <meta name="keywords" content="">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <table>
                <thead>
                    <tr>
        ';
        foreach ($table as $column) {
            $viewInput .= '
                        <th>' . $column[0] . '</th>
            ';
        }
        $viewInput .= '
                        <th></th>
                    </tr>
                </thead>
            </table>
        </body>
        </html>
        ';


        return trim($viewInput);
    }
}
