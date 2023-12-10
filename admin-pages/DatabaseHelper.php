<?php
date_default_timezone_set("Asia/Manila");
session_start();
class DatabaseHelper {
    private $dbHost, $dbUser, $dbPassword, $dbName;
    public function dbConnect(){
        $this->dbHost = 'localhost';
        $this->dbUser = 'root';
        $this->dbPassword = '';
        $this->dbName = '';

        $dbConString = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
        return $dbConString;
    }

    public function selectRecords($sqlStatement){
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement->num_rows > 0){
            while($fetchStatement = $queryStatement->fetch_assoc()){
                $result[] = $fetchStatement;
            }
            return $result;
        }
    }

    public function freeRun($sqlStatement) {
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement) {
            return "OK";
        } else {
            return "NOT OK";
        }
    }
}