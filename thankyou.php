<?php
include "includes/head.php"
  ?>

<body>

  <div class="site-wrap">

    <?php
    include "includes/header.php";
    add_order();
    ?>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Trang chủ</a> <span class="mx-2 mb-0">/</span> <strong
              class="text-black">Cảm ơn</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="icon-check_circle display-3 text-success"></span>
            <h2 class="display-3 text-black">Cảm ơn bạn!</h2>
            <p class="lead mb-5">Đơn hàng của bạn đã được đặt thành công.</p>
            <p><a href="store.php" class="btn btn-md height-auto px-4 py-3 btn-primary">Quay lại cửa hàng</a></p>
          </div>
        </div>
      </div>
    </div>

    <?php
    include "includes/footer.php"
      ?>
  </div>
</body>

</html>