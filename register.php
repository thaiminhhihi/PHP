<!-- Bài tập - Tạo trang login và register - kết nối CSDL trong PHP - Lập trình PHP/MySQL 
Viết form đăng ký tài khoản người dùng như hình sau (register.php)
username
email
password
register button


Tạo form login.php
Yêu cầu:
Thiết kế database gồm 1 bảng users gồm các column: username, email, password
- Khi người dùng click Register thì đẩy dữ liệu vào database
- Khi người dùng click vào Login -> Kiểm tra dữ liệu nhập vào có tồn tại database không. Nếu tồn tài chuyển sang trang welcome.php -->
<?php
require_once 'config.php';
if(!empty($_POST)){
    $username = $_POST['username'];
    $password =$_POST['password'];
    $email =$_POST['email'];
    $password = password_hash($password, PASSWORD_DEFAULT);
try {
		$conn = connectDB();
		$stmt = $conn->prepare("insert into users(username, email, password ) values(:username, :email,  :password )");
		$stmt->bindParam(":username", $username);
		$stmt->bindParam(":email", $email);
		
		$stmt->bindParam(":password", $password);
		
		
		$stmt->execute();
	} catch(PDOException $e) {
	  echo "Error: " . $e->getMessage();
	}
	$conn = null;
}

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
</head>
<body>
    <form method="post">
        USERNAME <input type="text" name="username"/><br/>
        EMAIL <input type="text" name="email"/><br/>
        PASSWORD <input type="password" name="password"/><br/>
        <input type="submit" value ="REGISTER"/>

    </form>
    <p>
        da co nguoi dangkynguoidung?
        <a href="login.php">LOGIN TAI DAY</a>
    </p>
</body>
</html>