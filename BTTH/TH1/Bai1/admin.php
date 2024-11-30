<?php include('data.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width
    =device-width, initial-scale=1.0">
    <title>Quản trị</title>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
  <body>


<div class="container">
     <h1 class="text-center mt-4">Danh sách các loài hoa</h1>

    <a href="add.php" class="btn btn-success mb-3">+ Thêm hoa mới</a>
    <table class="table table-hover">

    <thead class="table-light">
            <tr class="text-center">

                <th>STT</th>
                <th>Tên Hoa</th>
                <th>Mô Tả</th>
                <th>Hình Ảnh</th>
                <th>Tùy chọn</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($flowers as $index => $flower): ?>
            <tr>


                 <td class="text-center align-middle"><?php echo $index + 1; ?></td>
                <td class="align-middle"><?php echo $flower['name']; ?></td>
                  <td class="align-middle"><?php echo $flower['description']; ?></td>

            <td class="text-center align-middle">
                    <img src="<?php echo $flower['image']; ?>" alt="<?php echo $flower['name']; ?>"
                     style="width: 100px;">
                </td>
                  <td class="text-center align-middle">
                    <a href="edit.php?id=<?php echo $index; ?>" 
                    class="btn btn-sm btn-outline-primary">
                    
                     <i class="bi bi-pencil"></i>
                    </a>

                    
                    <a href="delete.php?id=<?php echo $index; ?>" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash"></i>

                    </a>
                </td>
            </tr>


            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>