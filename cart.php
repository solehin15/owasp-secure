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
                            
                            ');
                            if(isset($_SESSION['userId'])){print('<th>Option</th>');}
    print('
                        </tr>
    ');

    $userId=$_SESSION['userId'];

    $sql="SELECT * FROM carts WHERE cartUserId='$userId' ORDER BY cartId DESC";


    
    $count=1;


    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){

        $productId=$row['cartProductId'];
        $productQuantity=$row['cartProductQuantity'];
        $sql_product="SELECT * FROM products WHERE productId='$productId'";
        $result_product=mysqli_query($conn,$sql_product);
        $row_product=mysqli_fetch_assoc($result_product);
        if($row_product['productImage']!=''){$productImage=$row_product['productImage'];}else{$productImage='no-image.jpg';}
        $productName=$row_product['productName'];
        $productPrice=$row_product['productPrice'];
        $productAmount=number_format($productQuantity*$productPrice,2);


        print('
            <tr>
                <td>'.$count++.'.</td>
                <td><img src="img/'.$productImage.'"></td>
                <td>'.$productName.'</td>
                <td><a href=""> - </a>'.$productQuantity.'<a href=""> + </a></td>
                <td>RM'.$productAmount.'</td>');
                if(isset($_SESSION['userId'])){print('<td><a href="action/product-addtocart-action.php?productId='.$productId.'">Add to Cart</a></td>');}
                print('
            </tr>
        ');
    }



print('
                    </table>

                </div>
            </div>
        </main>
    ');

    /* Include footer */
    include '_footer.php';
?>



