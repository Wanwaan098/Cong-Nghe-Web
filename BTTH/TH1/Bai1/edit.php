<?php
include('data.php'); 
$id = $_GET['id'];  
$flower = $flowers[$id];
if  ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];

    $description = $_POST  ['description'];
    if ($_FILES ["image"]["error"]  == 0) {
        // Xoa 
        if (file_exists($flower['image'])) {
            unlink($flower['image']);


        }
        $target_dir= "images/";  

        $target_file =  $target_dir . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $flower ['image'] = $target_file;  

        } else {
            echo  "Lỗi khi tải ảnh lên";
            exit;
        }
    }
    $flowers[$id] ['name'] = $name;
    $flowers[$id]['description'] = $description;


    $flowers[$id] ['image'] = $flower['image'];

    file_put_contents ('data.php', '<?php $flowers = ' . var_export ($flowers, true) . '; ?>');
    header ('Location: admin.php');  
    exit();
}
?>
<!DOCTYPE html>
<html lang ="en">
<head>
    <meta charset= "UTF-8">
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Hoa</title>


    <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class= "container">

    <h1 class="text-center mt-4">Sửa Hoa</h1>

     <form action="edit.php?id=<?php echo $id; ?>" 
     method="POST" enctype="multipart/form-data">
        <div class="mb-3">

            <label for="name" class="form-label">Tên Hoa</label>

            <input type="text" name="name" id="name" class="form-control" value="<?php echo $flower['name']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô Tả</label>
            <textarea name="description" id="description" class="form-control" rows="3" required><?php echo $flower['description']; ?></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class ="form-label">Hình Ảnh</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
            
            <!-- hien thi anh ht-->
            <img src="<?php echo $flower['image']; ?>" alt="<?php echo $flower['name'] ; ?>
            " style="width: 100px; margin-top: 10px;">
            
        </div>

        <button type="submit" class="btn btn-primary">Cập Nhập </button>
    </form>
</div>
</body>
</html>
