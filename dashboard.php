<?php include 'header.php'; ?>

<!--begin::App Main-->
<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Bảng Điều Khiển</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Bảng điều khiển</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="app-content">
    <div class="container-fluid">
      <!-- Toàn bộ nội dung bảng điều khiển -->
      <!-- giữ nguyên hoàn toàn -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <div class="small-box text-bg-primary">
            <div class="inner">
              <h3>150</h3>
              <p>Đơn hàng mới</p>
            </div>
            <a href="#" class="small-box-footer link-light">Xem thêm <i class="bi bi-link-45deg"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box text-bg-success">
            <div class="inner">
              <h3>53<sup class="fs-5">%</sup></h3>
              <p>Tỷ lệ thoát</p>
            </div>
            <a href="#" class="small-box-footer link-light">Xem thêm <i class="bi bi-link-45deg"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box text-bg-warning">
            <div class="inner">
              <h3>44</h3>
              <p>Người dùng mới</p>
            </div>
            <a href="#" class="small-box-footer link-dark">Xem thêm <i class="bi bi-link-45deg"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box text-bg-danger">
            <div class="inner">
              <h3>65</h3>
              <p>Lượt truy cập</p>
            </div>
            <a href="#" class="small-box-footer link-light">Xem thêm <i class="bi bi-link-45deg"></i></a>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-7 connectedSortable">
          <div class="card mb-4">
            <div class="card-header">
              <h3 class="card-title">Giá trị bán hàng</h3>
            </div>
            <div class="card-body">
              <div id="revenue-chart"></div>
            </div>
          </div>
        </div>

        <div class="col-lg-5 connectedSortable">
          <div class="card text-white bg-primary bg-gradient border-primary mb-4">
            <div class="card-header border-0">
              <h3 class="card-title">Bản đồ doanh số</h3>
            </div>
            <div class="card-body">
              <div id="world-map" style="height: 220px"></div>
            </div>
            <div class="card-footer border-0">
              <div class="row text-center">
                <div class="col-4"><div id="sparkline-1"></div><div class="text-white">Khách truy cập</div></div>
                <div class="col-4"><div id="sparkline-2"></div><div class="text-white">Trực tuyến</div></div>
                <div class="col-4"><div id="sparkline-3"></div><div class="text-white">Doanh số</div></div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>

<?php include 'footer.php'; ?>