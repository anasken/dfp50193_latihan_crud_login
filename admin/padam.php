<?php
require '../conn.php';

$idstaff = $_GET['idstaff'];

$sql = "DELETE FROM staff WHERE idstaff = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $idstaff);
$stmt->execute();

header('location: index.php');
