<?php
header('Content-Type: application/json');
include '../../includes/functions.php'; // chứa $connection

$data = [
    "orders_per_month" => [],
    "users_per_month" => [],
    "inventory" => [],
    "revenue_per_month" => []
];

// Đơn hàng theo tháng
$sql = "SELECT MONTH(order_date) AS month, COUNT(*) AS total 
        FROM orders 
        GROUP BY MONTH(order_date)";
$res = mysqli_query($connection, $sql);
while ($row = mysqli_fetch_assoc($res)) {
    $data['orders_per_month'][(int)$row['month']] = (int)$row['total'];
}

// Doanh thu theo tháng
$sql = "SELECT MONTH(order_date) AS month, SUM(order_quantity * item_price) AS total 
        FROM orders 
        JOIN item ON orders.item_id = item.item_id
        GROUP BY MONTH(order_date)";
$res = mysqli_query($connection, $sql);
while ($row = mysqli_fetch_assoc($res)) {
    $data['revenue_per_month'][(int)$row['month']] = (int)$row['total'];
}

// Top 10 sản phẩm bán chạy
$top_products = [];
$sql = "SELECT i.item_title AS name, SUM(o.order_quantity) AS quantity
        FROM orders o
        JOIN item i ON o.item_id = i.item_id
        GROUP BY o.item_id
        ORDER BY quantity DESC
        LIMIT 10";
$result = mysqli_query($connection, $sql);
while($row = mysqli_fetch_assoc($result)) {
    $top_products[] = [
        "name" => $row['name'],
        "quantity" => (int)$row['quantity']
    ];
}
$data['top_products'] = $top_products;

// Cuối cùng: xuất ra JSON
echo json_encode($data);
?>
