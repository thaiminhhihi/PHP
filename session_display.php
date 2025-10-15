<!-- Mục tiêu: Hiểu cách lưu trữ thông tin người dùng trong session.

Yêu cầu:



Tạo file session_display.php, hiển thị nội dung:


Welcome, John!
(lấy giá trị từ $_SESSION['username']). -->
<?php
session_start();
if (isset($_SESSION["username"])) {
    echo "Welcome, " . $_SESSION["username"] ;
} else {
    echo "No username found in session.";

}
?>