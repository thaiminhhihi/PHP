<!-- Bài 1: Khởi tạo và hiển thị Session ID

Mục tiêu: Làm quen với việc khởi tạo session.

Yêu cầu:

Tạo file session1.php.

Viết code để khởi tạo một session bằng session_start().

Hiển thị Session ID của người dùng bằng session_id().

Gợi ý: Dòng đầu tiên phải là 
 -->

<?php
session_start();
echo "Session ID " .session_id ();
?>