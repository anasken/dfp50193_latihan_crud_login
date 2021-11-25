<?php
require 'conn.php';

$idpengguna = $_POST['idpengguna'];
$katalaluan = $_POST['katalaluan'];

if ($idpengguna == 'admin') {
    $sql = 'SELECT * FROM admin';
    $row = $conn->query($sql)->fetch_object();
    if (password_verify($katalaluan, $row->katalaluan)) {
        $_SESSION['idpengguna'] = 'admin';
        header('location: admin/');
        
    } else {
        gagal();
    }
} else {
    $sql = "SELECT idstaff, katalaluan FROM staff WHERE idpengguna = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $idpengguna);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows) {
        $stmt->bind_result($idstaff, $kata);
        $stmt->fetch();
        if (password_verify($katalaluan, $kata)) {
            $_SESSION['idstaff'] = $idstaff;
            header('location: staff/index.php');
        } else {
            gagal();
        }
    } else {
        $sql = "SELECT idcustomer, katalaluan FROM customer WHERE nric = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $idpengguna);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows) {
            $stmt->bind_result($idcustomer, $kata);
            $stmt->fetch();
            if (password_verify($katalaluan, $kata)) {
                $_SESSION['idcustomer'] = $idcustomer;
                header('location: customer/');
            } else {
                gagal();
            }
        } else {
            gagal();
        }
    }
}

# popup apabila login gagal 
function gagal()
{
?>
    <script>
        alert('Maaf, ID pengguna/kata laluan salah.');
        window.location = './';
    </script>
<?php
}
