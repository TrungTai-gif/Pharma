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
                    <h5 class="mb-2">Thông tin khách hàng</h5>
                </div>

                <!-- Cột giữa: chừa trống căn giữa -->
                <div class="d-none d-md-block col-md-4"></div>

                <!-- Cột phải: ô tìm kiếm -->
                <div class="col-12 col-md-4">
                    <form class="d-flex flex-column flex-md-row" method="GET" action="customers.php">
                        <input class="form-control form-control-sm me-md-2 mb-2 mb-md-0" type="search"
                            name="search_user_email" placeholder="Tìm khách hàng (email)" aria-label="Search">
                        <button class="btn btn-sm btn-outline-secondary" type="submit" name="search_user"
                            value="search">Tìm</button>
                    </form>
                </div>
            </div>
        </div>



        <?php

        if (isset($_GET['edit'])) {
            $_SESSION['id'] = $_GET['edit'];
            $data = get_user($_SESSION['id']);

            ?>
            <br>
            <h2>Chỉnh sửa thông tin khách hàng</h2>
            <form action="customers.php" method="POST">
                <div class="form-group">
                    <label>Tên</label>
                    <input pattern=".{1,30}" type="text" class="form-control"
                        placeholder="<?php echo $data[0]['user_fname'] ?>" name="fname">
                    <div class="form-text">Vui lòng nhập tên trong khoảng 1-30 ký tự, không được chứa ký tự đặc biệt hoặc
                        số!</div>
                </div>
                <br>
                <div class="form-group">
                    <label for="validationTooltip01">Họ</label>
                    <input pattern=".{1,30}" id="validationTooltip01" type="text" class="form-control"
                        placeholder="<?php echo $data[0]['user_lname'] ?>" name="lname">
                    <div class="form-text">Vui lòng nhập họ trong khoảng 1-30 ký tự, không được chứa ký tự đặc biệt hoặc số!
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Địa chỉ email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="<?php echo $data[0]['email'] ?>" name="email">
                    <div class="form-text">Vui lòng nhập email theo định dạng: example@gmail.com.</div>
                </div>
                <br>
                <div class="form-group">
                    <label for="inputAddress2">Địa chỉ</label>
                    <input pattern="^[#.0-9a-zA-Z\s,-]+$" type="text" class="form-control" id="inputAddress2"
                        placeholder="<?php echo $data[0]['user_address'] ?>" name="address">
                </div>
                <div class="form-text">Vui lòng nhập địa chỉ theo định dạng: ví dụ #1, North Street, Chennai - 11.</div>
                <br>
                <button type="submit" class="btn btn-outline-success" value="update" name="update">Xác nhận</button>
                <button type="submit" class="btn btn-outline-danger" value="cancel" name="cancel">Hủy</button>
                <br> <br>
            </form>

            <?php
        }
        if (isset($_SESSION['id'])) {
            edit_user($_SESSION['id']);
        }
        ?>
        <?php
        $data = all_users(); // Mặc định hiển thị tất cả
        delete_user();

        // Nếu đang tìm kiếm khách hàng
        if (isset($_GET['search_user'])) {
            $query = search_user();
            if (!empty($query)) {
                $data = $query;
            } else {
                get_redirect("customers.php"); // không có kết quả thì quay về
            }
        } elseif (isset($_GET['id'])) {
            $data = get_user_details();
        }
        ?>

        <!-- ✅ Desktop Table (ẩn trên mobile) -->
        <div class="table-responsive d-none d-md-block">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Họ</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Thao tác</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $user): ?>
                        <tr>
                            <td><?= $user['user_id'] ?></td>
                            <td><?= $user['user_fname'] ?></td>
                            <td><?= $user['user_lname'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['user_address'] ?></td>
                            <td>
                                <a href="customers.php?edit=<?= $user['user_id'] ?>"
                                    class="btn btn-sm btn-outline-warning">Sửa</a>
                            </td>
                            <td>
                                <a href="customers.php?delete=<?= $user['user_id'] ?>" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa khách hàng này không?')">Xóa</a>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- ✅ Mobile Cards (chỉ hiện trên thiết bị nhỏ) -->
        <div class="d-block d-md-none">
            <?php foreach ($data as $user): ?>
                <div class="card mb-3 p-3 shadow-sm">
                    <p><strong>ID:</strong> <?= $user['user_id'] ?></p>
                    <p><strong>Họ tên:</strong> <?= $user['user_fname'] . ' ' . $user['user_lname'] ?></p>
                    <p><strong>Email:</strong> <?= $user['email'] ?></p>
                    <p><strong>Địa chỉ:</strong> <?= $user['user_address'] ?></p>
                    <div class="mt-2 d-flex gap-2 flex-wrap">
                        <a href="customers.php?edit=<?= $user['user_id'] ?>" class="btn btn-sm btn-outline-warning">Sửa</a>
                        <a href="customers.php?delete=<?= $user['user_id'] ?>" class="btn btn-sm btn-outline-danger"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa khách hàng này không?')">Xóa</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </main>
    </div>
    </div>
    <?php
    include "includes/footer.php"
        ?>
</body>