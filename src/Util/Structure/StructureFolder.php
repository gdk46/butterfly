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
 * Configurações criação de directório
 * 
 *
 * @package Util\Structure
 * @category Configurations
 * @version 1.0
 */


namespace Util\Structure;

class StructureFolder
{
    private $path;
    private $folderName;


    /**  
     * @param string $path
     * @param string $folderName
     */
    public function __construct($path, $folderName)
    {
        $this->path       = $path;
        $this->folderName = $folderName;
    }


    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return string
     */
    public function setPath($path)
    {
        return $this->path = $path;
    }


    /**
     * @return string
     */
    public function getFolderName()
    {
        return $this->folderName;
    }

    /**
     * @param string $folderName
     * @return string
     */
    public function setFolderName($folderName)
    {
        return $this->folderName = $folderName;
    }


    /**
     * @return bool
     */
    public function CreateFolder()
    {
        if(file_exists($this->path.$this->getFolderName())){
            return False;
        }else{
            mkdir($this->path.$this->getFolderName());
            return True;
        }
    }

}
