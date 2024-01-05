<?php
require_once 'DatabaseConnection.php';

class UserBalance {
    private readonly PDO $dbConnection;

    public function __construct() {
        $database = new DatabaseConnection();
        $this->dbConnection = $database->getConnection();
    }

    public function getBalance(int $userId): array
    {
        $query = "SELECT SUM(CASE WHEN paid_to = :userId THEN amount ELSE 0 END) - SUM(CASE WHEN paid_by = :userId THEN amount ELSE 0 END) as balance
                  FROM transactions";

        $stmt = $this->dbConnection->prepare($query);
        $stmt->bindParam(":userId", $userId);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}