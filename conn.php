<?php
$host = 'localhost';
$user = 'root';
$pswd = '(Wa53gzj#~OLvWb6'; # sepasang single quotes
$dbname = 'contoh_login';

$conn = new mysqli($host, $user, $pswd, $dbname); session_start();