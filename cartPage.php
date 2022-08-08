<?php
require 'connect.php';

$sql = "select * from cart";
$result = mysqli_query($conn, $sql);
$price = 0;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">

</head>
<body style="background-color:#f8f9fa;">
    <div class="container my-4">
    <?php
            if (isset($_GET['error'])) {
                
            ?>
                <span class="alert alert-danger ">
                    <?php
                   echo 'product not found';
                    ?>
                </span>
            <?php
            } else if (isset($_GET['success'])) {
            ?>
                <span class="alert alert-success ">
                    <?php echo "product deleted successfully"; ?>
                </span>
            <?php
            }
            ?>



<div class="text-end">
        <a href="index.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
</svg>
        </a>
        </div>

    <table class="table my-4">
        
    <?php
           if (isset($_GET['succes'])) {
            ?>
            <div class="text-center">
                <span class="alert alert-success">
                    <?php echo " thank you for buying our products"; ?>
                </span>
                </div>
            <?php
            }
            ?>
  <thead style="background-color:#40c9a2;">
      <tr>
      <th scope="col">image</th>
      <th scope="col">name</th>
      <th scope="col">price</th>
      <th scope="col" class="d-flex justify-content-end">Action</th>
    </tr>
</thead>

    <?php
                // LOOP TILL END OF DATA
                while($res=$result->fetch_assoc())
                {
                    $sql = "select * from products where id = '$res[p_id]'";
                    $product = mysqli_query($conn, $sql);
                    while($rows=$product->fetch_assoc())
                {
                    $price += $rows['price'] ;
            ?>


        <tr>
            <td ><img style="width: 50px; height:50px;" src="uploads/<?php echo $rows['image'] ?>" alt=""></td>
            <td class="py-3"><?php echo $rows['name'] ?></td>
            <td class="py-3">$<?php echo $rows['price'] ?></td>
            <td class="py-3 d-flex justify-content-end"><a href="del.php?id=<?php echo $rows['id'] ?>" type="button" class="btn btn-danger">X</a></td>
        </tr>
        <?php 
                }
            }
        ?>
        </table>
            


        <div class="d-flex justify-content-between mt-0" style="border-top:1px dashed ;">
            <span class="py-3 fo"><h2 style="color:green;">total price</h2></span>
            <span colspan="2" class="py-3"><h2 style="color:green;">$ <?php echo $price ?></h2></span>
            <span class="py-3">
                <a href="buy.php" class="btn btn-success">Buy</a>
            </span>
            
        </div>
     
</div>
</body>
</html>