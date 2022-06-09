<?php
    $db_server = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'xcooter';

    //create conenction
    // $conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);

    // Check connection
    // if (mysqli_connect_errno()) {
    //     echo "Failed to connect!";
    //     exit();
    // }

    try {
        $conn = new PDO("mysql:host=$db_server;dbname=$db_name;", $db_username, $db_password);
    } catch (PDOException $e) {
        die('Connection Failed: '.$e->getMessage());
    }
?>