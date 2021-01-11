<?php

require "./env.php";

$db      = new Database\Connect();
$extract = new ExtractDatabase\ExtractDatabase($db->getConnect());

$tableName = $extract->extractTableDatabese();         // tables db 
$tableDb   = $extract->extractStructureTable($tableName[0]); // Structure Table 

echo "<pre/>";
var_dump($tableName, $tableDb);
// var_dump($tableName);
// var_dump($tableDb);
