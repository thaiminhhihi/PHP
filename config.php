<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "db_notes";

function connectDB($use_db = true) {
    global $host, $user, $pass, $dbname;
    $conn = new PDO("mysql:host=$host" . ($use_db ? ";dbname=$dbname" : ""), $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}
?>
