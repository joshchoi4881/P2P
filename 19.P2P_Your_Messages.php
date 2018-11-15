<!DOCTYPE html>
<?php
session_start();
$cstrong = True;
$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = $token;
}

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
				if (isset($_GET['mid'])) {
    			    $message = database::query('SELECT * FROM messages WHERE id=:mid AND receiver=:receiver OR sender=:sender', array(':mid'=>$_GET['mid'], ':receiver'=>$userId, ':sender'=>$userId))[0];
    			    echo '<h1>View Message</h1>';
    			    echo htmlspecialchars($message['body']);
    			    echo '<hr />';
    		    	if ($message['sender'] == $userId) {
    	            	$id = $message['receiver'];
    		    	} else {
        	    	    $id = $message['sender'];
       				}
        				database::query('UPDATE messages SET `read_`=1 WHERE id=:mid', array (':mid'=>$_GET['mid']));
        		?>
        		<form action="18.P2P_Send_Messages.php?usernameLogin=<?php echo $loggedInUserId; ?>&receiver=<?php echo $id; ?>" method="post">
                	<textarea name="body" rows="8" cols="50"></textarea><br>
                	<input type="hidden" name="nocsrf" value="<?php echo $_SESSION['token']; ?>">
                	<input type="submit" name="send" value="Send Message">
        		</form>
        		<?php
				} else {
					echo "<center><h1 id='tasksTitle'>Inbox</h1></center>";
					$messages = database::query('SELECT messages.*, users.username 
						FROM messages, users 
						WHERE (receiver=:receiver
						OR sender=:sender) 
						AND users.id1=messages.sender
						ORDER BY messages.id DESC', array(':receiver'=>$userId, ':sender'=>$userId));
					foreach ($messages as $message) {
				        if (strlen($message['body']) > 10) {
	    		            $m = substr($message['body'], 0, 10)."...";
	        			} else {
   		     		        $m = $message['body'];
       		 			}
       					if ($message['read_'] == 0) {
        			        echo "<a href='19.P2P_Your_Messages.php?usernameLogin=".$loggedInUserId."&mid=".$message['id']."'><strong>".$m."</strong></a> sent by ".$message['username'].'<hr />';
        				} else {
        		    	    echo "<a href='19.P2P_Your_Messages.php?usernameLogin=".$loggedInUserId."&mid=".$message['id']."'>".$m."</a> sent by ".$message['username'].'<hr />';
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