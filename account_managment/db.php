<?php
    $db_server = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'xcooter';

    try {
        $conn = new PDO("mysql:host=$db_server;dbname=$db_name;", $db_username, $db_password);
    } catch (PDOException $e) {
        die('Connection Failed: '.$e->getMessage());
    }
?>
