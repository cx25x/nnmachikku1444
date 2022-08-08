<?php 

require 'connect.php';

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id =  $_GET['id'];
    $sql = "select * from products where id='$id'";
    $result = mysqli_query($conn, $sql);
}else {
    header("Location: AdminViewAllProduct.php?error=1");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div class="sideNave">
        <div class="sidenavBtn">
            <button style="border:1px solid;" class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="green" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
        </div>
        <div class="offcanvas offcanvas-start bg-dark text-white sidebar-nav" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <button style="border:1px solid; font-size:20px; background: transparent;border-radius: 5px;" type="button" class="ms-auto text-white p-2 closeNavBtn" data-bs-dismiss="offcanvas" aria-label="Close">X</button>
            </div>
            <div class="offcanvas-body">
                <nav class="navbark-dark">
                    <ul class="navbar-nav">
                        <li>
                            <div class="text-muted small fw-bold text-uppercase px-3">product</div>
                        </li>
                        <hr>

                        <li>
                            <a href="AdminViewAllProduct.php" class="nav-link px-3 ">
                                <span class="me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                    </svg>
                                </span>
                                <span>view all product</span>
                            </a>
                        </li>

                        <li>
                            <a href="AdminAddProduct.php" class="nav-link px-3 ">
                                <span class="me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                    </svg>
                                </span>
                                <span>add product</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <main class="p-3 mt-5">
        <div class="container-fluid">
        
        <?php
            if (isset($_GET['error'])) {
            ?>
                <span class="alert alert-danger ">
                    <?php
                    if ($_GET['error'] == '1') {
                        echo 'Error Connection';
                    } else if($_GET['error'] == '2'){
                        echo 'Image not loaded';
                    } else{
                        echo 'Check your data';
                    }
                    ?>
                </span>
            <?php
            } else if (isset($_GET['success'])) {
            ?>
                <span class="alert alert-success ">
                    <?php echo "Product updated successfully"; ?>
                </span>
            <?php
            }
            ?>

        <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
            <div class="image-container">
                    <img style="width:100%; height: 100%;" src="uploads/<?php echo $rows['image'] ?>" alt="">
                </div>
            <form action="editProduct.php" method="POST" enctype="multipart/form-data">
                <div class="form-group m-2 p-2">
                    <label class="mx-2 py-2" for="image">update image</label>
                    <input type="file" class="form-control" name="image">
                </div>

                <div class="form-group m-2 p-2">
                    <label class="mx-2  p-2" for="product-name">product name</label>
                    <input type="text" class="form-control" name="name" placeholder="product name" value="<?php echo $rows['name'] ?>">
                </div>



                <div class="form-group m-2 p-2">
                    <label class="mx-2  p-2" for="product-rate">product rate</label>





                    <select class="form-select" name="rate" >
                        <?php 
                        if($rows['rate']=="1"){
                        ?>
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <?php }else if($rows['rate']=="2") { ?>
                        <option value="1" >1</option>
                        <option value="2" selected>2</option>
                        <option value="3">3</option> 
                        <option value="4">4</option>
                        <option value="5">5</option>     

 
                        <?php }else if($rows['rate']=="3") { ?>
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3"selected>3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>



                        <?php }else if($rows['rate']=="4") { ?>
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" selected>4</option>
                        <option value="5">5</option>

                        
                        <?php }else if($rows['rate']=="5") { ?>
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                        <option value="5" selected>5</option>

                        <?php } ?>
                    </select>

















                </div>

                <div class="form-group m-2 p-2">
                    <label class="mx-2  p-2" for="product_description">product description</label>
                    <input type="text" class="form-control" name="description" placeholder="product description" value="<?php echo $rows['description'] ?>">
                </div>

                <div class="form-group m-2 p-2">
                    <label class="mx-2  p-2" for="product-price">product price</label>
                    <input type="number" class="form-control" name="price" placeholder="product price" value="<?php echo $rows['price']?>" >
                </div>

                <div class="form-group m-2 p-2">
                    <label class="mx-2  p-2" for="price discount">price discount</label>
                    <input type="number" class="form-control" name="discount" placeholder="price discount" value="<?php echo $rows['discount'] ?>">
                </div>

                <div class="form-group m-2 p-2">
                    <label class="mx-2  p-2 radio-inline" for="Category">Category</label>
                    <select name="category" >
                        <?php 
                        if($rows['category']=="man"){
                        ?>
                        <option value="man" selected>man</option>
                        <option value="women">women</option>
                        <option value="bags">bags</option>
                        <option value="shoes">shoes</option>
                        <?php }else if($rows['category']=="women") { ?>
                            <option value="man" >man</option>
                        <option value="women" selected>women</option> 
                        <option value="bags">bags</option>
                        <option value="shoes">shoes</option>      

 
                        <?php }else if($rows['category']=="bags") { ?>
                            <option value="man" >man</option>
                        <option value="women" >women</option>
                        <option value="bags"selected>bags</option>
                        <option value="shoes">shoes</option>


                        <?php }else if($rows['category']=="shoes") { ?>
                            <option value="man" >man</option>
                        <option value="women" >women</option>
                        <option value="bags">bags</option>
                        <option value="shoes"selected>shoes</option>

                        <?php } ?>
                    </select>
                </div>
                
                <input name="id" type="number" style="display:none ;" value="<?php echo $rows['id'] ?>" />

                <button class="m-2 btn btn-success" type="submit" value="submit">Edit project</button>
            </form>
            <?php } ?>
        </div>
    </main>
</body>

</html>