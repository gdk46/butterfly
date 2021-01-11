<?php

namespace Database;

use PDO;
use PDOException;

class Connect
{

    /**
     * Undocumented function
     *
     * @return void
     */
    private function connectDb()
    {
        try {
            return new PDO(
                'mysql:host=' . DB_HOST . ';
                dbname=' . DB_DATABASE . ';', 
                DB_USERNAME, DB_PASSWORD
            );            
        } catch (PDOException $exception) {
            throw new PDOException($exception->getMessage());
        }
    }


    /**
     * Undocumented function
     *
     * @return object|PDO
     */
    public function getConnect()
    {
        return $this->connectDb();
    }
}