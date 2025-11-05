<?php
require_once 'dbhelper.php';
include 'header.php';

// Xử lý thêm/sửa danh mục
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

    if ($id > 0) {
        // cập nhật
        execute("UPDATE categories SET name=?, updated_at=NOW() WHERE id=?", [$name, $id]);
        echo "<script>alert('Cập nhật danh mục thành công');window.location='category.php';</script>";
    } else {
        // thêm mới
        execute("INSERT INTO categories (name, created_at) VALUES (?, NOW())", [$name]);
        echo "<script>alert('Thêm danh mục thành công');window.location='category.php';</script>";
    }
}

// Xóa danh mục
if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    execute("DELETE FROM categories WHERE id=?", [$id]);
    echo "<script>alert('Đã xóa danh mục');window.location='category.php';</script>";
}

// Lấy danh sách danh mục
$categories = executeResult("SELECT * FROM categories ORDER BY id DESC");

// Nếu có edit_id thì lấy dữ liệu cũ
$editItem = null;
if (isset($_GET['edit_id'])) {
    $editId = intval($_GET['edit_id']);
    $editData = executeResult("SELECT * FROM categories WHERE id=?", [$editId]);
    if ($editData) $editItem = $editData[0];
}
?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h1 class="mb-4">Quản lý danh mục sản phẩm</h1>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- Form thêm/sửa -->
        <div class="col-md-4">
          <div class="card card-primary">
            <div class="card-header"><h3 class="card-title">Thêm / Sửa danh mục</h3></div>
            <div class="card-body">
              <form method="post">
                <input type="hidden" name="id" value="<?= $editItem['id'] ?? '' ?>">
                <div class="mb-3">
                  <label>Tên danh mục</label>
                  <input type="text" name="name" required class="form-control" value="<?= $editItem['name'] ?? '' ?>">
                </div>
                <button type="submit" class="btn btn-success"><?= isset($editItem) ? 'Cập nhật' : 'Thêm mới' ?></button>
              </form>
            </div>
          </div>
        </div>

        <!-- Bảng danh mục -->
        <div class="col-md-8">
          <div class="card">
            <div class="card-header bg-primary text-white"><h3 class="card-title">Danh sách danh mục</h3></div>
            <div class="card-body table-responsive">
              <table class="table table-bordered text-center align-middle">
                <thead class="table-light">
                  <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (count($categories) > 0): ?>
                    <?php foreach ($categories as $row): ?>
                      <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= $row['created_at'] ?></td>
                        <td>
                          <a href="category.php?edit_id=<?= $row['id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                          <a href="category.php?delete_id=<?= $row['id'] ?>" onclick="return confirm('Xóa danh mục này?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr><td colspan="4" class="text-muted">Chưa có danh mục nào.</td></tr>
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

<?php include 'footer.php'; ?>
