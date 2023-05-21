<?php

$host = '127.0.0.1:3308';
$db = 'ADMINISTRATION';
$user = 'ADMINISTRATOR';
$password = 'ADMINISTRATOR';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
