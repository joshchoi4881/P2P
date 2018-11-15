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
				echo "<center><h1 id='tasksTitle'>Notifications</h1></center>";
				if (database::query('SELECT * FROM notifications WHERE receiver=:userid', array(':userid'=>$userId))) {
			        $notifications = database::query('SELECT * FROM notifications WHERE receiver=:userid ORDER BY id DESC', array(':userid'=>$userId));
			        foreach($notifications as $n) {
	            		if ($n['actgroup'] == '1') {
							$new['actgroup'] = 'Film Club';
							$action = '1.Film_Club';
						}
						if ($n['actgroup'] == '2') {
							$new['actgroup'] = 'Improvisation Club';
							$action = '2.Improvisation_Club';
						}
						if ($n['actgroup'] == '3') {
							$new['actgroup'] = 'National Art Honor Society (NAHS)';
							$action = '3.National_Art_Honor_Society_(NAHS)';
						}
						if ($n['actgroup'] == '4') {
							$new['actgroup'] = 'Photography Club';
							$action = '4.Photography_Club';
						}
						if ($n['actgroup'] == '5') {
							$new['actgroup'] = 'Theatre Arts Productions';
							$action = '5.Theatre_Arts_Productions';
						}
						if ($n['actgroup'] == '51') {
							$new['actgroup'] = 'Best Buddies';
							$action = '51.Best_Buddies';
						}
						if ($n['actgroup'] == '52') {
							$new['actgroup'] = 'Environmental Club (SAVE)';
							$action = '52.Environmental_Club_(SAVE)';
						}
						if ($n['actgroup'] == '53') {
							$new['actgroup'] = 'French National Honor Society';
							$action = '53.French_National_Honor_Society';
						}
						if ($n['actgroup'] == '54') {
							$new['actgroup'] = 'Math National Honor Society';
							$action = '54.Math_National_Honor_Society';
						}
						if ($n['actgroup'] == '55') {
							$new['actgroup'] = 'National Art Honor Society';
							$action = '55.National_Art_Honor_Society';
						}
						if ($n['actgroup'] == '56') {
							$new['actgroup'] = 'National Latin Honor Society';
							$action = '56.National_Latin_Honor_Society';
						}
						if ($n['actgroup'] == '57') {
							$new['actgroup'] = 'National Technical Honor Society (NTHS)';
							$action = '57.National_Technical_Honor_Society_(NTHS)';
						}
						if ($n['actgroup'] == '58') {
							$new['actgroup'] = 'Science National Honor Society';
							$action = '58.Science_National_Honor_Society';
						}
						if ($n['actgroup'] == '59') {
							$new['actgroup'] = 'Tri-M Music National Honor Society';
							$action = '59.Tri-M_Music_National_Honor_Society';
						}
						if ($n['actgroup'] == '101') {
							$new['actgroup'] = 'Band';
							$action = '101.Band';
						}
						if ($n['actgroup'] == '102') {
							$new['actgroup'] = 'Dance';
							$action = '102.Dance';
						}
						if ($n['actgroup'] == '103') {
							$new['actgroup'] = 'Jazz Band';
							$action = '103.Jazz_Band';
						}
						if ($n['actgroup'] == '104') {
							$new['actgroup'] = 'Lunch Choir / Concert Choir';
							$action = '104.Lunch_Choir_Concert_Choir';
						}
						if ($n['actgroup'] == '105') {
							$new['actgroup'] = 'Marching Band';
							$action = '105.Marching_Band';
						}
						if ($n['actgroup'] == '106') {
							$new['actgroup'] = 'Men\'s Choir';
							$action = '106.Mens_Choir';
						}
						if ($n['actgroup'] == '107') {
							$new['actgroup'] = 'Orchestra';
							$action = '107.Orchestra';
						}
						if ($n['actgroup'] == '108') {
							$new['actgroup'] = 'Step Team';
							$action = '108.Step_Team';
						}
						if ($n['actgroup'] == '109') {
							$new['actgroup'] = 'Theater Arts Productions';
							$action = '109.Theater_Arts_Productions';
						}
						if ($n['actgroup'] == '110') {
							$new['actgroup'] = 'Tri-M Music National Honor Society';
							$action = '110.Tri-M_Music_National_Honor_Society';
						}
						if ($n['actgroup'] == '111') {
							$new['actgroup'] = 'Women\'s Choir';
							$action = '111.Womens_Choir';
						}
						if ($n['actgroup'] == '151') {
							$new['actgroup'] = 'Allied Bowling';
							$action = '151.Allied_Bowling';
						}
						if ($n['actgroup'] == '152') {
							$new['actgroup'] = 'Allied Soccer';
							$action = '152.Allied_Soccer';
						}
						if ($n['actgroup'] == '153') {
							$new['actgroup'] = 'Allied Softball';
							$action = '153.Allied_Softball';
						}
						if ($n['actgroup'] == '154') {
							$new['actgroup'] = 'Baseball';
							$action = '154.Baseball';
						}
						if ($n['actgroup'] == '155') {
							$new['actgroup'] = 'Basketball - Boys';
							$action = '155.Basketball_Boys';
						}
						if ($n['actgroup'] == '156') {
							$new['actgroup'] = 'Basketball - Girls';
							$action = '156.Basketball_Girls';
						}
						if ($n['actgroup'] == '157') {
							$new['actgroup'] = 'Boys Lacrosse';
							$action = '157.Boys_Lacrosse';
						}
						if ($n['actgroup'] == '158') {
							$new['actgroup'] = 'Boys Soccer';
							$action = '158.Boys_Soccer';
						}
						if ($n['actgroup'] == '159') {
							$new['actgroup'] = 'Cheerleading';
							$action = '159.Cheerleading';
						}
						if ($n['actgroup'] == '160') {
							$new['actgroup'] = 'Cross Country';
							$action = '160.Cross_Country';
						}
						if ($n['actgroup'] == '161') {
							$new['actgroup'] = 'Field Hockey';
							$action = '161.Field_Hockey';
						}
						if ($n['actgroup'] == '162') {
							$new['actgroup'] = 'Football';
							$action = '162.Football';
						}
						if ($n['actgroup'] == '163') {
							$new['actgroup'] = 'Girls Lacrosse';
							$action = '163.Girls_Lacrosse';
						}
						if ($n['actgroup'] == '164') {
							$new['actgroup'] = 'Girls Soccer';
							$action = '164.Girls_Soccer';
						}
						if ($n['actgroup'] == '165') {
							$new['actgroup'] = 'Golf';
							$action = '165.Golf';
						}
						if ($n['actgroup'] == '166') {
							$new['actgroup'] = 'Ice Hockey';
							$action = '166.Ice_Hockey';
						}
						if ($n['actgroup'] == '167') {
							$new['actgroup'] = 'Indoor Track';
							$action = '167.Indoor_Track';
						}
						if ($n['actgroup'] == '168') {
							$new['actgroup'] = 'Outdoor Track';
							$action = '168.Outdoor_Track';
						}
						if ($n['actgroup'] == '169') {
							$new['actgroup'] = 'Softball';
							$action = '169.Softball';
						}
						if ($n['actgroup'] == '170') {
							$new['actgroup'] = 'Swim Club';
							$action = '170.Swim_Club';
						}
						if ($n['actgroup'] == '171') {
							$new['actgroup'] = 'Table Tennis Club';
							$action = '171.Table_Tennis_Club';
						}
						if ($n['actgroup'] == '172') {
							$new['actgroup'] = 'Tennis';
							$action = '172.Tennis';
						}
						if ($n['actgroup'] == '173') {
							$new['actgroup'] = 'Volleyball';
							$action = '173.Volleyball';
						}
						if ($n['actgroup'] == '174') {
							$new['actgroup'] = 'Wrestling';
							$action = '174.Wrestling';
						}
						if ($n['actgroup'] == '201') {
							$new['actgroup'] = 'Class Board';
							$action = '201.Class_Board';
						}
						if ($n['actgroup'] == '202') {
							$new['actgroup'] = 'Executive Board';
							$action = '202.Executive_Board';
						}
						$n['actgroup'] = $new['actgroup'];
			            if ($n['type'] == 1) {
	                        $senderName = database::query('SELECT username FROM users WHERE id1=:senderid', array(':senderid'=>$n['sender']))[0]['username'];
	                        $extra = json_decode($n['extra']);
	                        echo $senderName." mentioned you in a ".$new['actgroup']." group post - <a href='Groups/".$action.".php?usernameLogin=".$usernameLogin."'>".$extra->postbody."</a><hr />";
				    	} else if ($n['type'] == 2) {
                        	$senderName = database::query('SELECT username FROM users WHERE id1=:senderid', array(':senderid'=>$n['sender']))[0]['username'];
                        	echo $senderName." liked your group post in <a href='Groups/".$action.".php?usernameLogin=".$usernameLogin."'>".$new['actgroup']."</a><hr />";
                		} else if ($n['type'] == 3) {
                			$senderName = database::query('SELECT username FROM users WHERE id1=:senderid', array(':senderid'=>$n['sender']))[0]['username'];
                			$extra = json_decode($n['extra']);
                			echo $senderName." mentioned you in a ".$new['actgroup']." group comment - <a href='Groups/".$action.".php?usernameLogin=".$usernameLogin."'>".$extra->postbody."</a><hr />";
                		}
				    }
				}

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