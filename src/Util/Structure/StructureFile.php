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
 * Configurações criação de documentos
 * 
 *
 * @package Util\Structure
 * @category Configurations
 * @version 1.0
 */


namespace Util\Structure;

abstract class StructureFile
{

    /**
     * @param String $path
     * @param string $filename
     * @param String $text
     * @return bool
     */
    static public function CreateFile($path, $filename, $text)
    {
        if(file_exists("{$path}".$filename)){
            return false;
        }else{
            $folder_replace = str_replace("/", "\\", $path.$filename);
            $file = fopen($folder_replace,'w');
            $text = trim($text);

            fwrite($file, $text);
            fclose($file);
            return fclose($file);
        }
       
    }

}
