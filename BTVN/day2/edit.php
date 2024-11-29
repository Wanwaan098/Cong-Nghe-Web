<?php
// Bao gồm tệp products.php để kết nối cơ sở dữ liệu và lấy dữ liệu sản phẩm
include 'products.php'; 

// Lấy id sản phẩm từ query string
$product_id = isset($_GET['id']) ? $_GET['id'] : 0;

// Truy vấn lấy thông tin sản phẩm
$product = null;
foreach ($products as $p) {
    if ($p['id'] == $product_id) {
        $product = $p;
        break;
    }
}

// Nếu sản phẩm không tồn tại, hiển thị thông báo lỗi
if (!$product) {
    echo "Không tìm thấy sản phẩm.";
    exit();
}

// Cập nhật sản phẩm khi form được submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Thực hiện cập nhật vào cơ sở dữ liệu (lưu ý cần kết nối lại trong products.php để thực hiện câu lệnh UPDATE)
    $update_sql = "UPDATE products SET name = '$name', price = '$price' WHERE id = $product_id";
    if ($conn->query($update_sql) === TRUE) {
        header("Location: index.php"); // Quay lại trang index sau khi cập nhật
        exit();
    } else {
        echo "Lỗi cập nhật sản phẩm: " . $conn->error;
    }
}

?>
<form method="POST">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="form-group">
        <label for="name">Sản phẩm</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
    </div>
    <div class="form-group">
        <label for="price">Giá thành</label>
        <input type="text" class="form-control" id="price" name="price" value="<?= htmlspecialchars($product['price']) ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
