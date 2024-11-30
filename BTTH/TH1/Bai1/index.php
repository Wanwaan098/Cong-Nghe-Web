<?php include('data.php'); ?>
<!DOCTYPE html>
<html lang= "en">
<head>

    <meta charset ="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách hoa</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    

<div class="container">
    <h1  class="text-center mt-4">Danh sách các loài hoa</h1>
    <div class ="row">


        <?php foreach ($flowers as $flower): ?>
        <div class="col-md-3">
            <div class ="card mb-4">
             <img src ="<?php echo  $flower['image']; ?>" class="card-img-top"
              alt="<?php echo $flower['name']; ?>">
                <div class="card-body">



                <h5 class="card-title"><?php echo $flower['name']; ?></h5>
                 <p class="card-text"><?php echo $flower['description']; ?></p>
                </div>
            </div>
        </div>


        <?php endforeach; ?>
    </div>
</div>
</body>

</html>
