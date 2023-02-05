<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

    $serv = "mysql:host=localhost;dbname=hospital_005;charset=UTF8";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO($serv, $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connecting to Database!";

    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit();
    }

?>

</body>
</html>