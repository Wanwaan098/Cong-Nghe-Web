
<?php
echo "ID: " . $_GET['id'];  // Kiểm tra giá trị id nhận được
include('data.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Xóa hoa khỏi mảng
    unset($flowers[$id]);

    // Cập nhật lại danh sách hoa vào data.php
    file_put_contents('data.php', '<?php $flowers = ' . var_export($flowers, true) . '; ?>');

    // Chuyển hướng về trang danh sách hoa
    header('Location: admin.php');
    exit();
}
?>
