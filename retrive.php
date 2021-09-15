<?php
    /* Including header */
    include '_header.php';

    
    if(!isset($_GET['forgot']) || $_GET['forgot']==''){
        $_SESSION['error-message']='Link does not exist.';
        header('location: forgot.php');
        exit();
    }

    $forgot=$_GET['forgot'];
    $sql="SELECT * FROM users WHERE userForgot='$forgot'";
    $result=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($result);
    if($count==0){
        $_SESSION['error-message']='Link has expired.';
        header('location: forgot.php');
        exit();
    }


    /* Edit password */
    print('
        <main>
            <div class="container">
                <div class="center">
                    <div class="card">
                        <form action="action/retrive-action.php" method="post">
                            <h2>New Password</h2>
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
                            <label>New Password:</label><br>
                            <input type="password" name="NewPassword" placeholder="New password" required><br>
                            <label>Confirm New Password:</label><br>
                            <input type="password" name="ConfirmPassword" placeholder="Confirm New password" required><br>
                            <button name="forgot" value="'.$_GET['forgot'].'">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    ');

    /* Include footer */
    include '_footer.php';
?>


