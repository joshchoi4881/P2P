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
			if ($_GET['usernameLogin'] == $loggedInUserId) {
				echo "<center><h1 id='tasksTitle'>Groups</h1></center>";
				echo '<a href="17.P2P_Your_Groups.php?usernameLogin='.$loggedInUserId.'">Your Groups</a>';
				echo '<br><br><fieldset><legend>Art</legend>
					<a href="Groups/1.Film_Club.php?usernameLogin='.$loggedInUserId.'">Film Club</a>';
				echo '<br><br>
					<a href="Groups/2.Improvisation_Club.php?usernameLogin='.$loggedInUserId.'">Improvisation Club</a>';
				echo '<br><br>
					<a href="Groups/3.National_Art_Honor_Society_(NAHS).php?usernameLogin='.$loggedInUserId.'">National Art Honor Society (NAHS)</a>';
				echo '<br><br>
					<a href="Groups/4.Photography_Club.php?usernameLogin='.$loggedInUserId.'">Photography Club</a>';
				echo '<br><br>
					<a href="Groups/5.Theatre_Arts_Productions.php?usernameLogin='.$loggedInUserId.'">Theatre Arts Productions</a></fieldset>';
				
				echo '<br><fieldset><legend>Community Service</legend>
					<a href="Groups/51.Best_Buddies.php?usernameLogin='.$loggedInUserId.'">Best Buddies</a>';
				echo '<br><br>
					<a href="Groups/52.Environmental_Club_(SAVE).php?usernameLogin='.$loggedInUserId.'">Environmental Club (SAVE)</a>';
				echo '<br><br>
					<a href="Groups/53.French_National_Honor_Society.php?usernameLogin='.$loggedInUserId.'">French National Honor Society</a>';
				echo '<br><br>
					<a href="Groups/54.Math_National_Honor_Society.php?usernameLogin='.$loggedInUserId.'">Math National Honor Society</a>';
				echo '<br><br>
					<a href="Groups/55.National_Art_Honor_Society.php?usernameLogin='.$loggedInUserId.'">National Art Honor Society</a>';
				echo '<br><br>
					<a href="Groups/56.National_Latin_Honor_Society.php?usernameLogin='.$loggedInUserId.'">National Latin Honor Society</a>';
				echo '<br><br>
					<a href="Groups/57.National_Technical_Honor_Society_(NTHS).php?usernameLogin='.$loggedInUserId.'">National Technical Honor Society (NTHS)</a>';
				echo '<br><br>
					<a href="Groups/58.Science_National_Honor_Society.php?usernameLogin='.$loggedInUserId.'">Science National Honor Society</a>';
				echo '<br><br>
					<a href="Groups/59.Tri-M_Music_National_Honor_Society.php?usernameLogin='.$loggedInUserId.'">Tri-M Music National Honor Society</a></fieldset>';
				
				echo '<br><fieldset><legend>Music</legend>
					<a href="Groups/101.Band.php?usernameLogin='.$loggedInUserId.'">Band</a>';
				echo '<br><br>
					<a href="Groups/102.Dance.php?usernameLogin='.$loggedInUserId.'">Dance</a>';
				echo '<br><br>
					<a href="Groups/103.Jazz_Band.php?usernameLogin='.$loggedInUserId.'">Jazz Band</a>';
				echo '<br><br>
					<a href="Groups/104.Lunch_Choir_Concert_Choir.php?usernameLogin='.$loggedInUserId.'">Lunch Choir / Concert Choir</a>';
				echo '<br><br>
					<a href="Groups/105.Marching_Band.php?usernameLogin='.$loggedInUserId.'">Marching Band</a>';
				echo '<br><br>
					<a href="Groups/106.Mens_Choir.php?usernameLogin='.$loggedInUserId.'">Men\'s Choir</a>';
				echo '<br><br>
					<a href="Groups/107.Orchestra.php?usernameLogin='.$loggedInUserId.'">Orchestra</a>';
				echo '<br><br>
					<a href="Groups/108.Step_Team.php?usernameLogin='.$loggedInUserId.'">Step Team</a>';
				echo '<br><br>
					<a href="Groups/109.Theater_Arts_Productions.php?usernameLogin='.$loggedInUserId.'">Theater Arts Productions</a>';
				echo '<br><br>
					<a href="Groups/110.Tri-M_Music_National_Honor_Society.php?usernameLogin='.$loggedInUserId.'">Tri-M Music National Honor Society</a>';
				echo '<br><br>
					<a href="Groups/111.Womens_Choir.php?usernameLogin='.$loggedInUserId.'">Women\'s Choir</a></fieldset>';

				echo '<br><fieldset><legend>Sports</legend>
					<a href="Groups/151.Allied_Bowling.php?usernameLogin='.$loggedInUserId.'">Allied Bowling</a>';
				echo '<br><br>
					<a href="Groups/152.Allied_Soccer.php?usernameLogin='.$loggedInUserId.'">Allied Soccer</a>';
				echo '<br><br>
					<a href="Groups/153.Allied_Softball.php?usernameLogin='.$loggedInUserId.'">Allied Softball</a>';
				echo '<br><br>
					<a href="Groups/154.Baseball.php?usernameLogin='.$loggedInUserId.'">Baseball</a>';
				echo '<br><br>
					<a href="Groups/155.Basketball_Boys.php?usernameLogin='.$loggedInUserId.'">Basketball - Boys</a>';
				echo '<br><br>
					<a href="Groups/156.Basketball_Girls.php?usernameLogin='.$loggedInUserId.'">Basketball - Girls</a>';
				echo '<br><br>
					<a href="Groups/157.Boys_Lacrosse.php?usernameLogin='.$loggedInUserId.'">Boys Lacrosse</a>';
				echo '<br><br>
					<a href="Groups/158.Boys_Soccer.php?usernameLogin='.$loggedInUserId.'">Boys Soccer</a>';
				echo '<br><br>
					<a href="Groups/159.Cheerleading.php?usernameLogin='.$loggedInUserId.'">Cheerleading</a>';
				echo '<br><br>
					<a href="Groups/160.Cross_Country.php?usernameLogin='.$loggedInUserId.'">Cross Country</a>';
				echo '<br><br>
					<a href="Groups/161.Field_Hockey.php?usernameLogin='.$loggedInUserId.'">Field Hockey</a>';
				echo '<br><br>
					<a href="Groups/162.Football.php?usernameLogin='.$loggedInUserId.'">Football</a>';
				echo '<br><br>
					<a href="Groups/163.Girls_Lacrosse.php?usernameLogin='.$loggedInUserId.'">Girls Lacrosse</a>';
				echo '<br><br>
					<a href="Groups/164.Girls_Soccer.php?usernameLogin='.$loggedInUserId.'">Girls Soccer</a>';
				echo '<br><br>
					<a href="Groups/165.Golf.php?usernameLogin='.$loggedInUserId.'">Golf</a>';
				echo '<br><br>
					<a href="Groups/166.Ice_Hockey.php?usernameLogin='.$loggedInUserId.'">Ice Hockey</a>';
				echo '<br><br>
					<a href="Groups/167.Indoor_Track.php?usernameLogin='.$loggedInUserId.'">Indoor Track</a>';
				echo '<br><br>
					<a href="Groups/168.Outdoor_Track.php?usernameLogin='.$loggedInUserId.'">Outdoor Track</a>';
				echo '<br><br>
					<a href="Groups/169.Softball.php?usernameLogin='.$loggedInUserId.'">Softball</a>';
				echo '<br><br>
					<a href="Groups/170.Swim_Club.php?usernameLogin='.$loggedInUserId.'">Swim Club</a>';
				echo '<br><br>
					<a href="Groups/171.Table_Tennis_Club.php?usernameLogin='.$loggedInUserId.'">Table Tennis Club</a>';
				echo '<br><br>
					<a href="Groups/172.Tennis.php?usernameLogin='.$loggedInUserId.'">Tennis</a>';
				echo '<br><br>
					<a href="Groups/173.Volleyball.php?usernameLogin='.$loggedInUserId.'">Volleyball</a>';
				echo '<br><br>
					<a href="Groups/174.Wrestling.php?usernameLogin='.$loggedInUserId.'">Wrestling</a></fieldset>';
				
				echo '<br><fieldset><legend>Student Government</legend>
					<a href="Groups/201.Class_Board.php?usernameLogin='.$loggedInUserId.'">Class Board</a>';
				echo '<br><br>
					<a href="Groups/202.Executive_Board.php?usernameLogin='.$loggedInUserId.'">Executive Board</a></fieldset>';
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