<?php

include 'conn.php';

$cartReceipt=$_POST['cartReceipt'];

echo $cartReceipt;

$sql="SELECT * FROM carts WHERE cartReceipt='$cartReceipt'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$cartAttachment=$row['cartAttachment'];
unlink($cartAttachment);

$sql="UPDATE carts SET cartAttachment='' WHERE cartReceipt='$cartReceipt'";
$result=mysqli_query($conn,$sql);

$target_dir = "../attachment/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    $_SESSION['error-message']='File is not an image.';
    header('location: ../purchase-upload.php');
    exit();

  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"   && $imageFileType != "pdf" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $_SESSION['error-message']='Sorry, your file was not uploaded.';
  header('location: ../purchase-upload.php?cartReceipt='.$cartReceipt);
  exit();
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$cartReceipt.'.'.$imageFileType)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    $cartAttachment=$target_dir.$cartReceipt.'.'.$imageFileType;
    $sql="UPDATE carts SET cartAttachment='$cartAttachment' WHERE cartReceipt='$cartReceipt'";
    $result=mysqli_query($conn,$sql);
    header('location: ../purchase.php?cartStatus=pending');
    exit();


  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>