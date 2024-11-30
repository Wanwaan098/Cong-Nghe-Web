
<?php
echo "ID: " . $_GET['id']; 
include('data.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // xoa
    unset($flowers[$id]);

    // cap nhap ds
     file_put_contents('data.php', '<?php $flowers = ' . var_export($flowers, true) . '; ?>');

    header('Location: admin.php');
    exit();
}
?>
