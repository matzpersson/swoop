<?php

// PDO based database connectivity
// Hardcoded connection details are not pretty but... time allowing
// Using bindparm to attached parameters
class Db
{
    private $connection;
    private $host = "mysql_db";
    private $username = "swoop";
    private $password = "swoop";
    private $dbname = "swoop";
    private $dsn;
    private $options = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    public function __construct($id = null)
    {
        $this->dsn = "mysql:host=$this->host;dbname=$this->dbname";
        $this->connect();
    }

    private function connect()
    {
        try {
            $this->connection = new PDO($this->dsn, $this->username, $this->password, $this->options);
        } catch(PDOException $error) {
            echo 'Database Connection Error for $this->dsn<br>' . $error->getMessage();
        }
    }

    public function one($tableName, $id) {
        $sql = "SELECT * 
            FROM $tableName
            WHERE id = :id";

        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetch();
        return $result;
    }

    public function delete($tableName, $id) {
        $sql = "DELETE 
            FROM $tableName
            WHERE id = :id";

        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();

        return true;
    }

    public function insert($tableName, $row) {
        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            $tableName,
            implode(", ", array_keys($row)),
            ":" . implode(", :", array_keys($row))
        );

        $statement = $this->connection->prepare($sql);
        $statement->execute($row);
    }

    public function select($sql, $params) {
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':classType', $params["classType"]);
        $statement->bindParam(':fromDate', $params["fromDate"]);
        $statement->bindParam(':toDate', $params["toDate"]);
        $statement->execute();

        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
}
?>