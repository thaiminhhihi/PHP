<!-- Bài 4: Quản lý đăng nhập bằng session

Mục tiêu: Ứng dụng session trong xác thực người dùng.

Yêu cầu:

Tạo form đăng nhập login.php với 2 trường: username và password.

Nếu username = “admin” và password = “123”, lưu $_SESSION['loggedin'] = true.

Chuyển hướng sang welcome.php hiển thị “Welcome Admin”.

Nếu không đúng, hiển thị “Invalid login”. -->
<form method="post" action="">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>
<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    if ($_POST['username'] === "admin" && $_POST['password'] === "123") {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username; // Lưu tên người dùng vào session
        header("Location: welcome.php");
        exit();
    } else {
        echo "Invalid login";
    }
} 
?>
<?php
if (isset($_GET['message'])) {
    echo "<p style='color: green;'>" . htmlspecialchars($_GET['message']) . "</p>";
}
?>
