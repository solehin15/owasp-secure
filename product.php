<?php
    /* Including header */
    include '_header.php';

    /* Display Welcome Message Once */
    if(isset($_SESSION['welcome'])){
        if($_SESSION['welcome']==true){
            $userId=$_SESSION['userId'];
            $sql="SELECT * FROM users WHERE userId='$userId'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            $userName=$row['userName'];
            print('<div class="welcome-container"><div class="welcome">Welcome back, '.$userName.'!</div></div>');
            $_SESSION['welcome']=false;
        }
    }



    /* Home */
    print('
        <main>
            <div class="container">
                <div class="product">
                    <h1>Product</h1>

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
                                Description
                            </th>
                            <th>
                                Quantity
                            </th>
                            <th>
                                Price
                            </th>');
                            if(isset($_SESSION['userId'])){print('<th>Option</th>');}
    print('
                        </tr>
    ');
    $count=1;

    if(isset($_GET['search'])){
        $sql="SELECT * FROM products WHERE productCategories LIKE '%$search%' OR productName LIKE '%$search%' ORDER BY productName ASC";
    }else{
        $sql="SELECT * FROM products ORDER BY productName ASC";
    }

    


    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){

        /* Id */
        $productId=$row['productId'];
        /* Image */
        if($row['productImage']!=''){$productImage=$row['productImage'];}else{$productImage='no-image.jpg';}
        /* Name */
        $productName=$row['productName'];
        /* Description */
        $productDescription=$row['productDescription'];    
        /* Quantity */
        $productQuantity=$row['productQuantity'];
        /* Price */
        $productPrice=$row['productPrice'];        


        print('
            <tr>
                <td>'.$count++.'.</td>
                <td><img src="img/'.$productImage.'"></td>
                <td>'.$productName.'</td>
                <td>'.$productDescription.'</td>
                <td>'.$productQuantity.'</td>
                <td>RM '.$productPrice.'</td>');
                if(isset($_SESSION['userId'])){print('<td><a href="action/product-addtocart-action.php?productId='.$productId.'">Buy</a></td>');}
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



