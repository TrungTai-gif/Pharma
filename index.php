<?php
include "includes/head.php"
  ?>

<body>

  <div class="site-wrap">
    <?php
    include "includes/header.php"
      ?>
    <div class="site-blocks-cover" style="background-image: url('images/hero_1.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
            <div class="site-block-cover-content text-center">
              <h2 class="sub-title">Thuốc hiệu quả, thuốc mới mỗi ngày</h2>
              <h1>Chào mừng đến với Pharma</h1>
              <p>
                <a href="store.php" class="btn btn-primary px-5 py-3">Mua ngay</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row align-items-stretch section-overlap">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="banner-wrap bg-primary h-100">
              <a class="h-100">
                <h5>Miễn phí <br> Vận chuyển</h5>
                <p>
                  0₫ phí giao hàng cho tất cả đơn hàng
                  <strong>trên 100.000₫</strong>
                </p>
              </a>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="banner-wrap h-100">
              <a class="h-100">
                <h5>Khuyến mãi <br> giảm 50%</h5>
                <p>
                  Giảm đến 80% cho các sản phẩm chăm sóc sức khỏe.
                </p>
              </a>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="banner-wrap bg-warning h-100">
              <a class="h-100">
                <h5>Sản phẩm <br> mới</h5>
                <p>
                  Khám phá hơn 10.000 sản phẩm.
                </p>
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">Sản phẩm bạn có thể thích</h2>
          </div>
        </div>

        <div class="row">
          <?php
          $data = all_products();
          $num = sizeof($data);
          for ($i = 0; $i < $num; $i++) {
            ?>
            <div class="col-sm-6 col-lg-4 text-center item mb-4">
              <a href="product.php?product_id=<?php echo $data[$i]['item_id'] ?>"> <img class="rounded mx-auto d-block"
                  style="width:20vw ; height:40vh ;" src="images/<?php echo $data[$i]['item_image'] ?>" alt="Image"></a>
              <?php if (strlen($data[$i]['item_title']) <= 20) { ?>
                <h3 class="text-dark"><a
                    href="product.php?product_id=<?php echo $data[$i]['item_id'] ?>"><?php echo $data[$i]['item_title'] ?></a>
                </h3>
                <?php
              } else {
                ?>
                <h3 class="text-dark"><a
                    href="product.php?product_id=<?php echo $data[$i]['item_id'] ?>"><?php echo mb_substr($data[$i]['item_title'], 0, 20, "UTF-8") . "..." ?></a>
                </h3>
                <?php
              }
              ?>
              <p class="price"><?php echo $data[$i]['item_price'] ?> VND</p>
            </div>
            <?php
            if ($i == 5) {
              break;
            }
          }
          ?>
        </div>
        <div class="row mt-5">
          <div class="col-12 text-center">
            <a href="store.php" class="btn btn-primary px-4 py-3">Xem tất cả sản phẩm</a>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">Sản phẩm mới</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-3 products-wrap">
            <div class="nonloop-block-3 owl-carousel">
              <?php
              $data = all_products_reverse();

              $num = sizeof($data);
              for ($i = 0; $i < $num; $i++) {
                ?>
                <!--  -->
                <div class="  text-center item mb-4">
                  <a href="product.php?product_id=<?php echo $data[$i]['item_id'] ?>"> <img
                      class="rounded mx-auto d-block" style="width:20vw ; height:vh ;"
                      src="images/<?php echo $data[$i]['item_image'] ?>" alt="Image"></a>

                  <h3 class="text-dark"><a
                      href="product.php?product_id=<?php echo $data[$i]['item_id'] ?>"><?php echo $data[$i]['item_title'] ?></a>
                  </h3>

                  <p class="price"><?php echo $data[$i]['item_price'] ?> VND</p>
                </div>
                <!--  -->
                <?php
                if ($i == 5) {
                  break;
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">Khách hàng nói gì</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-3 products-wrap">
            <div class="nonloop-block-3 no-direction owl-carousel">

              <div class="testimony">
                <blockquote>
                  <img src="images/person_1.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                  <p>&ldquo;Dịch vụ PHARMA trong giai đoạn COVID 19 thật tuyệt vời. Trang web này có giảm giá tốt hơn so
                    với hiệu thuốc. Giao diện rất đơn giản để lựa chọn, dịch vụ nhanh chóng và chuyên nghiệp. Rất hài
                    lòng. Điều tuyệt vời là bạn không cần phải chi nhiều tiền ở các hiệu thuốc được bác sĩ kê đơn. Rất
                    tuyệt vời!&rdquo;</p>
                </blockquote>

                <p>&mdash; Bích My</p>
              </div>

              <div class="testimony">
                <blockquote>
                  <img src="images/person_2.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                  <p>&ldquo;Là một người Việt sống ở nước ngoài, PHARMA mang lại sự tiện lợi rất lớn cho tôi khi đặt
                    thuốc cho gia đình chỉ bằng vài thao tác đơn giản, luôn nhận được hàng nhanh chóng. Tôi rất hài lòng
                    và chắc chắn sẽ giới thiệu đến những ai cần mua thuốc với chi phí hợp lý và thường xuyên.&rdquo;</p>
                </blockquote>

                <p>&mdash; Thanh Nhung</p>
              </div>

              <div class="testimony">
                <blockquote>
                  <img src="images/person_3.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                  <p>&ldquo;Giờ tôi đã trở thành khách hàng của pharma.com. Tôi luôn đặt mua thuốc tại đây. Đây là một
                    website rất hữu ích cho việc mua sắm sản phẩm chăm sóc sức khỏe online. Giao hàng rất nhanh, đóng
                    gói cẩn thận. Nếu có nhầm lẫn thuốc, hoàn toàn có thể đổi trả dễ dàng. Dịch vụ khách hàng rất
                    tốt.&rdquo;</p>
                </blockquote>

                <p>&mdash;  Trung Tài</p>
              </div>

              <div class="testimony">
                <blockquote>
                  <img src="images/person_4.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                  <p>&ldquo;Tôi muốn cảm ơn Pharma vì dịch vụ khách hàng tuyệt vời của họ. Tôi đã đặt thuốc và nhận được
                    chỉ trong 3 ngày. Hãy tiếp tục phát huy! Đây là ứng dụng bán thuốc tốt nhất. Tôi khuyên mọi người
                    nên dùng trang web của Pharma.&rdquo;</p>
                </blockquote>

                <p>&mdash; Andrew Neel</p>
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