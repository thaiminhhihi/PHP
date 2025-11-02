<?php
require_once 'config.php';
if(!empty($_POST)){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];
    
    try {
        $conn = connectDB();
        $check = $conn->prepare("SELECT id FROM users WHERE email = :email");
        $check->bindParam(":email", $email);
        $check->execute();

        if ($check->fetch()) {
      
            echo "<script>alert('Email này đã được đăng ký!'); window.history.back();</script>";
            exit;
        }
        $stmt = $conn->prepare("insert into users(fullname, email, password, birthday, address) values(:fullname, :email, :password, :birthday, :address)");
        $stmt->bindParam(":fullname", $fullname);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":birthday", $birthday);
        $stmt->bindParam(":address", $address);
        $stmt->execute();


        header('Location: login.php');

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
        Hoten <input type="text" name="fullname"/><br/>
        EMAIL <input type="text" name="email"/><br/>
        PASSWORD <input type="password" name="password"/><br/>
        DATEOFBIRTH <input type="date" name="birthday"/><br/>
        ADRESS <input type="text" name="address"/><br/>
        <input type="submit" value ="REGISTER"/>

    </form>
    <p>
        da co nguoi dangkynguoidung?
        <a href="login.php">LOGIN TAI DAY</a>
    </p>
</body>
</html>