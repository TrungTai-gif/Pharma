<?php include "includes/head.php"; ?>

<body>
  <?php include "includes/header.php"; ?>
  <div class="container-fluid">
    <?php include "includes/sidebar.php"; ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <br>

      <div class="row text-center">
        <h3 class="mb-4">Thống kê tổng quan</h3>
        <div class="col-md-6 col-lg-6 mb-4">
          <div class="card shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Đơn hàng theo tháng</h5>
              <canvas id="ordersChart" height="200"></canvas>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-6 mb-4">
          <div class="card shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Doanh thu theo tháng</h5>
              <canvas id="revenueChart" height="200"></canvas>
            </div>
          </div>
        </div>
      </div>

      <hr>

      <div class="d-flex justify-content-center flex-wrap mt-4">
        <!-- Các card điều hướng -->
        <div class="card m-4" style="width: 25rem;">
          <a href="orders.php">
            <img class="card-img-top mx-auto d-block" src="../images/shopping-cart.svg" alt="Đơn hàng" style="width: 5rem; margin-top: 20px;">
          </a>
          <div class="card-body text-center">
            <h5 class="card-title">Đơn hàng</h5>
            <p class="card-text">Hiển thị và chỉnh sửa thông tin đơn hàng.</p>
            <a href="orders.php" class="btn btn-primary">Đến trang đơn hàng</a>
          </div>
        </div>

        <div class="card m-4" style="width: 25rem;">
          <a href="products.php">
            <img class="card-img-top mx-auto d-block" src="../images/package.svg" alt="Sản phẩm" style="width: 5rem; margin-top: 20px;">
          </a>
          <div class="card-body text-center">
            <h5 class="card-title">Sản phẩm</h5>
            <p class="card-text">Hiển thị và chỉnh sửa thông tin sản phẩm.</p>
            <a href="products.php" class="btn btn-primary">Đến trang sản phẩm</a>
          </div>
        </div>

        <div class="card m-4" style="width: 25rem;">
          <a href="customers.php">
            <img class="card-img-top mx-auto d-block" src="../images/users.svg" alt="Khách hàng" style="width: 5rem; margin-top: 20px;">
          </a>
          <div class="card-body text-center">
            <h5 class="card-title">Khách hàng</h5>
            <p class="card-text">Hiển thị và chỉnh sửa thông tin khách hàng.</p>
            <a href="customers.php" class="btn btn-primary">Đến trang khách hàng</a>
          </div>
        </div>

        <div class="card m-4" style="width: 25rem;">
          <a href="admin.php">
            <img class="card-img-top mx-auto d-block" src="../images/user.svg" alt="Quản trị viên" style="width: 5rem; margin-top: 20px;">
          </a>
          <div class="card-body text-center">
            <h5 class="card-title">Quản trị viên</h5>
            <p class="card-text">Hiển thị và chỉnh sửa thông tin quản trị viên.</p>
            <a href="admin.php" class="btn btn-primary">Đến trang quản trị viên</a>
          </div>
        </div>
      </div>
    </main>
  </div>

  <?php include "includes/footer.php"; ?>

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="js/dashboard.js"></script> <!-- 💡 Tạo file này -->
</body>
</html>
