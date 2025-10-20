 <!-- Bài 3 – Hàm do người dùng định nghĩa
Yêu cầu:
Tạo hàm calculateArea($radius) để tính diện tích hình tròn (pi * r * r).

Gọi hàm 3 lần với bán kính lần lượt là 3, 5 và 7.

Hiển thị kết quả từng lần gọi hàm.
 -->
<?php

function calculateArea($radius) {
    $pi = 3.14;
    $area = $radius * $radius * $pi;
    echo $area;
}
calculateArea(3);
echo " <br> ";
calculateArea(5);
echo " <br> ";
calculateArea(7);
