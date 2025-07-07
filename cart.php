<?php
include "includes/head.php"
?>

<body>

  <div class="site-wrap">

    <?php
    include "includes/header.php"
    ?>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
            <a href="index.php">Trang chủ</a> <span class="mx-2 mb-0">/</span>
            <strong class="text-black">Giỏ hàng</strong>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form action="cart.php" class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Hình ảnh</th>
                    <th class="product-name">Sản phẩm</th>
                    <th class="product-price">Giá</th>
                    <th class="product-quantity">Số lượng</th>
                    <th class="product-total">Tổng</th>
                    <th class="product-remove">Xóa</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (!empty($_SESSION['cart'])) {
                    $data = get_cart();
                    delete_from_cart();
                    $num = sizeof($data);
                    for ($i = 0; $i < $num; $i++) {
                      if (isset($data[$i])) {
                  ?>
                        <tr>
                          <td class="product-thumbnail">
                            <img src="images/<?php echo $data[$i][0]['item_image'] ?>" alt="Image" class="img-fluid">
                          </td>
                          <td class="product-name">
                            <h2 class="h5 text-black"><?php echo $data[$i][0]['item_title'] ?></h2>
                          </td>
                          <td>₹<?php echo $data[$i][0]['item_price'] ?></td>
                          <td><?php echo $_SESSION['cart'][$i]['quantity'] ?></td>
                          <td>₹<?php echo ($data[$i][0]['item_price'] * $_SESSION['cart'][$i]['quantity']) ?></td>
                          <td><a href="cart.php?delete=<?php echo $data[$i][0]['item_id'] ?>" class="btn btn-primary height-auto btn-sm">Xóa</a></td>
                        </tr>
                    <?php }
                    } ?>
                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col pl-5">
            <div class="row justify-content-end">
              <div class="col">
                <div class="row">
                  <div class="col-md-12 text-center border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Tổng giỏ hàng</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black"></span>
                  </div>

                  <div class="col-md-6 text-right">
                    <?php
                    $num = sizeof($data);
                    for ($i = 0; $i < $num; $i++) {
                      if (isset($data[$i])) {
                    ?>
                        <strong class="text-black">₹<?php echo ($data[$i][0]['item_price'] * $_SESSION['cart'][$i]['quantity']) ?></strong> <br>
                    <?php
                      }
                    }
                    ?>
                  </div>

                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black font-weight-bold">Tổng cộng</span>
                  </div>
                  <div class="col-md-6 text-right font-weight-bold">
                    <strong class="text-black">₹<?php echo total_price($data); ?></strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <button class="btn btn-outline-primary btn-lg btn-block" onclick="window.location='store.php'">Tiếp tục mua sắm</button>
                  </div>
                  <br> <br>
                  <div class="col-md-6">
                    <button class="btn btn-primary btn-lg btn-block" onclick="window.location='checkout.php'">Tiến hành thanh toán</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php
  } else {
  ?>
    <h1 style="text-align: center; color:black;">Giỏ hàng của bạn đang trống</h1>
    <img style="width:46rem; margin-left: 330px; margin-bottom:20px;" src="images/nocart.png" alt="">
  <?php
  }
  include "includes/footer.php"
  ?>
  </div>
</body>

</html>
