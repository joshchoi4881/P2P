<?php
include('Classes/P2P_Database.php');	

if (isset($_POST['createAccount'])) {
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email1'];
	$email2 = $_POST['email2'];
	$username = $_POST['username'];
	$password = $_POST['password1'];
	$password2 = $_POST['password2'];
	$date = date("Y-m-d");

	if (!database::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))) {
		if (strlen($username) >= 3 && strlen($username) <= 32) {
			if (preg_match('/[a-zA-Z0-9_]+/', $username)) {
				if (strlen($password) >= 5 && strlen($password) <= 32) {
					if ($password == $password2) {
						if ($email == $email2) {
							if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
								if (!database::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email))) {
									database::query('INSERT INTO users VALUES (:id1, :firstName, :lastName, :email, :username, :password, :signUpDate, :verified, :certified, :mentor, :mentee, :mentorrequest, :menteerequest, :mentorassignment, :menteeassignment, :profileimg)', array(':id1'=>null, ':firstName'=>$firstName, ':lastName'=>$lastName, ':email'=>$email, ':username'=>$username, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':signUpDate'=>$date, ':verified'=>0, ':certified'=>0, ':mentor'=>0, ':mentee'=>0, ':mentorrequest'=>0, ':menteerequest'=>0, ':mentorassignment'=>0, ':menteeassignment'=>0, ':profileimg'=>null));
									die("<h2>Welcome to Peer-to-Peer</h2><br><p><a href='1.P2P_Login.php'>Login<a> to begin.<p>");
								} else {
									echo "Email already in use.";
								}
							} else {
								echo "Invalid email.";
							}
						} else {
							echo "Emails don't match.";
						}
					} else {
						echo "Passwords don't match.";
					}
				} else {
					echo "Password must be between 5 and 32 characters long.";
				}
			} else {
				echo "Username can only contain letters, numbers, and underscores.";
			}
		} else {
			echo "Username must be between 3 and 32 characters long.";
		}
	} else {
		echo "User already exists.";
	}
}
?>
<h1>Sign Up</h1>
<form action="2.P2P_Sign_Up.php" method="POST">
	<div>
		<label><b>First Name</b></label>
		<input type="text" name="firstName" value="" placeholder="Enter first name" required><br>
		<label><b>Last Name</b></label>
		<input type="text" name="lastName" value="" placeholder="Enter last name" required><br>
		<label><b>Email</b></label>
		<input type="text" name="email1" value="" placeholder="Enter email" required><br>
		<label><b>Confirm Email</b></label>
		<input type="text" name="email2" value="" placeholder="Re-enter email" required><br>
		<label><b>Username</b></label>
		<input type="text" name="username" value="" placeholder="Enter username" required><br>
		<label><b>Password</b></label>
		<input type="password" name="password1" value="" placeholder="Enter password" required><br>
		<label><b>Confirm Password</b></label>
		<input type="password" name="password2" value="" placeholder="Re-enter password" required><br>
		<input type="submit" name="createAccount" value="Create Account">
	</div>
</form>