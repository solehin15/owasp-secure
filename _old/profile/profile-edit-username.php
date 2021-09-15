<?php

/* Include `header.php` from `/main` */
include('../main/header.php');

/* Print layout for Login */
print('
	<main>
		<div class="container">
			<div class="center">
				<div class="card">
					<form action="profile-edit-username-action.php" method="post">
						<h2>Login</h2>
						<label>Email:</label><br>
						<input type="email" name="email" placeholder="someone@example" required><br>
						<label>Password:</label><br>
						<input type="password" name="password" placeholder="*****"><br>
						<button>Login</button>
					</form>
				</div>
			</div>
		</div>
	</main>
');

/* Include `footer.php` from `/main` */
include('../main/footer.php');