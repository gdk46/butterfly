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
 * descrição
 * 
 *
 * @package 
 * @category 
 * @version 1.0
 */


namespace Folder;

class Folder
{
    private $name;
    private $path;
    
    public function __construct($path)
    {
        $this->path = $path;        
    }

    /**     
     * @return String
     */
    public function getName(): String
    {
       return $this->name; 
    }

    /**     
     * @param String $name folder name
     * @return String
     */
    public function setName(string $name): String
    {
        return $this->name = $name;
    }

    /**     
     * @return String
     */
    public function getPath(): String
    {
       return $this->path; 
    }

    /**     
     * @param String $path Path to folder
     * @return String|bool
     */
    public function setPath(string $path) 
    {
        return $this->path = $path;
    }

    /**
     * Open Folder
     *
     * @param string $path Directory path
     * @return Array
     */
    /* public function openFolder(string $localpath)//: Array
    {
        foreach (glob($localpath) as $patha) {
            echo $patha, PHP_EOL;
        }        
    } */

    /**
     * Create Folder
     *
     * @param array $folderName Folder Structure
     * @return Array
     */
    public function createFolder(array $folderName): Array
    {
        $console = [];
        for ($i=0; $i < count($folderName); $i++) {
            $folder = $this->getPath().$folderName[$i];

            if(!file_exists($folder)){
                $status = mkdir($folder);

                $console[] = [
                    "$folder" => "$status",
                ];
                
            }
        }
        return $console;
    }

    /**
     * Delete folder
     *
     * @param array $folder Delete folder
     * @return Array
     */
    public function deleteFolder(array $folder): bool
    {
        return true;
    }
}