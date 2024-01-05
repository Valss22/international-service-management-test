<?php

class DatabaseConnection
{
    private string $host = 'db';
    private string $dbName = 'postgres';
    private string $username = 'user';
    private string $password = 'password';
    private PDO $connection;

    public function getConnection(): PDO
    {
        try {
            $this->connection = new PDO("pgsql:host=$this->host;dbname=$this->dbName", $this->username, $this->password);
        } catch(PDOException $exception) {
            echo "Database connection error: " . $exception->getMessage();
        }
        return $this->connection;
    }
}