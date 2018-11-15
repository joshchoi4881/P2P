<?php
include('Classes/P2P_Database.php');
include('Classes/P2P_Login_Function.php');

if (Login::isLoggedIn()) {
	echo 'Logged In.';
	echo Login::isLoggedIn();
} else {
	echo 'Not Logged In.';
}
?>