<!-- Bài 5: Tự động hủy session sau khi đăng xuất

Mục tiêu: Hiểu vòng đời session.

Yêu cầu:

Tạo nút “Logout” trên welcome.php.

Khi người dùng nhấn Logout, chuyển đến logout.php và gọi session_destroy().

Sau khi hủy session, quay về login.php và hiển thị “You have successfully logged out.” -->
<?php
session_start();       // luôn cần để truy cập session hiện tại
session_unset();       // xóa tất cả biến trong session
session_destroy();     // hủy session trên server

// Chuyển hướng về trang login với thông báo
header("Location: login.php?message=You have successfully logged out.");
exit;
?>