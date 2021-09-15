<?php
    /* Including header */
    include '_header.php';

    /* If user is not logged in, can't go to profile page */
    if(!isset($_SESSION['userId'])){
        $_SESSION['error-message']='You have to login first.';
        header('location: login.php');
        exit();
    }

    /* Login */
    print('
        <main>
            <div class="container">
                <div class="center">
                    <div class="card">
                        <form action="action/logout-action.php" method="post">
                            <h2>Logout</h2>
                            <p>Logout now?</p>
                            <button>Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    ');

    /* Include footer */
    include '_footer.php';
?>


