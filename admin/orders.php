<?php
include "includes/head.php";
?>

<body>
    <?php
    include "includes/header.php"
        ?>

    <?php
    include "includes/sidebar.php";
    ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <?php
        message();
        ?>
        <div class="container">
            <div class="row align-items-start mt-3">
                <!-- Cột trái: tiêu đề -->
                <div class="col-12 col-md-4 mb-2 mb-md-0">
                    <h5 class="mb-2">Chi tiết đơn hàng</h5>
                </div>

                <!-- Cột giữa: chừa trống căn giữa -->
                <div class="d-none d-md-block col-md-4"></div>

                <!-- Cột phải: ô tìm kiếm -->
                <div class="col-12 col-md-4">
                    <form class="d-flex flex-column flex-md-row" method="GET" action="orders.php">
                        <input class="form-control form-control-sm me-md-2 mb-2 mb-md-0" type="search"
                            name="search_order_id" placeholder="Tìm đơn hàng (ID)" aria-label="Search">
                        <button class="btn btn-sm btn-outline-secondary" type="submit" name="search_order"
                            value="search">Tìm</button>
                    </form>
                </div>
            </div>
        </div>

        <?php
        $data = all_orders();
        delete_order();
        if (isset($_GET['search_order'])) {
            $query = search_order();
            if (!empty($query)) {
                $data = $query;
            } else {
                get_redirect("orders.php");
            }
        }
        ?>

        <!-- ✅ Bảng cho Desktop -->
        <div class="table-responsive d-none d-md-block">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>ID người dùng</th>
                        <th>ID sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Trạng thái</th>
                        <th colspan="5">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $i => $order): ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $order['order_id'] ?></td>
                            <td><?= $order['user_id'] ?></td>
                            <td><?= $order['item_id'] ?></td>
                            <td><?= $order['order_quantity'] ?></td>
                            <td><?= $order['order_date'] ?></td>
                            <td style="color: <?= $order['order_status'] == 1 ? 'green' : 'red' ?>">
                                <?= $order['order_status'] == 1 ? 'Đã giao' : 'Chờ xử lý' ?>
                            </td>
                            <td><a href="orders.php?delete=<?= $order['order_id'] ?>" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này không?')">Xóa</a>
                            </td>
                            <td>
                                <?php if ($order['order_status'] == 1): ?>
                                    <a href="orders.php?undo=<?= $order['order_id'] ?>"
                                        class="btn btn-sm btn-outline-danger">Hoàn tác</a>
                                <?php else: ?>
                                    <a href="orders.php?done=<?= $order['order_id'] ?>"
                                        class="btn btn-sm btn-outline-success">Hoàn thành</a>
                                <?php endif; ?>
                            </td>
                            <td><a href="customers.php?id=<?= $order['user_id'] ?>" class="btn btn-sm btn-outline-info">Chi
                                    tiết KH</a></td>
                            <td><a href="products.php?id=<?= $order['item_id'] ?>" class="btn btn-sm btn-outline-info">Chi
                                    tiết SP</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- ✅ Mobile Cards -->
        <div class="d-block d-md-none">
            <?php foreach ($data as $i => $order): ?>
                <div class="card mb-3 p-3 shadow-sm">
                    <p><strong>#<?= $i ?></strong></p>
                    <p><strong>ID:</strong> <?= $order['order_id'] ?></p>
                    <p><strong>Người dùng:</strong> <?= $order['user_id'] ?></p>
                    <p><strong>Sản phẩm:</strong> <?= $order['item_id'] ?></p>
                    <p><strong>Số lượng:</strong> <?= $order['order_quantity'] ?></p>
                    <p><strong>Ngày đặt:</strong> <?= $order['order_date'] ?></p>
                    <p><strong>Trạng thái:</strong>
                        <span style="color: <?= $order['order_status'] == 1 ? 'green' : 'red' ?>">
                            <?= $order['order_status'] == 1 ? 'Đã giao' : 'Chờ xử lý' ?>
                        </span>
                    </p>
                    <div class="mt-2 d-flex gap-2 flex-wrap">
                        <a href="orders.php?delete=<?= $order['order_id'] ?>" class="btn btn-sm btn-outline-danger"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này không?')">Xóa</a>
                        <?php if ($order['order_status'] == 1): ?>
                            <a href="orders.php?undo=<?= $order['order_id'] ?>" class="btn btn-sm btn-outline-danger">Hoàn
                                tác</a>
                        <?php else: ?>
                            <a href="orders.php?done=<?= $order['order_id'] ?>" class="btn btn-sm btn-outline-success">Hoàn
                                thành</a>
                        <?php endif; ?>
                        <a href="customers.php?id=<?= $order['user_id'] ?>" class="btn btn-sm btn-outline-info">Chi tiết
                            KH</a>
                        <a href="products.php?id=<?= $order['item_id'] ?>" class="btn btn-sm btn-outline-info">Chi tiết
                            SP</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <br><br>
        <?php
        edit_admin($_SESSION['admin_id']);
        if (isset($_GET['edit'])) {
            $_SESSION['admin_id'] = $_GET['edit'];
            $data = get_admin($_SESSION['admin_id']);
            ?>
            <br>
            <h2>Chỉnh sửa thông tin quản trị viên</h2>
            <form action="admin.php" method="POST">
                <div class="form-group">
                    <label>Họ</label>
                    <input pattern=".{1,30}" type="text" class="form-control"
                        placeholder="<?php echo $data[0]['admin_fname'] ?>" name="admin_fname">
                    <div class="form-text">Vui lòng nhập họ (1-30 ký tự), không dấu hoặc số!</div>
                </div>
                <br>
                <div class="form-group">
                    <label for="validationTooltip01">Tên</label>
                    <input pattern=".{1,30}" id="validationTooltip01" type="text" class="form-control"
                        placeholder="<?php echo $data[0]['admin_lname'] ?>" name="admin_lname">
                    <div class="form-text">Vui lòng nhập tên (1-30 ký tự), không dấu hoặc số!</div>
                </div>
                <br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Địa chỉ email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="<?php echo $data[0]['admin_email'] ?>" name="admin_email">
                    <div class="form-text">Vui lòng nhập email theo định dạng: example@gmail.com.</div>
                </div>
                <button type="submit" class="btn btn-outline-primary" value="update" name="admin_update">Cập nhật</button>
                <button type="submit" class="btn btn-outline-danger" value="cancel" name="admin_cancel">Hủy</button>
                <br> <br>
            </form>
        <?php }
        add_admin();
        if (isset($_GET['add'])) { ?>
            <h2>Thêm quản trị viên mới</h2>
            <form action="admin.php" method="POST">
                <div class="form-group">
                    <label>Họ</label>
                    <input pattern=".{1,30}" type="text" class="form-control" placeholder="Họ" name="admin_fname">
                    <div class="form-text">Vui lòng nhập họ (1-30 ký tự), không dấu hoặc số!</div>
                </div>
                <br>
                <div class="form-group">
                    <label for="validationTooltip01">Tên</label>
                    <input pattern=".{1,30}" id="validationTooltip01" type="text" class="form-control" placeholder="Tên"
                        name="admin_lname">
                    <div class="form-text">Vui lòng nhập tên (1-30 ký tự), không dấu hoặc số!</div>
                </div>
                <br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Địa chỉ email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Địa chỉ email" name="admin_email">
                    <div class="form-text">Vui lòng nhập email theo định dạng: example@gmail.com.</div>
                </div><br>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu</label>
                    <input type="password" pattern="^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$"
                        class="form-control" placeholder="Mật khẩu" name="admin_password">
                    <div class="form-text">
                        <ul>
                            <li>Tối thiểu 8 ký tự</li>
                            <li>Ít nhất 1 chữ số</li>
                            <li>Ít nhất 1 chữ hoa</li>
                            <li>Ít nhất 1 chữ thường</li>
                        </ul>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-outline-primary" value="update" name="add_admin">Thêm</button>
                <button type="submit" class="btn btn-outline-danger" value="cancel" name="admin_cancel">Hủy</button>
                <br> <br>
            </form>
        <?php } ?>
    </main>
    </div>
    </div>
    <?php include "includes/footer.php" ?>
</body>