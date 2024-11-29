<?php
include('data.php');  // Giả sử bạn có một file data.php chứa mảng hoa

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Nhận dữ liệu từ biểu mẫu
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Xử lý ảnh tải lên
    $target_dir = "images/";  // Đường dẫn thư mục lưu ảnh (bạn có thể thay đổi tên thư mục ở đây)
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    
    // Kiểm tra nếu ảnh đã tải lên thành công
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // Thêm hoa vào mảng
        $flowers[] = [
            'name' => $name,
            'description' => $description,
            'image' => $target_file  // Đường dẫn tới ảnh đã tải lên
        ];

        // Lưu lại thông tin vào tệp data.php
        file_put_contents('data.php', '<?php $flowers = ' . var_export($flowers, true) . '; ?>');
        
        // Điều hướng lại về trang index.php (hoặc trang danh sách)
        header('Location: admin.php');
        exit();  // Đảm bảo dừng thực thi sau khi chuyển hướng
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
