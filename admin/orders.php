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
            <div class="row align-items-start">
                <div class="col">
                    <br>
                    <h2>Chi tiết đơn hàng</h2>
                    <br>
                </div>
                <div class="col"></div>
                <div class="col">
                    <br>
                    <form class="d-flex" method="GET" action="orders.php">
                        <input class="form-control me-2 col" type="search" name="search_order_id" placeholder="Tìm đơn hàng (ID)" aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit" name="search_order" value="search">Tìm kiếm</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">ID người dùng</th>
                        <th scope="col">ID sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Ngày đặt hàng</th>
                        <th scope="col">Trạng thái đơn</th>
                </thead>

                <tbody>
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
                    $num = sizeof($data);
                    for ($i = 0; $i < $num; $i++) {
                    ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $data[$i]['order_id'] ?></td>
                            <td><?php echo $data[$i]['user_id'] ?></td>
                            <td><?php echo $data[$i]['item_id'] ?></td>
                            <td><?php echo $data[$i]['order_quantity'] ?></td>
                            <td><?php echo $data[$i]['order_date'] ?></td>
                            <?php if ($data[$i]['order_status'] == 1) { ?>
                                <td style="color: green;">
                                    Đã giao
                                </td>
                            <?php } else { ?>
                                <td style="color: red;">
                                    Chờ xử lý
                                </td>
                            <?php } ?>
                            <td>
                                <button type="button" class="btn btn-outline-danger"><a style="text-decoration: none; color:black;" href="orders.php?delete=<?php echo $data[$i]['order_id'] ?>">Xóa</a></button>
                            </td>

                            <?php if ($data[$i]['order_status'] == 1) { ?>
                                <td>
                                    <button type="button" class="btn btn-outline-danger"><a style="text-decoration: none; color:black;" href="orders.php?undo=<?php echo $data[$i]['order_id'] ?>">&nbsp;Hoàn tác&nbsp;</a></button>
                                </td>
                            <?php } else { ?>
                                <td>
                                    <button type="button" class="btn btn-outline-success"><a style="text-decoration: none; color:black;" href="orders.php?done=<?php echo $data[$i]['order_id'] ?>">&nbsp;Hoàn thành&nbsp;</a></button>
                                </td>
                            <?php } ?>
                            <td>
                                <button type="button" class="btn btn-outline-info"><a style="text-decoration: none; color:black;" href="customers.php?id=<?php echo $data[$i]['user_id'] ?>"> &nbsp;Chi tiết người dùng&nbsp; </a></button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-info"><a style="text-decoration: none; color:black;" href="products.php?id=<?php echo $data[$i]['item_id'] ?>">Chi tiết sản phẩm</a></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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
                    <input pattern="[A-Za-z_]{1,15}" type="text" class="form-control" placeholder="<?php echo $data[0]['admin_fname'] ?>" name="admin_fname">
                    <div class="form-text">Vui lòng nhập họ (1-30 ký tự), không dấu hoặc số!</div>
                </div>
                <br>
                <div class="form-group">
                    <label for="validationTooltip01">Tên</label>
                    <input pattern="[A-Za-z_]{1,15}" id="validationTooltip01" type="text" class="form-control" placeholder="<?php echo $data[0]['admin_lname'] ?>" name="admin_lname">
                    <div class="form-text">Vui lòng nhập tên (1-30 ký tự), không dấu hoặc số!</div>
                </div>
                <br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Địa chỉ email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?php echo $data[0]['admin_email'] ?>" name="admin_email">
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
                    <input pattern="[A-Za-z_]{1,15}" type="text" class="form-control" placeholder="Họ" name="admin_fname">
                    <div class="form-text">Vui lòng nhập họ (1-30 ký tự), không dấu hoặc số!</div>
                </div>
                <br>
                <div class="form-group">
                    <label for="validationTooltip01">Tên</label>
                    <input pattern="[A-Za-z_]{1,15}" id="validationTooltip01" type="text" class="form-control" placeholder="Tên" name="admin_lname">
                    <div class="form-text">Vui lòng nhập tên (1-30 ký tự), không dấu hoặc số!</div>
                </div>
                <br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Địa chỉ email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Địa chỉ email" name="admin_email">
                    <div class="form-text">Vui lòng nhập email theo định dạng: example@gmail.com.</div>
                </div><br>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu</label>
                    <input type="password" pattern="^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$" class="form-control" placeholder="Mật khẩu" name="admin_password">
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
