<?php
require_once "config.php";

if (isset($_POST['init'])) {
    try {
        $conn = connectDB(false);
        $conn->exec("CREATE DATABASE IF NOT EXISTS db_notes CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
        $conn = connectDB(true);

        // Tạo bảng user
        $conn->exec("
            CREATE TABLE IF NOT EXISTS user (
                id INT AUTO_INCREMENT PRIMARY KEY,
                fullname VARCHAR(100),
                email VARCHAR(100) UNIQUE,
                birthday DATE,
                address VARCHAR(255)
            )
        ");

        // Tạo bảng note
        $conn->exec("
            CREATE TABLE IF NOT EXISTS note (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT,
                title VARCHAR(255),
                content TEXT,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (user_id) REFERENCES user(id)
            )
        ");

        echo "<div class='alert alert-success'>Khởi tạo dữ liệu thành công!</div>";
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
    <h2>Khởi tạo dữ liệu hệ thống Ghi chú</h2>
    <form method="POST">
        <button type="submit" name="init" class="btn btn-primary">Khởi tạo dữ liệu</button>
    </form>
</body>
</html>
