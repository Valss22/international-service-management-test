<?php
require_once __DIR__ . '/../src/UserBalance.php';

header("Content-Type: application/json; charset=UTF-8");

$userId = $_GET['user_id'] ?? "";

if (!empty($userId) && ctype_digit($userId)) {
    $balance = new UserBalance();
    $result = $balance->getBalance($userId);
    echo json_encode($result);
} else {
    echo json_encode(["error" => "Invalid User ID"]);
}