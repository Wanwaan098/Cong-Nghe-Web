<?php

$servername = "localhost";
$username = "root";
$password  = ""; 
$database  = "ProductDB";



 $conn =  new mysqli($servername, $username, $password, $database);


// Ktra knoi
if  ($conn->connect_error) {
      die( "Kết nối thất bại: " . $conn->connect_error);
}


  $sql = "SELECT id, name, price FROM products";
$result = $conn->query($sql);

// Ktr kqua
if ($result)  {
     $products = $result->fetch_all(MYSQLI_ASSOC); } else {
     
      echo "Lỗi truy vấn: " . $conn->error;
}

?>
