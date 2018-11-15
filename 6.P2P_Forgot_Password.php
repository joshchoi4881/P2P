<?php
include('Classes/P2P_Database.php');
include('classes/P2P_Mail.php');

if (isset($_POST['resetPassword'])) {
	$cstrong = True;
	$token2 = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
	$email = $_POST['email'];
	$userId2 = database::query('SELECT id1 FROM users WHERE email=:email', array(':email'=>$email))[0]['id1'];
	database::query('INSERT INTO passwordtokens VALUES (:id3, :token2, :userId2)', array(':id3'=>null, ':token2'=>sha1($token2), ':userId2'=>$userId2));
	Mail::sendMail('Forgot Password', "<a href='http://localhost/P2P_FINAL/5.P2P_Change_Password.php?token2=$token2'>http://localhost/P2P_FINAL/5.P2P_Change_Password.php?token2=$token2</a>", $email);
    echo 'Email sent!';
}
?>
<h1>Forgot Password?</h1>
<form action="6.P2P_Forgot_Password.php" method="POST">
	<input type="text" name="email" value="" placeholder="Email"?<p />
	<input type="submit" name="resetPassword" value="Reset Password">
</form>