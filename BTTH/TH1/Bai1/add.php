
<?php
include('data.php');  

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    $name = $_POST['name'];
    $description = $_POST['description'];


    $target_dir = "images/"; 
    
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    
    
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      
        $flowers[] = [
            'name' => $name,
            'description' => $description,


            'image' => $target_file 
        ];

   
        file_put_contents('data.php', '<?php $flowers = ' . var_export($flowers, true) . '; ?>');
        
      
        header('Location: admin.php');
        exit();  
    } else {
        echo "Lỗi khi tải ảnh lên.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Hoa Mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="text-center mt-4">Thêm Hoa Mới</h1>
    <form action="add.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">

            <label for="name" class="form-label">Tên Hoa</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô Tả</label>
            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
      
      
      
          </div>
        <div class="mb-3">
            <label for="image" class="form-label">Hình Ảnh</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-success">Thêm Hoa</button>
    </form>
</div>
</body>
</html>