<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM flowers WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $flower = $result->fetch_assoc();
    } else {
        echo "Không tìm thấy loài hoa.";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Xử lý ảnh mới (nếu có)
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image_name = basename($_FILES['image']['name']);
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_path = $image_name;

        // Di chuyển ảnh mới vào thư mục
        move_uploaded_file($image_tmp, $image_path);

        // Truy vấn cập nhật có hình ảnh
        $sql = "UPDATE flowers SET name = '$name', description = '$description', image = '$image_path' WHERE id = $id";
    } else {
        // Truy vấn cập nhật không có hình ảnh
        $sql = "UPDATE flowers SET name = '$name', description = '$description' WHERE id = $id";
    }

    if ($conn->query($sql) === TRUE) {
        header('Location: admin.php');
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa Hoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Chỉnh Sửa Loài Hoa</h1>
    <form action="edit.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $flower['id'] ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Tên Hoa</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $flower['name'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô Tả</label>
            <textarea class="form-control" id="description" name="description" required><?= $flower['description'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Hình Ảnh</label>
            <input type="file" class="form-control" id="image" name="image">
            <img src="<?= $flower['image'] ?>" alt="<?= $flower['name'] ?>" style="width: 150px; margin-top: 10px;">
        </div>
        <button type="submit" class="btn btn-primary">Cập Nhật</button>
        <a href="admin.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
</body>
</html>
