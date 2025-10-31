<?php
require_once "config.php";

if (isset($_POST['init'])) {
    try {
        $conn = connectDB(false);
        $conn->exec("CREATE DATABASE IF NOT EXISTS db_products");
        $conn = connectDB(true);


        $conn->exec("
            CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                fullname VARCHAR(100),
                email VARCHAR(100) UNIQUE,
                password varchar(100),
                address VARCHAR(255),
                birthday DATE

            )
        ");


        $conn->exec("
            CREATE TABLE IF NOT EXISTS products (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT,
                name VARCHAR(255),
                description text,
                price decimal(10,2),
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (user_id) REFERENCES users(id)
            )
        ");

        echo "<div class='alert alert-success'>Tao database va bang thanh cong!</div>";
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Lỗi: " . $e->getMessage() . "</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Khởi tạo dữ liệu</title>
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Khởi tạo cơ sở dữ liệu cho hệ thống quản lý sản phẩm</h2>
    <form method="POST">
        <button type="submit" name="init" class="btn btn-primary">Khởi tạo dữ liệu</button>
    </form>
</body>
</html>