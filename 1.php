<!-- Bài 1 – Vòng lặp for, while, do-while
Yêu cầu:
Viết chương trình hiển thị:

Các số chẵn từ 1 đến 20 bằng while. -->
<?php
echo "Các số chẵn từ 1 đến 20:<br>";

$i = 1; // Bắt đầu từ 1
while ($i <= 20) {
    if ($i % 2 == 0) { // Nếu chia hết cho 2 thì là số chẵn
        echo $i . " ";
    }
    $i++; // Tăng i lên 1 sau mỗi lần lặp
}
?>

<!-- Các bội số của 3 từ 3 đến 30 bằng for.-->
<?php

for ($i =3;$i<=30; $i+=3)
{
    echo $i ."<br>";
}
?>

<!-- Dòng chữ “PHP is fun!” lặp lại 5 lần bằng do-while. -->

<?php
$i=1;
do {
    echo"PHP is fun";
    $i++;
}

while($i<=5);
?>
