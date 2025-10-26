<?php
function connectDB() {
 $conn = new PDO("mysql:host=localhost;dbname=dangkynguoidung", 'root', '');
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $conn;
}