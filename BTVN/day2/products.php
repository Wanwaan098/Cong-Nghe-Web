<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = ""; // Mật khẩu cho MySQL
$database = "ProductDB";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn lấy danh sách sản phẩm
$sql = "SELECT id, name, price FROM products";
$result = $conn->query($sql);

// Kiểm tra nếu có kết quả
if ($result) {
    $products = $result->fetch_all(MYSQLI_ASSOC); // Lấy tất cả kết quả dưới dạng mảng liên kết
} else {
    echo "Lỗi truy vấn: " . $conn->error;
}

?>
