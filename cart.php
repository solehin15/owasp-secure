<?php
    /* Including header */
    include '_header.php';

    /* Home */
    print('
        <main>
            <div class="container">
                <div class="product">
                    <h1>Cart</h1>

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
                        </tr>
    ');

    $userId=$_SESSION['userId'];

    $sql="SELECT * FROM carts WHERE cartUserId='$userId' AND cartStatus='cart' ORDER BY cartId DESC";

    $count=1;

    $result=mysqli_query($conn,$sql);
    $totalAmout=0;
    while($row=mysqli_fetch_assoc($result)){

        $productId=$row['cartProductId'];
        $productQuantity=$row['cartProductQuantity'];
        $sql_product="SELECT * FROM products WHERE productId='$productId'";
        $result_product=mysqli_query($conn,$sql_product);
        $row_product=mysqli_fetch_assoc($result_product);
        if($row_product['productImage']!=''){$productImage=$row_product['productImage'];}else{$productImage='no-image.jpg';}
        $productName=$row_product['productName'];
        $productPrice=$row_product['productPrice'];
        $productAmount=$productQuantity*$productPrice;

        $totalAmout=$totalAmout+$productAmount;

        print('
            <tr>
                <td style="width: 5%;">'.$count++.'.</td>
                <td style="width: 10%;"><img src="img/'.$productImage.'"></td>
                <td style="width: 50%;">'.$productName.'</td>
                <td style="width: 5%;"><a href="action/cart-remove-action.php?productId='.$productId.'"> - </a>'.$productQuantity.'<a href="action/cart-add-action.php?productId='.$productId.'"> + </a></td>
                <td style="width: 5%; text-align: right;">RM'.number_format($productAmount,2).'</td>
            </tr>
        ');
    }





print('
                        <tr>
                            <td colspan="4" style="text-align: right;">Total :</td>
                            <td>RM'.number_format($totalAmout,2).'</td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td><a href="action/cart-confirm-action.php">Confirm</a></td>
                        </tr>

                    </table>

                    


                </div>
            </div>
        </main>
    ');

    /* Include footer */
    include '_footer.php';
?>



