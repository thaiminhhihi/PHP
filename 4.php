<!-- Bài 4 – Truyền tham số và trả về giá trị
Yêu cầu:
Tạo hai hàm:

add($a, $b) – trả về tổng của hai số.

multiply(&$x, $y) – nhận tham số $x theo tham chiếu, gán $x = $x * $y và in kết quả.
Gọi hai hàm này và hiển thị kết quả ra màn hình. -->
<?php

function add($a, $b) {
    $sum = $a + $b;
    
    return $sum;
    
}
function multiply(&$x, $y) {
    $x = $x * $y;
    echo  $x;
}

echo add("5","7");

$a = 5;
$b = 5;
multiply($a, $b);