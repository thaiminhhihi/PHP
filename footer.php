<!--begin::Footer-->
      <footer class="app-footer">
        <div class="float-end d-none d-sm-inline">Tùy chỉnh theo ý bạn</div>
        <strong>
          Bản quyền &copy; 2014-2025&nbsp;
          <a href="#" class="text-decoration-none">QViet - Web Bán Hàng</a>.
        </strong>
        Mọi quyền được bảo lưu.
      </footer>
      <!--end::Footer-->
    </div>

    <!-- Giữ nguyên toàn bộ JS -->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="./js/adminlte.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!--end::Required Plugin(AdminLTE)-->

    <!-- Giữ nguyên các script cấu hình -->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        const isMobile = window.innerWidth <= 992;
        if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined && !isMobile) {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>

    <script>
      new Sortable(document.querySelector('.connectedSortable'), { group: 'shared', handle: '.card-header' });
      document.querySelectorAll('.connectedSortable .card-header').forEach(el => el.style.cursor = 'move');
    </script>

    <script>
      const sales_chart_options = {
        series: [
          { name: 'Digital Goods', data: [28, 48, 40, 19, 86, 27, 90] },
          { name: 'Electronics', data: [65, 59, 80, 81, 56, 55, 40] },
        ],
        chart: { height: 300, type: 'area', toolbar: { show: false } },
        legend: { show: false },
        colors: ['#0d6efd', '#20c997'],
        dataLabels: { enabled: false },
        stroke: { curve: 'smooth' },
        xaxis: { type: 'datetime', categories: ['2023-01-01','2023-02-01','2023-03-01','2023-04-01','2023-05-01','2023-06-01','2023-07-01'] },
        tooltip: { x: { format: 'MMMM yyyy' } },
      };
      new ApexCharts(document.querySelector('#revenue-chart'), sales_chart_options).render();
    </script>

    <script>
      new jsVectorMap({ selector: '#world-map', map: 'world' });
      const opts = data => ({
        series: [{ data }],
        chart: { type: 'area', height: 50, sparkline: { enabled: true } },
        stroke: { curve: 'straight' },
        fill: { opacity: 0.3 },
        yaxis: { min: 0 },
        colors: ['#DCE6EC'],
      });
      new ApexCharts(document.querySelector('#sparkline-1'), opts([1000,1200,920,927,931,1027,819,930,1021])).render();
      new ApexCharts(document.querySelector('#sparkline-2'), opts([515,519,520,522,652,810,370,627,319,630,921])).render();
      new ApexCharts(document.querySelector('#sparkline-3'), opts([15,19,20,22,33,27,31,27,19,30,21])).render();
    </script>
  </body>
</html>