<?php

namespace Butterfly\NewApp;

use ConnectDb\Database\Connect;
use Butterfly\ExtractDatabase\ExtractDatabase;
use Butterfly\Folder\Folder;
use Butterfly\File\File;
use Butterfly\Structure\Project;

use Butterfly\Patterns\Controller;
use Butterfly\Patterns\Dao;
use Butterfly\Patterns\Model;
use Butterfly\Patterns\view;

use Butterfly\MoldFile\Mold;

class NewApp
{
    // project
    private $name;
    private $folder;
    private $file;

    // related to structure
    private Connect $db;
    private ExtractDatabase $extract;
    private Project $project;

    // patterns
    private Controller $controller;
    private Dao $dao;
    private Model $model;
    private View $view;


    /**
     * Construct
     *
     * @param string $path Root where the project will be created
     * @param string $name Project name
     */
    public function __construct(string $path, string $name)
    {
        $this->name    = $name;

        $this->folder  = new Folder($path);
        $this->file    = new File($path);

        $this->db      = new Connect();
        $this->extract = new ExtractDatabase($this->db->getConnect());
        $this->project = new Project($name);

        // patterns instance
        $this->controller = new Controller();
        $this->dao        = new Dao();
        $this->model      = new Model();
        $this->view       = new view();
    }

    public function getName()
    {
        return $this->name;
    }

    public function SetName(string $name)
    {
        return $this->name = $name;
    }


    /**
     * Generate structure default from system
     *
     * @return void
     */
    public function generateStructureDefault()
    {
        $this->folder->createFolder($this->project->structure());
        $this->file->createFile($this->project->structureFile());

        $name = $this->getName();

        // rewrite the files add contents templates
        $this->file->rewrittenInFile([
            "{$name}/autoload.php" => Mold::AUTOLOAD,
            "{$name}/app/composer.json" => Mold::COMPOSER,
            "{$name}/Environment/Config/Env.php" => Mold::ENV,
            "{$name}/.gitignore" => Mold::GITIGNORE,
            "{$name}/resources/View/.htaccess" => Mold::HTACCESS,
        ]);
    }

    /**
     * Generate structure default from Back-end
     *
     * @return void
     */
    public function generateStructureBackEnd()
    {
        $name = $this->getName();
        $tableName = $this->extract->extractTableDatabese();

        foreach ($tableName as $table) {
            // Database Extract
            $tableDb        = $this->extract->extractStructureTable($table);

            // Path Patterns
            $pathController = "{$name}/app/Controller/" . ucfirst("{$table}Controller.php");
            $pathDao        = "{$name}/app/Dao/" . ucfirst("{$table}Dao.php");
            $pathModel      = "{$name}/app/Model/" . ucfirst("{$table}.php");

            // Content Patterns
            $daoContent        = $this->dao->moldDao($table);
            $modelContent      = $this->model->moldModel($table, $tableDb);
            $controllerContent = $this->controller->moldController($table);

            // create files Controller, Dao, Model and add contents Patters 
            $this->file->writeInFile([
                "{$pathController}" => "{$controllerContent}",
                "{$pathDao}" => "{$daoContent}",
                "{$pathModel}" => "{$modelContent}"
            ]);
        }
    }

    /**
     * Generate structure default Front-end
     *
     * @return void
     */
    public function generateStructureFrontEnd()
    {
        $name = $this->getName();
        $tableName = $this->extract->extractTableDatabese();

        foreach ($tableName as $table) {

            $this->folder->createFolder([
                "{$name}/resources/View/{$table}"
            ]);

            // Database Extract
            $tableDb        = $this->extract->extractStructureTable($table);

            // generete Views
            $moldInput = $this->view->moldViewInput($tableDb);
            $moldTable = $this->view->moldViewTable($tableDb);

            // create files Views
            $this->file->writeInFile([
                "{$name}/resources/View/{$table}/criar.html" => "{$moldInput}",
                "{$name}/resources/View/{$table}/vizualizar.html" => "{$moldTable}",
            ]);
        }
    }

    /**
     * Generate structure default Api Rest
     *
     * @return void
     */
    public function generateStructureApi()
    {
        $name = $this->getName();
        $tableName = $this->extract->extractTableDatabese();

        foreach ($tableName as $table) {

            // API path
            $pathApiRepository = "{$name}/app/Api/Repository/" . ucfirst("{$table}Repository.php");
            $pathApiService    = "{$name}/app/Api/Service/" . ucfirst("{$table}Service.php");

            // Create files API Rest (repository and Service) 
            $this->file->writeInFile([
                "{$pathApiRepository}" => "",
                "{$pathApiService}" => ""
            ]);
        }
    }
}
