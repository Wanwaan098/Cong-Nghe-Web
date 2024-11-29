<?php
include('data.php'); 

// Lấy ID hoa từ query string
$id = $_GET['id'];  
$flower = $flowers[$id];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy thông tin tên và mô tả từ form
    $name = $_POST['name'];
    $description = $_POST['description'];
    
    // Kiểm tra nếu có ảnh mới và tải lên
    if ($_FILES["image"]["error"] == 0) {
        // Xóa ảnh cũ nếu có
        if (file_exists($flower['image'])) {
            unlink($flower['image']);
        }

        // Đặt thư mục lưu ảnh mới
        $target_dir = "images/";  // Đảm bảo thư mục này tồn tại và có quyền ghi
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        // Di chuyển ảnh tải lên
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $flower['image'] = $target_file;  // Cập nhật đường dẫn ảnh
        } else {
            echo "Lỗi khi tải ảnh lên.";
            exit;
        }
    }

    // Cập nhật tên và mô tả
    $flowers[$id]['name'] = $name;
    $flowers[$id]['description'] = $description;

    // Nếu có ảnh mới, cập nhật lại ảnh
    $flowers[$id]['image'] = $flower['image'];

    // Lưu lại thông tin vào data.php
    file_put_contents('data.php', '<?php $flowers = ' . var_export($flowers, true) . '; ?>');
    
    // Chuyển hướng về trang quản trị sau khi cập nhật thành công
    header('Location: admin.php');  // Quay lại trang danh sách hoa
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Hoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="text-center mt-4">Sửa Hoa</h1>
    <form action="edit.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Tên Hoa</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo $flower['name']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô Tả</label>
            <textarea name="description" id="description" class="form-control" rows="3" required><?php echo $flower['description']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Hình Ảnh</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
            
            <!-- Hiển thị ảnh hiện tại nếu có -->
            <img src="<?php echo $flower['image']; ?>" alt="<?php echo $flower['name']; ?>" style="width: 100px; margin-top: 10px;">
        </div>
        <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </form>
</div>
</body>
</html>
