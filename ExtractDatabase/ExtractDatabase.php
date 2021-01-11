<?php

namespace ExtractDatabase;

use PDO;

class ExtractDatabase
{
    public PDO $connect;

    /**
     *
     * @param PDO $connect Connection to the database
     */
    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    /**
     * Databese list the table
     * 
     * @return array
     */
    public function extractTableDatabese(): array
    {
        $table   = 0;
        $query   = $this->connect->query("SHOW TABLES");
        $records = $query->fetchAll();        
        
        foreach ($records as $row ) {
            $tableList[] = $row[$table];
        }
     
        return $tableList;
    }


    /**
     * Extract information from a database table
     *
     * @param string $table Table to be extracted
     * @return array
     */
    public function extractStructureTable(string $table): array
    {
        $structureTable = $this->connect->prepare("DESC {$table}");
        $structureTable->execute();
        
        foreach ($structureTable as $row ) {
            $tableList[] = [
                "field" => "{$row["Field"]}",
                "type"  => "{$row["Type"]}",
                "key"   => "{$row["Key"]}",
            ];
        }
        return $tableList;
    }
}
