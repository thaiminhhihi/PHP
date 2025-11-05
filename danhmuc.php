<?php
require_once 'dbhelper.php';

$cat_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$category = executeResult("SELECT * FROM categories WHERE id=?", [$cat_id]);
$products = executeResult("SELECT * FROM products WHERE category_id=?", [$cat_id]);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title><?= $category ? htmlspecialchars($category['name']) : 'Danh mục' ?> - QViet Store</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">QViet Store</a>
  </div>
</nav>

<div class="container py-5">
  <h2 class="text-center mb-4"><?= htmlspecialchars($category['name'] ?? 'Danh mục không tồn tại') ?></h2>

  <div class="row">
    <?php if ($products): ?>
      <?php foreach ($products as $p): ?>
        <div class="col-md-3 mb-4">
          <div class="card shadow-sm border-0 h-100">
            <img src="<?= $p['image_url'] ?: 'https://via.placeholder.com/250x250' ?>" class="card-img-top" alt="<?= htmlspecialchars($p['title']) ?>">
            <div class="card-body text-center">
              <h6 class="card-title"><?= htmlspecialchars($p['title']) ?></h6>
              <p class="text-danger fw-bold mb-2"><?= number_format($p['price'], 0, ',', '.') ?> đ</p>
              <a href="chitiet.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-outline-primary">Xem chi tiết</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-center text-muted">Không có sản phẩm nào trong danh mục này.</p>
    <?php endif; ?>
  </div>
</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
  &copy; 2025 QViet - Web bán điện thoại
</footer>
</body>
</html>
