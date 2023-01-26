<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>005-Thirayut</title>
</head>
<body>
    <?php
    if (isset($_GET['P_Name'])) {
        $strP_Name = $_GET["P_Name"];
    }
    require_once "../connect.php";
    $sql = "SELECT P_id,P_Name,P_UserName FROM patient,permissions WHERE patient.P_id = permissions.P_CID AND P_Name = ?";
    $params = array($strP_Name);
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>

    <table width="300" border="1">
        <tr>
            <th width="325">รหัส</th>
            <td width="240"><?php echo $result["P_id"]; ?></td>
        </tr>

        <tr>
            <th width="130">ชื่อ</th>
            <td><?php echo $result["P_Name"]; ?></td>
        </tr>

        <tr>
            <th width="130">บัญชีผู้ใช้</th>
            <td><?php echo $result["P_UserName"]; ?></td>
        </tr>

    </table>

    <?php $conn = null;?>
</body>
</html>