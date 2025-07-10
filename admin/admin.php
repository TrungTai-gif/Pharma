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
                    <h5 class="mb-2">Thông tin quản trị viên</h5>
                </div>

                <!-- Cột giữa: chừa trống căn giữa -->
                <div class="d-none d-md-block col-md-4"></div>

                <!-- Cột phải: ô tìm kiếm -->
                <div class="col-12 col-md-4">
                    <form class="d-flex flex-column flex-md-row" method="GET" action="admin.php">
                        <input class="form-control form-control-sm me-md-2 mb-2 mb-md-0" type="search"
                            name="search_admin_email" placeholder="Tìm quản trị viên (email)" aria-label="Search">
                        <button class="btn btn-sm btn-outline-secondary" type="submit" name="search_admin"
                            value="search">Tìm</button>
                    </form>
                </div>
            </div>
        </div>


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
                    <label>Tên</label>
                    <input pattern="[A-Za-z_]{1,15}" type="text" class="form-control"
                        placeholder="<?php echo $data[0]['admin_fname'] ?>" name="admin_fname">
                    <div class="form-text">Vui lòng nhập tên trong khoảng 1-30 ký tự, không được chứa ký tự đặc biệt hoặc
                        số!</div>
                </div>
                <br>
                <div class="form-group">
                    <label for="validationTooltip01">Họ</label>
                    <input pattern="[A-Za-z_]{1,15}" id="validationTooltip01" type="text" class="form-control"
                        placeholder="<?php echo $data[0]['admin_lname'] ?>" name="admin_lname">
                    <div class="form-text">Vui lòng nhập họ trong khoảng 1-30 ký tự, không được chứa ký tự đặc biệt hoặc số!
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Địa chỉ email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="<?php echo $data[0]['admin_email'] ?>" name="admin_email">
                    <div class="form-text">Vui lòng nhập email theo định dạng: example@gmail.com.</div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu</label>
                    <input type="password" pattern="^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$"
                        class="form-control" placeholder="Mật khẩu" name="admin_password">
                    <div class="form-text">
                        <ul>
                            <li>Ít nhất 8 ký tự</li>
                            <li>Phải chứa ít nhất 1 chữ số</li>
                            <li>Phải chứa ít nhất 1 chữ hoa</li>
                            <li>Phải chứa ít nhất 1 chữ thường</li>
                        </ul>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-outline-primary" value="update" name="admin_update">Xác nhận</button>
                <button type="submit" class="btn btn-outline-danger" value="cancel" name="admin_cancel">Hủy</button>
                <br> <br>
            </form>

            <?php
        }
        add_admin();
        if (isset($_GET['add'])) {

            ?>
            <h2>Thêm quản trị viên mới</h2>
            <form action="admin.php" method="POST">
                <div class="form-group">
                    <label>Tên</label>
                    <input pattern="[A-Za-z_]{1,15}" type="text" class="form-control" placeholder="Tên" name="admin_fname">
                    <div class="form-text">Vui lòng nhập tên trong khoảng 1-30 ký tự, không được chứa ký tự đặc biệt hoặc
                        số!</div>
                </div>
                <br>
                <div class="form-group">
                    <label for="validationTooltip01">Họ</label>
                    <input pattern="[A-Za-z_]{1,15}" id="validationTooltip01" type="text" class="form-control"
                        placeholder="Họ" name="admin_lname">
                    <div class="form-text">Vui lòng nhập họ trong khoảng 1-30 ký tự, không được chứa ký tự đặc biệt hoặc số!
                    </div>
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
                            <li>Ít nhất 8 ký tự</li>
                            <li>Phải chứa ít nhất 1 chữ số</li>
                            <li>Phải chứa ít nhất 1 chữ hoa</li>
                            <li>Phải chứa ít nhất 1 chữ thường</li>
                        </ul>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-outline-primary" value="update" name="add_admin">Xác nhận</button>
                <button type="submit" class="btn btn-outline-danger" value="cancel" name="admin_cancel">Hủy</button>
                <br> <br>
            </form>

            <?php
        }

        ?>
        <?php
        // ✨ Thêm đoạn này trước phần bảng
        delete_admin();

        if (isset($_GET['search_admin'])) {
            $query = search_admin();
            if (!empty($query)) {
                $data = $query;
            } else {
                get_redirect("admin.php");
                exit;
            }
        } else {
            $data = all_admins();
        }
        ?>
        <!-- ✅ Desktop Table (chỉ hiện trên md trở lên) -->
        <div class="table-responsive d-none d-md-block">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Họ</th>
                        <th>Email</th>
                        <th colspan="2">
                            <a href="admin.php?add=1" class="btn btn-outline-primary btn-sm">Thêm</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $i => $admin): ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $admin['admin_id'] ?></td>
                            <td><?= $admin['admin_fname'] ?></td>
                            <td><?= $admin['admin_lname'] ?></td>
                            <td><?= $admin['admin_email'] ?></td>
                            <td>
                                <a href="admin.php?edit=<?= $admin['admin_id'] ?>"
                                    class="btn btn-sm btn-outline-warning">Sửa</a>
                            </td>
                            <td>
                                <?php if ($admin['admin_id'] != $_SESSION['admin_id']): ?>
                                    <a href="admin.php?delete=<?= $admin['admin_id'] ?>"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa quản trị viên này không?')"
                                        class="btn btn-sm btn-outline-danger">Xóa</a>

                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- ✅ Mobile Cards (chỉ hiện trên màn hình nhỏ) -->
        <div class="d-block d-md-none">
            <?php foreach ($data as $i => $admin): ?>
                <div class="card mb-3 p-3 shadow-sm">
                    <p><strong>#<?= $i ?></strong></p>
                    <p><strong>ID:</strong> <?= $admin['admin_id'] ?></p>
                    <p><strong>Họ tên:</strong> <?= $admin['admin_fname'] . ' ' . $admin['admin_lname'] ?></p>
                    <p><strong>Email:</strong> <?= $admin['admin_email'] ?></p>
                    <div class="mt-2 d-flex gap-2 flex-wrap">
                        <a href="admin.php?edit=<?= $admin['admin_id'] ?>" class="btn btn-sm btn-outline-warning">Sửa</a>
                        <?php if ($admin['admin_id'] != $_SESSION['admin_id']): ?>
                            <a href="admin.php?delete=<?= $admin['admin_id'] ?>"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa quản trị viên này không?')"
                                class="btn btn-sm btn-outline-danger">Xóa</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="text-end my-3">
                <a href="admin.php?add=1" class="btn btn-sm btn-outline-primary">➕ Thêm quản trị viên</a>
            </div>
        </div>

    </main>
    </div>
    </div>
    <?php
    include "includes/footer.php"
        ?>
</body>