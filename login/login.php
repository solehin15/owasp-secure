<?php

/* Print layout for Login */
print('
	<main>
		<div class="container">
			<div class="center">
				<div class="card">
					<form action="alogin.php" method="post">
						<h2>Login</h2>
						<label>Email:</label><br>
						<input type="email" name="email" placeholder="someone@example" required><br>
						<label>Password:</label><br>
						<input type="password" name="password" placeholder="*****"><br>
						<button name="login">Login</button>
					</form>
				</div>
			</div>
		</div>
	</main>
');