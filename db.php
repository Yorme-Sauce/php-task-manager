<?php

// Database connection settings
$host = 'localhost';
$db = 'your_database_name';
$user = 'your_username';
$password = 'your_password';

// Creating a new PDO instance
try {
    $pdo = new PDO("mysql:host={$host};dbname={$db};charset=utf8", $user, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

// Helper function for executing a query
function executeQuery($query, $params = []) {
    global $pdo;
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    return $stmt;
}

// Helper function to fetch all records
function fetchAllRecords($query, $params = []) {
    $stmt = executeQuery($query, $params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Helper function to fetch a single record
function fetchSingleRecord($query, $params = []) {
    $stmt = executeQuery($query, $params);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

?>