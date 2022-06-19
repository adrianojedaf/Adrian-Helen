<?php
    $db_server = 'sql311.epizy.com';
    $db_username = 'epiz_31993245';
    $db_password = 'vy3YWdMstw5y2';
    $db_name = 'epiz_31993245_xcooter';

    try {
        $conn = new PDO("mysql:host=$db_server;dbname=$db_name;", $db_username, $db_password);
    } catch (PDOException $e) {
        die('Connection Failed: '.$e->getMessage());
    }
?>
