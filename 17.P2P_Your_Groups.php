<!DOCTYPE html>
<?php
include('Classes/P2P_Database.php');
include('Classes/P2P_Login_Function.php');
include('Classes/P2P_Profile_Page.php');

if (database::query('SELECT profileimg FROM users WHERE id1=:id1', array(':id1'=>$userId))) {
	$profilepicture = database::query('SELECT profileimg FROM users WHERE id1=:id1', array(':id1'=>$userId))[0]['profileimg'];
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
				$yourgroupscount = database::query('SELECT count(*), SUM(CASE WHEN (member=1 AND userid='.$userId.')
					THEN 1 ELSE 0 END) FROM actgroups')[0]['SUM(CASE WHEN (member=1 AND userid='.$userId.')
					THEN 1 ELSE 0 END)'];
				if ($yourgroupscount != 0) {
					echo "<p>You are currently in ".$yourgroupscount." groups:<p>";
					$yourgroupsid = database::query('SELECT actgroups.*, users.id1 FROM users, actgroups
						WHERE actgroups.userid = users.id1
						AND actgroups.member = 1
						AND users.id1 = '.$userId.'
						ORDER BY actgroups.groupact');
#					echo "<pre>";
#						print_r($yourgroupsid);
#					echo "</pre>";
					$t = 0;
					do {
						array_push($yourgroupsid[$t], 'action');
						if ($yourgroupsid[$t]['groupact'] == 1) {
							$new[$t] = 'Film Club';
							$action[$t] = '1.Film_Club';
						}
						if ($yourgroupsid[$t]['groupact'] == 2) {
							$new[$t] = 'Improvisation Club';
							$action[$t] = '2.Improvisation_Club';
						}
						if ($yourgroupsid[$t]['groupact'] == 3) {
							$new[$t] = 'National Art Honor Society (NAHS)';
							$action[$t] = '3.National_Art_Honor_Society_(NAHS)';
						}
						if ($yourgroupsid[$t]['groupact'] == 4) {
							$new[$t] = 'Photography Club';
							$action[$t] = '4.Photography_Club';
						}
						if ($yourgroupsid[$t]['groupact'] == 5) {
							$new[$t] = 'Theatre Arts Productions';
							$action[$t] = '5.Theatre_Arts_Productions';
						}
						if ($yourgroupsid[$t]['groupact'] == 51) {
							$new[$t] = 'Best Buddies';
							$action[$t] = '51.Best_Buddies';
						}
						if ($yourgroupsid[$t]['groupact'] == 52) {
							$new[$t] = 'Environmental Club (SAVE)';
							$action[$t] = '52.Environmental_Club_(SAVE)';
						}
						if ($yourgroupsid[$t]['groupact'] == 53) {
							$new[$t] = 'French National Honor Society';
							$action[$t] = '53.French_National_Honor_Society';
						}
						if ($yourgroupsid[$t]['groupact'] == 54) {
							$new[$t] = 'Math National Honor Society';
							$action[$t] = '54.Math_National_Honor_Society';
						}
						if ($yourgroupsid[$t]['groupact'] == 55) {
							$new[$t] = 'National Art Honor Society';
							$action[$t] = '55.National_Art_Honor_Society';
						}
						if ($yourgroupsid[$t]['groupact'] == 56) {
							$new[$t] = 'National Latin Honor Society';
							$action[$t] = '56.National_Latin_Honor_Society';
						}
						if ($yourgroupsid[$t]['groupact'] == 57) {
							$new[$t] = 'National Technical Honor Society (NTHS)';
							$action[$t] = '57.National_Technical_Honor_Society_(NTHS)';
						}
						if ($yourgroupsid[$t]['groupact'] == 58) {
							$new[$t] = 'Science National Honor Society';
							$action[$t] = '58.Science_National_Honor_Society';
						}
						if ($yourgroupsid[$t]['groupact'] == 59) {
							$new[$t] = 'Tri-M Music National Honor Society';
							$action[$t] = '59.Tri-M_Music_National_Honor_Society';
						}
						if ($yourgroupsid[$t]['groupact'] == 101) {
							$new[$t] = 'Band';
							$action[$t] = '101.Band';
						}
						if ($yourgroupsid[$t]['groupact'] == 102) {
							$new[$t] = 'Dance';
							$action[$t] = '102.Dance';
						}
						if ($yourgroupsid[$t]['groupact'] == 103) {
							$new[$t] = 'Jazz Band';
							$action[$t] = '103.Jazz_Band';
						}
						if ($yourgroupsid[$t]['groupact'] == 104) {
							$new[$t] = 'Lunch Choir / Concert Choir';
							$action[$t] = '104.Lunch_Choir_Concert_Choir';
						}
						if ($yourgroupsid[$t]['groupact'] == 105) {
							$new[$t] = 'Marching Band';
							$action[$t] = '105.Marching_Band';
						}
						if ($yourgroupsid[$t]['groupact'] == 106) {
							$new[$t] = 'Men\'s Choir';
							$action[$t] = '106.Mens_Choir';
						}
						if ($yourgroupsid[$t]['groupact'] == 107) {
							$new[$t] = 'Orchestra';
							$action[$t] = '107.Orchestra';
						}
						if ($yourgroupsid[$t]['groupact'] == 108) {
							$new[$t] = 'Step Team';
							$action[$t] = '108.Step_Team';
						}
						if ($yourgroupsid[$t]['groupact'] == 109) {
							$new[$t] = 'Theater Arts Productions';
							$action[$t] = '109.Theater_Arts_Productions';
						}
						if ($yourgroupsid[$t]['groupact'] == 110) {
							$new[$t] = 'Tri-M Music National Honor Society';
							$action[$t] = '110.Tri-M_Music_National_Honor_Society';
						}
						if ($yourgroupsid[$t]['groupact'] == 111) {
							$new[$t] = 'Women\'s Choir';
							$action[$t] = '111.Womens_Choir';
						}
						if ($yourgroupsid[$t]['groupact'] == 151) {
							$new[$t] = 'Allied Bowling';
							$action[$t] = '151.Allied_Bowling';
						}
						if ($yourgroupsid[$t]['groupact'] == 152) {
							$new[$t] = 'Allied Soccer';
							$action[$t] = '152.Allied_Soccer';
						}
						if ($yourgroupsid[$t]['groupact'] == 153) {
							$new[$t] = 'Allied Softball';
							$action[$t] = '153.Allied_Softball';
						}
						if ($yourgroupsid[$t]['groupact'] == 154) {
							$new[$t] = 'Baseball';
							$action[$t] = '154.Baseball';
						}
						if ($yourgroupsid[$t]['groupact'] == 155) {
							$new[$t] = 'Basketball - Boys';
							$action[$t] = '155.Basketball_Boys';
						}
						if ($yourgroupsid[$t]['groupact'] == 156) {
							$new[$t] = 'Basketball - Girls';
							$action[$t] = '156.Basketball_Girls';
						}
						if ($yourgroupsid[$t]['groupact'] == 157) {
							$new[$t] = 'Boys Lacrosse';
							$action[$t] = '157.Boys_Lacrosse';
						}
						if ($yourgroupsid[$t]['groupact'] == 158) {
							$new[$t] = 'Boys Soccer';
							$action[$t] = '158.Boys_Soccer';
						}
						if ($yourgroupsid[$t]['groupact'] == 159) {
							$new[$t] = 'Cheerleading';
							$action[$t] = '159.Cheerleading';
						}
						if ($yourgroupsid[$t]['groupact'] == 160) {
							$new[$t] = 'Cross Country';
							$action[$t] = '160.Cross_Country';
						}
						if ($yourgroupsid[$t]['groupact'] == 161) {
							$new[$t] = 'Field Hockey';
							$action[$t] = '161.Field_Hockey';
						}
						if ($yourgroupsid[$t]['groupact'] == 162) {
							$new[$t] = 'Football';
							$action[$t] = '162.Football';
						}
						if ($yourgroupsid[$t]['groupact'] == 163) {
							$new[$t] = 'Girls Lacrosse';
							$action[$t] = '163.Girls_Lacrosse';
						}
						if ($yourgroupsid[$t]['groupact'] == 164) {
							$new[$t] = 'Girls Soccer';
							$action[$t] = '164.Girls_Soccer';
						}
						if ($yourgroupsid[$t]['groupact'] == 165) {
							$new[$t] = 'Golf';
							$action[$t] = '165.Golf';
						}
						if ($yourgroupsid[$t]['groupact'] == 166) {
							$new[$t] = 'Ice Hockey';
							$action[$t] = '166.Ice_Hockey';
						}
						if ($yourgroupsid[$t]['groupact'] == 167) {
							$new[$t] = 'Indoor Track';
							$action[$t] = '167.Indoor_Track';
						}
						if ($yourgroupsid[$t]['groupact'] == 168) {
							$new[$t] = 'Outdoor Track';
							$action[$t] = '168.Outdoor_Track';
						}
						if ($yourgroupsid[$t]['groupact'] == 169) {
							$new[$t] = 'Softball';
							$action[$t] = '169.Softball';
						}
						if ($yourgroupsid[$t]['groupact'] == 170) {
							$new[$t] = 'Swim Club';
							$action[$t] = '170.Swim_Club';
						}
						if ($yourgroupsid[$t]['groupact'] == 171) {
							$new[$t] = 'Table Tennis Club';
							$action[$t] = '171.Table_Tennis_Club';
						}
						if ($yourgroupsid[$t]['groupact'] == 172) {
							$new[$t] = 'Tennis';
							$action[$t] = '172.Tennis';
						}
						if ($yourgroupsid[$t]['groupact'] == 173) {
							$new[$t] = 'Volleyball';
							$action[$t] = '173.Volleyball';
						}
						if ($yourgroupsid[$t]['groupact'] == 174) {
							$new[$t] = 'Wrestling';
							$action[$t] = '174.Wrestling';
						}
						if ($yourgroupsid[$t]['groupact'] == 201) {
							$new[$t] = 'Class Board';
							$action[$t] = '201.Class_Board';
						}
						if ($yourgroupsid[$t]['groupact'] == 202) {
							$new[$t] = 'Executive Board';
							$action[$t] = '202.Executive_Board';
						}
						$yourgroupsid[$t]['groupact'] = $new[$t];
						$yourgroupsid[$t]['action'] = $action[$t];
						$yourgroupsid[$t]['number'] = $t + 1;
						$t++;
					} while ($t < $yourgroupscount);
					foreach ($yourgroupsid as $yg) {
						echo "".$yg['number'].". <a href='Groups/".$yg['action'].".php?usernameLogin=".$loggedInUserId."'>".$yg['groupact']."</a><br><br>";
					}
					echo "<a href='16.P2P_Join_Groups.php?usernameLogin=".$loggedInUserId."'>Join More Groups</a>";
#					echo "<pre>";
#						print_r($yourgroupsid);
#					echo "</pre>";
				} else {
					echo "<a href='16.P2P_Join_Groups.php?usernameLogin=".$loggedInUserId."'>Join a Group</a>";
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
			</div>
		</div>
	</body>
</html>