<?php
require_once 'dbhelper.php';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$product = executeResult("SELECT p.*, c.name AS category_name 
                          FROM products p 
                          LEFT JOIN categories c ON p.category_id = c.id 
                          WHERE p.id=?", [$id]);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($product['title'] ?? 'Chi tiết sản phẩm') ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">QViet Store</a>
  </div>
</nav>

<div class="container py-5">
  <?php if ($product): ?>
    <div class="row">
      <div class="col-md-5">
        <img src="<?= $product['image_url'] ?: 'https://via.placeholder.com/400x400' ?>" alt="" class="img-fluid rounded shadow">
      </div>
      <div class="col-md-7">
        <h2><?= htmlspecialchars($product['title']) ?></h2>
        <p><strong>Danh mục:</strong> <?= htmlspecialchars($product['category_name'] ?? '—') ?></p>
        <h4 class="text-danger mb-3"><?= number_format($product['price'], 0, ',', '.') ?> đ</h4>
        <div><?= $product['content'] ?></div>
        <a href="danhmuc.php?id=<?= $product['category_id'] ?>" class="btn btn-outline-secondary mt-3">← Quay lại danh mục</a>
      </div>
    </div>
  <?php else: ?>
    <p class="text-center text-danger">Sản phẩm không tồn tại hoặc đã bị xóa.</p>
  <?php endif; ?>
</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
  &copy; 2025 QViet - Web bán điện thoại
</footer>
</body>
</html>
