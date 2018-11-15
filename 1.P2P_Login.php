<!--
<html>
	<head>
		Latest compiled and minified CSS
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		Optional theme
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	</head>
	<body>
		<header>

		</header>
		<h1>Peer-to-Peer</h1>
		<form action="1.P2P_Login.php" method="POST">
			<div>
					<label><b>Username</b></label>
					<input type="text"  name="usernameLogin" placeholder="Enter username" required>
					<label><b>Password</b></label>
					<input type="password" name="passwordLogin" placeholder="Enter password" required>
					<input type="submit" name="login" value="Login">
			</div>
			<div>
				<span><a href="2.P2P_Sign_Up.php">Sign Up</a></span>
				<span><a href="6.P2P_Forgot_Password.php">Forgot Password?</a></span>
			</div>
		</form>
	Latest compiled and minified JavaScript
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
	</script>
	</body>
</html>

<!DOCTYPE html>

<html lang="en">
  <head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Peer-to-Peer</title>
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="signin.css" rel="stylesheet">
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>

    <div class="container">
    	<center><h1>Peer-to-Peer</h1>
      <form action="1.P2P_Login.php" class="form-signin" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2></center><br>
        <label for="inputEmail" class="sr-only">Username</label>
        <input name="usernameLogin" type="text" id="inputEmail" class="form-control" placeholder="Username" required><br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="passwordLogin" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Sign in</button>
      </form>
      	<br><span><a href="2.P2P_Sign_Up.php">Sign Up</a></span><br><br>
		<span><a href="6.P2P_Forgot_Password.php">Forgot Password?</a></span>
    </div>


    IE10 viewport hack for Surface/desktop Windows 8 bug
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
	</script>
  </body>
</html>
-->

<!DOCTYPE html>
<?php
include('Classes/P2P_Database.php');

if (isset($_POST['login'])) {
	$usernameLogin = $_POST['usernameLogin'];
	$passwordLogin = $_POST['passwordLogin'];

	if (database::query('SELECT username FROM users WHERE username=:username', array(':username'=>$usernameLogin))) {
		if (password_verify($passwordLogin, database::query('SELECT password FROM users WHERE username=:username', array(':username'=>$usernameLogin))[0]['password'])) {
			$cstrong = True;
			$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
			$userId = database::query('SELECT id1 FROM users WHERE username=:username', array(':username'=>$usernameLogin))[0]['id1'];
			database::query("INSERT INTO logintokens VALUES (:id2, :token, :userId)", array(':id2'=>null, ':token'=>sha1($token), ':userId'=>$userId));
			setcookie("P2PID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
			setcookie("P2PID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
			header("Location: 7.P2P_Profile.php?usernameLogin=$usernameLogin");
		} else {
			echo "Incorrect password.";
		}
	} else {
		echo "User does not exist.";
	}
}
?>
<html>
	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>Peer-to-Peer</title>
	    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
	    <link rel="stylesheet" href="assets/css/styles.css">
	</head>
	<body>
	    <div class="login-clean">
	        <form action="1.P2P_Login.php" method="POST">
	        	<center><h1>Peer-to-Peer</h1></center>
	            <h2 class="sr-only">Login Form</h2>
	            <div class="illustration"><i class="icon ion-ios-navigate"></i></div>
	            <div class="form-group">
	                <input class="form-control" type="text" id="username" name="usernameLogin" placeholder="Username">
	            </div>
	            <div class="form-group">
	                <input class="form-control" type="password" id="password" name="passwordLogin" placeholder="Password">
	            </div>
	            <div class="form-group">
	                <button name="login" class="btn btn-primary btn-block" id="login" type="submit" data-bs-hover-animate="shake">Login</button>
	            </div><br><a href="6.P2P_Forgot_Password.php" class="forgot">Forgot password?</a>
	        	<br><a href="2.P2P_Sign_Up.php" class="forgot">Sign Up</a></form>
	    </div>
	    <script src="assets/js/jquery.min.js"></script>
	    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>