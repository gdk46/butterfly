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
 * @package Patterns
 * @category Configurations
 * @version 1.0
 */

namespace Butterfly\Patterns;

use Butterfly\Sanitize\Sanitize;

class View
{

    /**
     * @return String
     */
    public function moldViewInput(array $data)
    {
        $input = '';

        for ($i=0; $i < count($data); $i++) {            
            $field = $data[$i]['field'];
            $label = Sanitize::strReplace($field, " ");
            
            $input .='
                <label>' . $label . '</label>
                <input type="text" name="' . $field .'"/>
            ';
        }

        $form = '
        <form action="" method="POST">
        '.$input.'
        </form>';

        return $form;
    }


    /**
     * @return String
     */
    public function moldViewTable(array $data)
    {
        $row = "";
        $rowTwig = "";

        for ($i=0; $i < count($data); $i++) {
            $field = $data[$i]['field'];
            $fieldFomat = Sanitize::strReplace($data[$i]['field'], " ");
            
            
            $row .= "
            <th>{$fieldFomat}</th>";
            
            $rowTwig .= "
            <th>{{row.$field}}</th>";
        }
        
        $table = "
        <table>
            <thead>
                <tr>
                    {$row}    
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {% table post in row %}
                <tr>
                    {$rowTwig}
                    <th></th>
                </tr>
                {% endfor %}
            </tbody>
        </table>
        ";

        return $table;        
    }
}
