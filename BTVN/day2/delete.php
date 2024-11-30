
<?php
include 'products.php'; 

// lay id sp

$product_id = isset($_GET['id']) ? $_GET['id'] : 0;

//  xoa sp
$delete_sql = "DELETE FROM products WHERE id = $product_id";
 if ($conn->query($delete_sql) === TRUE) {
    

    header("Location: index.php"); 

    exit();
}  else {


    echo "Lỗi xóa sản phẩm: " . $conn->error;
}
?>
