<?php 

require 'connect.php';

$sql = "delete from cart";
$result = mysqli_query($conn, $sql);
header("Location: cartPage.php?succes=1");

?>