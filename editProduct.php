<?php 

require 'connect.php';

if(isset($_POST['name']) && !empty($_POST['name'])){
    $name =  $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $rate = $_POST['rate'];
    $discount = $_POST['discount'];
    $cat = $_POST['category'];
    $id = $_POST['id'];



    if(isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"])){

        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "./uploads/" . $filename;
        // //Check if image file is a actual image or fake image
        if (move_uploaded_file($tempname, $folder)){ 
            $sql = "UPDATE products SET image = '$filename' , name = '$name' , price = '$price' , description = '$desc' , rate = '$rate' , discount =  '$discount' , category = '$cat'
            WHERE id = '$id'";
            if (mysqli_query($conn, $sql)) {
                header('Location: admin.php?success=2');
                
            } else {
                header('Location: edit.php?id=$id&error=1');
               
            }
        }
    } else {
        $sql = "UPDATE products SET name = '$name' , price = '$price' , description = '$desc' , rate = '$rate' , discount =  '$discount' , category = '$cat'
            WHERE id = '$id'";
            if (mysqli_query($conn, $sql)) {

                header('Location: admin.php?success=2');
                
            } else {
                header('Location: edit.php?id=$id&error=1');
               
            }
    }
}
else {
    header("Location: edit.php?id=$id&error=3");
}

?>