<?php
class db {
    //connect to the database
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "tboiseeds";
    public function connect() {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
    //function to fetch all data depending on a conmdition
    public function FETCH_All($tableName, $conditions=null, $params=null) {
        $sql = "SELECT * FROM " .$tableName." " .$conditions;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute($params);

        while($result = $stmt->fetchAll(PDO::FETCH_OBJ)) {
            return $result;
        };
    }
    //function to fetch a specific data depending on a condition
    public function FETCH($tableName, $conditions=null, $params=null) {
        $sql = "SELECT * FROM " .$tableName ." " .$conditions;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute($params);

        while($result = $stmt->fetch(PDO::FETCH_OBJ)) {
            return $result;
        };
    }
    //function to insert data in the database
    public function INSERT($tableName, $conditions, $params) {
        $sql = "INSERT INTO " .$tableName.$conditions;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute($params);
    }
    //function to update data in the database
    public function UPDATE($tableName, $conditions, $params) {
        $sql = "UPDATE" .$tableName.$conditions;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute($params);
    }
    //function to delete data in the database
    public function DELETE($tableName, $conditions=null, $params=null) {
        $sql = "DELETE FROM " .$tableName." " .$conditions;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$params]);
    }
}