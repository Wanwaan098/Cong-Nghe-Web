<?php
if (isset($_GET['index'])) {
    $index = (int)$_GET['index']; 

    include 'products.php';
    if (isset($products[$index])) {
        unset ($products[$index]);


        $data = '<?php $products = ' . var_export(array_values($products), true) . ';';
        file_put_contents('products.php', $data);
    }
}
header('Location: index.php');
exit();
