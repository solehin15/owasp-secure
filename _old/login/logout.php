<?php

/* Include `header.php` from `/main` */
include('../main/header.php');

/* Print layout for Login */
print('
	<main>
		<div class="container">
			<div class="center">
				<div class="card">
					<form action="logout-action.php" method="post">
						<h2>Logout</h2>
						<p>Are you sure to logout?</p>
						<button>Yes</button>
					</form>
				</div>
			</div>
		</div>
	</main>
');

/* Include `footer.php` from `/main` */
include('../main/footer.php');