<!-- Trang 2 – welcome.php
Nhận tên người dùng từ trang login.php.

Tạo một cookie tên là username có giá trị là tên người dùng vừa nhập.

Cookie tồn tại trong 1 ngày (24 giờ).

Hiển thị thông báo chào mừng và cho biết cookie đã được tạo. -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    setcookie("username", $username, time() + 86400); // Cookie tồn tại 1 ngày
    echo "Welcome, $username! Cookie has been created.";
} else {
    echo "No username provided.";
}
?>
<!-- chuyen ve trang home -->

<a href="home.php">Go to Home Page</a>