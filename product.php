<?php
include "includes/head.php"
?>

<body>

  <div class="site-wrap">
    <?php
    include "includes/header.php";
    $data = get_item();
    add_cart($_SESSION['item_id']);
    ?>

    <div class="bg-light py-3" style="margin-top: 81.5px;">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Trang chủ</a> <span class="mx-2 mb-0">/</span> <a href="store.php">Cửa hàng</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?php echo $data[0]['item_title'] ?></strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-5 mr-auto">
            <div class="border text-center">
              <img src="images/<?php echo $data[0]['item_image'] ?>" alt="Image" class="img-fluid p-5">
            </div>
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $data[0]['item_title'] ?></h2>
            <p><?php echo $data[0]['item_details'] ?></p>

            <p><strong class="text-primary h4"><?php echo $data[0]['item_price'] ?> VND</strong></p>
            <?php
            if ($data[0]['item_quantity'] > 0) {
            ?>
              <h6 style="color: rgb(58, 211, 58);">Còn hàng</h6>
              <form action="product.php" method="GET">
                <div class="mb-5">
                  <div class="input-group mb-3" style="max-width: 220px;">
                    <input type="number" min="1" max="<?php echo $data[0]['item_quantity'] ?>" name="quantity" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                  </div>
                  <br>
                  <button name="cart" type="submit" class="btn btn-primary btn-lg">Thêm vào giỏ hàng</button>
              </form>
            <?php
            } else {
            ?>
              <small style="color: red;">Hết hàng</small>
              <form action="product.php" method="GET">
                <div class="mb-5">
                  <div class="input-group mb-3" style="max-width: 220px;">
                    <input disabled type="number" name="quantity" class="form-control text-center" value="0" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                  </div>
                  <br>
                  <p style="color: black;"><a disabled type="submit" value="" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Thêm vào giỏ hàng</a></p>
              </form>
            <?php
            }
            ?>
          </div>

          <div class="mt-5">
            <ul class="nav nav-pills mb-3 custom-pill" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Thông tin giao hàng</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Thông số kỹ thuật</a>
              </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <?php
                if (isset($_SESSION['user_id'])) {
                  $user = get_user($_SESSION['user_id']);
                  echo $user[0]['user_address'];
                } else {
                  echo "Btm 1st stage, đối diện khu Maruthi Layout, số 4, 560029 Bangalore (Cửa hàng)";
                }
                ?>
              </div>

              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <table class="table custom-table">
                  <tbody>
                    <tr>
                      <td>TÊN THƯƠNG HIỆU</td>
                      <td class="bg-light"><?php echo $data[0]['item_brand'] ?></td>
                    </tr>
                    <tr>
                      <td>LOẠI SẢN PHẨM</td>
                      <td class="bg-light"><?php echo $data[0]['item_cat'] ?></td>
                    </tr>
                    <tr>
                      <td>PHÍ GIAO HÀNG</td>
                      <?php if ($data[0]['item_price'] >= 100000) {
                        echo "<td class='bg-light'>Miễn phí</td>";
                      } else {
                        echo "<td class='bg-light'>40000 VND</td>";
                      }
                      ?>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>
          </div>

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
