<?php
    /* Including header */
    include '_header.php';

    /* If user is not logged in, can't go to profile page */
    if(!isset($_SESSION['userId'])){
        header('location: login.php?you%have%to%login%first');
    }

    /* Edit password */
    print('
        <main>
            <div class="container">
                <div class="center">
                    <div class="card">
                        <form action="action/profile-edit-password-action.php" method="post">
                            <h2>Edit Password</h2>
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
                            <label>Old Password:</label><br>
                            <input type="password" name="OldPassword" placeholder="Old password" required><br>
                            <label>New Password:</label><br>
                            <input type="password" name="NewPassword" placeholder="New password" required><br>
                            <label>Confirm New Password:</label><br>
                            <input type="password" name="ConfirmPassword" placeholder="Confirm New password" required><br>
                            <button>Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    ');

    /* Include footer */
    include '_footer.php';
?>


