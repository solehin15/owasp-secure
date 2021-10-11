<?php
    /* Including header */
    include '_header.php';

    if(isset($_GET['cartStatus'])){$cartStatus=$_GET['cartStatus'];}
    else{$cartStatus='confirmed';}

    /* Home */
    print('
        <main>
            <div class="container">
                <div class="product">
                    <h1>Purchase ('.$cartStatus.')</h1>

                    <div class="purchase-tag">
                        <a href="?cartStatus=confirmed">Confirmed</a>
                        <a href="?cartStatus=pending">Pending</a>
                        <a href="?cartStatus=shipped">Shipped</a>
                        <a href="?cartStatus=completed">Completed</a>
                        <a href="?cartStatus=cancelled">Cancelled</a>
                    </div>
    ');
        $userId=$_SESSION['userId'];


        $sql="SELECT DISTINCT cartReceipt FROM carts WHERE cartUserId='$userId' AND cartStatus='$cartStatus' ORDER BY cartDate DESC";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            print('
                <table class="table-product">
                    <tr>
                        <th>
                            No.
                        </th>
                        <th>
                            Image
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Quantity
                        </th>
                        <th>
                            Amount
                        </th>
                    </tr>');
                    $cartReceipt=$row['cartReceipt'];

                    $sqlList="SELECT * FROM carts WHERE cartReceipt='$cartReceipt'";
                    $resultList=mysqli_query($conn,$sqlList);
                    $count=1;
                    $totalAmout=0;
                    while($rowList=mysqli_fetch_assoc($resultList)){
                        $productId=$rowList['cartProductId'];
                        
                        $sqlProduct="SELECT * FROM products WHERE productId='$productId'";
                        $resultProduct=mysqli_query($conn,$sqlProduct);
                        $rowProduct=mysqli_fetch_assoc($resultProduct);

                        if($rowProduct['productImage']!=''){$productImage=$rowProduct['productImage'];}else{$productImage='no-image.jpg';}
                        $productName=$rowProduct['productName'];
                        $productQuantity=$rowList['cartProductQuantity'];
                        $productPrice=$rowProduct['productPrice'];
                        $productAmount=$productPrice*$productQuantity;
                        $totalAmout=$totalAmout+$productAmount;

                        print('
                            <tr>
                                <td style="width: 5%;">'.$count++.'.</td>
                                <td style="width: 10%;"><img src="img/'.$productImage.'"></td>
                                <td style="width: 50%;">'.$productName.'</td>
                                <td style="width: 5%;">'.$productQuantity.'</td>
                                <td style="width: 30%; text-align: right;">RM'.number_format($productPrice,2).'</td>

                            </tr>
                        
                        ');
                    }

                
            if($cartStatus!='cancelled'){
                

            print('
                    <tr>
                        <td colspan="4" style="text-align: right;">Total :</td>
                        <td style="text-align: right;">RM'.number_format($totalAmout,2).'</td>
                    </tr>        
            ');

                    if($cartStatus=='confirmed'){
                        print('<tr><td colspan="4"></td><td style="text-align: right;"><a style="background: red;" href="action/purchase-cancel-action.php?cartReceipt='.$cartReceipt.'">Cancel</a><a href="purchase-upload.php?cartReceipt='.$cartReceipt.'">Upload Receipt</a></td></tr>');
                    }elseif($cartStatus=='pending'){
                        print('<tr><td colspan="4"></td><td style="text-align: right;"><a style="background: red;" href="action/purchase-cancel-action.php?cartReceipt='.$cartReceipt.'">Cancel</a><a href="purchase-update.php?cartReceipt='.$cartReceipt.'">Update Receipt</a></td></tr>');
                    }elseif($cartStatus=='shipped'){
                        print('<tr><td colspan="4"></td><td style="text-align: right;"><a href="action/purchase-received-action.php?cartReceipt='.$cartReceipt.'">Received Order</a></td></tr>');
                    }
                
                    
            }

            print('


                </table>
            ');
        }


        print('


                </div>
            </div>
        </main>
    ');

    /* Include footer */
    include '_footer.php';
?>



