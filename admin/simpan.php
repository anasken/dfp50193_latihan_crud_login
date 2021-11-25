<?php
require '../conn.php';

// $idmakanan = $_POST['idmakanan'];
$idpengguna = $_POST['idpengguna'];
$katalaluan = $_POST['katalaluan'];
$staff_name = $_POST['staff_name'];

$sql = "INSERT INTO staff (idpengguna, katalaluan, staff_name) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sss', $idpengguna, $katalaluan, $staff_name);
$stmt->execute();

if ($conn->error) {
?>
    <script>
        alert('Maaf! Dia keluar error do');
        window.location = 'index.php';
    </script>
<?php
    exit;
} else {
    header('location: index.php');
}
