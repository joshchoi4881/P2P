<?php
include('Classes/P2P_Database.php');
include('Classes/P2P_Login_Function.php');

$token2IsValid = False;
if (Login::isLoggedIn()) {
	if (isset($_POST['changePassword'])) {
		$oldPassword = $_POST['oldPassword'];
		$newPassword = $_POST['newPassword'];
		$newPasswordRepeat = $_POST['newPasswordRepeat'];
		$userId = Login::isLoggedIn();
		if (password_verify($oldPassword, database::query('SELECT password FROM users WHERE id1	=:userId', array(':userId'=>$userId))[0]['password'])) {
			if ($newPassword == $newPasswordRepeat) {
				if (strlen($newPassword) >= 5 && strlen($newPassword) <= 32) {
					database::query('UPDATE users SET password=:newPassword WHERE id1=:userId', array(':newPassword'=>password_hash($newPassword, PASSWORD_BCRYPT), ':userId'=>$userId));
					echo "Password change successful.";
				} else {
					echo "Password must be between 5 and 32 characters long.";
				}
			} else {
				echo "The passwords don't match.";
			}
		} else {
			echo "Incorrect password.";
		}
	} 
} else {
	if (isset($_GET['token2'])) {
		$token2 = $_GET['token2'];
		if (database::query('SELECT userId2 FROM passwordtokens WHERE token2=:token2', array(':token2'=>sha1($token2)))) {
			$userId = database::query('SELECT userId2 FROM passwordtokens WHERE token2=:token2', array(':token2'=>sha1($token2)))[0]['userId2'];
			$userId2 = database::query('SELECT userId2 FROM passwordtokens WHERE token2=:token2', array(':token2'=>sha1($token2)))[0]['userId2'];
			$token2IsValid = True;
			if (isset($_POST['changePassword'])) {
				$newPassword = $_POST['newPassword'];
				$newPasswordRepeat = $_POST['newPasswordRepeat'];
				if ($newPassword == $newPasswordRepeat) {
					if (strlen($newPassword) >= 5 && strlen($newPassword) <= 32) {
						database::query('UPDATE users SET password=:newPassword WHERE id1=:userId', array(':newPassword'=>password_hash($newPassword, PASSWORD_BCRYPT), ':userId'=>$userId));
						echo "Password change successful.";
						database::query('DELETE FROM passwordtokens WHERE userId2=:userId2', array(':userId2'=>$userId2));
					} else {
						echo "Password must be between 5 and 32 characters long.";
					}
				} else {
					echo "The passwords don't match.";
				}
			}
		} else {
			die('Token invalid.');
		}
	} else {
		die('Not Logged In.');
	}
}
?>
<h1>Change your password</h1>
<form action="<?php if (!$token2IsValid) { echo '5.P2P_Change_Password.php'; } else { echo '5.P2P_Change_Password.php?token2='.$token2.''; } ?>" method="POST">
	<?php
	if (!$token2IsValid) {
		echo '<input type="password" name="oldPassword" value="" placeholder="Current password"><p />';
	}
	?>
	<input type="password" name="newPassword" value="" placeholder="New password"><p />
	<input type="password" name="newPasswordRepeat" value="" placeholder="Re-enter new password"><p />
	<input type="submit" name="changePassword" value="Change Password">
</form>