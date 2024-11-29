<?php
include('db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image_name = basename($_FILES['image']['name']); 
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_path = $image_name; 

  
        if (move_uploaded_file($image_tmp, $image_path)) {
          
            $sql = "INSERT INTO flowers (name, description, image) VALUES ('$name', '$description', '$image_path')";
            if ($conn->query($sql) === TRUE) {
                header('Location: admin.php');
                exit();
            } else {
                echo "Lỗi: " . $conn->error;
            }
        } else {
            echo "Không thể tải ảnh lên.";
        }
    } else {
        $image_path = ''; 
        echo "Không có ảnh được chọn hoặc ảnh không hợp lệ.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Hoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Thêm Loài Hoa Mới</h1>
    <form action="add.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Tên Hoa</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô Tả</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Hình Ảnh</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Thêm Hoa</button>
        <a href="admin.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
</body>
</html>
