<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Add Patient</h1>
    <form action="addPatient.php" method="POST">

    <input type="text" placeholder="Enter Patient ID" name="P_id">
    <br><br>
    <input type="text" placeholder="Your name" name="P_name">
    <br><br>
     <input type="date" name="P_DOB">
    <br><br>
     <input type="text" placeholder="DEBT" name="P_debt">
    <br><br>
    <input type="submit">
    </form>

</body>
</html>

<?php 

    if(!empty($_POST['P_id'])&&!empty($_POST['P_name'])&&!empty($_POST['P_DOB'])&&!empty($_POST['P_debt'])):
    require_once '../connect.php';
    $sql_insert = "INSERT INTO patient VALUES (:P_id, :P_name, :P_DOB, :P_debt)";

    $stmt = $conn->prepare($sql_insert);
    $stmt->bindParam(':P_id', $_POST['P_id']);
    $stmt->bindParam(':P_name', $_POST['P_name']);
    $stmt->bindParam(':P_DOB', $_POST['P_DOB']);
    $stmt->bindParam(':P_debt', $_POST['P_debt']);

    if($stmt->execute()):
    $message = 'Suscessfully add new Country!';

    //แสดง Table Country
    header("Location:addPermissions.php");

    else: 
        $message = 'Fail to add new Country';
    endif;
    echo $message;
    $conn = null;
    endif;
?>
