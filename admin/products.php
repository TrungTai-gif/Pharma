<?php
include "includes/head.php";
?>

<body>
    <?php include "includes/header.php" ?>
    <?php include "includes/sidebar.php"; ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <?php message(); ?>
        <div class="container">
            <div class="row align-items-start mt-3">
                <!-- Cột trái: tiêu đề -->
                <div class="col-12 col-md-4 mb-2 mb-md-0">
                    <h5 class="mb-2">Chi tiết sản phẩm</h5>
                </div>

                <!-- Cột giữa: chừa trống căn giữa -->
                <div class="d-none d-md-block col-md-4"></div>

                <!-- Cột phải: ô tìm kiếm -->
                <div class="col-12 col-md-4">
                    <form class="d-flex flex-column flex-md-row" method="GET" action="products.php">
                        <input class="form-control form-control-sm me-md-2 mb-2 mb-md-0" type="search"
                            name="search_item_name" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
                        <button class="btn btn-sm btn-outline-secondary" type="submit" name="search_item"
                            value="search">Tìm</button>
                    </form>
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
            <form action="products.php" method="POST" enctype="multipart/form-data">
            <div class="form-group mb-3">
                    <label>Tên sản phẩm</label>
                    <input pattern="[A-Za-z0-9_]{1,25}" type="text" class="form-control"
                        placeholder="<?php echo $data[0]['item_title'] ?>" name="name">
                    <div class="form-text">Vui lòng nhập tên sản phẩm (1-25 ký tự), không chứa ký tự đặc biệt!</div>
                </div>
                <div class="form-group">
                    <label>Thương hiệu</label>
                    <input pattern="[A-Za-z0-9_]{1,25}" type="text" class="form-control"
                        placeholder="<?php echo $data[0]['item_brand'] ?>" name="brand">
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
                    <input pattern="^[#.0-9a-zA-Z\s,-]+$" type="text" class="form-control"
                        placeholder="<?php echo $data[0]['item_tags'] ?>" name="tags">
                    <div class="form-text">Vui lòng nhập tags (1-250 ký tự), không chứa ký tự đặc biệt!</div>
                </div>
                <div class="form-group">
                    <label>Hình ảnh sản phẩm</label>
                    <input type="file" accept="image/*" class="form-control" name="image">
                    <div class="form-text">Vui lòng chọn hình ảnh cho sản phẩm.</div>
                </div>
                <div class="form-group">
                    <label>Số lượng sản phẩm</label>
                    <input type="number" class="form-control" placeholder="<?php echo $data[0]['item_quantity'] ?>"
                        name="quantity" min="1" max="999">
                    <div class="form-text">Vui lòng nhập số lượng (1-999).</div>
                </div>
                <div class="input-group mb-3 form-group">
                    <span class="input-group-text">₫</span>
                    <input pattern="[0-9]+" type="text" class="form-control" aria-label="Giá sản phẩm" name="price"
                        placeholder="<?php echo $data[0]['item_price'] ?>">
                    <span class="input-group-text">.00</span>
                </div>
                <div class="form-text">Vui lòng nhập giá sản phẩm.</div>
                <div class="form-group">
                    <label>Chi tiết sản phẩm</label>
                    <input type="text" class="form-control" placeholder="<?php echo $data[0]['item_details'] ?>"
                        name="details">
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
            <form action="products.php" method="POST" enctype="multipart/form-data">
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
                    <input type="text" class="form-control" aria-label="Giá sản phẩm" name="price"
                        placeholder="Giá sản phẩm">
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

        <?php
        $data = all_items();
        delete_item();
        if (isset($_GET['search_item'])) {
            $query = search_item();
            if (!empty($query)) {
                $data = $query;
            } else {
                get_redirect("products.php");
            }
        } elseif (isset($_GET['id'])) {
            $data = get_item_details();
        }
        ?>

        <!-- ✅ Desktop Table -->
        <div class="table-responsive d-none d-md-block">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Thương hiệu</th>
                        <th>Danh mục</th>
                        <th>Tags</th>
                        <th>Ảnh</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Chi tiết</th>
                        <th colspan="2">
                            <a href="products.php?add=1" class="btn btn-sm btn-outline-primary">Thêm</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $i => $item): ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $item['item_id'] ?></td>
                            <td><?= $item['item_title'] ?></td>
                            <td><?= $item['item_brand'] ?></td>
                            <td><?= $item['item_cat'] ?></td>
                            <td><?= $item['item_tags'] ?></td>
                            <td><?= $item['item_image'] ?></td>
                            <td><?= $item['item_quantity'] ?></td>
                            <td><?= $item['item_price'] ?></td>
                            <td><?= $item['item_details'] ?></td>
                            <td>
                                <a href="products.php?edit=<?= $item['item_id'] ?>"
                                    class="btn btn-sm btn-outline-warning">Sửa</a>
                            </td>
                            <td>
                            <a href="products.php?delete=<?= $item['item_id'] ?>" class="btn btn-sm btn-outline-danger"
   onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">Xóa</a>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- ✅ Mobile Cards -->
        <div class="d-block d-md-none">
            <?php foreach ($data as $i => $item): ?>
                <div class="card mb-3 p-3 shadow-sm">
                    <p><strong>#<?= $i ?></strong></p>
                    <p><strong>ID:</strong> <?= $item['item_id'] ?></p>
                    <p><strong>Tên:</strong> <?= $item['item_title'] ?></p>
                    <p><strong>Thương hiệu:</strong> <?= $item['item_brand'] ?></p>
                    <p><strong>Danh mục:</strong> <?= $item['item_cat'] ?></p>
                    <p><strong>Tags:</strong> <?= $item['item_tags'] ?></p>
                    <p><strong>Ảnh:</strong> <?= $item['item_image'] ?></p>
                    <p><strong>Số lượng:</strong> <?= $item['item_quantity'] ?></p>
                    <p><strong>Giá:</strong> <?= $item['item_price'] ?></p>
                    <p><strong>Chi tiết:</strong> <?= $item['item_details'] ?></p>
                    <div class="mt-2 d-flex gap-2 flex-wrap">
                        <a href="products.php?edit=<?= $item['item_id'] ?>" class="btn btn-sm btn-outline-warning">Sửa</a>
                        <a href="products.php?delete=<?= $item['item_id'] ?>" class="btn btn-sm btn-outline-danger"
   onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">Xóa</a>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="text-end my-3">
                <a href="products.php?add=1" class="btn btn-sm btn-outline-primary">➕ Thêm sản phẩm</a>
            </div>
        </div>

    </main>

    <?php include "includes/footer.php" ?>
</body>