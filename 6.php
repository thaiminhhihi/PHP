<!-- Bài 6 – Mảng đa chiều và hàm tự định nghĩa
Yêu cầu:
Tạo mảng 2 chiều $scores lưu điểm 3 sinh viên ở 2 môn (theo dạng chỉ số):

Ẩn Code  Copy Code
$scores = array(
    array(8, 9),
    array(7, 10),
    array(6, 9)
);
Viết hàm average($arr) tính điểm trung bình từng sinh viên và in kết quả theo mẫu:

Ẩn Code  Copy Code
Sinh viên 1: 8.5
Sinh viên 2: 8.5
Sinh viên 3: 7.5 -->

<?php
// Mảng 2 chiều lưu điểm 3 sinh viên, mỗi sinh viên có 2 điểm
$scores = array(
    array(8, 9),
    array(7, 10),
    array(6, 9)
);

// Hàm tính và in điểm trung bình
function average($arr) {
    for ($i = 0; $i < count($arr); $i++) {
        $avg = ($arr[$i][0] + $arr[$i][1]) / 2;
        echo "Sinh viên " . ($i + 1) . ": " . $avg . "<br>";
    }
}

// Gọi hàm
average($scores);
?>