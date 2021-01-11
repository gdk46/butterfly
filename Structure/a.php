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
 * Armazena as configurações de acesso a banco de dados todos os ambientes
 * necessários.
 *
 * @package Util\Structure
 * @category Configurations
 * @version 1.0
 */

namespace a;

use PDO;
use Dao\Connect;
use Util\Structure\StructureDao;
use Util\Structure\StructureController;
use Util\Structure\StructureEnv;
use Util\Structure\StructureFile;
use Util\Structure\StructureFolder;

class Structure
{
    private object $conn;
    private string $nameProject;
    private string $path;


    /**
     * @param string $nameProject
     * @param string $path
     */
    public function __construct($nameProject, $path = "C:/xampp/htdocs/php/sistema-butterfly/sys-manager-container/")
    {
        $this->nameProject = $nameProject;
        $this->path        = $path;

        $this->conn = new Connect();
        $this->conn = $this->conn->getConnect();

    }


    /**
     * Lista as tabelas do banco de dados
     * 
     * @return array
     */
    private function abstractDatabese()
    {
        $tableList = [];
        $prepare   = $this->conn->query("SHOW TABLES");
        $records   = $prepare->fetchAll(PDO::FETCH_ASSOC);
        foreach ($records as $row) {
            $tableList[] = $row;
        }
        return $tableList;
    }
    
    /**
     * Lista as tabelas do banco de dados
     *
     * 
     * @return array
     */
    private function abstractTables($table)
    {
        $sql_table       = "DESC {$table}";
        $structure_table = $this->conn->prepare($sql_table);
        $structure_table->execute();
        $tableValues     = $structure_table->fetchAll();
       
        return $tableValues;
    }



    /**
     * Cria o directório e os arquivos do Model
     * 
     * 
     * @param string $filename
     * @param string $content
     * @return void
     */
    public function createFileModel($filename, $content)
    {
        $statusFileModel = StructureFile::CreateFile(
            $this->path . "{$this->nameProject}/src/Model/",
            ucfirst($filename),
            $content
        );

        return $statusFileModel;
    }



    /**
     * Cria o directório e os arquivos do Model
     * 
     * 
     * @param string $filename
     * @param string $content
     * @return void
     */
    public function createFileEnv()
    {
        StructureFile::CreateFile(
            $this->path . "{$this->nameProject}/",
            "env.php",
            StructureEnv::variablesEnv()
        );

        StructureFile::CreateFile(
            $this->path . "{$this->nameProject}/",
            "autoload.php",
            StructureEnv::autoload()
        );

        StructureFile::CreateFile(
            $this->path . "{$this->nameProject}/src/Util/Crud/",
            "Connect.php",
            StructureEnv::connectDao()
        );

        StructureFile::CreateFile(
            $this->path . "{$this->nameProject}/src/Util/Mensage/",
            "Mensage.php",
            StructureEnv::Mensage()
        );
    }



    /**
     * Cria o directório e os arquivos do Dao
     * 
     * 
     * @param string $path
     * @param string $filename
     * @param string $nomeObj
     * @return void
     */
    public function createFileDao($filename, $nomeObj, $namePrimaryKey)
    {
        $statusFileModel = StructureFile::CreateFile(
            $this->path . "{$this->nameProject}/src/Dao/",
            ucfirst($filename),
            StructureDao::modeloDao($nomeObj, $namePrimaryKey)
        );

        return $statusFileModel;
    }



    /**
     * Cria o directório e os arquivos do Dao
     * 
     * 
     * @param string $path
     * @param string $filename
     * @param string $content
     * @return void
     */
    public function createFileView($table)
    {
        $createView = new StructureView($this->conn, $table);
        StructureFile::CreateFile(
            $this->path . "{$this->nameProject}/app/view/{$table}/",
            "criar.php",
            $createView->viewInput()
        );

        StructureFile::CreateFile(
            $this->path . "{$this->nameProject}/app/view/{$table}/",
            "vizualizar.php",
            $createView->viewTable()
        );
    }


    /**
     * Cria o directório e os arquivos do Controller
     * 
     * 
     * @param string $path
     * @param string $filename
     * @param string $nomeObj
     * @return void
     */
    public function createFileController($filename, $nomeObj)
    {
        $statusFileController  = StructureFile::CreateFile(
            $this->path . "{$this->nameProject}/src/Controller/",
            ucfirst($filename),
            StructureController::modeloController($nomeObj)
        );

        //return $statusFileController;
        var_dump($statusFileController);
    }


    
    /**
     * Cria ambiente
     *
     * 
     * @return bool
     */
    public function createEnv()
    {
        $arrStrt = [
            "{$this->nameProject}/",
            "{$this->nameProject}/app",
            "{$this->nameProject}/app/assets",
            "{$this->nameProject}/app/assets/boot",
            "{$this->nameProject}/app/assets/css",
            "{$this->nameProject}/app/assets/js",
            "{$this->nameProject}/app/assets/img",
            "{$this->nameProject}/app/assets/img/wllp",
            "{$this->nameProject}/app/assets/img/icon",
            "{$this->nameProject}/app/assets/libs",
            "{$this->nameProject}/app/view",
            "{$this->nameProject}/src",
            "{$this->nameProject}/src/Controller",
            "{$this->nameProject}/src/Dao",
            "{$this->nameProject}/src/Model",
            "{$this->nameProject}/src/Util",
            "{$this->nameProject}/src/Util/Crud",
            "{$this->nameProject}/src/Util/Mensage",
            "{$this->nameProject}/src/test"
        ];


        for ($i = 0; $i < count($arrStrt); $i++) {
            $folder = new StructureFolder(
                $this->path."/",
                "{$arrStrt[$i]}"
            );
            $statusStructure = $folder->CreateFolder();
        }

        
        if($statusStructure){
            $tableList = $this->abstractDatabese();            
            for ($i = 0; $i < count($tableList); $i++) {
                $table = $tableList[$i]["Tables_in_" . BANCO . ""];
                $name  = $table;
                $primaryKey = $this->abstractTables($table);
                
                
                $folderView = new StructureFolder(
                    $this->path . "{$this->nameProject}/app/view/",
                    "{$name}"
                );
                $folderView->CreateFolder();
                $this->createFileView($table);


                $this->createFileDao(
                    $name."Dao.php",
                    $name,
                    $primaryKey[0][0]
                );

                $this->createFileController(
                    $name."Controller.php",
                    $name                  
                );
                
                $createModel = new StructureModel($this->conn, $table);
                $this->createFileModel(
                    $name.".php",
                    $createModel->model()
                );
            }
            $this->createFileEnv();

            return true;
        }
    }

}
