<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Permissions</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Add Permissions</h1>
    <form action="addPermissions.php" method="POST">

    <input type="text" placeholder="Enter Patient ID" name="P_CID">
    <br><br>
    <input type="text" placeholder="Your Email" name="P_Username">
    <br><br>
    <input type="submit">
    </form>

</body>
</html>

<?php 

    if(!empty($_POST['P_CID'])&&!empty($_POST['P_Username'])):
    require_once '../connect.php';
    $sql_insert = "INSERT INTO permissions VALUES (:P_CID, :P_Username)";

    $stmt = $conn->prepare($sql_insert);
    $stmt->bindParam(':P_CID', $_POST['P_CID']);
    $stmt->bindParam(':P_Username', $_POST['P_Username']);

    if($stmt->execute()):
    $message = 'Suscessfully add new Country!';

    //แสดง Table Country
    header("Location:select_All.php");

    else: 
        $message = 'Fail to add new Country';
    endif;
    echo $message;
    $conn = null;
    endif;
?>
