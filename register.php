<?php
    /* Including header */
    include '_header.php';

    /* If user has already register, can't go to login page */
    if(isset($_SESSION['userId'])){
        header('location: profile.php?you%have%already%login');
    }

    /* Register */
    print('
		<main>
			<div class="container">
				<div class="center">
					<div class="card">
						<form action="action/register-action.php" method="post">
							<h2>Register</h2>
							');
						
							if(isset($_SESSION['error-message'])){
								if($_SESSION['error-message']!=''){
									print ('<div class="error-message">'.$_SESSION['error-message'].'</div>');
									$_SESSION['error-message']='';
								}
							}
							
							print('
							<label>Username:</label><br>
							<input type="text" name="username" placeholder="username" required><br>
							<label>Email:</label><br>
							<input type="email" name="email" placeholder="someone@example" required><br>
							<label>Phone:</label><br>
							<input type="number" name="phone" placeholder="0123456789" required><br>
							<label>Password:</label><br>
							<input type="password" name="password" placeholder="*****" required><br>
							<label>Confirm Password:</label><br>
							<input type="password" name="confirm" placeholder="*****" required><br>
							<button>Register</button>
						</form>
					</div>
				</div>
			</div>
		</main>
    ');

    /* Include footer */
    include '_footer.php';
?>