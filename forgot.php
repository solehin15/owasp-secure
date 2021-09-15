<?php
    /* Including header */
    include '_header.php';

    /* Forgot */
    print('
        <main>
            <div class="container">
                <div class="center">
                    <div class="card">
                        <form action="action/forgot-action.php" method="post">
                            <h2>Forgot Password</h2>
                            
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
                            <button>Send</button><br><br>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    ');

    /* Include footer */
    include '_footer.php';
?>


