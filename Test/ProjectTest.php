<?php

require "../env.php";

// informo o caminho para o projeto ser armazenado
$path = 'C:/xampp/htdocs/php/';

//nome do projeto
$name = 'Test'; 

$db      = new Database\Connect();
$extract = new ExtractDatabase\ExtractDatabase($db->getConnect());
$folder  = new Folder\Folder($path);
$file    = new File\File($path);
$project = new Structure\Project($name);

// patterns instance
$controller = new Patterns\Controller();
$dao        = new Patterns\Dao();
$model      = new Patterns\Model();
$view       = new Patterns\view();


// Project sctruture
$structure     = $project->structure();
$structureFile = $project->structureFile();

// path
$structurePathController = $project->getPathController();
$structurePathModel      = $project->getPathModel();
$structurePathView       = $project->getPathView();
$structurePathDao        = $project->getPathDao();

// Database Extract
$tableName = $extract->extractTableDatabese();

echo "<pre/>";
print_r(
    $folder->createFolder($structure)
);

print_r(
    $file->createFile($structureFile)
);

foreach($tableName as $table){
    // Database Extract
    $tableDb        = $extract->extractStructureTable($table);
    
    // Path
    $pathController = $structurePathController.ucfirst($table."Controller.php");
    $pathDao        = $structurePathDao.ucfirst($table."Dao.php");
    $pathModel      = $structurePathModel.ucfirst($table.".php");

    // Content
    $daoContent        = $dao->moldDao($table, "id");
    $modelContent      = $model->moldModel($table, $tableDb);
    $controllerContent = $controller->moldController($table);

    
    $file->writeInFile([
        "{$pathController}" => "{$controllerContent}",
        "{$pathDao}" => "{$daoContent}",
        "{$pathModel}" => "{$modelContent}",
    ]);
}

