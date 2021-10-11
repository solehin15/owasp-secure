<?php

/* Connect to database */
include 'conn.php';

$productId=$_GET['productId'];
$userId=$_SESSION['userId'];

$sql="SELECT * FROM carts WHERE cartUserId='$userId' AND cartProductId='$productId' AND cartStatus='cart'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$cartId=$row['cartId'];
$productQuantity=$row['cartProductQuantity']-1;

if($productQuantity<1){
    $sql="DELETE FROM carts WHERE cartId='$cartId'";
    $result=mysqli_query($conn,$sql);
}

$sql="UPDATE carts SET cartProductQuantity='$productQuantity' WHERE cartId='$cartId'";
$result=mysqli_query($conn,$sql);



header('location: ../cart.php');
exit();


