<?php

use Util\Structure\Structure;


require_once "../../env.php";

$structure  = new Structure("example");
var_dump($structure->createEnv());
//outup:true caso seja criado  
//outup:Null caso aja algum erro
