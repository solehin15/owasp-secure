<?php
    /* Including header */
    include '_header.php';

    /* If user is not logged in, can't go to profile page */
    if(!isset($_SESSION['userId'])){
        header('location: login.php?you%have%to%login%first');
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
                        <form action="action/profile-edit-action.php" method="post">
                            <h2>Profile</h2>
                            <label>Username:</label><br>
                            <input value="'.$userName.'" disabled><br>
                            <label>Email:</label><br>
                            <input type="email" name="userEmail"  value="'.$userEmail.'" placeholder="someone@example" required><br>
                            <label>Phone:</label><br>
                            <input value="'.$userPhone.'" disabled><br>
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



