<!-- Bài 3: Cập nhật và xóa biến session

Mục tiêu: Thực hành cập nhật và hủy session variables.

Yêu cầu:

Tạo file session_update.php, thay đổi giá trị $_SESSION['username'] thành tên mới.

Tạo file session_clear.php, sử dụng session_unset() và session_destroy() để xóa session.

Kiểm tra xem biến $_SESSION['username'] còn tồn tại không.
 -->
<?php
session_start();
if (isset($_SESSION["username"])) {
    $_SESSION["username"] = "Minh";
    echo "Username updated to " . $_SESSION["username"];
} else {
    echo "No username found in session to update.";
}
