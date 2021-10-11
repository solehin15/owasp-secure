<?php
    /* Including header */
    include '_header.php';

    $cartReceipt=$_GET['cartReceipt'];

    /* Login */
    print('
        <main>
            <div class="container">
                <div class="center">
                    <div class="card">
                        <form action="action/purchase-upload-action.php" method="post" enctype="multipart/form-data">
                        ');
                    
                        if(isset($_SESSION['error-message'])){
                            if($_SESSION['error-message']!=''){
                                print ('<div class="error-message">'.$_SESSION['error-message'].'</div>');
                                $_SESSION['error-message']='';
                            }
                        }
                        if(isset($_SESSION['success-message'])){
                            if($_SESSION['success-message']!=''){
                                print ('<div class="success-message">'.$_SESSION['success-message'].'</div>');
                                $_SESSION['success-message']='';
                            }
                        }
                    
                        print('
                            <h2>Upload</h2>
                            <label>Upload Receipt:</label><br>
                            <input type="file" name="fileToUpload" required><br>
                            <button name="cartReceipt" value="'.$cartReceipt.'">Upload</button><br><br>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    ');

    /* Include footer */
    include '_footer.php';
?>


