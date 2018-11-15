<!DOCTYPE html>
<?php
include('Classes/P2P_Database.php');
include('Classes/P2P_Login_Function.php');
include('Classes/P2P_Profile_Page.php');

if (database::query('SELECT profileimg FROM users WHERE id1=:id1', array(':id1'=>$userId))) {
	$profilepicture = database::query('SELECT profileimg FROM users WHERE id1=:id1', array(':id1'=>$userId))[0]['profileimg'];
}

if(!$mentorAndLoggedIn) {
	header("Location: 7.P2P_Profile.php?usernameLogin=$loggedInUserId");
}
if($_GET['usernameLogin'] != $loggedInUserId) {
	header("Location: 7.P2P_Profile.php?usernameLogin=$loggedInUserId");
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
        height: 5000px;
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
				echo '<center>Master Account</center>';
			}
			?>
			<?php
			if ($certified) {
				echo '<center>Leader Account</center>';
				echo '<style> 
					#navbartwo {
						background-color: #F08080;
					}
					</style>';
			}
			?>
			<?php
			if ($mentor) {
				echo '<center>Mentor Account</center>';
				echo '<style> 
					#navbartwo {
						background-color: #87CEEB;
					}
					</style>';
			}
			?>
			<?php
			if ($verified == 0 && $certified == 0 && $mentor == 0) {
				echo '<center>Mentee Account</center>';
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
				<center><h1 id='tasksTitle'>Leader Account Settings</h1></center>
				<p>To mentor or unmentor an account, go to the account's profile page and click 'mentor' or 'unmentor'.</p><br>
<!-- Find a way to display number of requests for mentor positions and the individual requests
-->
			<?php
			#FILMCLUB
			$mentorActivityId = database::query('SELECT mentorassignment FROM users WHERE id1=:id1', array(':id1'=>$userId))[0]['mentorassignment'];
			if ($mentorActivityId == 1) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=1 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=1 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Film Club:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=1')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=1')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=1')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 2) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=2 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=2 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Improvisation Club:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=2')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=2')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=2')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 3) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=3 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=3 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for National Art Honor Society (NAHS):<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=3')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=3')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=3')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 4) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=4 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=4 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Photography Club:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=4')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=4')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=4')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 5) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=5 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=5 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Theatre Arts Productions:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=5')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=5')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=5')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 51) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=51 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=51 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Best Buddies:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=51')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=51')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=51')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 52) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=52 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=52 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Environmental Club (SAVE):<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=52')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=52')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=52')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 53) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=53 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=53 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for French National Honor Society:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=53')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=53')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=53')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 54) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=54 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=54 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Math National Honor Society:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=54')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=54')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=54')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 55) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=55 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=55 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for National Art Honor Society:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=55')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=55')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=55')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 56) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=56 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=56 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Latin National Honor Society:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=56')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=56')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=56')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 57) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=57 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=57 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for National Technical Honor Society (NTHS):<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=57')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=57')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=57')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 58) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=58 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=58 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Science National Honor Society:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=58')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=58')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=58')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 59) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=59 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=59 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Tri-M Music National Honor Society (TMNHS):<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=59')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=59')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=59')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 101) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=101 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=101 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Band:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=101')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=101')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=101')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 102) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=102 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=102 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Dance:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=102')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=102')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=102')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 103) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=103 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=103 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Jazz Band:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=103')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=103')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=103')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 104) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=104 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=104 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Lunch Choir / Concert Choir:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=104')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=104')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=104')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 105) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=105 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=105 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Marching Band:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=105')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=105')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=105')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 106) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=106 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=106 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Men's Choir:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=106')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=106')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=106')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 107) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=107 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=107 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Orchestra:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=107')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=107')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=107')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 108) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=108 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=108 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Step Team:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=108')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=108')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=108')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 109) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=109 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=109 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Theater Arts Productions:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=109')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=109')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=109')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 110) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=110 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=110 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Tri-M Music National Honor Society:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=110')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=110')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=110')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 111) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=111 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=111 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Women's Choir:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=111')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=111')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=111')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 151) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=151 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=151 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Allied Bowling:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=151')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=151')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=151')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 152) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=152 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=152 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Allied Soccer:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=152')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=152')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=152')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 153) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=153 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=153 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Allied Softball:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=153')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=153')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=153')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 154) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=154 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=154 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Baseball:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=154')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=154')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=154')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 155) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=155 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=155 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Basketball - Boys:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=155')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=155')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=155')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 156) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=156 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=156 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Basketball - Girls:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=156')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=156')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=156')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 157) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=157 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=157 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Boys Lacrosse:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=157')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=157')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=157')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 158) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=158 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=158 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Boys Soccer:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=158')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=158')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=158')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 159) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=159 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=159 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Cheerleading:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=159')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=159')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=159')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 160) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=160 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=160 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Cross Country:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=160')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=160')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=160')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 161) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=161 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=161 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Field Hockey:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=161')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=161')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=161')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 162) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=162 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=162 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Football:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=162')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=162')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=162')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 163) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=163 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=163 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Girls Lacrosse:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=163')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=163')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=163')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 164) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=164 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=164 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Girls Soccer:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=164')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=164')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=164')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 165) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=165 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=165 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Golf:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=165')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=165')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=165')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 166) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=166 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=166 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Ice Hockey:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=166')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=166')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=166')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 167) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=167 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=167 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Indoor Track:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=167')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=167')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=167')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 168) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=168 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=168 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Outdoor Track:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=168')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=168')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=168')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 169) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=169 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=169 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Softball:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=169')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=169')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=169')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 170) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=170 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=170 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Swim Club:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=170')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=170')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=170')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 171) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=171 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=171 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Table Tennis Club:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=171')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=171')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=171')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 172) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=172 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=172 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Tennis:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=172')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=172')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=172')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 173) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=173 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=173 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Volleyball:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=173')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=173')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=173')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 174) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=174 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=174 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Wrestling:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=174')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=174')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=174')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 201) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=201 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=201 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Class Board:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=201')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=201')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=201')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			if ($mentorActivityId == 202) {
				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest=202 THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest=202 THEN 1 ELSE 0 END)'];
				echo "<p>There are currently ".$countMentee." mentee request(s) for Executive Board:<p>";
				$t = 0;
				if ($countMentee != 0) {
					do {
						$menteeId = database::query('SELECT username FROM users WHERE menteerequest=202')[$t]['username'];
						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest=202')[$t]['firstName'];
						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest=202')[$t]['lastName'];
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
						$t++;
					} while ($t < $countMentee);
				}
			}
			?>
<!-- Create a search box to find users easily
-->
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
			</div>
		</div>
	</body>
</html>