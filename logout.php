<!-- Trang 4 – logout.php
Xóa cookie username bằng cách đặt thời gian hết hạn trong quá khứ.

Hiển thị thông báo rằng người dùng đã đăng xuất thành công.

Cho phép quay lại trang đăng nhập. -->
<?php
setcookie("username", "", time() - 3600); 
echo "You have successfully logged out.";
echo '<br><a href="login.php">Go to Login Page</a>';
?>