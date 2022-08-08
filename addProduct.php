<?php 

require 'connect.php';

if(isset($_POST['name']) && !empty($_POST['name'])){
    $name =  $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $rate = $_POST['rate'];
    $discount = $_POST['discount'];
    $cat = $_POST['category'];

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "./uploads/" . $filename;
    // //Check if image file is a actual image or fake image
    if (move_uploaded_file($tempname, $folder)){ 
        $sql = "INSERT INTO products (image , name , price , description , rate , discount , category)
        VALUES ('$filename' , '$name' , '$price' , '$desc' , '$rate' , '$discount' , '$cat')";

        if (mysqli_query($conn, $sql)) {
            header('Location: AdminAddProduct.php?success=1');
        } else {
            header('Location: AdminAddProduct.php?error=3');
        }
    }
    else {
        header("Location: AdminAddProduct.php?error=1");
    }
    
}
else {
    header("Location: AdminAddProduct.php?error=2");
}

?>