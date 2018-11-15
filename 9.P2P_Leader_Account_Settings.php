<!DOCTYPE html>
<?php
include('Classes/P2P_Database.php');
include('Classes/P2P_Login_Function.php');
include('Classes/P2P_Profile_Page.php');

if (database::query('SELECT profileimg FROM users WHERE id1=:id1', array(':id1'=>$userId))) {
	$profilepicture = database::query('SELECT profileimg FROM users WHERE id1=:id1', array(':id1'=>$userId))[0]['profileimg'];
}

if(!$certifiedAndLoggedIn) {
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
				<p>To certify or uncertify an account, go to the account's profile page and click 'certify' or 'uncertify'.</p><br>
<!-- Find a way to display number of requests for mentor positions and the individual requests
-->
			<?php
			#ART
			$leaderId = database::query('SELECT id1 FROM users WHERE id1=:id1', array(':id1'=>$userId))[0]['id1'];
			if ($leaderId == 2) {
				foreach (range(1,5,1) as $num) {
					if ($num == 1) {
						$activity = "Film Club";
					}
					if ($num == 2) {
						$activity = "Improvisation Club";
					}
					if ($num == 3) {
						$activity = "National Art Honor Society (NAHS)";
					}
					if ($num == 4) {
						$activity = "Photography Club";
					}
					if ($num == 5) {
						$activity = "Theatre Arts Productions";
					}
					$countMentor = database::query('SELECT count(*), SUM(CASE WHEN mentorrequest='.$num.' THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN mentorrequest='.$num.' THEN 1 ELSE 0 END)'];
					echo "<p>There are currently ".$countMentor." mentor request(s) for ".$activity.":<p>";
					$t = 0;
					if ($countMentor != 0) {
						do {
							$mentorId = database::query('SELECT username FROM users WHERE mentorrequest='.$num.'')[$t]['username'];
							$mentorIdFirst = database::query('SELECT firstName FROM users WHERE mentorrequest='.$num.'')[$t]['firstName'];
							$mentorIdLast = database::query('SELECT lastName FROM users WHERE mentorrequest='.$num.'')[$t]['lastName'];
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$mentorId."'>".$mentorIdFirst." ".$mentorIdLast."</a><br><br>";
							$t++;
						} while ($t < $countMentor);
					}
				}
			}
			?>
			<?php
			#COMMUNITYSERVICE
			$leaderId = database::query('SELECT id1 FROM users WHERE id1=:id1', array(':id1'=>$userId))[0]['id1'];
			if ($leaderId == 4) {
				foreach (range(51,59,1) as $num) {
					if ($num == 51) {
						$activity = "Best Buddies";
					}
					if ($num == 52) {
						$activity = "Environmental Club (SAVE)";
					}
					if ($num == 53) {
						$activity = "French National Honor Society";
					}
					if ($num == 54) {
						$activity = "Math National Honor Society";
					}
					if ($num == 55) {
						$activity = "National Art Honor Society";
					}
					if ($num == 56) {
						$activity = "National Latin Honor Society";
					}
					if ($num == 57) {
						$activity = "National Technical Honor Society (NTHS)";
					}
					if ($num == 58) {
						$activity = "Science National Honor Society";
					}
					if ($num == 59) {
						$activity = "Tri-M Music National Honor Society";
					}
					$countMentor = database::query('SELECT count(*), SUM(CASE WHEN mentorrequest='.$num.' THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN mentorrequest='.$num.' THEN 1 ELSE 0 END)'];
					echo "<p>There are currently ".$countMentor." mentor request(s) for ".$activity.":<p>";
					$t = 0;
					if ($countMentor != 0) {
						do {
							$mentorId = database::query('SELECT username FROM users WHERE mentorrequest='.$num.'')[$t]['username'];
							$mentorIdFirst = database::query('SELECT firstName FROM users WHERE mentorrequest='.$num.'')[$t]['firstName'];
							$mentorIdLast = database::query('SELECT lastName FROM users WHERE mentorrequest='.$num.'')[$t]['lastName'];
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$mentorId."'>".$mentorIdFirst." ".$mentorIdLast."</a><br><br>";
							$t++;
						} while ($t < $countMentor);
					}
				}
			}
			?>
			<?php
			#MUSIC
			$leaderId = database::query('SELECT id1 FROM users WHERE id1=:id1', array(':id1'=>$userId))[0]['id1'];
			if ($leaderId == 5) {
				foreach (range(101,111,1) as $num) {
					if ($num == 101) {
						$activity = "Band";
					}
					if ($num == 102) {
						$activity = "Dance";
					}
					if ($num == 103) {
						$activity = "Jazz Band";
					}
					if ($num == 104) {
						$activity = "Lunch Choir / Concert Choir";
					}
					if ($num == 105) {
						$activity = "Marching Band";
					}
					if ($num == 106) {
						$activity = "Men's Choir";
					}
					if ($num == 107) {
						$activity = "Orchestra";
					}
					if ($num == 108) {
						$activity = "Step Team";
					}
					if ($num == 109) {
						$activity = "Theater Arts Productions";
					}
					if ($num == 110) {
						$activity = "Tri-M Music National Honor Society";
					}
					if ($num == 111) {
						$activity = "Women's Choir";
					}
					$countMentor = database::query('SELECT count(*), SUM(CASE WHEN mentorrequest='.$num.' THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN mentorrequest='.$num.' THEN 1 ELSE 0 END)'];
					echo "<p>There are currently ".$countMentor." mentor request(s) for ".$activity.":<p>";
					$t = 0;
					if ($countMentor != 0) {
						do {
							$mentorId = database::query('SELECT username FROM users WHERE mentorrequest='.$num.'')[$t]['username'];
							$mentorIdFirst = database::query('SELECT firstName FROM users WHERE mentorrequest='.$num.'')[$t]['firstName'];
							$mentorIdLast = database::query('SELECT lastName FROM users WHERE mentorrequest='.$num.'')[$t]['lastName'];
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$mentorId."'>".$mentorIdFirst." ".$mentorIdLast."</a><br><br>";
							$t++;
						} while ($t < $countMentor);
					}
				}
			}
			?>
			<?php
			#SPORTS
			$leaderId = database::query('SELECT id1 FROM users WHERE id1=:id1', array(':id1'=>$userId))[0]['id1'];
			if ($leaderId == 6) {
				foreach (range(151,174,1) as $num) {
					if ($num == 151) {
						$activity = "Allied Bowling";
					}
					if ($num == 152) {
						$activity = "Allied Soccer";
					}
					if ($num == 153) {
						$activity = "Allied Softball";
					}
					if ($num == 154) {
						$activity = "Baseball";
					}
					if ($num == 155) {
						$activity = "Basketball - Boys";
					}
					if ($num == 156) {
						$activity = "Basketball - Girls";
					}
					if ($num == 157) {
						$activity = "Boys Lacrosse";
					}
					if ($num == 158) {
						$activity = "Boys Soccer";
					}
					if ($num == 159) {
						$activity = "Cheerleading";
					}
					if ($num == 160) {
						$activity = "Cross Country";
					}
					if ($num == 161) {
						$activity = "Field Hockey";
					}
					if ($num == 162) {
						$activity = "Football";
					}
					if ($num == 163) {
						$activity = "Girls Lacrosse";
					}
					if ($num == 164) {
						$activity = "Girls Soccer";
					}
					if ($num == 165) {
						$activity = "Golf";
					}
					if ($num == 166) {
						$activity = "Ice Hockey";
					}
					if ($num == 167) {
						$activity = "Indoor Track";
					}
					if ($num == 168) {
						$activity = "Outdoor Track";
					}
					if ($num == 169) {
						$activity = "Softball";
					}
					if ($num == 170) {
						$activity = "Swim Club";
					}
					if ($num == 171) {
						$activity = "Table Tennis Club";
					}
					if ($num == 172) {
						$activity = "Tennis";
					}
					if ($num == 173) {
						$activity = "Volleyball";
					}
					if ($num == 174) {
						$activity = "Wrestling";
					}
					$countMentor = database::query('SELECT count(*), SUM(CASE WHEN mentorrequest='.$num.' THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN mentorrequest='.$num.' THEN 1 ELSE 0 END)'];
					echo "<p>There are currently ".$countMentor." mentor request(s) for ".$activity.":<p>";
					$t = 0;
					if ($countMentor != 0) {
						do {
							$mentorId = database::query('SELECT username FROM users WHERE mentorrequest='.$num.'')[$t]['username'];
							$mentorIdFirst = database::query('SELECT firstName FROM users WHERE mentorrequest='.$num.'')[$t]['firstName'];
							$mentorIdLast = database::query('SELECT lastName FROM users WHERE mentorrequest='.$num.'')[$t]['lastName'];
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$mentorId."'>".$mentorIdFirst." ".$mentorIdLast."</a><br><br>";
							$t++;
						} while ($t < $countMentor);
					}
				}
			}
			?>
			<?php
			#STUDENTGOVERNMENT
			$leaderId = database::query('SELECT id1 FROM users WHERE id1=:id1', array(':id1'=>$userId))[0]['id1'];
			if ($leaderId == 7) {
				foreach (range(201,202,1) as $num) {
					if ($num == 201) {
						$activity = "Class Board";
					}
					if ($num == 202) {
						$activity = "Executive Board";
					}
					$countMentor = database::query('SELECT count(*), SUM(CASE WHEN mentorrequest='.$num.' THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN mentorrequest='.$num.' THEN 1 ELSE 0 END)'];
					echo "<p>There are currently ".$countMentor." mentor request(s) for ".$activity.":<p>";
					$t = 0;
					if ($countMentor != 0) {
						do {
							$mentorId = database::query('SELECT username FROM users WHERE mentorrequest='.$num.'')[$t]['username'];
							$mentorIdFirst = database::query('SELECT firstName FROM users WHERE mentorrequest='.$num.'')[$t]['firstName'];
							$mentorIdLast = database::query('SELECT lastName FROM users WHERE mentorrequest='.$num.'')[$t]['lastName'];
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$mentorId."'>".$mentorIdFirst." ".$mentorIdLast."</a><br><br>";
							$t++;
						} while ($t < $countMentor);
					}
				}
			}
			?>
			<?php
#			$leaderId = database::query('SELECT id1 FROM users WHERE id1=:id1', array(':id1'=>$userId))[0]['id1'];
#			if ($leaderId == 2) {
#				$countMentee = database::query('SELECT count(*), SUM(CASE WHEN menteerequest!="0" THEN 1 ELSE 0 END) FROM users')[0]['SUM(CASE WHEN menteerequest!="0" THEN 1 ELSE 0 END)'];
#				echo "<p>There are currently ".$countMentee." mentee requests:</p>";
#				$t = 0;
#				if ($countMentee != 0) {
#					do {
#						$menteeId = database::query('SELECT username FROM users WHERE menteerequest!=0')[$t]['username'];
#						$menteeIdFirst = database::query('SELECT firstName FROM users WHERE menteerequest!=0')[$t]['firstName'];
#						$menteeIdLast = database::query('SELECT lastName FROM users WHERE menteerequest!=0')[$t]['lastName'];
#						echo "<a href='7.P2P_Profile.php?usernameLogin=".$menteeId."'>".$menteeIdFirst." ".$menteeIdLast."</a><br><br>";
#						$t++;
#					} while ($t < $countMentee);
#				}
#			}
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