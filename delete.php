<?php 

require 'connect.php';

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id =  $_GET['id'];
    $sql = "delete from products where id='$id'";
    $result = mysqli_query($conn, $sql);
    header("Location: admin.php?succes=1");
}

else {
    header("Location: admin.php?error=1");
}

?>