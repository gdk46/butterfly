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
 * @package Butterfly\File
 * @category create
 * @version 1.0
 */


namespace Butterfly\File;

class File
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }


    /**     
     * @return String
     */
    public function getPath(): String
    {
        return $this->path;
    }

    /**     
     * @param String $path Path to File
     * @return String|bool
     */
    public function setPath(string $path): String
    {
        return $this->path = $path;
    }

    /**
     * Create one file
     * 
     * @param string $filename
     * @return bool
     */
    public function createFile(array $filename): array
    {
        for ($i = 0; $i < count($filename); $i++) {
            $console = [];
            $file = $this->getPath().$filename[$i];

            if (!file_exists($file)) {
                $folder_replace = str_replace("/", "\\", $file);
                $status = fopen($folder_replace, 'w');

                $console[] = [
                    "{$file}" => "{$status}",
                ];
            }
        }

        return $console;
    }


    /**
     * Write in file
     *
     * @param array arrContent Array white content and route from file
     * @return bool
     */
    public function writeInFile(array $arrContent): bool
    {
        foreach ($arrContent as $path => $content) {
            $route = $this->getPath().$path;

            if (!file_exists($route)){
                $status = (bool) (file_put_contents($route, trim($content))) ? true : false;

                if ($status) {
                    return $status;            
                }
            }
        }
        
        return false;
    }

    /**
     * rewrites a file
     *
     * @param array arrContent Array white content and route from file
     * @return bool
     */
    public function rewrittenInFile(array $arrContent): bool
    {        
        foreach ($arrContent as $path => $content) {
            $route = $this->getPath().$path;
                 
            if (file_exists($route)){
                $status = (bool) (file_put_contents($route, trim($content))) ? true : false;

                if ($status) {
                    return $status;
                }
            }
        }
        
        return false;
    }
}
