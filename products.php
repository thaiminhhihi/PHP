<?php

require_once 'dbhelper.php';
include 'header.php';

// Tạo thư mục uploads nếu chưa có
if (!file_exists('uploads')) {
    mkdir('uploads', 0777, true);
}

// Lấy danh mục
$categories = executeResult("SELECT * FROM categories ORDER BY name ASC");

// Xử lý thêm/sửa sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $title = trim($_POST['title']);
    $price = floatval($_POST['price']);
    $category_id = intval($_POST['category_id']);
    $content = $_POST['content'];
    $image_url = '';

    // Xử lý upload ảnh
    if (!empty($_FILES['image']['name'])) {
        $fileName = time() . '_' . basename($_FILES['image']['name']);
        $target = 'uploads/' . $fileName;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $image_url = $target;
        }
    }

    if ($id > 0) {
        if ($image_url) {
            execute("UPDATE products SET title=?, price=?, category_id=?, content=?, image_url=?, updated_at=NOW() WHERE id=?", 
                    [$title, $price, $category_id, $content, $image_url, $id]);
        } else {
            execute("UPDATE products SET title=?, price=?, category_id=?, content=?, updated_at=NOW() WHERE id=?", 
                    [$title, $price, $category_id, $content, $id]);
        }
        echo "<script>alert('Cập nhật sản phẩm thành công');window.location='product.php';</script>";
    } else {
        execute("INSERT INTO products (title, price, category_id, content, image_url, created_at) VALUES (?,?,?,?,?,NOW())",
                [$title, $price, $category_id, $content, $image_url]);
        echo "<script>alert('Thêm sản phẩm thành công');window.location='product.php';</script>";
    }
}

// Xóa sản phẩm
if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    execute("DELETE FROM products WHERE id=?", [$id]);
    echo "<script>alert('Đã xóa sản phẩm');window.location='product.php';</script>";
}

// Lấy danh sách sản phẩm
$sql = "SELECT p.*, c.name AS category_name FROM products p 
        LEFT JOIN categories c ON p.category_id = c.id 
        ORDER BY p.id DESC";
$products = executeResult($sql);

// Nếu có edit_id thì lấy dữ liệu để sửa
$editItem = null;
if (isset($_GET['edit_id'])) {
    $editId = intval($_GET['edit_id']);
    $editData = executeResult("SELECT * FROM products WHERE id=?", [$editId]);
    if ($editData) $editItem = $editData[0];
}
?>

<!-- Nội dung trang -->
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h1 class="mb-4">Quản lý sản phẩm</h1>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- Form thêm/sửa sản phẩm -->
        <div class="col-md-5">
          <div class="card card-primary">
            <div class="card-header"><h3 class="card-title">Thêm / Sửa sản phẩm</h3></div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $editItem['id'] ?? '' ?>">

                <div class="mb-3">
                  <label>Tiêu đề sản phẩm</label>
                  <input type="text" name="title" class="form-control" required value="<?= $editItem['title'] ?? '' ?>">
                </div>

                <div class="mb-3">
                  <label>Giá bán (VNĐ)</label>
                  <input type="number" step="0.01" name="price" class="form-control" value="<?= $editItem['price'] ?? '' ?>">
                </div>

                <div class="mb-3">
                  <label>Danh mục</label>
                  <select name="category_id" class="form-control" required>
                    <option value="">-- Chọn danh mục --</option>
                    <?php foreach ($categories as $cat): ?>
                      <option value="<?= $cat['id'] ?>" <?= isset($editItem['category_id']) && $editItem['category_id'] == $cat['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cat['name']) ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label>Hình ảnh sản phẩm</label>
                  <input type="file" name="image" accept="image/*" class="form-control" onchange="previewImage(event)">
                  <img id="preview" src="<?= $editItem['image_url'] ?? '' ?>" alt="" class="mt-2 img-fluid" style="max-height:150px;">
                </div>

                <div class="mb-3">
                  <label>Nội dung chi tiết</label>
                  <textarea id="summernote" name="content"><?= $editItem['content'] ?? '' ?></textarea>
                </div>

                <button type="submit" class="btn btn-success w-100"><?= isset($editItem) ? 'Cập nhật' : 'Thêm mới' ?></button>
              </form>
            </div>
          </div>
        </div>

        <!-- Danh sách sản phẩm -->
        <div class="col-md-7">
          <div class="card">
            <div class="card-header bg-primary text-white"><h3 class="card-title">Danh sách sản phẩm</h3></div>
            <div class="card-body table-responsive">
              <table class="table table-bordered align-middle text-center">
                <thead class="table-light">
                  <tr>
                    <th>ID</th>
                    <th>Hình</th>
                    <th>Tiêu đề</th>
                    <th>Giá</th>
                    <th>Danh mục</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if ($products): ?>
                    <?php foreach ($products as $p): ?>
                      <tr>
                        <td><?= $p['id'] ?></td>
                        <td><img src="<?= $p['image_url'] ?: 'https://via.placeholder.com/60' ?>" width="60"></td>
                        <td><?= htmlspecialchars($p['title']) ?></td>
                        <td><?= number_format($p['price'], 0, ',', '.') ?> đ</td>
                        <td><?= htmlspecialchars($p['category_name'] ?? '—') ?></td>
                        <td><?= $p['created_at'] ?></td>
                        <td>
                          <a href="product.php?edit_id=<?= $p['id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                          <a href="product.php?delete_id=<?= $p['id'] ?>" onclick="return confirm('Xóa sản phẩm này?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr><td colspan="7" class="text-muted">Chưa có sản phẩm nào.</td></tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</div>

<!-- Summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
  $(document).ready(function() {
    $('#summernote').summernote({
      height: 150,
      placeholder: 'Nhập mô tả chi tiết sản phẩm...'
    });
  });

  function previewImage(event) {
    const output = document.getElementById('preview');
    output.src = URL.createObjectURL(event.target.files[0]);
  }
</script>

<?php include 'footer.php'; ?>
