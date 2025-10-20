<!-- Bài 2 – Sử dụng break và continue
Yêu cầu:
Viết chương trình in các số từ 1 đến 10:

Bỏ qua số 5 (dùng continue).

Dừng vòng lặp khi gặp số 8 (dùng break).

Sau vòng lặp, in ra dòng chữ: "Loop has ended." -->
<?php

for ($i = 0; $i <= 10; $i++) {
    
    if ($i ==5){
        continue;
    }
    if ($i == 8){
        break;
    }
    echo $i;
}
echo "Loop has ended";