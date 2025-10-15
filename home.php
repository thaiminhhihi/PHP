<!-- Trang 3 – home.php
Kiểm tra xem cookie username có tồn tại hay không.

Nếu có, hiển thị lời chào với tên người dùng.

Nếu không, hiển thị thông báo yêu cầu người dùng đăng nhập lại và kèm liên kết trở lại trang login.php. -->

<?php
if(isset($_COOKIE["username"])){
    echo "Welcome " . $_COOKIE["username"];
} else {
    echo "Please log in again. ";
    echo '<a href="login.php">Go to Login Page</a>';
}
?>
<!-- Yêu cầu mở rộng (tùy chọn):
Tạo thêm một cookie visits để lưu số lần người dùng truy cập trang home.php.

Mỗi lần người dùng tải lại trang, số lần truy cập tăng thêm 1.

Hiển thị thông tin số lần truy cập cho người dùng. -->

<?php
if (isset($_COOKIE["visits"])) {
    $visits = (int)$_COOKIE["visits"] + 1;
} else {
    $visits = 1;
}
setcookie("visits", $visits, time() + 3600, "/");
echo "<br>You have visited this site $visits times.";
?>

<a href ="logout.php">Logout</a>

