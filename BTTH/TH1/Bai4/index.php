<?php 
include('db.php'); // Kết nối CSDL
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách hoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="text-center mt-4">Danh sách các loài hoa</h1>
    <div class="row">
        <?php
        $sql = "SELECT * FROM flowers"; 
        $result = $conn->query($sql); 
        if ($result->num_rows > 0) {
            while ($flower = $result->fetch_assoc()) {
                echo "<div class='col-md-3'>
                    <div class='card mb-4'>
                        <img src='" . $flower['image'] . "' class='card-img-top' alt='" . $flower['name'] . "'>
                        <div class='card-body'>
                            <h5 class='card-title'>" . $flower['name'] . "</h5>
                            <p class='card-text'>" . $flower['description'] . "</p>
                        </div>
                    </div>
                </div>";
            }
        } else {
            echo "<p class='text-center'>Không có dữ liệu</p>";
        }
        ?>
    </div>
</div>
</body>
</html>
