<?php 

require 'connect.php';

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id =  $_GET['id'];
    

        $sql = "INSERT INTO cart (p_id )
        VALUES ('$id' )";

        if (mysqli_query($conn, $sql)) {
            header('Location: index.php?success=1');
        } else {
            header('Location: index.php?error=1');
        }

    }else {
        header('Location: index.php?error=2');
    }

?>