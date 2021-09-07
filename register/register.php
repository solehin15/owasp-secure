<?php

/* Print layout for Login */
print('
	<main>
		<div class="container">
			<div class="center">
				<div class="card">
					<form action="aregister.php" method="post">
						<h2>Register</h2>
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
						<button name="register">Register</button>
					</form>
				</div>
			</div>
		</div>
	</main>
');