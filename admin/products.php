<?php
include "includes/head.php";
?>

<body>
    <?php include "includes/header.php" ?>
    <?php include "includes/sidebar.php"; ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <?php message(); ?>
        <div class="container">
            <div class="row align-items-start">
                <div class="col">
                    <br>
                    <h2>Chi tiết sản phẩm</h2>
                    <br>
                </div>
                <div class="col"></div>
                <div class="col">
                    <br>
                    <form class="d-flex" method="GET" action="products.php">
                        <input class="form-control me-2 col" type="search" name="search_item_name" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit" name="search_item" value="search">Tìm kiếm</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>

        <?php
        if (isset($_SESSION['id'])) {
            edit_item($_SESSION['id']);
        }
        if (isset($_GET['edit'])) {
            $_SESSION['id'] = $_GET['edit'];
            $data = get_item($_SESSION['id']);
        ?>
            <br>
            <h2>Chỉnh sửa sản phẩm</h2>
            <form action="products.php" method="POST">
                <div class="form-group mb-3">
                    <label>Tên sản phẩm</label>
                    <input pattern="[A-Za-z0-9_]{1,25}" type="text" class="form-control" placeholder="<?php echo $data[0]['item_title'] ?>" name="name">
                    <div class="form-text">Vui lòng nhập tên sản phẩm (1-25 ký tự), không chứa ký tự đặc biệt!</div>
                </div>
                <div class="form-group">
                    <label>Thương hiệu</label>
                    <input pattern="[A-Za-z0-9_]{1,25}" type="text" class="form-control" placeholder="<?php echo $data[0]['item_brand'] ?>" name="brand">
                    <div class="form-text">Vui lòng nhập tên thương hiệu (1-25 ký tự), không chứa ký tự đặc biệt!</div>
                </div>
                <div class="input-group mb-3 form-group">
                    <label class="input-group-text" for="inputGroupSelect01">Danh mục</label>
                    <select name="cat" class="form-select" id="inputGroupSelect01">
                        <option selected>Chọn...</option>
                        <option value="medicine">Thuốc</option>
                        <option value="self-care">Chăm sóc bản thân</option>
                        <option value="machine">Thiết bị</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tags sản phẩm</label>
                    <input pattern="^[#.0-9a-zA-Z\s,-]+$" type="text" class="form-control" placeholder="<?php echo $data[0]['item_tags'] ?>" name="tags">
                    <div class="form-text">Vui lòng nhập tags (1-250 ký tự), không chứa ký tự đặc biệt!</div>
                </div>
                <div class="form-group">
                    <label>Hình ảnh sản phẩm</label>
                    <input type="file" accept="image/*" class="form-control" name="image">
                    <div class="form-text">Vui lòng chọn hình ảnh cho sản phẩm.</div>
                </div>
                <div class="form-group">
                    <label>Số lượng sản phẩm</label>
                    <input type="number" class="form-control" placeholder="<?php echo $data[0]['item_quantity'] ?>" name="quantity" min="1" max="999">
                    <div class="form-text">Vui lòng nhập số lượng (1-999).</div>
                </div>
                <div class="input-group mb-3 form-group">
                    <span class="input-group-text">₫</span>
                    <input pattern="[0-9]+" type="text" class="form-control" aria-label="Giá sản phẩm" name="price" placeholder="<?php echo $data[0]['item_price'] ?>">
                    <span class="input-group-text">.00</span>
                </div>
                <div class="form-text">Vui lòng nhập giá sản phẩm.</div>
                <div class="form-group">
                    <label>Chi tiết sản phẩm</label>
                    <input type="text" class="form-control" placeholder="<?php echo $data[0]['item_details'] ?>" name="details">
                    <div class="form-text">Vui lòng nhập chi tiết sản phẩm.</div>
                </div>
                <br>
                <button type="submit" class="btn btn-outline-primary" name="update">Cập nhật</button>
                <button type="submit" class="btn btn-outline-danger" name="cancel">Hủy</button>
                <br><br>
            </form>
        <?php } ?>

        <?php
        add_item();
        if (isset($_GET['add'])) { ?>
            <br>
            <h2>Thêm sản phẩm</h2>
            <form action="products.php" method="POST">
                <div class="form-group mb-3">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" placeholder="Tên sản phẩm" name="name">
                    <div class="form-text">Vui lòng nhập tên sản phẩm (1-25 ký tự), không chứa ký tự đặc biệt!</div>
                </div>
                <div class="form-group">
                    <label>Thương hiệu</label>
                    <input type="text" class="form-control" placeholder="Thương hiệu" name="brand">
                    <div class="form-text">Vui lòng nhập tên thương hiệu (1-25 ký tự), không chứa ký tự đặc biệt!</div>
                </div>
                <div class="input-group mb-3 form-group">
                    <label class="input-group-text" for="inputGroupSelect01">Danh mục</label>
                    <select name="cat" class="form-select" id="inputGroupSelect01">
                        <option value="" selected>Chọn...</option>
                        <option value="medicine">Thuốc</option>
                        <option value="self-care">Chăm sóc bản thân</option>
                        <option value="machine">Thiết bị</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tags sản phẩm</label>
                    <input type="text" class="form-control" placeholder="Tags sản phẩm" name="tags">
                    <div class="form-text">Vui lòng nhập tags (1-250 ký tự), không chứa ký tự đặc biệt!</div>
                </div>
                <div class="form-group">
                    <label>Hình ảnh sản phẩm</label>
                    <input type="file" accept="image/*" class="form-control" name="image">
                    <div class="form-text">Vui lòng chọn hình ảnh cho sản phẩm.</div>
                </div>
                <div class="form-group">
                    <label>Số lượng sản phẩm</label>
                    <input type="number" class="form-control" placeholder="Số lượng" name="quantity" min="1" max="999">
                    <div class="form-text">Vui lòng nhập số lượng (1-999).</div>
                </div>
                <div class="input-group mb-3 form-group">
                    <span class="input-group-text">₫</span>
                    <input type="text" class="form-control" aria-label="Giá sản phẩm" name="price" placeholder="Giá sản phẩm">
                    <span class="input-group-text">.00</span>
                </div>
                <div class="form-text">Vui lòng nhập giá sản phẩm.</div>
                <div class="form-group">
                    <label>Chi tiết sản phẩm</label>
                    <input type="text" class="form-control" placeholder="Chi tiết sản phẩm" name="details">
                    <div class="form-text">Vui lòng nhập chi tiết sản phẩm.</div>
                </div>
                <br>
                <button type="submit" class="btn btn-outline-primary" name="add_item">Thêm</button>
                <button type="submit" class="btn btn-outline-danger" name="cancel">Hủy</button>
                <br><br>
            </form>
        <?php } ?>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Tên</th>
                        <th>
                            <button type="button" class="btn btn-outline-primary">
                                <a style="text-decoration: none; color:black;" href="products.php?add=1">&nbsp;&nbsp;Thêm&nbsp;&nbsp;</a>
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = all_items();
                    delete_item();
                    if (isset($_GET['search_item'])) {
                        $query = search_item();
                        if (isset($query)) {
                            $data = $query;
                        } else {
                            get_redirect("products.php");
                        }
                    } elseif (isset($_GET['id'])) {
                        $data = get_item_details();
                    }
                    if (isset($data)) {
                        $num = sizeof($data);
                        for ($i = 0; $i < $num; $i++) {
                    ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $data[$i]['item_id'] ?></td>
                                <td><?php echo $data[$i]['item_title'] ?></td>
                                <td><?php echo $data[$i]['item_brand'] ?></td>
                                <td><?php echo $data[$i]['item_cat'] ?></td>
                                <td><?php echo $data[$i]['item_tags'] ?></td>
                                <td><?php echo $data[$i]['item_image'] ?></td>
                                <td><?php echo $data[$i]['item_quantity'] ?></td>
                                <td><?php echo $data[$i]['item_price'] ?></td>
                                <td><?php echo $data[$i]['item_details'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-outline-warning">
                                        <a style="text-decoration: none; color:black;" href="products.php?edit=<?php echo $data[$i]['item_id'] ?>">Sửa</a>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger">
                                        <a style="text-decoration: none; color:black;" href="products.php?delete=<?php echo $data[$i]['item_id'] ?>">Xóa</a>
                                    </button>
                                </td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
    </main>

    <?php include "includes/footer.php" ?>
</body>
