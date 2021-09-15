<?php
    /* Including header */
    include '_header.php';

    /* If user is not logged in, can't go to profile page */
    if(!isset($_SESSION['userId'])){
        $_SESSION['error-message']='You have to login first.';
        header('location: login.php');
        exit();
    }

    /* Get user information based on $_SESSION[`userId`] */
    $userId=$_SESSION['userId'];
    $sql="SELECT * FROM users WHERE userId='$userId'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $userName=$row['userName'];
    $userEmail=$row['userEmail'];
    $userPhone=$row['userPhone'];

    /* Profile */
    print('
        <main>
            <div class="container">
                <div class="center">
                    <div class="card">
                        <form action="profile-edit.php" method="post">
                            <h2>Profile</h2>
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
                            <label>Username:</label><br>
                            <input value="'.$userName.'" disabled><br>
                            <label>Email:</label><br>
                            <input value="'.$userEmail.'" disabled><br>
                            <label>Phone:</label><br>
                            <input value="'.$userPhone.'" disabled><br>
                            <button>Edit</button><br><br>
                            <p><a href="profile-edit-password.php">Change Password</a></p>       
                        </form>
                    </div>
                </div>
            </div>
        </main>
    ');

    /* Include footer */
    include '_footer.php';
?>



