<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Hospital_005";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Success! ! !" ;

    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit();
    }

?>