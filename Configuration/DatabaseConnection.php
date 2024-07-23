<?php
function getPDO() {
    $dsn = 'mysql:host=127.0.0.1;dbname=colle2024;charset=utf8';
    $username = 'root';
    $password = '';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    try {
        return new PDO($dsn, $username, $password, $options);
    } catch (PDOException $e) {
        throw new Exception("Database connection error: " . $e->getMessage());
    }
}
