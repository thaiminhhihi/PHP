<?php
session_start();
require_once "config.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$conn = connectDB();
$user_id = $_SESSION['user']['id'];

$search = $_GET['search'] ?? '';

if ($search) {
    $stmt = $conn->prepare("SELECT * FROM note WHERE user_id = ? AND title LIKE ?");
    $stmt->execute([$user_id, "%$search%"]);
} else {
    $stmt = $conn->prepare("SELECT * FROM note WHERE user_id = ?");
    $stmt->execute([$user_id]);
}

$notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ghi chú của tôi</title>
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h3>Xin chào, <?= $_SESSION['user']['fullname'] ?>!</h3>
    <a href="logout.php" class="btn btn-danger btn-sm">Đăng xuất</a>
    <hr>
    <form method="GET">
        <input type="text" name="search" class="form-control" placeholder="Tìm ghi chú..." value="<?= htmlspecialchars($search) ?>">
    </form>
    <a href="note_add.php" class="btn btn-success mt-3">+ Thêm ghi chú</a>

    <table class="table table-striped mt-3">
        <tr><th>Tiêu đề</th><th>Ngày tạo</th><th>Hành động</th></tr>
        <?php foreach ($notes as $note): ?>
            <tr>
                <td><?= htmlspecialchars($note['title']) ?></td>
                <td><?= $note['created_at'] ?></td>
                <td>
                    <a href="note_edit.php?id=<?= $note['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                    <a href="note_delete.php?id=<?= $note['id'] ?>" class="btn btn-danger btn-sm">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
