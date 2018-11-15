<!DOCTYPE html>
<?php
include('Classes/P2P_Database.php');
include('Classes/P2P_Login_Function.php');
include('Classes/P2P_Profile_Page.php');
include('Classes/P2P_Activity_Assignment.php');

if (database::query('SELECT profileimg FROM users WHERE id1=:id1', array(':id1'=>$userId))) {
	if ($_GET['usernameLogin'] == $loggedInUserId) {
		$profilepicture = database::query('SELECT profileimg FROM users WHERE id1=:id1', array(':id1'=>$userId))[0]['profileimg'];
	} else {
		$profilepicture = database::query('SELECT profileimg FROM users WHERE username=:username', array(':username'=>$_GET['usernameLogin']))[0]['profileimg'];
	}
}

if (isset($_POST['searchbox'])) {
	$tosearch = explode(" ", $_POST['searchbox']);
    if (count($tosearch) == 1) {
            $tosearch = str_split($tosearch[0], 2);
    }
    $whereclause = "";
    $paramsarray = array(':username'=>'%'.$_POST['searchbox'].'%');
    for ($i = 0; $i < count($tosearch); $i++) {
        $whereclause .= " OR username LIKE :u$i ";
        $paramsarray[":u$i"] = $tosearch[$i];
    }
	$users = database::query('SELECT users.username FROM users WHERE users.username LIKE :username '.$whereclause.'', $paramsarray);
	print_r($users);
}
?>
<html>
	<head>
<!--		<link rel="stylesheet" type="text/css" href="CSS/P2P_CSS.css"/>
-->
		<style>
.headerMenu {
        background-color: #F4A460;
        height: 100px;
        border-bottom: 0px;
        padding-left: auto;
        padding-right: auto;
        width: 100%;
        border: 1px solid;
        border-color: #C0C0C0;
}
#wrapper {
        margin-left: auto;
        margin-right: auto;
        width: 800px;
        padding-top: 0px;
        padding-bottom: 0px;
}
.textHeader {
        background-color: #F3F6F9;
	width: 190px;
        height: 50px;
        padding: 5px;
        border-bottom: 1px solid #DCE5EE;
        font-weight:500;
}
 .profileLeftSideContent {
        width: 194px;
        padding-right: 0px;
        padding-bottom: 5px;
        padding-top: 5px;
        padding-left: 0px;
        height: 200px;
}
.tasks {
        border: 1px solid;
        border-color: #C0C0C0;
        margin-top: 10px;
        float: right;
	width: 580px;
        height: 500px;
        background-color:#F3F6F9;
        padding: 5px;
}
#image {
        margin-top: 10px;
        margin-bottom: 10px;
}
#P2P {
        font-family: "Trebuchet MS", Helvetica, sans-serif;
        font-style: cursive;
        padding-top:10px;
}
#navbar {
        float: left;
        margin-left: 55px;
        margin-top: 10px;
        border: 1px solid;
        border-color: #C0C0C0;
        height: 500px;
        width: 150px;
        background-color: #20B2AA;
}
a {
        font-size: 15px;
}
#tasksTitle {
        padding: 0px;
        margin: 0px;
}
#navbartwo {
        float: right;
        margin-right:60px;
        margin-top: 10px;
        border: 1px solid;
        border-color: #C0C0C0;
        height: 50px;
        width: 150px;
        background-color: #DAA520;
}
		</style>
	</head>
	<body style="background-color: #4682B4">
		<div class="headerMenu">
			<center><h1 id="P2P">Peer-to-Peer</h1></center>
		</div>
		<div id="navbar">
			<br>
			<?php
				echo '<center><a href="7.P2P_Profile.php?usernameLogin='.$loggedInUserId.'">Home</a></center><br><br>';
			?>
			<?php
				echo '<center><a href="12.P2P_Notifications.php?usernameLogin='.$loggedInUserId.'">Notifications</a></center><br><br>';
			?>
			<?php
				echo '<center><a href="16.P2P_Join_Groups.php?usernameLogin='.$loggedInUserId.'">Groups</a></center><br><br>';
			?>
			<?php
				echo '<center><a href="11.P2P_Inbox.php?usernameLogin='.$loggedInUserId.'">Inbox</a></center><br><br>';
			?>
			<?php
				echo '<center><a href="15.P2P_Account_Settings.php?usernameLogin='.$loggedInUserId.'">Account Settings</a></center><br><br>';
			?>
			<?php
				echo '<center><a href="4.P2P_Log_Out.php?usernameLogin='.$loggedInUserId.'">Logout</a></center><br><br>';
			?>
		</div>
		<div id="navbartwo">
			<br>
			<?php
				if ($verified) {
					echo '<center id="account">Master Account</center>';
				}
				if ($certified) {
					echo '<center id="account">Leader Account</center>';
					echo '<style> 
						#navbartwo {
							background-color: #F08080;
						}
						</style>';
				}
				if ($mentor) {
					echo '<center id="account">Mentor Account</center>';
					echo '<style> 
						#navbartwo {
							background-color: #87CEEB;
						}
						</style>';
				}
				if ($verified == 0 && $certified == 0 && $mentor == 0) {
					echo '<center id="account">Mentee Account</center>';
					echo '<style> 
						#navbartwo {
							background-color: #FFFACD;
						}
						</style>';
				}
			?>
		</div>
		<div id="wrapper">
			<div class="tasks">
				<?php
			if ($_GET['usernameLogin'] == $loggedInUserId) {

				echo "<center><h1 id='tasksTitle'>Tasks</h1></center>";

				if (!$verifiedAndLoggedIn && !$certifiedAndLoggedIn) {
					echo '<br><br>
					<a href="Programs/Freshman_Activity.php?usernameLogin='.$loggedInUserId.'">Freshman Activity Interest Form</a>';
				}

				if ($verifiedAndLoggedIn) {
					echo '<br><br>
					<a href="20.P2P_Master_Account_Freshman_Interest_Survey.php?usernameLogin='.$loggedInUserId.'">Freshman Activity Interest Form - Master</a>';
				}

				if (!$verifiedAndLoggedIn && !$certifiedAndLoggedIn) {
					echo "<br><br>
					<a target='_blank' href='Programs/Jumpstart.htm'>Jumpstart</a>";
				}

				if (!$verifiedAndLoggedIn && !$certifiedAndLoggedIn) {
					echo '<br><br>
					<a href="Programs/P2P_Program.php?usernameLogin='.$loggedInUserId.'">Mentor Program</a>';
				}
				
				if ($verifiedAndLoggedIn) {
					echo '<br><br>
					<a href="8.P2P_Master_Account_Settings.php?usernameLogin='.$loggedInUserId.'">Master Account Settings</a>';
				}
				
				if ($certifiedAndLoggedIn) {
					echo '<br><br>
					<a href="9.P2P_Leader_Account_Settings.php?usernameLogin='.$loggedInUserId.'">Leader Account Settings</a>';
				}

				if ($mentorAndLoggedIn) {
					echo '<br><br>
					<a href="10.P2P_Mentor_Settings.php?usernameLogin='.$loggedInUserId.'">Mentor Account Settings</a>';
				}
				?>
				<br>
				<br>
				<form action="7.P2P_Profile.php?usernameLogin=<?php echo $usernameLogin; ?>" method="post">
			        <input type="text" name="searchbox" value="">
			        <input type="submit" name="search" value="Search">
				</form>
				<?php
			} else {
				echo "<center><h1 id='tasksTitle'>".$firstName." ".$lastName."'s Profile</h1></center><br><br>";
				echo '<p id="assignment">'.$assignment.'</p>';
				echo '<p id="relationship">'.$relationship.'</p>';
			}
				?>
			</div>
			<img id="image" src="<?php echo $profilepicture;?>" height="250" width="200" alt=" <?php echo $firstName; echo " "; echo $lastName; ?> 's Profile Picture" title=" <?php echo $firstName; echo " "; echo $lastName; ?> 's Profile Picture"/>
			<br>
			<div class="textHeader">
				<?php
				echo $firstName;
				echo " ";
				echo $lastName;
				?>'s Profile
			</div>
			<div class="profileLeftSideContent">
			<form action="7.P2P_Profile.php?usernameLogin=<?php echo $usernameLogin; ?>" method="POST">
				<?php
				if ($user_id != $follower_id) {
					if ($verifiedAndLoggedIn) {
						if ($isFollowingVerified == True) {
							echo '<input type="submit" name="unverify" value="Unverify">';
							echo '<style> 
								#navbartwo {
									background-color: #F08080;
								}
								</style>';
							echo '<script>
									document.getElementById("account").innerHTML = "Leader Account";
								</script>';
						} else {
							echo '<input type="submit" name="verify" value="Verify">';
							if ($mentor) {
									echo '<style> 
									#navbartwo {
										background-color: #87CEEB;
									}
									</style>';
								echo '<script>
										document.getElementById("account").innerHTML = "Mentor Account";
									</script>';
							} else {
								echo '<style> 
									#navbartwo {
										background-color: #FFFACD;
									}
									</style>';
								echo '<script>
										document.getElementById("account").innerHTML = "Mentee Account";
									</script>';
							}
						}
					}
					if ($certifiedAndLoggedIn) {
						if ($verified || $certified) {
						} else {
							$makeSureMentorRequest = database::query('SELECT mentorrequest FROM users WHERE username=:username', array(':username'=>$_GET['usernameLogin']))[0]['mentorrequest'];
							$makeSureMentorAssignment = database::query('SELECT mentorassignment FROM users WHERE username=:username', array(':username'=>$_GET['usernameLogin']))[0]['mentorassignment'];
							if ($makeSureMentorRequest != 0 || $makeSureMentorAssignment != 0) {
								if ($isFollowingCertified == True) {
									echo '<input type="submit" name="uncertify" value="Uncertify">';
									echo '<style> 
									#navbartwo {
										background-color: #87CEEB;
									}
									</style>';
									echo '<script>
										document.getElementById("account").innerHTML = "Mentor Account";
										document.getElementById("assignment").innerHTML = $assignment;
									</script>';
								} else {
									echo '<input type="submit" name="certify" value="Certify">';
									echo '<style> 
									#navbartwo {
										background-color: #FFFACD;
									}
									</style>';
									echo '<script>
										document.getElementById("account").innerHTML = "Mentee Account";
										document.getElementById("assignment").innerHTML = "";
										document.getElementById("relationship").innerHTML = "";
									</script>';
								}
							}
						}
					}
					if ($mentorAndLoggedIn) {
						if ($verified || $certified || $mentor) {
						} else {
							if ($isFollowingMentor == True) {
								echo '<input type="submit" name="unmentor" value="Unmentor">';
								echo '<script>
										document.getElementById("assignment").innerHTML = $assignment;
									</script>';
							} else {
								echo '<input type="submit" name="mentor" value="Mentor">';
								echo '<script>
										document.getElementById("assignment").innerHTML = "";
									</script>';
							}

						}
					}
				}
				?>
			</form>
			</div>
		</div>
	</body>
</html>