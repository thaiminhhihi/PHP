
<!doctype html>
<html lang="vi">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>QViet - Web Bán Hàng | Bảng Điều Khiển</title>

    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->

    <!--begin::Primary Meta Tags-->
    <meta name="title" content="QViet - Web Bán Hàng | Bảng Điều Khiển" />
    <meta name="author" content="Trần Văn Điệp" />
    <meta
      name="description"
      content="QViet - Hệ thống quản lý bán hàng trực tuyến, giao diện thân thiện, dễ sử dụng, hỗ trợ quản trị bán hàng, khách hàng và thống kê doanh thu."
    />
    <meta
      name="keywords"
      content="bán hàng, quản lý, dashboard, admin, web bán hàng, quản lý sản phẩm, quản lý khách hàng, QViet, thương mại điện tử"
    />
    <!--end::Primary Meta Tags-->

    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="./css/adminlte.css" as="style" />

    <!-- Fonts, Plugins, AdminLTE CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      crossorigin="anonymous"
      media="print"
      onload="this.media='all'"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./css/adminlte.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
      crossorigin="anonymous"
    />
  </head>
  <!--end::Head-->

  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
          </ul>

          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img
                  src="./assets/img/user2-160x160.jpg"
                  class="user-image rounded-circle shadow"
                  alt="Ảnh người dùng"
                />
                <span class="d-none d-md-inline">Trần Văn Điệp</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <li class="user-header text-bg-primary">
                  <img
                    src="./assets/img/user2-160x160.jpg"
                    class="rounded-circle shadow"
                    alt="Ảnh người dùng"
                  />
                  <p>
                    Trần Văn Điệp - Quản trị viên
                    <small>Thành viên từ Tháng 11, 2023</small>
                  </p>
                </li>
                <li class="user-footer">
                  <a href="#" class="btn btn-default btn-flat">Hồ sơ</a>
                  <a href="#" class="btn btn-default btn-flat float-end">Đăng xuất</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      <!--end::Header-->

      <!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <div class="sidebar-brand">
          <a href="./index.html" class="brand-link">
            <img
              src="./assets/img/AdminLTELogo.png"
              alt="Logo QViet"
              class="brand-image opacity-75 shadow"
            />
            <span class="brand-text fw-light">QViet - Web Bán Hàng</span>
          </a>
        </div>

        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Điều hướng chính"
              data-accordion="false"
              id="navigation"
            >
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    Quản Lý Nội Dung
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="category.php" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Danh Mục Sản Phẩm</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="products.php" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Quản Lý Sản Phẩm</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="news-category.php" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Danh Mục Tin Tức</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="news.php" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Quản Lý Tin Tức</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="orders.php" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Quản Lý Đơn Hàng</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="feedback.php" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Quản Lý Phản Hồi</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </aside>
      <!--end::Sidebar-->