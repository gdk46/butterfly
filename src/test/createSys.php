<?php

use Util\Structure\StructureFile;
use Util\Structure\StructureFolder;
use Util\Structure\StructureView;
use Dao\Connect;

require_once "../../env.php";

$db    = new Connect();

/**
 * Estutura view
 */
$view  = new StructureView($db->getConnect(), "usuario");
$input = $view->viewInput();
$table = $view->viewTable();


/**
 * Estutura de pastas
 */

$folder = new StructureFolder(
    "C:/xampp/htdocs/php/sistema-butterfly/sys-manager-container/chef/app/view/",
    "Usuario"
);
$createFolder = $folder->CreateFolder();


/**
 * Estutura de arquivos
 */
$createFile = StructureFile::CreateFile(
    "C:/xampp/htdocs/php/sistema-butterfly/sys-manager-container/chef/app/view/Usuario/",
    "cadastro.php",
    $input
);

$createFile = StructureFile::CreateFile(
    "C:/xampp/htdocs/php/sistema-butterfly/sys-manager-container/chef/app/view/Usuario/",
    "vizualizar.php",
    $table
);
