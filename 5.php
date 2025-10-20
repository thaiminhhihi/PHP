<!-- Bài 5 – Mảng một chiều và thao tác cơ bản
Yêu cầu:
Tạo mảng $numbers gồm các phần tử: 10, 25, 15, 40, 5.

Sắp xếp tăng dần (sort()), rồi in ra các phần tử.

Sắp xếp giảm dần (rsort()), rồi in lại.

Thêm phần tử 50 vào cuối mảng (array_push()), rồi in toàn bộ mảng. -->
<?php 
$numbers = [10, 25, 15, 40, 5];
sort($numbers);
foreach ($numbers as $number) {
    echo $number;
    echo " ";
}
rsort($numbers);
echo "<br>";
 foreach ($numbers as $number) {
    echo $number;
    echo " ";
}
echo "<br>";
array_push($numbers,50);
 foreach ($numbers as $number) {
    echo $number;
    echo " ";
}
