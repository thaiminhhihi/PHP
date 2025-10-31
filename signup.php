<?php
require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];

    try {
        $conn = connectDB();
        $stmt = $conn->prepare("INSERT INTO user (fullname, email, birthday, address) VALUES (?, ?, ?, ?)");
        $stmt->execute([$fullname, $email, $birthday, $address]);
        header("Location: login.php");
        exit;
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Đăng ký</title>
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Đăng ký tài khoản</h2>
    <form method="POST">
        <input name="fullname" class="form-control mb-2" placeholder="Họ tên" required>
        <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
        <input type="date" name="birthday" class="form-control mb-2">
        <input name="address" class="form-control mb-2" placeholder="Địa chỉ">
        <button class="btn btn-success">Đăng ký</button>
    </form>
</body>
</html>
