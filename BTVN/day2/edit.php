
<?php

include  'products.php'; 

$product_id = isset($_GET['id']) ? $_GET['id'] : 0;


// Truy van sp
$product = null;
foreach ($products as $p) {

    if ($p['id'] == $product_id) {

        $product = $p;
        break;}
}

// ht tbloi
if (!$product) {
    echo "Không tìm  thấy sản phẩm.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price  = $_POST['price'];


    $update_sql = "UPDATE products SET name = '$name', price = '$price' WHERE  id = $product_id";
    if ($conn->query($update_sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Lỗi cập nhật sản phẩm: " . $conn->error;
    }
}

?>
<form method="POST">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="form-group">


        <label for ="name">Sản phẩm</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
    </div>
    <div class= "form-group">


        <label  for="price">Giá thành</label>
        <input type="text" class="form-control" id="price" name="price" value="<?= htmlspecialchars($product['price']) ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>


</form>
