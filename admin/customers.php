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
                    <h2>Thông tin khách hàng</h2>
                    <br>
                </div>
                <div class="col">
                </div>
                <div class="col">
                    <br>
                    <form class="d-flex" method="GET" action="customers.php">
                        <input class="form-control me-2 col" type="search" name="search_user_email" placeholder="Tìm khách hàng (email)" aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit" name="search_user" value="search">Tìm kiếm</button>
                    </form>
                    <br>
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
                    <input pattern="[A-Za-z_]{1,15}" type="text" class="form-control" placeholder="<?php echo $data[0]['user_fname'] ?>" name="fname">
                    <div class="form-text">Vui lòng nhập tên trong khoảng 1-30 ký tự, không được chứa ký tự đặc biệt hoặc số!</div>
                </div>
                <br>
                <div class="form-group">
                    <label for="validationTooltip01">Họ</label>
                    <input pattern="[A-Za-z_]{1,15}" id="validationTooltip01" type="text" class="form-control" placeholder="<?php echo $data[0]['user_lname'] ?>" name="lname">
                    <div class="form-text">Vui lòng nhập họ trong khoảng 1-30 ký tự, không được chứa ký tự đặc biệt hoặc số!</div>
                </div>
                <br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Địa chỉ email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?php echo $data[0]['email'] ?>" name="email">
                    <div class="form-text">Vui lòng nhập email theo định dạng: example@gmail.com.</div>
                </div>
                <br>
                <div class="form-group">
                    <label for="inputAddress2">Địa chỉ</label>
                    <input pattern="^[#.0-9a-zA-Z\s,-]+$" type="text" class="form-control" id="inputAddress2" placeholder="<?php echo $data[0]['user_address'] ?>" name="address">
                </div>
                <div class="form-text">Vui lòng nhập địa chỉ theo định dạng: ví dụ #1, North Street, Chennai - 11.</div>
                <br>
                <button type="submit" class="btn btn-outline-success" value="update" name="update">Xác nhận</button>
                <button type="submit" class="btn btn-outline-danger" value="cancel" name="cancel">Hủy</button>
                <br> <br>
            </form>

        <?php
        }if(isset($_SESSION['id'])){
            edit_item($_SESSION['id']);
            }
        ?>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Họ</th>
                        <th scope="col">Email</th>
                        <th scope="col">Địa chỉ</th>

                </thead>

                <tbody>
                    <?php
                    $data = all_users();
                    delete_user();
                    if (isset($_GET['search_user'])) {
                        $query = search_user();
                        if (isset($query)) {
                            $data = $query;
                        } else {
                            get_redirect("customers.php");
                        }
                    } elseif (isset($_GET['id'])) {
                        $data = get_user_details();
                    }
                    $num = sizeof($data);
                    for ($i = 0; $i < $num; $i++) {
                    ?>
                        <tr>
                            <td><?php echo $data[$i]['user_id'] ?></td>
                            <td><?php echo $data[$i]['user_fname'] ?></td>
                            <td><?php echo $data[$i]['user_lname'] ?></td>
                            <td><?php echo $data[$i]['email'] ?></td>
                            <td><?php echo $data[$i]['user_address'] ?></td>
                            <td>
                                <button type="button" class="btn pull-left btn-outline-warning"><a style="text-decoration: none; color:black;" href="customers.php?edit=<?php echo $data[$i]['user_id'] ?>">Chỉnh sửa</a></button>
                            </td>
                            <td>
                                <button type="button" class="btn pull-left btn-outline-danger"><a style="text-decoration: none; color:black;" href="customers.php?delete=<?php echo $data[$i]['user_id'] ?>">Xóa</a></button>
                            </td>
                        </tr>
                    <?php  }
                    ?>
                </tbody>
            </table>
        </div>

    </main>
    </div>
    </div>
    <?php
    include "includes/footer.php"
    ?>
</body>
