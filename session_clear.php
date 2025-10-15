<!-- Tạo file session_clear.php, sử dụng session_unset() và session_destroy() để xóa session. -->
<?php
session_start();
if (isset($_SESSION["username"])) {
    session_unset();
    session_destroy();
}