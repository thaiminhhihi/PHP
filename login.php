<?php
require_once 'config.php';
if (!empty($_POST)){
    $email = $_POST['email'];
    $password =$_POST['password'];
    
	try {
		$conn = connectDB();

		$stmt = $conn->prepare("select * from users where email = :email");
		$stmt->bindParam(":email", $email);
		$stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$dataList = $stmt->fetchAll();

		if ($dataList == null || count($dataList) == 0) {

    echo "<script>
            alert('Bạn đã nhập sai email hoặc mật khẩu!');
            window.location.href = 'login.php';
          </script>";
    exit;
}
		$std = $dataList[0];


		if(password_verify($password, $std['password'])) {
			$_SESSION['userInfo'] = $std;


			header('Location: product.php');
		}
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
    <title>Login page</title>
</head>
<body>
    <form method="post">
        email <input type="email" name="email"/><br/>
        PASSWORD <input type="password" name="password"/><br/>
        <input type="submit" value ="Login"/>

    </form>
    <p>
        chua co nguoi dangkynguoidung?
        <a href="signup.php">register TAI DAY</a>
    </p>
</body>
</html>