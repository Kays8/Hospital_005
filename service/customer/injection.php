<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>005-Thirayut</title>
</head>
<body>
    <h1>Search Patient</h1>
    <form action="injection.php" method="GET">
    <input type="text" placeholder="Enter Patient Name" name="P_name">
    <br><br>
    <input type="submit">
    </form>
</body>
</html>

<?php
require_once '../connect.php';
if(isset($_GET['P_name'])&& $_GET['P_name']!=null)
{
    $sql = "SELECT * FROM patient,permissions WHERE patient.P_id = permissions.P_CID AND P_name LIKE CONCAT('%', :P_name, '%')";

     echo "<br>" . " sql =
        " .$sql . "<br>";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':P_name',$_GET['P_name']);
    $stmt->execute();
    ?>
    

    <table width="500" border="1">
    <tr>
            <th>ชื่อ</th>
            <th>ยอดหนี้</th>
            <th>บัญชีผู้ใช้</th>
    </tr>
   


    <?php
        while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
 <tr>
            <td><?php echo $result['P_name']; ?></td>
            <td><?php echo $result['P_debt']; ?></td>
            <td><?php echo $result['P_UserName']; ?></td>
        </tr>

 
 <?php }
    //echo "count ... "$count;
    //if($count==0)
    //echo"<br>No data ... <br>";
        $conn = null;
    }
?>
</table>