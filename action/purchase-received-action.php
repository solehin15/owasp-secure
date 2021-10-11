<?php

include 'conn.php';

$cartReceipt=$_GET['cartReceipt'];

$cartDate=date('Y-m-d');

$sql="UPDATE carts SET cartStatus='completed', cartDate='$cartDate' WHERE cartReceipt='$cartReceipt'";

$result=mysqli_query($conn,$sql);

header('location: ../purchase.php?cartStatus=completed');
exit();