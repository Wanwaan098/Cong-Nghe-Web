<?php
// Bao gồm tệp products.php để kết nối cơ sở dữ liệu và lấy dữ liệu sản phẩm
include 'products.php'; 

// Lấy id sản phẩm từ query string
$product_id = isset($_GET['id']) ? $_GET['id'] : 0;

// Xóa sản phẩm trong cơ sở dữ liệu
$delete_sql = "DELETE FROM products WHERE id = $product_id";
if ($conn->query($delete_sql) === TRUE) {
    header("Location: index.php"); // Quay lại trang index sau khi xóa
    exit();
} else {
    echo "Lỗi xóa sản phẩm: " . $conn->error;
}
?>
