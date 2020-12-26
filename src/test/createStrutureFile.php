<?php

use Util\Structure\StructureFile;

require_once "../../env.php";


$text       = "oi mundo";
$createFile = StructureFile::CreateFile(
            "C:/xampp/htdocs/php/sistema-butterfly/sys-manager-container/",
            "test.php",
            $text
        );
var_dump($createFile);