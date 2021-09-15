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
                <form>
                    <h1>Home</h1>
                    <p>This is home</p>
                </form>
            </div>
        </main>
    ');

    /* Include footer */
    include '_footer.php';
?>



