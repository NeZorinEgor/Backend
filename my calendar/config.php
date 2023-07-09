<?php

$host = '127.0.0.1:3306';
$db = 'my_calendar12340';
$user = 'my_calendar12340';
$password = 'dso5Jq0m';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}