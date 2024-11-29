<?php
include('db.php');
$id = $_GET['id'];
$sql = "SELECT image FROM flowers WHERE id = '$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $image_path = $row['image'];

    if (file_exists($image_path)) {
        unlink($image_path);
    }
    $delete_sql = "DELETE FROM flowers WHERE id = '$id'";
    if ($conn->query($delete_sql) === TRUE) {
        header('Location: admin.php');
        exit();
    } else {
        echo "Lỗi khi xóa bản ghi: " . $conn->error;
    }
} else {
    echo "Không tìm thấy bản ghi với ID: $id";
}
?>
