<?php
    /* Including header */
    include '_header.php';

    /* If user has already login, can't go to login page */
    if(isset($_SESSION['userId'])){
        header('location: profile.php?you%have%already%login');
    }

    /* Login */
    print('
        <main>
            <div class="container">
                <div class="center">
                    <div class="card">
                        <form action="action/login-action.php" method="post">
                            <h2>Login</h2>
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
                            <label>Email:</label><br>
                            <input type="email" name="email" placeholder="someone@example" required><br>
                            <label>Password:</label><br>
                            <input type="password" name="password" placeholder="*****"><br>
                            <button>Login</button><br><br>
                            <p><a href="forgot.php">Forgot Password</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    ');

    /* Include footer */
    include '_footer.php';
?>


