<?php

/* Connect to database */
include 'conn.php';

$productId=$_GET['productId'];
$userId=$_SESSION['userId'];

echo $productId;

echo '<br>userId:';

echo $userId;


$cartUserId=$_SESSION['userId'];
$cartProductId=$_GET['productId'];

$sql="SELECT * FROM products WHERE productId='$cartProductId'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$cartStatus='cart';

/* Check if product is currently in cart */
$sql="SELECT * FROM carts WHERE cartUserId='$cartUserId' AND cartProductId='$cartProductId' AND cartStatus='cart'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$cartProductQuantity=$row['cartProductQuantity'];
$count=mysqli_num_rows($result);
if($count!=0){
    $cartProductQuantity=$cartProductQuantity+1;
    $sql="UPDATE carts SET cartProductQuantity='$cartProductQuantity' WHERE cartUserId='$cartUserId' AND cartProductId='$cartProductId' AND cartStatus='cart'";
    $result=mysqli_query($conn,$sql);
}else{
    $cartProductQuantity=1;
    $sql="INSERT INTO carts (cartUserId, cartProductId, cartProductQuantity, cartStatus) VALUES ('$cartUserId', '$cartProductId', '$cartProductQuantity', '$cartStatus')";
    $result=mysqli_query($conn,$sql);
}




header('location: ../cart.php');


