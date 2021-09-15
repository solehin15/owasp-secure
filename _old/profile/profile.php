<?php

/* Include `header.php` from `/main` */
include('../main/header.php');

/* Get user information based on $_SESSION[`userId`] */
$userId=$_SESSION['userId'];
$sql="SELECT * FROM users WHERE userId='$userId'";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_assoc($result);
$userName=$row['userName'];
$userEmail=$row['userEmail'];
$userPhone=$row['userPhone'];

/* Print layout for Login */
print('
	<main>
		<div class="container">
			<div class="center">
				<div class="card">
					<h2>Profile</h2>
					<table class="table-profile">
						<tr>
							<td>Username</td>
							<td><a href="profile-edit-username.php">'.$userName.'</a></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><a href="profile-edit-email.php">'.$userEmail.'</a></td>
						</tr>
						<tr>
							<td>Phone</td>
							<td><a href="profile-edit-phone.php">'.$userPhone.'</a></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><a href="profile-edit-password.php">*****</a></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</main>
');

/* Include `footer.php` from `/main` */
include('../main/footer.php');