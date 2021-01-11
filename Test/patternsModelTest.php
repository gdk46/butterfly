<?php

require "../env.php";

$db      = new Database\Connect();
$extract = new ExtractDatabase\ExtractDatabase($db->getConnect());
$patterns= new Patterns\Model();

$tableName = $extract->extractTableDatabese();         // tables db 
$tableStct = $extract->extractStructureTable($tableName[0]); // Structure Table 

echo "<pre/>";
echo $patterns->moldModel($tableName[0], $tableStct);
// var_dump($tableName, $tableStct);
// var_dump($tableName);
// var_dump($tableStct);
