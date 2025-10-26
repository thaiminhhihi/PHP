<?php
require_once 'config.php';
if (!empty($_POST)){
    $username = $_POST['username'];
    $password =$_POST['password'];
    
	try {
		$conn = connectDB();

		$stmt = $conn->prepare("select * from users where username = :username");
		$stmt->bindParam(":username", $username);
		$stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$dataList = $stmt->fetchAll();

		if($dataList == null || count($dataList) == 0) {
			header('Location: login.php');
		}
		$std = $dataList[0];

		//verify password
		if(password_verify($password, $std['password'])) {
			$_SESSION['userInfo'] = $std;

			//login thanh cong
			header('Location: welcome.php');
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
        USERNAME <input type="text" name="username"/><br/>
        PASSWORD <input type="password" name="password"/><br/>
        <input type="submit" value ="Login"/>

    </form>
    <p>
        chua co nguoi dangkynguoidung?
        <a href="register.php">register TAI DAY</a>
    </p>
</body>
</html>