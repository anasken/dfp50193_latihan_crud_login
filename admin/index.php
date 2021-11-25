<?php
require '../conn.php';

if (!isset($_SESSION['idstaff'])) header('location: ../');
$idstaff = $_SESSION['idstaff'];

$sql = "SELECT staff_name FROM staff WHERE idstaff = ?";
$stmt = $conn->prepare($sql);

$stmt->bind_param('i', $idstaff);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($staff_name);
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
    <?php echo "Selamat Datang $staff_name"; ?>
    <a href="tambah.php">Add new</a>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr bgcolor="#ffd700">
            <th>Bil</th>
            <th>ID Pengguna</th>
            <th>Password</th>
            <th>Staff Name</th>
            <th>Action</th>
        </tr>
        <?php
        $bil = 1;
        $sql = "SELECT * FROM staff";
        if ($result = $conn->query($sql)) {
            while ($row = $result->fetch_object()) {
        ?>
                <tr>
                    <td><?php echo $bil++; ?></td>
                    <td><?php echo $row->idpengguna; ?></td>
                    <td><?php echo $row->katalaluan; ?></td>
                    <td><?php echo $row->staff_name; ?></td>

                    <td>
                        <a href="kemaskini.php?idstaff=<?php echo $row->idstaff; ?>">Edit</a>
                        |
                        <a href="padam.php?idstaff=<?php echo $row->idstaff; ?>" onclick="return confirm('Seres ah nak padam!??');">Padam</a>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
</body>

</html>