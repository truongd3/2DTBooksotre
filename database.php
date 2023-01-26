<?php
$dsn = 'mysql:host=localhost;dbname=bookstore';
$username = '2dt';
$password = 'Rich@rd2002';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}
?>

<!-- 
Name: Truong Duc Dang
Date: December 09, 2022
Course/Section: IT 202 001
Semester Project Phase 3 -->