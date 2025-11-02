<?php

session_start();
require_once 'config.php';

// Kiểm tra xem user đã đăng nhập chưa
if (!isset($_SESSION['userInfo'])) {
    echo "<script>alert('Vui lòng đăng nhập trước!'); window.location.href='login.php';</script>";
    exit;
}

$user = $_SESSION['userInfo'];
$conn = connectDB();

// ============================
// Xử lý thêm sản phẩm mới
// ============================
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("INSERT INTO products(user_id, name, description, price) VALUES(:user_id, :name, :description, :price)");
    $stmt->bindParam(":user_id", $user['id']);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":description", $desc);
    $stmt->bindParam(":price", $price);
    $stmt->execute();
    echo "<script>alert('Thêm sản phẩm thành công!'); window.location.href='product.php';</script>";
    exit;
}

// ============================
// Xử lý xóa sản phẩm
// ============================
if (isset($_GET['delete'])) {
    $pid = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM products WHERE id = :id AND user_id = :user_id");
    $stmt->bindParam(":id", $pid);
    $stmt->bindParam(":user_id", $user['id']);
    $stmt->execute();
    echo "<script>alert('Xóa sản phẩm thành công!'); window.location.href='product.php';</script>";
    exit;
}

// ============================
// Tìm kiếm sản phẩm theo tên
// ============================
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
if ($keyword != '') {
    $stmt = $conn->prepare("SELECT * FROM products WHERE user_id = :user_id AND name LIKE :kw ORDER BY created_at DESC");
    $kw = "%$keyword%";
    $stmt->bindParam(":kw", $kw);
} else {
    $stmt = $conn->prepare("SELECT * FROM products WHERE user_id = :user_id ORDER BY created_at DESC");
}
$stmt->bindParam(":user_id", $user['id']);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h3>Xin chào, <?php echo htmlspecialchars($user['fullname']); ?> 👋</h3>
    <a href="logout.php" class="btn btn-secondary btn-sm">Đăng xuất</a>

    <hr>

    <h4>➕ Thêm sản phẩm mới</h4>
    <form method="POST" class="mb-4">
        <input type="text" name="name" placeholder="Tên sản phẩm" required class="form-control mb-2">
        <textarea name="description" placeholder="Mô tả sản phẩm" class="form-control mb-2"></textarea>
        <input type="number" step="0.01" name="price" placeholder="Giá" required class="form-control mb-2">
        <button type="submit" name="add" class="btn btn-primary">Thêm</button>
    </form>

    <h4>🔍 Tìm kiếm sản phẩm</h4>
    <form method="GET" class="mb-4">
        <input type="text" name="keyword" placeholder="Nhập tên sản phẩm..." value="<?php echo htmlspecialchars($keyword); ?>" class="form-control mb-2">
        <button type="submit" class="btn btn-success">Tìm kiếm</button>
    </form>

    <h4>📦 Danh sách sản phẩm của bạn</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Mô tả</th>
                <th>Giá</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
        <?php if (count($products) == 0): ?>
            <tr><td colspan="5" class="text-center">Chưa có sản phẩm nào</td></tr>
        <?php else: ?>
            <?php foreach ($products as $p): ?>
            <tr>
                <td><?php echo htmlspecialchars($p['name']); ?></td>
                <td><?php echo htmlspecialchars($p['description']); ?></td>
                <td><?php echo number_format($p['price'], 2); ?> đ</td>
                <td><?php echo $p['created_at']; ?></td>
                <td>
                    <a href="?delete=<?php echo $p['id']; ?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?');" class="btn btn-danger btn-sm">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
