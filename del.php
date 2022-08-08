<?php 

require 'connect.php';

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id =  $_GET['id'];
    $sql = "delete from cart where p_id='$id'";
    $result = mysqli_query($conn, $sql);
    echo $id;
    header("Location: cartPage.php?success=1");
}

else {
    header("Location: cartPage.php?error=1");
}

?>