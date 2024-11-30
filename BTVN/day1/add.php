<?php include 'header.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
rel="stylesheet">
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $name = htmlspecialchars(trim($_POST['name']));
     $price = htmlspecialchars(trim($_POST['price']));

    if (!empty($name) && !empty($price)) {
         include 'products.php';

        $products[] = ['name' => $name, 'price' => $price];

        $data = '<?php $products = ' . var_export($products, true) . ';';
         file_put_contents('products.php', $data);
        header('Location: index.php');
        exit();
    } else {
        $error_message = "Vui lòng nhập tên sản phẩm và giá thành.";
    }
}

?>
  <main class="py-4">
    <div  class="container">


        <h2>Thêm sản phẩm mới</h2>
        <?php if (!empty($error_message)): ?>
            <div class="alert alert-danger"><?= $error_message ?></div>
        <?php endif; ?>
       <form method="POST" action="add.php">
        <div class="mb-3">


         <label for="name" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>



            <div class="mb-3">
           <label for="price" class="form-label ">Giá thành </label>
            <input type="text" class="form-control"  id="price"  name="price" required>
             </div>
            <button type="submit" class="btn btn-success">Thêm sản phẩm </button>
              <a href="index.php" class="btn btn-secondary" >Hủy</a>
        </form>
    </div>
</main>

<?php include  'footer.php'; ?>
