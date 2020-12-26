<?php

use Util\Structure\StructureFolder;

require_once "../../env.php";


$folder = new StructureFolder(
            "C:/xampp/htdocs/php/sistema-butterfly/sys-manager-container/",
            "sistemaTest"
        );

$createFolder = $folder->CreateFolder();
var_dump($createFolder);