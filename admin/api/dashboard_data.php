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

echo json_encode($data);
?>
