<?php
require '../conn.php';

if (!isset($_SESSION['idcustomer'])) header('location: ../');
$idcustomer = $_SESSION['idcustomer'];

$sql = "SELECT cust_name FROM customer WHERE idcustomer = ?";
$stmt = $conn->prepare($sql);

$stmt->bind_param('i', $idcustomer);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($cust_name);
$stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php echo "Selamat Datang $cust_name"; ?>
</body>

</html>