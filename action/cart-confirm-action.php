<?php

include 'conn.php';

$cartUserId=$_SESSION['userId'];
$cartReceipt=uniqid();
$cartDate=date('Y-m-d');

$sql="UPDATE carts SET cartStatus='confirmed', cartReceipt='$cartReceipt', cartDate='$cartDate' WHERE cartUserId='$cartUserId' AND cartStatus='cart'";

$result=mysqli_query($conn,$sql);

header('location: ../purchase.php');
exit();
    
    