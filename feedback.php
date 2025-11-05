<?php
require_once 'dbhelper.php';
include 'header.php';

// Xóa phản hồi nếu có id
if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    execute("DELETE FROM feedbacks WHERE id = ?", [$id]);
    echo "<script>alert('Đã xóa phản hồi');window.location='feedback.php';</script>";
}

// Lấy danh sách phản hồi
$sql = "SELECT * FROM feedbacks ORDER BY id DESC";
$feedbacks = executeResult($sql);
?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h1 class="mb-4">Quản lý phản hồi khách hàng</h1>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header bg-primary text-white">
          <h3 class="card-title">Danh sách phản hồi</h3>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-light">
              <tr>
                <th width="5%">ID</th>
                <th width="15%">Tên khách</th>
                <th width="20%">Email</th>
                <th>Nội dung</th>
                <th width="20%">Ngày gửi</th>
                <th width="10%">Hành động</th>
              </tr>
            </thead>
            <tbody>
              <?php if (count($feedbacks) > 0): ?>
                <?php foreach ($feedbacks as $row): ?>
                  <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td class="text-start"><?= nl2br(htmlspecialchars($row['message'])) ?></td>
                    <td><?= $row['created_at'] ?></td>
                    <td>
                      <a href="feedback.php?delete_id=<?= $row['id'] ?>"
                         onclick="return confirm('Xóa phản hồi này?')"
                         class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Xóa
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr><td colspan="6" class="text-muted">Chưa có phản hồi nào.</td></tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include 'footer.php'; ?>
