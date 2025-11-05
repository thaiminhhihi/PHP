<?php
require_once 'dbhelper.php';
$categories = executeResult("SELECT * FROM categories ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>QViet - Cửa hàng điện thoại</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">QViet Store</a>
  </div>
</nav>

<div class="container py-5">
  <h2 class="text-center mb-4">Danh mục sản phẩm</h2>
  <div class="row">
    <?php foreach ($categories as $cat): ?>
      <div class="col-md-3 mb-3">
        <div class="card shadow-sm border-0">
          <div class="card-body text-center">
            <h5><?= htmlspecialchars($cat['name']) ?></h5>
            <a href="danhmuc.php?id=<?= $cat['id'] ?>" class="btn btn-outline-primary mt-2">Xem sản phẩm</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
  &copy; 2025 QViet - Web bán điện thoại
</footer>
</body>
</html>
