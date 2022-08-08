<?php
require 'connect.php';
if(isset($_GET['cat'])){

        $sql = "select * from products where category = '$_GET[cat]'";
    
}else{

    $sql = "select * from products";
}
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="main.css">
        <!-- font awesome -->
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
            <!-- bootstrap -->
    <!-- CSS only -->
    <link rel="stylesheet" href="bootstrap.min.css" />

    </head>
    <body class="mt-4">
<!-- start navbar section -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top"  style="background-color: #dee2e6 !important;">
    <div class="container-fluid">
    <span class="navbar-brand"><img style="width:100px;" src="images/logo.jpg" alt=""></span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">index</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?cat=man">man</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?cat=women">women</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?cat=shoes">shoes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?cat=bage">bags</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>
      <a href="cartPage.php">
                <div class="cart">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                </div>
            </a>
      <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>
<!-- end navbar section -->




        <div class = "products">
            
            <div class = "container">
                <?php
            if (isset($_GET['error'])) {
                
            ?>
            <div class="text-center">
                <span class="alert alert-danger ">
                    <?php
                    if($_GET['error']==1){
                   echo 'Error connection';
                    }else{
                        echo 'product not found';
                    }
                  
                    ?>
                </span>
            </div>
            <?php
            } else if (isset($_GET['success'])) {
            ?>
            <div class="text-center">
                <span class="alert alert-success ">
                    <?php echo "product added successfully"; ?>
                </span>
            </div>
            <?php
            }
            ?>
                <h1 class = "lg-title">Special Shoes With Offers</h1>
                <p class = "text-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur quos sit consectetur, ipsa voluptatem vitae necessitatibus dicta veniam, optio, possimus assumenda laudantium. Temporibus, quis cum.</p>

                <div class = "product-items">
                    <!-- single product -->
                    <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>

                    <div class = "product">
                        <div class = "product-content">
                            <div class = "product-img">
                                <img src="uploads/<?php echo $rows['image'] ?>" alt = "product image">
                            </div>
                            <div class = "product-btns">
                                <a href="addToCart.php?id=<?php echo $rows['id'] ?>"  class = "btn-cart"> add to cart
                                    <span><i class = "fas fa-plus"></i></span>
                </a>
                                <button type = "button" class = "btn-buy"> buy now
                                    <span><i class = "fas fa-shopping-cart"></i></span>
                                </button>
                            </div>
                        </div>

                        <div class = "product-info">
                            <div class = "product-info-top">
                                <h2 class = "sm-title"><?php echo $rows['name'] ?></h2>
                                <div class = "rating">
                                    <?php for($i=0;$i<$rows['rate'];$i++) { ?>
                                    <span><i class = "fas fa-star"></i></span>
                                    <?php } ?>

                                </div>
                            </div>
                            <a href = "#" class = "product-name"><?php echo $rows['description'] ?></a>
                            <p class = "product-price">$<?php echo $rows['price'] ?></p>
                            <p class = "product-price">$<?php echo ($rows['price'] - ($rows['price'] * $rows['discount'])/100) ?></p>
                        </div>

                        <div class = "off-info">
                            <h2 class = "sm-title"><?php echo $rows['discount'] ?>% off</h2>
                        </div>
                    </div>
                    <?php 
                }
        ?>
                    <!-- end of single product -->
                </div>
            </div>
        </div>

        <div class = "product-collection">
            <div class = "container">
                <div class = "product-collection-wrapper">
                    <!-- product col left -->
                    <div class = "product-col-left flex">
                        <div class = "product-col-content">
                            <h2 class="sm-title">Women's Shoes </h2>
                            <h2 class="md-title">Women's collection </h2>
                            <p class="text-light">Looking to update your shoedrobe? You've come to the right place. Find the freshest new treads from your favourite high street brands all under one roof. Whether you prefer your shoes on the casual side or you have a collection of heels to go with just about every outfit, the right shoes can take any outfit to a whole new level of style.</p>
                            <a href="index.php?cat=shoes">
                                <button type="button" class="btn-dark">Shop now</button>
                            </a>
                        </div>
                    </div>

                    <!-- product col right -->
                    <div class = "product-col-right">
                        <div class = "product-col-r-top flex">
                            <div class = "product-col-content">
                                <h2 class="sm-title">women's dresses </h2>
                                <h2 class="md-title">women's collection </h2>
                                <p class="text-light">Whether you're looking for Mini, Midi or Maxi dress, casual dress or formal dress, or even a party dress from top brands like: Mango or Miss Selfridge, you can find it all on Namshi's women dresses collection.</p>
                                <a href="index.php?cat=women">
                                    <button type="button" class="btn-dark">Shop now</button>
                                </a>
                            </div>
                        </div>

                        <div class = "product-col-r-bottom">
                            <!-- left -->
                            <div class = "flex">
                                <div class = "product-col-content">
                                    <h2 class="sm-title">Boy's clothes</h2>
                                    <h2 class="md-title">Boy's new product </h2>
                                    <p class="text-light">Boy's new product clothes</p>
                                    <a href="index.php?cat=man">
                                        <button type="button" class="btn-dark">Shop now</button>
                                    </a>
                                </div>
                            </div>
                            <!-- right -->
                            <div class = "flex">
                                <div class = "product-col-content">
                                    <h2 class="md-title">bags</h2>
                                    <p class="text-light">They say give a girl the right shoes and she can conquer the world, well thanks to our new shoe selection, you can. Whether you’re in need of an ankle boot, gym friendly trainer or a blister free pair of heels, we’ve got it.</p>
                                    <a href="index.php?cat=bags">
                                        <button type="button" class="btn-dark">Shop now</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>