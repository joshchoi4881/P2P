<!DOCTYPE html>
<?php
include('Classes/P2P_Database.php');
include('Classes/P2P_Login_Function.php');
include('Classes/P2P_Profile_Page.php');
include('Classes/P2P_Images.php');

if (database::query('SELECT profileimg FROM users WHERE id1=:id1', array(':id1'=>$userId))) {
        $profilepicture = database::query('SELECT profileimg FROM users WHERE id1=:id1', array(':id1'=>$userId))[0]['profileimg'];
}

if($_GET['usernameLogin'] != $loggedInUserId) {
        header("Location: 7.P2P_Profile.php?usernameLogin=$loggedInUserId");
}

if (isset($_POST['uploadprofileimg'])) {
        Image::uploadImage('profileimg', "UPDATE users SET profileimg = :profileimg WHERE id1=:userid", array(':userid'=>$userId));
}
?>
<html>
        <head>
<!--            <link rel="stylesheet" type="text/css" href="CSS/P2P_CSS.css"/>
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
                                echo "<center><h1 id='tasksTitle'>Profile Picture</h1></center>";
                        }
                                ?>
                        <form action="21.P2P_Images.php?usernameLogin=<?php echo $loggedInUserId; ?>" method="post" enctype="multipart/form-data">
                                <p>Upload a profile picture:<p><br>
                                <input type="file" name="profileimg"><br><br><br>
                                <input type="submit" name="uploadprofileimg" value="Upload Image">
                        </form>
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