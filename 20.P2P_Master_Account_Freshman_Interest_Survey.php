<!DOCTYPE html>
<?php
include('Classes/P2P_Database.php');
include('Classes/P2P_Login_Function.php');
include('Classes/P2P_Profile_Page.php');
include('classes/P2P_Mail.php');

if (database::query('SELECT profileimg FROM users WHERE id1=:id1', array(':id1'=>$userId))) {
	$profilepicture = database::query('SELECT profileimg FROM users WHERE id1=:id1', array(':id1'=>$userId))[0]['profileimg'];
}

if(!$verifiedAndLoggedIn) {
	header("Location: 7.P2P_Profile.php?usernameLogin=$loggedInUserId");
}
if($_GET['usernameLogin'] != $loggedInUserId) {
	header("Location: 7.P2P_Profile.php?usernameLogin=$loggedInUserId");
}

if(isset($_POST['aaabbbccc'])) {
	$acount = database::query('SELECT count(*), SUM(CASE WHEN (act1="a" OR act2="a" OR
		act3="a" OR act4="a" OR act5="a" OR act6="a" OR act7="a" OR 
		act8="a" OR act9="a" OR act10="a")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="a" OR act2="a" OR
		act3="a" OR act4="a" OR act5="a" OR act6="a" OR act7="a" OR 
		act8="a" OR act9="a" OR act10="a")
		THEN 1 ELSE 0 END)'];
	$aid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "a" OR freshman_interest.act2 = "a" OR
		freshman_interest.act3 = "a" OR freshman_interest.act4 = "a" OR
		freshman_interest.act5 = "a" OR freshman_interest.act6 = "a" OR
		freshman_interest.act7 = "a" OR freshman_interest.act8 = "a" OR
		freshman_interest.act9 = "a" OR freshman_interest.act10 = "a")');
	$t = 0;
	if ($acount != 0) {
		do {
			$ahello[$t] = $aid[$t]['email'];
			$t++;
		} while ($t < $acount);
	}
	if ($acount != 0) {
		$ayello = implode(', ', $ahello);
		Mail::sendMail('Peer-to-Peer E-mail List for Film Club', 'Here are the e-mails of the students interested in Film Club:<br>'.$ayello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'a'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'a'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'a'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'a'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'a'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'a'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'a'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'a'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'a'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'a'));
	} else {
	}
	$bcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="b" OR act2="b" OR
		act3="b" OR act4="b" OR act5="b" OR act6="b" OR act7="b" OR 
		act8="b" OR act9="b" OR act10="b")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="b" OR act2="b" OR
		act3="b" OR act4="b" OR act5="b" OR act6="b" OR act7="b" OR 
		act8="b" OR act9="b" OR act10="b")
		THEN 1 ELSE 0 END)'];
	$bid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "b" OR freshman_interest.act2 = "b" OR
		freshman_interest.act3 = "b" OR freshman_interest.act4 = "b" OR
		freshman_interest.act5 = "b" OR freshman_interest.act6 = "b" OR
		freshman_interest.act7 = "b" OR freshman_interest.act8 = "b" OR
		freshman_interest.act9 = "b" OR freshman_interest.act10 = "b")');
	$t = 0;
	if ($bcount != 0) {
		do {
			$bhello[$t] = $bid[$t]['email'];
			$t++;
		} while ($t < $bcount);
	}
	if ($bcount != 0) {
		$byello = implode(', ', $bhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Improvisation Club', 'Here are the e-mails of the students interested in Improvisation Club:<br>'.$byello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'b'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'b'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'b'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'b'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'b'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'b'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'b'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'b'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'b'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'b'));
	} else {
	}
	$ccount = database::query('SELECT count(*), SUM(CASE WHEN (act1="c" OR act2="c" OR
		act3="c" OR act4="c" OR act5="c" OR act6="c" OR act7="c" OR 
		act8="c" OR act9="c" OR act10="c")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="c" OR act2="c" OR
		act3="c" OR act4="c" OR act5="c" OR act6="c" OR act7="c" OR 
		act8="c" OR act9="c" OR act10="c")
		THEN 1 ELSE 0 END)'];
	$cid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "c" OR freshman_interest.act2 = "c" OR
		freshman_interest.act3 = "c" OR freshman_interest.act4 = "c" OR
		freshman_interest.act5 = "c" OR freshman_interest.act6 = "c" OR
		freshman_interest.act7 = "c" OR freshman_interest.act8 = "c" OR
		freshman_interest.act9 = "c" OR freshman_interest.act10 = "c")');
	$t = 0;
	if ($ccount != 0) {
		do {
			$chello[$t] = $cid[$t]['email'];
			$t++;
		} while ($t < $ccount);
	}
	if ($ccount != 0) {
		$cyello = implode(', ', $chello);
		Mail::sendMail('Peer-to-Peer E-mail List for National Art Honor Society (NAHS)', 'Here are the e-mails of the students interested in National Art Honor Society (NAHS):<br>'.$cyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'c'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'c'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'c'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'c'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'c'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'c'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'c'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'c'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'c'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'c'));
	} else {
	}
	$dcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="d" OR act2="d" OR
		act3="d" OR act4="d" OR act5="d" OR act6="d" OR act7="d" OR 
		act8="d" OR act9="d" OR act10="d")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="d" OR act2="d" OR
		act3="d" OR act4="d" OR act5="d" OR act6="d" OR act7="d" OR 
		act8="d" OR act9="d" OR act10="d")
		THEN 1 ELSE 0 END)'];
	$did = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "d" OR freshman_interest.act2 = "d" OR
		freshman_interest.act3 = "d" OR freshman_interest.act4 = "d" OR
		freshman_interest.act5 = "d" OR freshman_interest.act6 = "d" OR
		freshman_interest.act7 = "d" OR freshman_interest.act8 = "d" OR
		freshman_interest.act9 = "d" OR freshman_interest.act10 = "d")');
	$t = 0;
	if ($dcount != 0) {
		do {
			$dhello[$t] = $did[$t]['email'];
			$t++;
		} while ($t < $dcount);
	}
	if ($dcount != 0) {
		$dyello = implode(', ', $dhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Photography Club', 'Here are the e-mails of the students interested in Photography Club:<br>'.$dyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'d'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'d'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'d'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'d'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'d'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'d'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'d'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'d'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'d'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'d'));
	} else {
	}
	$ecount = database::query('SELECT count(*), SUM(CASE WHEN (act1="e" OR act2="e" OR
		act3="e" OR act4="e" OR act5="e" OR act6="e" OR act7="e" OR 
		act8="e" OR act9="e" OR act10="e")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="e" OR act2="e" OR
		act3="e" OR act4="e" OR act5="e" OR act6="e" OR act7="e" OR 
		act8="e" OR act9="e" OR act10="e")
		THEN 1 ELSE 0 END)'];
	$eid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "e" OR freshman_interest.act2 = "e" OR
		freshman_interest.act3 = "e" OR freshman_interest.act4 = "e" OR
		freshman_interest.act5 = "e" OR freshman_interest.act6 = "e" OR
		freshman_interest.act7 = "e" OR freshman_interest.act8 = "e" OR
		freshman_interest.act9 = "e" OR freshman_interest.act10 = "e")');
	$t = 0;
	if ($ecount != 0) {
		do {
			$ehello[$t] = $eid[$t]['email'];
			$t++;
		} while ($t < $ecount);
	}
	if ($ecount != 0) {
		$eyello = implode(', ', $ehello);
		Mail::sendMail('Peer-to-Peer E-mail List for Theatre Arts Productions', 'Here are the e-mails of the students interested in Theatre Arts Productions:<br>'.$eyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'e'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'e'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'e'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'e'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'e'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'e'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'e'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'e'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'e'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'e'));
	} else {
	}
	$fcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="f" OR act2="f" OR
		act3="f" OR act4="f" OR act5="f" OR act6="f" OR act7="f" OR 
		act8="f" OR act9="f" OR act10="f")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="f" OR act2="f" OR
		act3="f" OR act4="f" OR act5="f" OR act6="f" OR act7="f" OR 
		act8="f" OR act9="f" OR act10="f")
		THEN 1 ELSE 0 END)'];
	$fid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "f" OR freshman_interest.act2 = "f" OR
		freshman_interest.act3 = "f" OR freshman_interest.act4 = "f" OR
		freshman_interest.act5 = "f" OR freshman_interest.act6 = "f" OR
		freshman_interest.act7 = "f" OR freshman_interest.act8 = "f" OR
		freshman_interest.act9 = "f" OR freshman_interest.act10 = "f")');
	$t = 0;
	if ($fcount != 0) {
		do {
			$fhello[$t] = $fid[$t]['email'];
			$t++;
		} while ($t < $fcount);
	}
	if ($fcount != 0) {
		$fyello = implode(', ', $fhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Alpha Achievers', 'Here are the e-mails of the students interested in Alpha Achievers:<br>'.$fyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'f'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'f'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'f'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'f'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'f'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'f'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'f'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'f'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'f'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'f'));
	}
	$gcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="g" OR act2="g" OR
		act3="g" OR act4="g" OR act5="g" OR act6="g" OR act7="g" OR 
		act8="g" OR act9="g" OR act10="g")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="g" OR act2="g" OR
		act3="g" OR act4="g" OR act5="g" OR act6="g" OR act7="g" OR 
		act8="g" OR act9="g" OR act10="g")
		THEN 1 ELSE 0 END)'];
	$gid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "g" OR freshman_interest.act2 = "g" OR
		freshman_interest.act3 = "g" OR freshman_interest.act4 = "g" OR
		freshman_interest.act5 = "g" OR freshman_interest.act6 = "g" OR
		freshman_interest.act7 = "g" OR freshman_interest.act8 = "g" OR
		freshman_interest.act9 = "g" OR freshman_interest.act10 = "g")');
	$t = 0;
	if ($gcount != 0) {
		do {
			$ghello[$t] = $gid[$t]['email'];
			$t++;
		} while ($t < $gcount);
	}
	if ($gcount != 0) {
		$gyello = implode(', ', $ghello);
		Mail::sendMail('Peer-to-Peer E-mail List for American Red Cross Club', 'Here are the e-mails of the students interested in American Red Cross Club:<br>'.$gyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'g'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'g'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'g'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'g'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'g'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'g'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'g'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'g'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'g'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'g'));
	} else {
	}
	$hcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="h" OR act2="h" OR
		act3="h" OR act4="h" OR act5="h" OR act6="h" OR act7="h" OR 
		act8="h" OR act9="h" OR act10="h")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="h" OR act2="h" OR
		act3="h" OR act4="h" OR act5="h" OR act6="h" OR act7="h" OR 
		act8="h" OR act9="h" OR act10="h")
		THEN 1 ELSE 0 END)'];
	$hid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "h" OR freshman_interest.act2 = "h" OR
		freshman_interest.act3 = "h" OR freshman_interest.act4 = "h" OR
		freshman_interest.act5 = "h" OR freshman_interest.act6 = "h" OR
		freshman_interest.act7 = "h" OR freshman_interest.act8 = "h" OR
		freshman_interest.act9 = "h" OR freshman_interest.act10 = "h")');
	$t = 0;
	if ($hcount != 0) {
		do {
			$hhello[$t] = $hid[$t]['email'];
			$t++;
		} while ($t < $hcount);
	}
	if ($hcount != 0) {
		$hyello = implode(', ', $hhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Anime Club', 'Here are the e-mails of the students interested in Anime Club:<br>'.$hyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'h'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'h'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'h'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'h'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'h'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'h'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'h'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'h'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'h'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'h'));
	} else {
	}
	$icount = database::query('SELECT count(*), SUM(CASE WHEN (act1="i" OR act2="i" OR
		act3="i" OR act4="i" OR act5="i" OR act6="i" OR act7="i" OR 
		act8="i" OR act9="i" OR act10="i")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="i" OR act2="i" OR
		act3="i" OR act4="i" OR act5="i" OR act6="i" OR act7="i" OR 
		act8="i" OR act9="i" OR act10="i")
		THEN 1 ELSE 0 END)'];
	$iid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "i" OR freshman_interest.act2 = "i" OR
		freshman_interest.act3 = "i" OR freshman_interest.act4 = "i" OR
		freshman_interest.act5 = "i" OR freshman_interest.act6 = "i" OR
		freshman_interest.act7 = "i" OR freshman_interest.act8 = "i" OR
		freshman_interest.act9 = "i" OR freshman_interest.act10 = "i")');
	$t = 0;
	if ($icount != 0) {
		do {
			$ihello[$t] = $iid[$t]['email'];
			$t++;
		} while ($t < $icount);
	}
	if ($icount != 0) {
		$iyello = implode(', ', $ihello);
		Mail::sendMail('Peer-to-Peer E-mail List for Asian Student Union', 'Here are the e-mails of the students interested in Asian Student Union:<br>'.$iyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'i'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'i'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'i'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'i'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'i'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'i'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'i'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'i'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'i'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'i'));
	} else {
	}
	$jcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="j" OR act2="j" OR
		act3="j" OR act4="j" OR act5="j" OR act6="j" OR act7="j" OR 
		act8="j" OR act9="j" OR act10="j")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="j" OR act2="j" OR
		act3="j" OR act4="j" OR act5="j" OR act6="j" OR act7="j" OR 
		act8="j" OR act9="j" OR act10="j")
		THEN 1 ELSE 0 END)'];
	$jid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "j" OR freshman_interest.act2 = "j" OR
		freshman_interest.act3 = "j" OR freshman_interest.act4 = "j" OR
		freshman_interest.act5 = "j" OR freshman_interest.act6 = "j" OR
		freshman_interest.act7 = "j" OR freshman_interest.act8 = "j" OR
		freshman_interest.act9 = "j" OR freshman_interest.act10 = "j")');
	$t = 0;
	if ($jcount != 0) {
		do {
			$jhello[$t] = $jid[$t]['email'];
			$t++;
		} while ($t < $jcount);
	}
	if ($jcount != 0) {
		$jyello = implode(', ', $jhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Best Buddies', 'Here are the e-mails of the students interested in Best Buddies:<br>'.$jyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'j'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'j'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'j'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'j'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'j'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'j'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'j'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'j'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'j'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'j'));
	} else {
	}
	$kcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="k" OR act2="k" OR
		act3="k" OR act4="k" OR act5="k" OR act6="k" OR act7="k" OR 
		act8="k" OR act9="k" OR act10="k")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="k" OR act2="k" OR
		act3="k" OR act4="k" OR act5="k" OR act6="k" OR act7="k" OR 
		act8="k" OR act9="k" OR act10="k")
		THEN 1 ELSE 0 END)'];
	$kid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "k" OR freshman_interest.act2 = "k" OR
		freshman_interest.act3 = "k" OR freshman_interest.act4 = "k" OR
		freshman_interest.act5 = "k" OR freshman_interest.act6 = "k" OR
		freshman_interest.act7 = "k" OR freshman_interest.act8 = "k" OR
		freshman_interest.act9 = "k" OR freshman_interest.act10 = "k")');
	$t = 0;
	if ($kcount != 0) {
		do {
			$khello[$t] = $kid[$t]['email'];
			$t++;
		} while ($t < $kcount);
	}
	if ($kcount != 0) {
		$kyello = implode(', ', $khello);
		Mail::sendMail('Peer-to-Peer E-mail List for Black/African Leadership Union (BALU)', 'Here are the e-mails of the students interested in Black/African Leadership Union (BALU):<br>'.$kyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'k'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'k'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'k'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'k'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'k'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'k'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'k'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'k'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'k'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'k'));
	} else {
	}
	$lcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="l" OR act2="l" OR
		act3="l" OR act4="l" OR act5="l" OR act6="l" OR act7="l" OR 
		act8="l" OR act9="l" OR act10="l")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="l" OR act2="l" OR
		act3="l" OR act4="l" OR act5="l" OR act6="l" OR act7="l" OR 
		act8="l" OR act9="l" OR act10="l")
		THEN 1 ELSE 0 END)'];
	$lid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "l" OR freshman_interest.act2 = "l" OR
		freshman_interest.act3 = "l" OR freshman_interest.act4 = "l" OR
		freshman_interest.act5 = "l" OR freshman_interest.act6 = "l" OR
		freshman_interest.act7 = "l" OR freshman_interest.act8 = "l" OR
		freshman_interest.act9 = "l" OR freshman_interest.act10 = "l")');
	$t = 0;
	if ($lcount != 0) {
		do {
			$lhello[$t] = $lid[$t]['email'];
			$t++;
		} while ($t < $lcount);
	}
	if ($lcount != 0) {
		$lyello = implode(', ', $lhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Chess Club', 'Here are the e-mails of the students interested in Chess Club:<br>'.$lyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'l'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'l'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'l'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'l'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'l'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'l'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'l'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'l'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'l'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'l'));
	} else {
	}
	$mcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="m" OR act2="m" OR
		act3="m" OR act4="m" OR act5="m" OR act6="m" OR act7="m" OR 
		act8="m" OR act9="m" OR act10="m")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="m" OR act2="m" OR
		act3="m" OR act4="m" OR act5="m" OR act6="m" OR act7="m" OR 
		act8="m" OR act9="m" OR act10="m")
		THEN 1 ELSE 0 END)'];
	$mid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "m" OR freshman_interest.act2 = "m" OR
		freshman_interest.act3 = "m" OR freshman_interest.act4 = "m" OR
		freshman_interest.act5 = "m" OR freshman_interest.act6 = "m" OR
		freshman_interest.act7 = "m" OR freshman_interest.act8 = "m" OR
		freshman_interest.act9 = "m" OR freshman_interest.act10 = "m")');
	$t = 0;
	if ($mcount != 0) {
		do {
			$mhello[$t] = $mid[$t]['email'];
			$t++;
		} while ($t < $mcount);
	}
	if ($mcount != 0) {
		$myello = implode(', ', $mhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Culture Club', 'Here are the e-mails of the students interested in Culture Club:<br>'.$myello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'m'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'m'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'m'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'m'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'m'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'m'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'m'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'m'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'m'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'m'));
	} else {
	}
	$ncount = database::query('SELECT count(*), SUM(CASE WHEN (act1="n" OR act2="n" OR
		act3="n" OR act4="n" OR act5="n" OR act6="n" OR act7="n" OR 
		act8="n" OR act9="n" OR act10="n")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="n" OR act2="n" OR
		act3="n" OR act4="n" OR act5="n" OR act6="n" OR act7="n" OR 
		act8="n" OR act9="n" OR act10="n")
		THEN 1 ELSE 0 END)'];
	$nid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "n" OR freshman_interest.act2 = "n" OR
		freshman_interest.act3 = "n" OR freshman_interest.act4 = "n" OR
		freshman_interest.act5 = "n" OR freshman_interest.act6 = "n" OR
		freshman_interest.act7 = "n" OR freshman_interest.act8 = "n" OR
		freshman_interest.act9 = "n" OR freshman_interest.act10 = "n")');
	$t = 0;
	if ($ncount != 0) {
		do {
			$nhello[$t] = $nid[$t]['email'];
			$t++;
		} while ($t < $ncount);
	}
	if ($ncount != 0) {
		$nyello = implode(', ', $nhello);
		Mail::sendMail('Peer-to-Peer E-mail List for DECA', 'Here are the e-mails of the students interested in DECA:<br>'.$nyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'n'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'n'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'n'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'n'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'n'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'n'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'n'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'n'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'n'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'n'));
	} else {
	}
	$ocount = database::query('SELECT count(*), SUM(CASE WHEN (act1="o" OR act2="o" OR
		act3="o" OR act4="o" OR act5="o" OR act6="o" OR act7="o" OR 
		act8="o" OR act9="o" OR act10="o")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="o" OR act2="o" OR
		act3="o" OR act4="o" OR act5="o" OR act6="o" OR act7="o" OR 
		act8="o" OR act9="o" OR act10="o")
		THEN 1 ELSE 0 END)'];
	$oid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "o" OR freshman_interest.act2 = "o" OR
		freshman_interest.act3 = "o" OR freshman_interest.act4 = "o" OR
		freshman_interest.act5 = "o" OR freshman_interest.act6 = "o" OR
		freshman_interest.act7 = "o" OR freshman_interest.act8 = "o" OR
		freshman_interest.act9 = "o" OR freshman_interest.act10 = "o")');
	$t = 0;
	if ($ocount != 0) {
		do {
			$ohello[$t] = $oid[$t]['email'];
			$t++;
		} while ($t < $ocount);
	}
	if ($ocount != 0) {
		$oyello = implode(', ', $ohello);
		Mail::sendMail('Peer-to-Peer E-mail List for Delta Scholars', 'Here are the e-mails of the students interested in Delta Scholars:<br>'.$oyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'o'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'o'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'o'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'o'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'o'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'o'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'o'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'o'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'o'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'o'));
	} else {
	}
	$pcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="p" OR act2="p" OR
		act3="p" OR act4="p" OR act5="p" OR act6="p" OR act7="p" OR 
		act8="p" OR act9="p" OR act10="p")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="p" OR act2="p" OR
		act3="p" OR act4="p" OR act5="p" OR act6="p" OR act7="p" OR 
		act8="p" OR act9="p" OR act10="p")
		THEN 1 ELSE 0 END)'];
	$pid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "p" OR freshman_interest.act2 = "p" OR
		freshman_interest.act3 = "p" OR freshman_interest.act4 = "p" OR
		freshman_interest.act5 = "p" OR freshman_interest.act6 = "p" OR
		freshman_interest.act7 = "p" OR freshman_interest.act8 = "p" OR
		freshman_interest.act9 = "p" OR freshman_interest.act10 = "p")');
	$t = 0;
	if ($pcount != 0) {
		do {
			$phello[$t] = $pid[$t]['email'];
			$t++;
		} while ($t < $pcount);
	}
	if ($pcount != 0) {
		$pyello = implode(', ', $phello);
		Mail::sendMail('Peer-to-Peer E-mail List for Educators Rising', 'Here are the e-mails of the students interested in Educators Rising:<br>'.$pyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'p'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'p'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'p'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'p'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'p'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'p'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'p'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'p'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'p'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'p'));
	} else {
	}
	$qcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="q" OR act2="q" OR
		act3="q" OR act4="q" OR act5="q" OR act6="q" OR act7="q" OR 
		act8="q" OR act9="q" OR act10="q")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="q" OR act2="q" OR
		act3="q" OR act4="q" OR act5="q" OR act6="q" OR act7="q" OR 
		act8="q" OR act9="q" OR act10="q")
		THEN 1 ELSE 0 END)'];
	$qid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "q" OR freshman_interest.act2 = "q" OR
		freshman_interest.act3 = "q" OR freshman_interest.act4 = "q" OR
		freshman_interest.act5 = "q" OR freshman_interest.act6 = "q" OR
		freshman_interest.act7 = "q" OR freshman_interest.act8 = "q" OR
		freshman_interest.act9 = "q" OR freshman_interest.act10 = "q")');
	$t = 0;
	if ($qcount != 0) {
		do {
			$qhello[$t] = $qid[$t]['email'];
			$t++;
		} while ($t < $qcount);
	}
	if ($qcount != 0) {
		$qyello = implode(', ', $qhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Environmental Club (SAVE)', 'Here are the e-mails of the students interested in Environmental Club (SAVE):<br>'.$qyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'q'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'q'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'q'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'q'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'q'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'q'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'q'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'q'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'q'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'q'));
	} else {
	}
	$rcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="r" OR act2="r" OR
		act3="r" OR act4="r" OR act5="r" OR act6="r" OR act7="r" OR 
		act8="r" OR act9="r" OR act10="r")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="r" OR act2="r" OR
		act3="r" OR act4="r" OR act5="r" OR act6="r" OR act7="r" OR 
		act8="r" OR act9="r" OR act10="r")
		THEN 1 ELSE 0 END)'];
	$rid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "r" OR freshman_interest.act2 = "r" OR
		freshman_interest.act3 = "r" OR freshman_interest.act4 = "r" OR
		freshman_interest.act5 = "r" OR freshman_interest.act6 = "r" OR
		freshman_interest.act7 = "r" OR freshman_interest.act8 = "r" OR
		freshman_interest.act9 = "r" OR freshman_interest.act10 = "r")');
	$t = 0;
	if ($rcount != 0) {
		do {
			$rhello[$t] = $rid[$t]['email'];
			$t++;
		} while ($t < $rcount);
	}
	if ($rcount != 0) {
		$ryello = implode(', ', $rhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Fellowship of Christian Athletes (FCA)', 'Here are the e-mails of the students interested in Fellowship of Christian Athletes (FCA):<br>'.$ryello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'r'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'r'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'r'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'r'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'r'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'r'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'r'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'r'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'r'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'r'));
	} else {
	}
	$scount = database::query('SELECT count(*), SUM(CASE WHEN (act1="s" OR act2="s" OR
		act3="s" OR act4="s" OR act5="s" OR act6="s" OR act7="s" OR 
		act8="s" OR act9="s" OR act10="s")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="s" OR act2="s" OR
		act3="s" OR act4="s" OR act5="s" OR act6="s" OR act7="s" OR 
		act8="s" OR act9="s" OR act10="s")
		THEN 1 ELSE 0 END)'];
	$sid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "s" OR freshman_interest.act2 = "s" OR
		freshman_interest.act3 = "s" OR freshman_interest.act4 = "s" OR
		freshman_interest.act5 = "s" OR freshman_interest.act6 = "s" OR
		freshman_interest.act7 = "s" OR freshman_interest.act8 = "s" OR
		freshman_interest.act9 = "s" OR freshman_interest.act10 = "s")');
	$t = 0;
	if ($scount != 0) {
		do {
			$shello[$t] = $sid[$t]['email'];
			$t++;
		} while ($t < $scount);
	}
	if ($scount != 0) {
		$syello = implode(', ', $shello);
		Mail::sendMail('Peer-to-Peer E-mail List for Film Club', 'Here are the e-mails of the students interested in Film Club:<br>'.$syello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'s'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'s'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'s'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'s'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'s'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'s'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'s'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'s'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'s'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'s'));
	} else {
	}
	$tcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="t" OR act2="t" OR
		act3="t" OR act4="t" OR act5="t" OR act6="t" OR act7="t" OR 
		act8="t" OR act9="t" OR act10="t")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="t" OR act2="t" OR
		act3="t" OR act4="t" OR act5="t" OR act6="t" OR act7="t" OR 
		act8="t" OR act9="t" OR act10="t")
		THEN 1 ELSE 0 END)'];
	$tid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "t" OR freshman_interest.act2 = "t" OR
		freshman_interest.act3 = "t" OR freshman_interest.act4 = "t" OR
		freshman_interest.act5 = "t" OR freshman_interest.act6 = "t" OR
		freshman_interest.act7 = "t" OR freshman_interest.act8 = "t" OR
		freshman_interest.act9 = "t" OR freshman_interest.act10 = "t")');
	$t = 0;
	if ($tcount != 0) {
		do {
			$thello[$t] = $tid[$t]['email'];
			$t++;
		} while ($t < $tcount);
	}
	if ($tcount != 0) {
		$tyello = implode(', ', $thello);
		Mail::sendMail('Peer-to-Peer E-mail List for French Club', 'Here are the e-mails of the students interested in French Club:<br>'.$tyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'t'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'t'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'t'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'t'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'t'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'t'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'t'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'t'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'t'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'t'));
	} else {
	}
	$ucount = database::query('SELECT count(*), SUM(CASE WHEN (act1="u" OR act2="u" OR
		act3="u" OR act4="u" OR act5="u" OR act6="u" OR act7="u" OR 
		act8="u" OR act9="u" OR act10="u")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="u" OR act2="u" OR
		act3="u" OR act4="u" OR act5="u" OR act6="u" OR act7="u" OR 
		act8="u" OR act9="u" OR act10="u")
		THEN 1 ELSE 0 END)'];
	$uid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "u" OR freshman_interest.act2 = "u" OR
		freshman_interest.act3 = "u" OR freshman_interest.act4 = "u" OR
		freshman_interest.act5 = "u" OR freshman_interest.act6 = "u" OR
		freshman_interest.act7 = "u" OR freshman_interest.act8 = "u" OR
		freshman_interest.act9 = "u" OR freshman_interest.act10 = "u")');
	$t = 0;
	if ($ucount != 0) {
		do {
			$uhello[$t] = $uid[$t]['email'];
			$t++;
		} while ($t < $ucount);
	}
	if ($ucount != 0) {
		$uyello = implode(', ', $uhello);
		Mail::sendMail('Peer-to-Peer E-mail List for French National Honor Society', 'Here are the e-mails of the students interested in French National Honor Society:<br>'.$uyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'u'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'u'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'u'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'u'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'u'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'u'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'u'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'u'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'u'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'u'));
	} else {
	}
	$vcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="v" OR act2="v" OR
		act3="v" OR act4="v" OR act5="v" OR act6="v" OR act7="v" OR 
		act8="v" OR act9="v" OR act10="v")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="v" OR act2="v" OR
		act3="v" OR act4="v" OR act5="v" OR act6="v" OR act7="v" OR 
		act8="v" OR act9="v" OR act10="v")
		THEN 1 ELSE 0 END)'];
	$vid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "v" OR freshman_interest.act2 = "v" OR
		freshman_interest.act3 = "v" OR freshman_interest.act4 = "v" OR
		freshman_interest.act5 = "v" OR freshman_interest.act6 = "v" OR
		freshman_interest.act7 = "v" OR freshman_interest.act8 = "v" OR
		freshman_interest.act9 = "v" OR freshman_interest.act10 = "v")');
	$t = 0;
	if ($vcount != 0) {
		do {
			$vhello[$t] = $vid[$t]['email'];
			$t++;
		} while ($t < $vcount);
	}
	if ($vcount != 0) {
		$vyello = implode(', ', $vhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Gator Gaming Club', 'Here are the e-mails of the students interested in Gator Gaming Club:<br>'.$vyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'v'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'v'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'v'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'v'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'v'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'v'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'v'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'v'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'v'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'v'));
	} else {
	}
	$wcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="w" OR act2="w" OR
		act3="w" OR act4="w" OR act5="w" OR act6="w" OR act7="w" OR 
		act8="w" OR act9="w" OR act10="w")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="w" OR act2="w" OR
		act3="w" OR act4="w" OR act5="w" OR act6="w" OR act7="w" OR 
		act8="w" OR act9="w" OR act10="w")
		THEN 1 ELSE 0 END)'];
	$wid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "w" OR freshman_interest.act2 = "w" OR
		freshman_interest.act3 = "w" OR freshman_interest.act4 = "w" OR
		freshman_interest.act5 = "w" OR freshman_interest.act6 = "w" OR
		freshman_interest.act7 = "w" OR freshman_interest.act8 = "w" OR
		freshman_interest.act9 = "w" OR freshman_interest.act10 = "w")');
	$t = 0;
	if ($wcount != 0) {
		do {
			$whello[$t] = $wid[$t]['email'];
			$t++;
		} while ($t < $wcount);
	}
	if ($wcount != 0) {
		$wyello = implode(', ', $whello);
		Mail::sendMail('Peer-to-Peer E-mail List for Gator Guides', 'Here are the e-mails of the students interested in Gator Guides:<br>'.$wyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'w'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'w'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'w'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'w'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'w'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'w'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'w'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'w'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'w'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'w'));
	} else {
	}
	$xcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="x" OR act2="x" OR
		act3="x" OR act4="x" OR act5="x" OR act6="x" OR act7="x" OR 
		act8="x" OR act9="x" OR act10="x")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="x" OR act2="x" OR
		act3="x" OR act4="x" OR act5="x" OR act6="x" OR act7="x" OR 
		act8="x" OR act9="x" OR act10="x")
		THEN 1 ELSE 0 END)'];
	$xid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "x" OR freshman_interest.act2 = "x" OR
		freshman_interest.act3 = "x" OR freshman_interest.act4 = "x" OR
		freshman_interest.act5 = "x" OR freshman_interest.act6 = "x" OR
		freshman_interest.act7 = "x" OR freshman_interest.act8 = "x" OR
		freshman_interest.act9 = "x" OR freshman_interest.act10 = "x")');
	$t = 0;
	if ($xcount != 0) {
		do {
			$xhello[$t] = $xid[$t]['email'];
			$t++;
		} while ($t < $xcount);
	}
	if ($xcount != 0) {
		$xyello = implode(', ', $xhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Gay-Straight Alliance (GSA)', 'Here are the e-mails of the students interested in Gay-Straight Alliance (GSA):<br>'.$xyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'x'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'x'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'x'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'x'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'x'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'x'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'x'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'x'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'x'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'x'));
	} else {
	}
	$ycount = database::query('SELECT count(*), SUM(CASE WHEN (act1="y" OR act2="y" OR
		act3="y" OR act4="y" OR act5="y" OR act6="y" OR act7="y" OR 
		act8="y" OR act9="y" OR act10="y")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="y" OR act2="y" OR
		act3="y" OR act4="y" OR act5="y" OR act6="y" OR act7="y" OR 
		act8="y" OR act9="y" OR act10="y")
		THEN 1 ELSE 0 END)'];
	$yid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "y" OR freshman_interest.act2 = "y" OR
		freshman_interest.act3 = "y" OR freshman_interest.act4 = "y" OR
		freshman_interest.act5 = "y" OR freshman_interest.act6 = "y" OR
		freshman_interest.act7 = "y" OR freshman_interest.act8 = "y" OR
		freshman_interest.act9 = "y" OR freshman_interest.act10 = "y")');
	$t = 0;
	if ($ycount != 0) {
		do {
			$yhello[$t] = $yid[$t]['email'];
			$t++;
		} while ($t < $ycount);
	}
	if ($ycount != 0) {
		$yyello = implode(', ', $yhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Global Equality Now (School Girls Unite)', 'Here are the e-mails of the students interested in Global Equality Now (School Girls Unite):<br>'.$yyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'y'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'y'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'y'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'y'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'y'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'y'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'y'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'y'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'y'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'y'));
	} else {
	}
	$zcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="z" OR act2="z" OR
		act3="z" OR act4="z" OR act5="z" OR act6="z" OR act7="z" OR 
		act8="z" OR act9="z" OR act10="z")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="z" OR act2="z" OR
		act3="z" OR act4="z" OR act5="z" OR act6="z" OR act7="z" OR 
		act8="z" OR act9="z" OR act10="z")
		THEN 1 ELSE 0 END)'];
	$zid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "z" OR freshman_interest.act2 = "z" OR
		freshman_interest.act3 = "z" OR freshman_interest.act4 = "z" OR
		freshman_interest.act5 = "z" OR freshman_interest.act6 = "z" OR
		freshman_interest.act7 = "z" OR freshman_interest.act8 = "z" OR
		freshman_interest.act9 = "z" OR freshman_interest.act10 = "z")');
	$t = 0;
	if ($zcount != 0) {
		do {
			$zhello[$t] = $zid[$t]['email'];
			$t++;
		} while ($t < $zcount);
	}
	if ($zcount != 0) {
		$zyello = implode(', ', $zhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Horizon Club', 'Here are the e-mails of the students interested in Horizon Club:<br>'.$zyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'z'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'z'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'z'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'z'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'z'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'z'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'z'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'z'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'z'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'z'));
	} else {
	}
	$aacount = database::query('SELECT count(*), SUM(CASE WHEN (act1="aa" OR act2="aa" OR
		act3="aa" OR act4="aa" OR act5="aa" OR act6="aa" OR act7="aa" OR 
		act8="aa" OR act9="aa" OR act10="aa")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="aa" OR act2="aa" OR
		act3="aa" OR act4="aa" OR act5="aa" OR act6="aa" OR act7="aa" OR 
		act8="aa" OR act9="aa" OR act10="aa")
		THEN 1 ELSE 0 END)'];
	$aaid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "aa" OR freshman_interest.act2 = "aa" OR
		freshman_interest.act3 = "aa" OR freshman_interest.act4 = "aa" OR
		freshman_interest.act5 = "aa" OR freshman_interest.act6 = "aa" OR
		freshman_interest.act7 = "aa" OR freshman_interest.act8 = "aa" OR
		freshman_interest.act9 = "aa" OR freshman_interest.act10 = "aa")');
	$t = 0;
	if ($aacount != 0) {
		do {
			$aahello[$t] = $aaid[$t]['email'];
			$t++;
		} while ($t < $aacount);
	}
	if ($aacount != 0) {
		$aayello = implode(', ', $aahello);
		Mail::sendMail('Peer-to-Peer E-mail List for Ice Hockey Club', 'Here are the e-mails of the students interested in Ice Hockey Club:<br>'.$aayello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'aa'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'aa'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'aa'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'aa'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'aa'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'aa'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'aa'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'aa'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'aa'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'aa'));
	} else {
	}
	$abcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ab" OR act2="ab" OR
		act3="ab" OR act4="ab" OR act5="ab" OR act6="ab" OR act7="ab" OR 
		act8="ab" OR act9="ab" OR act10="ab")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ab" OR act2="ab" OR
		act3="ab" OR act4="ab" OR act5="ab" OR act6="ab" OR act7="ab" OR 
		act8="ab" OR act9="ab" OR act10="ab")
		THEN 1 ELSE 0 END)'];
	$abid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ab" OR freshman_interest.act2 = "ab" OR
		freshman_interest.act3 = "ab" OR freshman_interest.act4 = "ab" OR
		freshman_interest.act5 = "ab" OR freshman_interest.act6 = "ab" OR
		freshman_interest.act7 = "ab" OR freshman_interest.act8 = "ab" OR
		freshman_interest.act9 = "ab" OR freshman_interest.act10 = "ab")');
	$t = 0;
	if ($abcount != 0) {
		do {
			$abhello[$t] = $abid[$t]['email'];
			$t++;
		} while ($t < $abcount);
	}
	if ($abcount != 0) {
		$abyello = implode(', ', $abhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Improvisation Club', 'Here are the e-mails of the students interested in Improvisation Club:<br>'.$abyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ab'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ab'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ab'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ab'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ab'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ab'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ab'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ab'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ab'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ab'));
	} else {
	}
	$account = database::query('SELECT count(*), SUM(CASE WHEN (act1="ac" OR act2="ac" OR
		act3="ac" OR act4="ac" OR act5="ac" OR act6="ac" OR act7="ac" OR 
		act8="ac" OR act9="ac" OR act10="ac")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ac" OR act2="ac" OR
		act3="ac" OR act4="ac" OR act5="ac" OR act6="ac" OR act7="ac" OR 
		act8="ac" OR act9="ac" OR act10="ac")
		THEN 1 ELSE 0 END)'];
	$acid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ac" OR freshman_interest.act2 = "ac" OR
		freshman_interest.act3 = "ac" OR freshman_interest.act4 = "ac" OR
		freshman_interest.act5 = "ac" OR freshman_interest.act6 = "ac" OR
		freshman_interest.act7 = "ac" OR freshman_interest.act8 = "ac" OR
		freshman_interest.act9 = "ac" OR freshman_interest.act10 = "ac")');
	$t = 0;
	if ($account != 0) {
		do {
			$achello[$t] = $acid[$t]['email'];
			$t++;
		} while ($t < $account);
	}
	if ($account != 0) {
		$acyello = implode(', ', $achello);
		Mail::sendMail('Peer-to-Peer E-mail List for It\'s Academic', 'Here are the e-mails of the students interested in It\'s Academic:<br>'.$acyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ac'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ac'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ac'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ac'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ac'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ac'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ac'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ac'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ac'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ac'));
	} else {
	}
	$adcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ad" OR act2="ad" OR
		act3="ad" OR act4="ad" OR act5="ad" OR act6="ad" OR act7="ad" OR 
		act8="ad" OR act9="ad" OR act10="ad")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ad" OR act2="ad" OR
		act3="ad" OR act4="ad" OR act5="ad" OR act6="ad" OR act7="ad" OR 
		act8="ad" OR act9="ad" OR act10="ad")
		THEN 1 ELSE 0 END)'];
	$adid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ad" OR freshman_interest.act2 = "ad" OR
		freshman_interest.act3 = "ad" OR freshman_interest.act4 = "ad" OR
		freshman_interest.act5 = "ad" OR freshman_interest.act6 = "ad" OR
		freshman_interest.act7 = "ad" OR freshman_interest.act8 = "ad" OR
		freshman_interest.act9 = "ad" OR freshman_interest.act10 = "ad")');
	$t = 0;
	if ($adcount != 0) {
		do {
			$adhello[$t] = $adid[$t]['email'];
			$t++;
		} while ($t < $adcount);
	}
	if ($adcount != 0) {
		$adyello = implode(', ', $adhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Jazz Band', 'Here are the e-mails of the students interested in Jazz Band:<br>'.$adyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ad'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ad'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ad'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ad'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ad'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ad'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ad'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ad'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ad'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ad'));
	} else {
	}
	$aecount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ae" OR act2="ae" OR
		act3="ae" OR act4="ae" OR act5="ae" OR act6="ae" OR act7="ae" OR 
		act8="ae" OR act9="ae" OR act10="ae")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ae" OR act2="ae" OR
		act3="ae" OR act4="ae" OR act5="ae" OR act6="ae" OR act7="ae" OR 
		act8="ae" OR act9="ae" OR act10="ae")
		THEN 1 ELSE 0 END)'];
	$aeid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ae" OR freshman_interest.act2 = "ae" OR
		freshman_interest.act3 = "ae" OR freshman_interest.act4 = "ae" OR
		freshman_interest.act5 = "ae" OR freshman_interest.act6 = "ae" OR
		freshman_interest.act7 = "ae" OR freshman_interest.act8 = "ae" OR
		freshman_interest.act9 = "ae" OR freshman_interest.act10 = "ae")');
	$t = 0;
	if ($aecount != 0) {
		do {
			$aehello[$t] = $aeid[$t]['email'];
			$t++;
		} while ($t < $aecount);
	}
	if ($aecount != 0) {
		$aeyello = implode(', ', $aehello);
		Mail::sendMail('Peer-to-Peer E-mail List for Le Cercle Francais', 'Here are the e-mails of the students interested in Le Cercle Francais:<br>'.$aeyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ae'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ae'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ae'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ae'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ae'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ae'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ae'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ae'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ae'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ae'));
	} else {
	}
	$afcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="af" OR act2="af" OR
		act3="af" OR act4="af" OR act5="af" OR act6="af" OR act7="af" OR 
		act8="af" OR act9="af" OR act10="af")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="af" OR act2="af" OR
		act3="af" OR act4="af" OR act5="af" OR act6="af" OR act7="af" OR 
		act8="af" OR act9="af" OR act10="af")
		THEN 1 ELSE 0 END)'];
	$afid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "af" OR freshman_interest.act2 = "af" OR
		freshman_interest.act3 = "af" OR freshman_interest.act4 = "af" OR
		freshman_interest.act5 = "af" OR freshman_interest.act6 = "af" OR
		freshman_interest.act7 = "af" OR freshman_interest.act8 = "af" OR
		freshman_interest.act9 = "af" OR freshman_interest.act10 = "af")');
	$t = 0;
	if ($afcount != 0) {
		do {
			$afhello[$t] = $afid[$t]['email'];
			$t++;
		} while ($t < $afcount);
	}
	if ($afcount != 0) {
		$afyello = implode(', ', $afhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Los Gators Latinos', 'Here are the e-mails of the students interested in Los Gators Latinos:<br>'.$afyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'af'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'af'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'af'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'af'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'af'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'af'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'af'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'af'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'af'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'af'));
	} else {
	}
	$agcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ag" OR act2="ag" OR
		act3="ag" OR act4="ag" OR act5="ag" OR act6="ag" OR act7="ag" OR 
		act8="ag" OR act9="ag" OR act10="ag")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ag" OR act2="ag" OR
		act3="ag" OR act4="ag" OR act5="ag" OR act6="ag" OR act7="ag" OR 
		act8="ag" OR act9="ag" OR act10="ag")
		THEN 1 ELSE 0 END)'];
	$agid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ag" OR freshman_interest.act2 = "ag" OR
		freshman_interest.act3 = "ag" OR freshman_interest.act4 = "ag" OR
		freshman_interest.act5 = "ag" OR freshman_interest.act6 = "ag" OR
		freshman_interest.act7 = "ag" OR freshman_interest.act8 = "ag" OR
		freshman_interest.act9 = "ag" OR freshman_interest.act10 = "ag")');
	$t = 0;
	if ($agcount != 0) {
		do {
			$aghello[$t] = $agid[$t]['email'];
			$t++;
		} while ($t < $agcount);
	}
	if ($agcount != 0) {
		$agyello = implode(', ', $aghello);
		Mail::sendMail('Peer-to-Peer E-mail List for Lunch Choir / Concert Choir', 'Here are the e-mails of the students interested in Lunch Choir / Concert Choir:<br>'.$agyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ag'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ag'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ag'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ag'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ag'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ag'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ag'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ag'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ag'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ag'));
	} else {
	}
	$ahcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ah" OR act2="ah" OR
		act3="ah" OR act4="ah" OR act5="ah" OR act6="ah" OR act7="ah" OR 
		act8="ah" OR act9="ah" OR act10="ah")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ah" OR act2="ah" OR
		act3="ah" OR act4="ah" OR act5="ah" OR act6="ah" OR act7="ah" OR 
		act8="ah" OR act9="ah" OR act10="ah")
		THEN 1 ELSE 0 END)'];
	$ahid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ah" OR freshman_interest.act2 = "ah" OR
		freshman_interest.act3 = "ah" OR freshman_interest.act4 = "ah" OR
		freshman_interest.act5 = "ah" OR freshman_interest.act6 = "ah" OR
		freshman_interest.act7 = "ah" OR freshman_interest.act8 = "ah" OR
		freshman_interest.act9 = "ah" OR freshman_interest.act10 = "ah")');
	$t = 0;
	if ($ahcount != 0) {
		do {
			$ahhello[$t] = $ahid[$t]['email'];
			$t++;
		} while ($t < $ahcount);
	}
	if ($ahcount != 0) {
		$ahyello = implode(', ', $ahhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Marching Band', 'Here are the e-mails of the students interested in Marching Band:<br>'.$ahyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ah'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ah'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ah'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ah'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ah'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ah'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ah'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ah'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ah'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ah'));
	} else {
	}
	$aicount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ai" OR act2="ai" OR
		act3="ai" OR act4="ai" OR act5="ai" OR act6="ai" OR act7="ai" OR 
		act8="ai" OR act9="ai" OR act10="ai")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ai" OR act2="ai" OR
		act3="ai" OR act4="ai" OR act5="ai" OR act6="ai" OR act7="ai" OR 
		act8="ai" OR act9="ai" OR act10="ai")
		THEN 1 ELSE 0 END)'];
	$aiid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ai" OR freshman_interest.act2 = "ai" OR
		freshman_interest.act3 = "ai" OR freshman_interest.act4 = "ai" OR
		freshman_interest.act5 = "ai" OR freshman_interest.act6 = "ai" OR
		freshman_interest.act7 = "ai" OR freshman_interest.act8 = "ai" OR
		freshman_interest.act9 = "ai" OR freshman_interest.act10 = "ai")');
	$t = 0;
	if ($aicount != 0) {
		do {
			$aihello[$t] = $aiid[$t]['email'];
			$t++;
		} while ($t < $aicount);
	}
	if ($aicount != 0) {
		$aiyello = implode(', ', $aihello);
		Mail::sendMail('Peer-to-Peer E-mail List for Math National Honor Society', 'Here are the e-mails of the students interested in Math National Honor Society:<br>'.$aiyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ai'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ai'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ai'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ai'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ai'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ai'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ai'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ai'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ai'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ai'));;
	} else {
	}
	$ajcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="aj" OR act2="aj" OR
		act3="aj" OR act4="aj" OR act5="aj" OR act6="aj" OR act7="aj" OR 
		act8="aj" OR act9="aj" OR act10="aj")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="aj" OR act2="aj" OR
		act3="aj" OR act4="aj" OR act5="aj" OR act6="aj" OR act7="aj" OR 
		act8="aj" OR act9="aj" OR act10="aj")
		THEN 1 ELSE 0 END)'];
	$ajid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "aj" OR freshman_interest.act2 = "aj" OR
		freshman_interest.act3 = "aj" OR freshman_interest.act4 = "aj" OR
		freshman_interest.act5 = "aj" OR freshman_interest.act6 = "aj" OR
		freshman_interest.act7 = "aj" OR freshman_interest.act8 = "aj" OR
		freshman_interest.act9 = "aj" OR freshman_interest.act10 = "aj")');
	$t = 0;
	if ($ajcount != 0) {
		do {
			$ajhello[$t] = $ajid[$t]['email'];
			$t++;
		} while ($t < $ajcount);
	}
	if ($ajcount != 0) {
		$ajyello = implode(', ', $ajhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Math Team', 'Here are the e-mails of the students interested in Math Team:<br>'.$ajyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'aj'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'aj'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'aj'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'aj'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'aj'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'aj'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'aj'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'aj'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'aj'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'aj'));
	} else {
	}
	$akcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ak" OR act2="ak" OR
		act3="ak" OR act4="ak" OR act5="ak" OR act6="ak" OR act7="ak" OR 
		act8="ak" OR act9="ak" OR act10="ak")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ak" OR act2="ak" OR
		act3="ak" OR act4="ak" OR act5="ak" OR act6="ak" OR act7="ak" OR 
		act8="ak" OR act9="ak" OR act10="ak")
		THEN 1 ELSE 0 END)'];
	$akid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ak" OR freshman_interest.act2 = "ak" OR
		freshman_interest.act3 = "ak" OR freshman_interest.act4 = "ak" OR
		freshman_interest.act5 = "ak" OR freshman_interest.act6 = "ak" OR
		freshman_interest.act7 = "ak" OR freshman_interest.act8 = "ak" OR
		freshman_interest.act9 = "ak" OR freshman_interest.act10 = "ak")');
	$t = 0;
	if ($akcount != 0) {
		do {
			$akhello[$t] = $akid[$t]['email'];
			$t++;
		} while ($t < $akcount);
	}
	if ($akcount != 0) {
		$akyello = implode(', ', $akhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Math, Engineering, and Science Achievement (MESA)', 'Here are the e-mails of the students interested in Math, Engineering, and Science Achievement (MESA):<br>'.$akyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ak'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ak'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ak'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ak'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ak'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ak'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ak'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ak'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ak'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ak'));
	} else {
	}
	$alcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="al" OR act2="al" OR
		act3="al" OR act4="al" OR act5="al" OR act6="al" OR act7="al" OR 
		act8="al" OR act9="al" OR act10="al")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="al" OR act2="al" OR
		act3="al" OR act4="al" OR act5="al" OR act6="al" OR act7="al" OR 
		act8="al" OR act9="al" OR act10="al")
		THEN 1 ELSE 0 END)'];
	$alid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "al" OR freshman_interest.act2 = "al" OR
		freshman_interest.act3 = "al" OR freshman_interest.act4 = "al" OR
		freshman_interest.act5 = "al" OR freshman_interest.act6 = "al" OR
		freshman_interest.act7 = "al" OR freshman_interest.act8 = "al" OR
		freshman_interest.act9 = "al" OR freshman_interest.act10 = "al")');
	$t = 0;
	if ($alcount != 0) {
		do {
			$alhello[$t] = $alid[$t]['email'];
			$t++;
		} while ($t < $alcount);
	}
	if ($alcount != 0) {
		$alyello = implode(', ', $alhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Men\'s Choir', 'Here are the e-mails of the students interested in Men\'s Choir:<br>'.$alyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'al'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'al'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'al'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'al'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'al'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'al'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'al'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'al'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'al'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'al'));
	} else {
	}
	$amcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="am" OR act2="am" OR
		act3="am" OR act4="am" OR act5="am" OR act6="am" OR act7="am" OR 
		act8="am" OR act9="am" OR act10="am")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="am" OR act2="am" OR
		act3="am" OR act4="am" OR act5="am" OR act6="am" OR act7="am" OR 
		act8="am" OR act9="am" OR act10="am")
		THEN 1 ELSE 0 END)'];
	$amid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "am" OR freshman_interest.act2 = "am" OR
		freshman_interest.act3 = "am" OR freshman_interest.act4 = "am" OR
		freshman_interest.act5 = "am" OR freshman_interest.act6 = "am" OR
		freshman_interest.act7 = "am" OR freshman_interest.act8 = "am" OR
		freshman_interest.act9 = "am" OR freshman_interest.act10 = "am")');
	$t = 0;
	if ($amcount != 0) {
		do {
			$amhello[$t] = $amid[$t]['email'];
			$t++;
		} while ($t < $amcount);
	}
	if ($amcount != 0) {
		$amyello = implode(', ', $amhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Model United Nations', 'Here are the e-mails of the students interested in Model United Nations:<br>'.$amyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'am'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'am'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'am'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'am'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'am'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'am'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'am'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'am'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'am'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'am'));
	} else {
	}
	$ancount = database::query('SELECT count(*), SUM(CASE WHEN (act1="an" OR act2="an" OR
		act3="an" OR act4="an" OR act5="an" OR act6="an" OR act7="an" OR 
		act8="an" OR act9="an" OR act10="an")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="an" OR act2="an" OR
		act3="an" OR act4="an" OR act5="an" OR act6="an" OR act7="an" OR 
		act8="an" OR act9="an" OR act10="an")
		THEN 1 ELSE 0 END)'];
	$anid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "an" OR freshman_interest.act2 = "an" OR
		freshman_interest.act3 = "an" OR freshman_interest.act4 = "an" OR
		freshman_interest.act5 = "an" OR freshman_interest.act6 = "an" OR
		freshman_interest.act7 = "an" OR freshman_interest.act8 = "an" OR
		freshman_interest.act9 = "an" OR freshman_interest.act10 = "an")');
	$t = 0;
	if ($ancount != 0) {
		do {
			$anhello[$t] = $anid[$t]['email'];
			$t++;
		} while ($t < $ancount);
	}
	if ($ancount != 0) {
		$anyello = implode(', ', $anhello);
		Mail::sendMail('Peer-to-Peer E-mail List for National Art Honor Society', 'Here are the e-mails of the students interested in National Art Honor Society:<br>'.$anyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'an'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'an'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'an'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'an'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'an'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'an'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'an'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'an'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'an'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'an'));
	} else {
	}
	$aocount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ao" OR act2="ao" OR
		act3="ao" OR act4="ao" OR act5="ao" OR act6="ao" OR act7="ao" OR 
		act8="ao" OR act9="ao" OR act10="ao")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ao" OR act2="ao" OR
		act3="ao" OR act4="ao" OR act5="ao" OR act6="ao" OR act7="ao" OR 
		act8="ao" OR act9="ao" OR act10="ao")
		THEN 1 ELSE 0 END)'];
	$aoid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ao" OR freshman_interest.act2 = "ao" OR
		freshman_interest.act3 = "ao" OR freshman_interest.act4 = "ao" OR
		freshman_interest.act5 = "ao" OR freshman_interest.act6 = "ao" OR
		freshman_interest.act7 = "ao" OR freshman_interest.act8 = "ao" OR
		freshman_interest.act9 = "ao" OR freshman_interest.act10 = "ao")');
	$t = 0;
	if ($aocount != 0) {
		do {
			$aohello[$t] = $aoid[$t]['email'];
			$t++;
		} while ($t < $aocount);
	}
	if ($aocount != 0) {
		$aoyello = implode(', ', $aohello);
		Mail::sendMail('Peer-to-Peer E-mail List for National Latin Honor Society', 'Here are the e-mails of the students interested in National Latin Honor Society:<br>'.$aoyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ao'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ao'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ao'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ao'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ao'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ao'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ao'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ao'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ao'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ao'));
	} else {
	}
	$apcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ap" OR act2="ap" OR
		act3="ap" OR act4="ap" OR act5="ap" OR act6="ap" OR act7="ap" OR 
		act8="ap" OR act9="ap" OR act10="ap")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ap" OR act2="ap" OR
		act3="ap" OR act4="ap" OR act5="ap" OR act6="ap" OR act7="ap" OR 
		act8="ap" OR act9="ap" OR act10="ap")
		THEN 1 ELSE 0 END)'];
	$apid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ap" OR freshman_interest.act2 = "ap" OR
		freshman_interest.act3 = "ap" OR freshman_interest.act4 = "ap" OR
		freshman_interest.act5 = "ap" OR freshman_interest.act6 = "ap" OR
		freshman_interest.act7 = "ap" OR freshman_interest.act8 = "ap" OR
		freshman_interest.act9 = "ap" OR freshman_interest.act10 = "ap")');
	$t = 0;
	if ($apcount != 0) {
		do {
			$aphello[$t] = $apid[$t]['email'];
			$t++;
		} while ($t < $apcount);
	}
	if ($apcount != 0) {
		$apyello = implode(', ', $aphello);
		Mail::sendMail('Peer-to-Peer E-mail List for National Technical Honor Society (NTHS)', 'Here are the e-mails of the students interested in National Technical Honor Society (NTHS):<br>'.$apyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ap'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ap'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ap'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ap'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ap'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ap'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ap'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ap'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ap'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ap'));
	} else {
	}
	$aqcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="aq" OR act2="aq" OR
		act3="aq" OR act4="aq" OR act5="aq" OR act6="aq" OR act7="aq" OR 
		act8="aq" OR act9="aq" OR act10="aq")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="aq" OR act2="aq" OR
		act3="aq" OR act4="aq" OR act5="aq" OR act6="aq" OR act7="aq" OR 
		act8="aq" OR act9="aq" OR act10="aq")
		THEN 1 ELSE 0 END)'];
	$aqid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "aq" OR freshman_interest.act2 = "aq" OR
		freshman_interest.act3 = "aq" OR freshman_interest.act4 = "aq" OR
		freshman_interest.act5 = "aq" OR freshman_interest.act6 = "aq" OR
		freshman_interest.act7 = "aq" OR freshman_interest.act8 = "aq" OR
		freshman_interest.act9 = "aq" OR freshman_interest.act10 = "aq")');
	$t = 0;
	if ($aqcount != 0) {
		do {
			$aqhello[$t] = $aqid[$t]['email'];
			$t++;
		} while ($t < $aqcount);
	}
	if ($aqcount != 0) {
		$aqyello = implode(', ', $aqhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Orchestra', 'Here are the e-mails of the students interested in Orchestra:<br>'.$aqyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'aq'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'aq'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'aq'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'aq'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'aq'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'aq'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'aq'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'aq'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'aq'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'aq'));
	} else {
	}
	$arcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ar" OR act2="ar" OR
		act3="ar" OR act4="ar" OR act5="ar" OR act6="ar" OR act7="ar" OR 
		act8="ar" OR act9="ar" OR act10="ar")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ar" OR act2="ar" OR
		act3="ar" OR act4="ar" OR act5="ar" OR act6="ar" OR act7="ar" OR 
		act8="ar" OR act9="ar" OR act10="ar")
		THEN 1 ELSE 0 END)'];
	$arid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ar" OR freshman_interest.act2 = "ar" OR
		freshman_interest.act3 = "ar" OR freshman_interest.act4 = "ar" OR
		freshman_interest.act5 = "ar" OR freshman_interest.act6 = "ar" OR
		freshman_interest.act7 = "ar" OR freshman_interest.act8 = "ar" OR
		freshman_interest.act9 = "ar" OR freshman_interest.act10 = "ar")');
	$t = 0;
	if ($arcount != 0) {
		do {
			$arhello[$t] = $arid[$t]['email'];
			$t++;
		} while ($t < $arcount);
	}
	if ($arcount != 0) {
		$aryello = implode(', ', $arhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Photography Club', 'Here are the e-mails of the students interested in Photography Club:<br>'.$aryello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ar'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ar'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ar'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ar'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ar'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ar'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ar'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ar'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ar'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ar'));
	} else {
	}
	$ascount = database::query('SELECT count(*), SUM(CASE WHEN (act1="as" OR act2="as" OR
		act3="as" OR act4="as" OR act5="as" OR act6="as" OR act7="as" OR 
		act8="as" OR act9="as" OR act10="as")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="as" OR act2="as" OR
		act3="as" OR act4="as" OR act5="as" OR act6="as" OR act7="as" OR 
		act8="as" OR act9="as" OR act10="as")
		THEN 1 ELSE 0 END)'];
	$asid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "as" OR freshman_interest.act2 = "as" OR
		freshman_interest.act3 = "as" OR freshman_interest.act4 = "as" OR
		freshman_interest.act5 = "as" OR freshman_interest.act6 = "as" OR
		freshman_interest.act7 = "as" OR freshman_interest.act8 = "as" OR
		freshman_interest.act9 = "as" OR freshman_interest.act10 = "as")');
	$t = 0;
	if ($ascount != 0) {
		do {
			$ashello[$t] = $asid[$t]['email'];
			$t++;
		} while ($t < $ascount);
	}
	if ($ascount != 0) {
		$asyello = implode(', ', $ashello);
		Mail::sendMail('Peer-to-Peer E-mail List for RC Model Club', 'Here are the e-mails of the students interested in RC Model Club:<br>'.$asyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'as'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'as'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'as'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'as'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'as'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'as'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'as'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'as'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'as'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'as'));
	} else {
	}
	$atcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="at" OR act2="at" OR
		act3="at" OR act4="at" OR act5="at" OR act6="at" OR act7="at" OR 
		act8="at" OR act9="at" OR act10="at")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="at" OR act2="at" OR
		act3="at" OR act4="at" OR act5="at" OR act6="at" OR act7="at" OR 
		act8="at" OR act9="at" OR act10="at")
		THEN 1 ELSE 0 END)'];
	$atid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "at" OR freshman_interest.act2 = "at" OR
		freshman_interest.act3 = "at" OR freshman_interest.act4 = "at" OR
		freshman_interest.act5 = "at" OR freshman_interest.act6 = "at" OR
		freshman_interest.act7 = "at" OR freshman_interest.act8 = "at" OR
		freshman_interest.act9 = "at" OR freshman_interest.act10 = "at")');
	$t = 0;
	if ($atcount != 0) {
		do {
			$athello[$t] = $atid[$t]['email'];
			$t++;
		} while ($t < $atcount);
	}
	if ($atcount != 0) {
		$atyello = implode(', ', $athello);
		Mail::sendMail('Peer-to-Peer E-mail List for Reservoir Christian Fellowship', 'Here are the e-mails of the students interested in Reservoir Christian Fellowship:<br>'.$atyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'at'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'at'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'at'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'at'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'at'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'at'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'at'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'at'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'at'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'at'));
	} else {
	}
	$aucount = database::query('SELECT count(*), SUM(CASE WHEN (act1="au" OR act2="au" OR
		act3="au" OR act4="au" OR act5="au" OR act6="au" OR act7="au" OR 
		act8="au" OR act9="au" OR act10="au")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="au" OR act2="au" OR
		act3="au" OR act4="au" OR act5="au" OR act6="au" OR act7="au" OR 
		act8="au" OR act9="au" OR act10="au")
		THEN 1 ELSE 0 END)'];
	$auid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "au" OR freshman_interest.act2 = "au" OR
		freshman_interest.act3 = "au" OR freshman_interest.act4 = "au" OR
		freshman_interest.act5 = "au" OR freshman_interest.act6 = "au" OR
		freshman_interest.act7 = "au" OR freshman_interest.act8 = "au" OR
		freshman_interest.act9 = "au" OR freshman_interest.act10 = "au")');
	$t = 0;
	if ($aucount != 0) {
		do {
			$auhello[$t] = $auid[$t]['email'];
			$t++;
		} while ($t < $aucount);
	}
	if ($aucount != 0) {
		$auyello = implode(', ', $auhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Reservoir Scholars', 'Here are the e-mails of the students interested in Reservoir Scholars:<br>'.$auyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'au'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'au'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'au'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'au'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'au'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'au'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'au'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'au'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'au'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'au'));
	} else {
	}
	$avcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="av" OR act2="av" OR
		act3="av" OR act4="av" OR act5="av" OR act6="av" OR act7="av" OR 
		act8="av" OR act9="av" OR act10="av")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="av" OR act2="av" OR
		act3="av" OR act4="av" OR act5="av" OR act6="av" OR act7="av" OR 
		act8="av" OR act9="av" OR act10="av")
		THEN 1 ELSE 0 END)'];
	$avid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "av" OR freshman_interest.act2 = "av" OR
		freshman_interest.act3 = "av" OR freshman_interest.act4 = "av" OR
		freshman_interest.act5 = "av" OR freshman_interest.act6 = "av" OR
		freshman_interest.act7 = "av" OR freshman_interest.act8 = "av" OR
		freshman_interest.act9 = "av" OR freshman_interest.act10 = "av")');
	$t = 0;
	if ($avcount != 0) {
		do {
			$avhello[$t] = $avid[$t]['email'];
			$t++;
		} while ($t < $avcount);
	}
	if ($avcount != 0) {
		$avyello = implode(', ', $avhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Robotics Club', 'Here are the e-mails of the students interested in Robotics Club:<br>'.$avyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'av'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'av'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'av'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'av'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'av'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'av'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'av'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'av'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'av'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'av'));
	} else {
	}
	$awcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="aw" OR act2="aw" OR
		act3="aw" OR act4="aw" OR act5="aw" OR act6="aw" OR act7="aw" OR 
		act8="aw" OR act9="aw" OR act10="aw")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="aw" OR act2="aw" OR
		act3="aw" OR act4="aw" OR act5="aw" OR act6="aw" OR act7="aw" OR 
		act8="aw" OR act9="aw" OR act10="aw")
		THEN 1 ELSE 0 END)'];
	$awid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "aw" OR freshman_interest.act2 = "aw" OR
		freshman_interest.act3 = "aw" OR freshman_interest.act4 = "aw" OR
		freshman_interest.act5 = "aw" OR freshman_interest.act6 = "aw" OR
		freshman_interest.act7 = "aw" OR freshman_interest.act8 = "aw" OR
		freshman_interest.act9 = "aw" OR freshman_interest.act10 = "aw")');
	$t = 0;
	if ($awcount != 0) {
		do {
			$awhello[$t] = $awid[$t]['email'];
			$t++;
		} while ($t < $awcount);
	}
	if ($awcount != 0) {
		$awyello = implode(', ', $awhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Science National Honor Society', 'Here are the e-mails of the students interested in Science National Honor Society:<br>'.$awyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'aw'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'aw'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'aw'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'aw'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'aw'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'aw'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'aw'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'aw'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'aw'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'aw'));
	} else {
	}
	$axcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ax" OR act2="ax" OR
		act3="ax" OR act4="ax" OR act5="ax" OR act6="ax" OR act7="ax" OR 
		act8="ax" OR act9="ax" OR act10="ax")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ax" OR act2="ax" OR
		act3="ax" OR act4="ax" OR act5="ax" OR act6="ax" OR act7="ax" OR 
		act8="ax" OR act9="ax" OR act10="ax")
		THEN 1 ELSE 0 END)'];
	$axid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ax" OR freshman_interest.act2 = "ax" OR
		freshman_interest.act3 = "ax" OR freshman_interest.act4 = "ax" OR
		freshman_interest.act5 = "ax" OR freshman_interest.act6 = "ax" OR
		freshman_interest.act7 = "ax" OR freshman_interest.act8 = "ax" OR
		freshman_interest.act9 = "ax" OR freshman_interest.act10 = "ax")');
	$t = 0;
	if ($axcount != 0) {
		do {
			$axhello[$t] = $axid[$t]['email'];
			$t++;
		} while ($t < $axcount);
	}
	if ($axcount != 0) {
		$axyello = implode(', ', $axhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Science Olympiad', 'Here are the e-mails of the students interested in Science Olympiad:<br>'.$axyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ax'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ax'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ax'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ax'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ax'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ax'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ax'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ax'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ax'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ax'));
	} else {
	}
	$aycount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ay" OR act2="ay" OR
		act3="ay" OR act4="ay" OR act5="ay" OR act6="ay" OR act7="ay" OR 
		act8="ay" OR act9="ay" OR act10="ay")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ay" OR act2="ay" OR
		act3="ay" OR act4="ay" OR act5="ay" OR act6="ay" OR act7="ay" OR 
		act8="ay" OR act9="ay" OR act10="ay")
		THEN 1 ELSE 0 END)'];
	$ayid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ay" OR freshman_interest.act2 = "ay" OR
		freshman_interest.act3 = "ay" OR freshman_interest.act4 = "ay" OR
		freshman_interest.act5 = "ay" OR freshman_interest.act6 = "ay" OR
		freshman_interest.act7 = "ay" OR freshman_interest.act8 = "ay" OR
		freshman_interest.act9 = "ay" OR freshman_interest.act10 = "ay")');
	$t = 0;
	if ($aycount != 0) {
		do {
			$ayhello[$t] = $ayid[$t]['email'];
			$t++;
		} while ($t < $aycount);
	}
	if ($aycount != 0) {
		$ayyello = implode(', ', $ayhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Spanish National Honor Society', 'Here are the e-mails of the students interested in Spanish National Honor Society:<br>'.$ayyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ay'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ay'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ay'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ay'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ay'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ay'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ay'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ay'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ay'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ay'));
	} else {
	}
	$azcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="az" OR act2="az" OR
		act3="az" OR act4="az" OR act5="az" OR act6="az" OR act7="az" OR 
		act8="az" OR act9="az" OR act10="az")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="az" OR act2="az" OR
		act3="az" OR act4="az" OR act5="az" OR act6="az" OR act7="az" OR 
		act8="az" OR act9="az" OR act10="az")
		THEN 1 ELSE 0 END)'];
	$azid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "az" OR freshman_interest.act2 = "az" OR
		freshman_interest.act3 = "az" OR freshman_interest.act4 = "az" OR
		freshman_interest.act5 = "az" OR freshman_interest.act6 = "az" OR
		freshman_interest.act7 = "az" OR freshman_interest.act8 = "az" OR
		freshman_interest.act9 = "az" OR freshman_interest.act10 = "az")');
	$t = 0;
	if ($azcount != 0) {
		do {
			$azhello[$t] = $azid[$t]['email'];
			$t++;
		} while ($t < $azcount);
	}
	if ($azcount != 0) {
		$azyello = implode(', ', $azhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Speech and Debate', 'Here are the e-mails of the students interested in Speech and Debate:<br>'.$azyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'az'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'az'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'az'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'az'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'az'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'az'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'az'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'az'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'az'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'az'));
	} else {
	}
	$bacount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ba" OR act2="ba" OR
		act3="ba" OR act4="ba" OR act5="ba" OR act6="ba" OR act7="ba" OR 
		act8="ba" OR act9="ba" OR act10="ba")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ba" OR act2="ba" OR
		act3="ba" OR act4="ba" OR act5="ba" OR act6="ba" OR act7="ba" OR 
		act8="ba" OR act9="ba" OR act10="ba")
		THEN 1 ELSE 0 END)'];
	$baid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ba" OR freshman_interest.act2 = "ba" OR
		freshman_interest.act3 = "ba" OR freshman_interest.act4 = "ba" OR
		freshman_interest.act5 = "ba" OR freshman_interest.act6 = "ba" OR
		freshman_interest.act7 = "ba" OR freshman_interest.act8 = "ba" OR
		freshman_interest.act9 = "ba" OR freshman_interest.act10 = "ba")');
	$t = 0;
	if ($bacount != 0) {
		do {
			$bahello[$t] = $baid[$t]['email'];
			$t++;
		} while ($t < $bacount);
	}
	if ($bacount != 0) {
		$bayello = implode(', ', $bahello);
		Mail::sendMail('Peer-to-Peer E-mail List for Step Team', 'Here are the e-mails of the students interested in Step Team:<br>'.$bayello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ba'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ba'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ba'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ba'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ba'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ba'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ba'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ba'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ba'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ba'));
	} else {
	}
	$bbcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bb" OR act2="bb" OR
		act3="bb" OR act4="bb" OR act5="bb" OR act6="bb" OR act7="bb" OR 
		act8="bb" OR act9="bb" OR act10="bb")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bb" OR act2="bb" OR
		act3="bb" OR act4="bb" OR act5="bb" OR act6="bb" OR act7="bb" OR 
		act8="bb" OR act9="bb" OR act10="bb")
		THEN 1 ELSE 0 END)'];
	$bbid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bb" OR freshman_interest.act2 = "bb" OR
		freshman_interest.act3 = "bb" OR freshman_interest.act4 = "bb" OR
		freshman_interest.act5 = "bb" OR freshman_interest.act6 = "bb" OR
		freshman_interest.act7 = "bb" OR freshman_interest.act8 = "bb" OR
		freshman_interest.act9 = "bb" OR freshman_interest.act10 = "bb")');
	$t = 0;
	if ($bbcount != 0) {
		do {
			$bbhello[$t] = $bbid[$t]['email'];
			$t++;
		} while ($t < $bbcount);
	}
	if ($bbcount != 0) {
		$bbyello = implode(', ', $bbhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Student Government Association', 'Here are the e-mails of the students interested in Student Government Association:<br>'.$bbyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bb'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bb'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bb'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bb'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bb'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bb'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bb'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bb'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bb'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bb'));
	} else {
	}
	$bccount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bc" OR act2="bc" OR
		act3="bc" OR act4="bc" OR act5="bc" OR act6="bc" OR act7="bc" OR 
		act8="bc" OR act9="bc" OR act10="bc")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bc" OR act2="bc" OR
		act3="bc" OR act4="bc" OR act5="bc" OR act6="bc" OR act7="bc" OR 
		act8="bc" OR act9="bc" OR act10="bc")
		THEN 1 ELSE 0 END)'];
	$bcid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bc" OR freshman_interest.act2 = "bc" OR
		freshman_interest.act3 = "bc" OR freshman_interest.act4 = "bc" OR
		freshman_interest.act5 = "bc" OR freshman_interest.act6 = "bc" OR
		freshman_interest.act7 = "bc" OR freshman_interest.act8 = "bc" OR
		freshman_interest.act9 = "bc" OR freshman_interest.act10 = "bc")');
	$t = 0;
	if ($bccount != 0) {
		do {
			$bchello[$t] = $bcid[$t]['email'];
			$t++;
		} while ($t < $bccount);
	}
	if ($bccount != 0) {
		$bcyello = implode(', ', $bchello);
		Mail::sendMail('Peer-to-Peer E-mail List for Swim Club', 'Here are the e-mails of the students interested in Swim Club:<br>'.$bcyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bc'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bc'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bc'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bc'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bc'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bc'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bc'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bc'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bc'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bc'));
	} else {
	}
	$bdcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bd" OR act2="bd" OR
		act3="bd" OR act4="bd" OR act5="bd" OR act6="bd" OR act7="bd" OR 
		act8="bd" OR act9="bd" OR act10="bd")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bd" OR act2="bd" OR
		act3="bd" OR act4="bd" OR act5="bd" OR act6="bd" OR act7="bd" OR 
		act8="bd" OR act9="bd" OR act10="bd")
		THEN 1 ELSE 0 END)'];
	$bdid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bd" OR freshman_interest.act2 = "bd" OR
		freshman_interest.act3 = "bd" OR freshman_interest.act4 = "bd" OR
		freshman_interest.act5 = "bd" OR freshman_interest.act6 = "bd" OR
		freshman_interest.act7 = "bd" OR freshman_interest.act8 = "bd" OR
		freshman_interest.act9 = "bd" OR freshman_interest.act10 = "bd")');
	$t = 0;
	if ($bdcount != 0) {
		do {
			$bdhello[$t] = $bdid[$t]['email'];
			$t++;
		} while ($t < $bdcount);
	}
	if ($bdcount != 0) {
		$bdyello = implode(', ', $bdhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Table Tennis Club', 'Here are the e-mails of the students interested in Table Tennis Club:<br>'.$bdyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bd'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bd'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bd'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bd'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bd'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bd'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bd'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bd'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bd'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bd'));
	} else {
	}
	$becount = database::query('SELECT count(*), SUM(CASE WHEN (act1="be" OR act2="be" OR
		act3="be" OR act4="be" OR act5="be" OR act6="be" OR act7="be" OR 
		act8="be" OR act9="be" OR act10="be")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="be" OR act2="be" OR
		act3="be" OR act4="be" OR act5="be" OR act6="be" OR act7="be" OR 
		act8="be" OR act9="be" OR act10="be")
		THEN 1 ELSE 0 END)'];
	$beid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "be" OR freshman_interest.act2 = "be" OR
		freshman_interest.act3 = "be" OR freshman_interest.act4 = "be" OR
		freshman_interest.act5 = "be" OR freshman_interest.act6 = "be" OR
		freshman_interest.act7 = "be" OR freshman_interest.act8 = "be" OR
		freshman_interest.act9 = "be" OR freshman_interest.act10 = "be")');
	$t = 0;
	if ($becount != 0) {
		do {
			$behello[$t] = $beid[$t]['email'];
			$t++;
		} while ($t < $becount);
	}
	if ($becount != 0) {
		$beyello = implode(', ', $behello);
		Mail::sendMail('Peer-to-Peer E-mail List for Tea Club', 'Here are the e-mails of the students interested in Tea Club:<br>'.$beyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'be'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'be'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'be'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'be'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'be'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'be'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'be'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'be'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'be'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'be'));
	} else {
	}
	$bfcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bf" OR act2="bf" OR
		act3="bf" OR act4="bf" OR act5="bf" OR act6="bf" OR act7="bf" OR 
		act8="bf" OR act9="bf" OR act10="bf")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bf" OR act2="bf" OR
		act3="bf" OR act4="bf" OR act5="bf" OR act6="bf" OR act7="bf" OR 
		act8="bf" OR act9="bf" OR act10="bf")
		THEN 1 ELSE 0 END)'];
	$bfid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bf" OR freshman_interest.act2 = "bf" OR
		freshman_interest.act3 = "bf" OR freshman_interest.act4 = "bf" OR
		freshman_interest.act5 = "bf" OR freshman_interest.act6 = "bf" OR
		freshman_interest.act7 = "bf" OR freshman_interest.act8 = "bf" OR
		freshman_interest.act9 = "bf" OR freshman_interest.act10 = "bf")');
	$t = 0;
	if ($bfcount != 0) {
		do {
			$bfhello[$t] = $bfid[$t]['email'];
			$t++;
		} while ($t < $bfcount);
	}
	if ($bfcount != 0) {
		$bfyello = implode(', ', $bfhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Theatre Arts Productions', 'Here are the e-mails of the students interested in Theatre Arts Productions:<br>'.$bfyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bf'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bf'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bf'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bf'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bf'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bf'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bf'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bf'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bf'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bf'));
	} else {
	}
	$bgcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bg" OR act2="bg" OR
		act3="bg" OR act4="bg" OR act5="bg" OR act6="bg" OR act7="bg" OR 
		act8="bg" OR act9="bg" OR act10="bg")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bg" OR act2="bg" OR
		act3="bg" OR act4="bg" OR act5="bg" OR act6="bg" OR act7="bg" OR 
		act8="bg" OR act9="bg" OR act10="bg")
		THEN 1 ELSE 0 END)'];
	$bgid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bg" OR freshman_interest.act2 = "bg" OR
		freshman_interest.act3 = "bg" OR freshman_interest.act4 = "bg" OR
		freshman_interest.act5 = "bg" OR freshman_interest.act6 = "bg" OR
		freshman_interest.act7 = "bg" OR freshman_interest.act8 = "bg" OR
		freshman_interest.act9 = "bg" OR freshman_interest.act10 = "bg")');
	$t = 0;
	if ($bgcount != 0) {
		do {
			$bghello[$t] = $bgid[$t]['email'];
			$t++;
		} while ($t < $bgcount);
	}
	if ($bgcount != 0) {
		$bgyello = implode(', ', $bghello);
		Mail::sendMail('Peer-to-Peer E-mail List for Tri-M Music National Honor Society', 'Here are the e-mails of the students interested in Tri-M Music National Honor Society:<br>'.$bgyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bg'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bg'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bg'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bg'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bg'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bg'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bg'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bg'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bg'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bg'));
	} else {
	}
	$bhcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bh" OR act2="bh" OR
		act3="bh" OR act4="bh" OR act5="bh" OR act6="bh" OR act7="bh" OR 
		act8="bh" OR act9="bh" OR act10="bh")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bh" OR act2="bh" OR
		act3="bh" OR act4="bh" OR act5="bh" OR act6="bh" OR act7="bh" OR 
		act8="bh" OR act9="bh" OR act10="bh")
		THEN 1 ELSE 0 END)'];
	$bhid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bh" OR freshman_interest.act2 = "bh" OR
		freshman_interest.act3 = "bh" OR freshman_interest.act4 = "bh" OR
		freshman_interest.act5 = "bh" OR freshman_interest.act6 = "bh" OR
		freshman_interest.act7 = "bh" OR freshman_interest.act8 = "bh" OR
		freshman_interest.act9 = "bh" OR freshman_interest.act10 = "bh")');
	$t = 0;
	if ($bhcount != 0) {
		do {
			$bhhello[$t] = $bhid[$t]['email'];
			$t++;
		} while ($t < $bhcount);
	}
	if ($bhcount != 0) {
		$bhyello = implode(', ', $bhhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Women\'s Choir', 'Here are the e-mails of the students interested in Women\'s Choir:<br>'.$bhyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bh'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bh'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bh'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bh'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bh'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bh'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bh'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bh'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bh'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bh'));
	} else {
	}
	$bicount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bi" OR act2="bi" OR
		act3="bi" OR act4="bi" OR act5="bi" OR act6="bi" OR act7="bi" OR 
		act8="bi" OR act9="bi" OR act10="bi")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bi" OR act2="bi" OR
		act3="bi" OR act4="bi" OR act5="bi" OR act6="bi" OR act7="bi" OR 
		act8="bi" OR act9="bi" OR act10="bi")
		THEN 1 ELSE 0 END)'];
	$biid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bi" OR freshman_interest.act2 = "bi" OR
		freshman_interest.act3 = "bi" OR freshman_interest.act4 = "bi" OR
		freshman_interest.act5 = "bi" OR freshman_interest.act6 = "bi" OR
		freshman_interest.act7 = "bi" OR freshman_interest.act8 = "bi" OR
		freshman_interest.act9 = "bi" OR freshman_interest.act10 = "bi")');
	$t = 0;
	if ($bicount != 0) {
		do {
			$bihello[$t] = $biid[$t]['email'];
			$t++;
		} while ($t < $bicount);
	}
	if ($bicount != 0) {
		$biyello = implode(', ', $bihello);
		Mail::sendMail('Peer-to-Peer E-mail List for Best Buddies', 'Here are the e-mails of the students interested in Best Buddies:<br>'.$biyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bi'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bi'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bi'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bi'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bi'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bi'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bi'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bi'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bi'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bi'));
	} else {
	}
	$bjcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bj" OR act2="bj" OR
		act3="bj" OR act4="bj" OR act5="bj" OR act6="bj" OR act7="bj" OR 
		act8="bj" OR act9="bj" OR act10="bj")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bj" OR act2="bj" OR
		act3="bj" OR act4="bj" OR act5="bj" OR act6="bj" OR act7="bj" OR 
		act8="bj" OR act9="bj" OR act10="bj")
		THEN 1 ELSE 0 END)'];
	$bjid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bj" OR freshman_interest.act2 = "bj" OR
		freshman_interest.act3 = "bj" OR freshman_interest.act4 = "bj" OR
		freshman_interest.act5 = "bj" OR freshman_interest.act6 = "bj" OR
		freshman_interest.act7 = "bj" OR freshman_interest.act8 = "bj" OR
		freshman_interest.act9 = "bj" OR freshman_interest.act10 = "bj")');
	$t = 0;
	if ($bjcount != 0) {
		do {
			$bjhello[$t] = $bjid[$t]['email'];
			$t++;
		} while ($t < $bjcount);
	}
	if ($bjcount != 0) {
		$bjyello = implode(', ', $bjhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Environmental Club (SAVE)', 'Here are the e-mails of the students interested in Environmental Club (SAVE):<br>'.$bjyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bj'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bj'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bj'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bj'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bj'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bj'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bj'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bj'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bj'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bj'));
	} else {
	}
	$bkcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bk" OR act2="bk" OR
		act3="bk" OR act4="bk" OR act5="bk" OR act6="bk" OR act7="bk" OR 
		act8="bk" OR act9="bk" OR act10="bk")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bk" OR act2="bk" OR
		act3="bk" OR act4="bk" OR act5="bk" OR act6="bk" OR act7="bk" OR 
		act8="bk" OR act9="bk" OR act10="bk")
		THEN 1 ELSE 0 END)'];
	$bkid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bk" OR freshman_interest.act2 = "bk" OR
		freshman_interest.act3 = "bk" OR freshman_interest.act4 = "bk" OR
		freshman_interest.act5 = "bk" OR freshman_interest.act6 = "bk" OR
		freshman_interest.act7 = "bk" OR freshman_interest.act8 = "bk" OR
		freshman_interest.act9 = "bk" OR freshman_interest.act10 = "bk")');
	$t = 0;
	if ($bkcount != 0) {
		do {
			$bkhello[$t] = $bkid[$t]['email'];
			$t++;
		} while ($t < $bkcount);
	}
	if ($bkcount != 0) {
		$bkyello = implode(', ', $bkhello);
		Mail::sendMail('Peer-to-Peer E-mail List for French National Honor Society', 'Here are the e-mails of the students interested in French National Honor Society:<br>'.$bkyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bk'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bk'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bk'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bk'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bk'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bk'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bk'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bk'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bk'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bk'));
	} else {
	}
	$blcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bl" OR act2="bl" OR
		act3="bl" OR act4="bl" OR act5="bl" OR act6="bl" OR act7="bl" OR 
		act8="bl" OR act9="bl" OR act10="bl")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bl" OR act2="bl" OR
		act3="bl" OR act4="bl" OR act5="bl" OR act6="bl" OR act7="bl" OR 
		act8="bl" OR act9="bl" OR act10="bl")
		THEN 1 ELSE 0 END)'];
	$blid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bl" OR freshman_interest.act2 = "bl" OR
		freshman_interest.act3 = "bl" OR freshman_interest.act4 = "bl" OR
		freshman_interest.act5 = "bl" OR freshman_interest.act6 = "bl" OR
		freshman_interest.act7 = "bl" OR freshman_interest.act8 = "bl" OR
		freshman_interest.act9 = "bl" OR freshman_interest.act10 = "bl")');
	$t = 0;
	if ($blcount != 0) {
		do {
			$blhello[$t] = $blid[$t]['email'];
			$t++;
		} while ($t < $blcount);
	}
	if ($blcount != 0) {
		$blyello = implode(', ', $blhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Math National Honor Society', 'Here are the e-mails of the students interested in Math National Honor Society:<br>'.$blyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bl'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bl'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bl'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bl'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bl'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bl'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bl'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bl'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bl'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bl'));
	} else {
	}
	$bmcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bm" OR act2="bm" OR
		act3="bm" OR act4="bm" OR act5="bm" OR act6="bm" OR act7="bm" OR 
		act8="bm" OR act9="bm" OR act10="bm")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bm" OR act2="bm" OR
		act3="bm" OR act4="bm" OR act5="bm" OR act6="bm" OR act7="bm" OR 
		act8="bm" OR act9="bm" OR act10="bm")
		THEN 1 ELSE 0 END)'];
	$bmid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bm" OR freshman_interest.act2 = "bm" OR
		freshman_interest.act3 = "bm" OR freshman_interest.act4 = "bm" OR
		freshman_interest.act5 = "bm" OR freshman_interest.act6 = "bm" OR
		freshman_interest.act7 = "bm" OR freshman_interest.act8 = "bm" OR
		freshman_interest.act9 = "bm" OR freshman_interest.act10 = "bm")');
	$t = 0;
	if ($bmcount != 0) {
		do {
			$bmhello[$t] = $bmid[$t]['email'];
			$t++;
		} while ($t < $bmcount);
	}
	if ($bmcount != 0) {
		$bmyello = implode(', ', $bmhello);
		Mail::sendMail('Peer-to-Peer E-mail List for National Art Honor Society', 'Here are the e-mails of the students interested in National Art Honor Society:<br>'.$bmyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bm'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bm'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bm'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bm'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bm'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bm'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bm'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bm'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bm'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bm'));
	} else {
	}
	$bncount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bn" OR act2="bn" OR
		act3="bn" OR act4="bn" OR act5="bn" OR act6="bn" OR act7="bn" OR 
		act8="bn" OR act9="bn" OR act10="bn")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bn" OR act2="bn" OR
		act3="bn" OR act4="bn" OR act5="bn" OR act6="bn" OR act7="bn" OR 
		act8="bn" OR act9="bn" OR act10="bn")
		THEN 1 ELSE 0 END)'];
	$bnid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bn" OR freshman_interest.act2 = "bn" OR
		freshman_interest.act3 = "bn" OR freshman_interest.act4 = "bn" OR
		freshman_interest.act5 = "bn" OR freshman_interest.act6 = "bn" OR
		freshman_interest.act7 = "bn" OR freshman_interest.act8 = "bn" OR
		freshman_interest.act9 = "bn" OR freshman_interest.act10 = "bn")');
	$t = 0;
	if ($bncount != 0) {
		do {
			$bnhello[$t] = $bnid[$t]['email'];
			$t++;
		} while ($t < $bncount);
	}
	if ($bncount != 0) {
		$bnyello = implode(', ', $bnhello);
		Mail::sendMail('Peer-to-Peer E-mail List for National Latin Honor Society', 'Here are the e-mails of the students interested in National Latin Honor Society:<br>'.$bnyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bn'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bn'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bn'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bn'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bn'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bn'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bn'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bn'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bn'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bn'));
	} else {
	}
	$bocount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bo" OR act2="bo" OR
		act3="bo" OR act4="bo" OR act5="bo" OR act6="bo" OR act7="bo" OR 
		act8="bo" OR act9="bo" OR act10="bo")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bo" OR act2="bo" OR
		act3="bo" OR act4="bo" OR act5="bo" OR act6="bo" OR act7="bo" OR 
		act8="bo" OR act9="bo" OR act10="bo")
		THEN 1 ELSE 0 END)'];
	$boid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bo" OR freshman_interest.act2 = "bo" OR
		freshman_interest.act3 = "bo" OR freshman_interest.act4 = "bo" OR
		freshman_interest.act5 = "bo" OR freshman_interest.act6 = "bo" OR
		freshman_interest.act7 = "bo" OR freshman_interest.act8 = "bo" OR
		freshman_interest.act9 = "bo" OR freshman_interest.act10 = "bo")');
	$t = 0;
	if ($bocount != 0) {
		do {
			$bohello[$t] = $boid[$t]['email'];
			$t++;
		} while ($t < $bocount);
	}
	if ($bocount != 0) {
		$boyello = implode(', ', $bohello);
		Mail::sendMail('Peer-to-Peer E-mail List for National Technical Honor Society (NTHS)', 'Here are the e-mails of the students interested in National Technical Honor Society (NTHS):<br>'.$boyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bo'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bo'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bo'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bo'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bo'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bo'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bo'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bo'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bo'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bo'));
	} else {
	}
	$bpcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bp" OR act2="bp" OR
		act3="bp" OR act4="bp" OR act5="bp" OR act6="bp" OR act7="bp" OR 
		act8="bp" OR act9="bp" OR act10="bp")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bp" OR act2="bp" OR
		act3="bp" OR act4="bp" OR act5="bp" OR act6="bp" OR act7="bp" OR 
		act8="bp" OR act9="bp" OR act10="bp")
		THEN 1 ELSE 0 END)'];
	$bpid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bp" OR freshman_interest.act2 = "bp" OR
		freshman_interest.act3 = "bp" OR freshman_interest.act4 = "bp" OR
		freshman_interest.act5 = "bp" OR freshman_interest.act6 = "bp" OR
		freshman_interest.act7 = "bp" OR freshman_interest.act8 = "bp" OR
		freshman_interest.act9 = "bp" OR freshman_interest.act10 = "bp")');
	$t = 0;
	if ($bpcount != 0) {
		do {
			$bphello[$t] = $bpid[$t]['email'];
			$t++;
		} while ($t < $bpcount);
	}
	if ($bpcount != 0) {
		$bpyello = implode(', ', $bphello);
		Mail::sendMail('Peer-to-Peer E-mail List for Science National Honor Society', 'Here are the e-mails of the students interested in Science National Honor Society:<br>'.$bpyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bp'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bp'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bp'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bp'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bp'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bp'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bp'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bp'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bp'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bp'));
	} else {
	}
	$bqcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bq" OR act2="bq" OR
		act3="bq" OR act4="bq" OR act5="bq" OR act6="bq" OR act7="bq" OR 
		act8="bq" OR act9="bq" OR act10="bq")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bq" OR act2="bq" OR
		act3="bq" OR act4="bq" OR act5="bq" OR act6="bq" OR act7="bq" OR 
		act8="bq" OR act9="bq" OR act10="bq")
		THEN 1 ELSE 0 END)'];
	$bqid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bq" OR freshman_interest.act2 = "bq" OR
		freshman_interest.act3 = "bq" OR freshman_interest.act4 = "bq" OR
		freshman_interest.act5 = "bq" OR freshman_interest.act6 = "bq" OR
		freshman_interest.act7 = "bq" OR freshman_interest.act8 = "bq" OR
		freshman_interest.act9 = "bq" OR freshman_interest.act10 = "bq")');
	$t = 0;
	if ($bqcount != 0) {
		do {
			$bqhello[$t] = $bqid[$t]['email'];
			$t++;
		} while ($t < $bqcount);
	}
	if ($bqcount != 0) {
		$bqyello = implode(', ', $bqhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Tri-M Music National Honor Society (TMNHS)', 'Here are the e-mails of the students interested in Tri-M Music National Honor Society (TMNHS):<br>'.$bqyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bq'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bq'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bq'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bq'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bq'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bq'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bq'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bq'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bq'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bq'));
	} else {
	}
	$brcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="br" OR act2="br" OR
		act3="br" OR act4="br" OR act5="br" OR act6="br" OR act7="br" OR 
		act8="br" OR act9="br" OR act10="br")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="br" OR act2="br" OR
		act3="br" OR act4="br" OR act5="br" OR act6="br" OR act7="br" OR 
		act8="br" OR act9="br" OR act10="br")
		THEN 1 ELSE 0 END)'];
	$brid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "br" OR freshman_interest.act2 = "br" OR
		freshman_interest.act3 = "br" OR freshman_interest.act4 = "br" OR
		freshman_interest.act5 = "br" OR freshman_interest.act6 = "br" OR
		freshman_interest.act7 = "br" OR freshman_interest.act8 = "br" OR
		freshman_interest.act9 = "br" OR freshman_interest.act10 = "br")');
	$t = 0;
	if ($brcount != 0) {
		do {
			$brhello[$t] = $brid[$t]['email'];
			$t++;
		} while ($t < $brcount);
	}
	if ($brcount != 0) {
		$bryello = implode(', ', $brhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Band', 'Here are the e-mails of the students interested in Band:<br>'.$bryello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'br'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'br'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'br'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'br'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'br'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'br'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'br'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'br'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'br'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'br'));	
	} else {
	}
	$bscount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bs" OR act2="bs" OR
		act3="bs" OR act4="bs" OR act5="bs" OR act6="bs" OR act7="bs" OR 
		act8="bs" OR act9="bs" OR act10="bs")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bs" OR act2="bs" OR
		act3="bs" OR act4="bs" OR act5="bs" OR act6="bs" OR act7="bs" OR 
		act8="bs" OR act9="bs" OR act10="bs")
		THEN 1 ELSE 0 END)'];
	$bsid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bs" OR freshman_interest.act2 = "bs" OR
		freshman_interest.act3 = "bs" OR freshman_interest.act4 = "bs" OR
		freshman_interest.act5 = "bs" OR freshman_interest.act6 = "bs" OR
		freshman_interest.act7 = "bs" OR freshman_interest.act8 = "bs" OR
		freshman_interest.act9 = "bs" OR freshman_interest.act10 = "bs")');
	$t = 0;
	if ($bscount != 0) {
		do {
			$bshello[$t] = $bsid[$t]['email'];
			$t++;
		} while ($t < $bscount);
	}
	if ($bscount != 0) {
		$bsyello = implode(', ', $bshello);
		Mail::sendMail('Peer-to-Peer E-mail List for Dance', 'Here are the e-mails of the students interested in Dance:<br>'.$bsyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bs'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bs'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bs'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bs'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bs'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bs'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bs'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bs'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bs'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bs'));
	} else {
	}
	$btcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bt" OR act2="bt" OR
		act3="bt" OR act4="bt" OR act5="bt" OR act6="bt" OR act7="bt" OR 
		act8="bt" OR act9="bt" OR act10="bt")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bt" OR act2="bt" OR
		act3="bt" OR act4="bt" OR act5="bt" OR act6="bt" OR act7="bt" OR 
		act8="bt" OR act9="bt" OR act10="bt")
		THEN 1 ELSE 0 END)'];
	$btid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bt" OR freshman_interest.act2 = "bt" OR
		freshman_interest.act3 = "bt" OR freshman_interest.act4 = "bt" OR
		freshman_interest.act5 = "bt" OR freshman_interest.act6 = "bt" OR
		freshman_interest.act7 = "bt" OR freshman_interest.act8 = "bt" OR
		freshman_interest.act9 = "bt" OR freshman_interest.act10 = "bt")');
	$t = 0;
	if ($btcount != 0) {
		do {
			$bthello[$t] = $btid[$t]['email'];
			$t++;
		} while ($t < $btcount);
	}
	if ($btcount != 0) {
		$btyello = implode(', ', $bthello);
		Mail::sendMail('Peer-to-Peer E-mail List for Jazz Band', 'Here are the e-mails of the students interested in Jazz Band:<br>'.$btyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bt'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bt'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bt'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bt'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bt'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bt'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bt'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bt'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bt'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bt'));
	} else {
	}
	$bucount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bu" OR act2="bu" OR
		act3="bu" OR act4="bu" OR act5="bu" OR act6="bu" OR act7="bu" OR 
		act8="bu" OR act9="bu" OR act10="bu")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bu" OR act2="bu" OR
		act3="bu" OR act4="bu" OR act5="bu" OR act6="bu" OR act7="bu" OR 
		act8="bu" OR act9="bu" OR act10="bu")
		THEN 1 ELSE 0 END)'];
	$buid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bu" OR freshman_interest.act2 = "bu" OR
		freshman_interest.act3 = "bu" OR freshman_interest.act4 = "bu" OR
		freshman_interest.act5 = "bu" OR freshman_interest.act6 = "bu" OR
		freshman_interest.act7 = "bu" OR freshman_interest.act8 = "bu" OR
		freshman_interest.act9 = "bu" OR freshman_interest.act10 = "bu")');
	$t = 0;
	if ($bucount != 0) {
		do {
			$buhello[$t] = $buid[$t]['email'];
			$t++;
		} while ($t < $bucount);
	}
	if ($bucount != 0) {
		$buyello = implode(', ', $buhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Lunch Choir / Concert Choir', 'Here are the e-mails of the students interested in Lunch Choir / Concert Choir:<br>'.$buyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bu'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bu'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bu'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bu'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bu'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bu'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bu'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bu'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bu'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bu'));
	} else {
	}
	$bvcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bv" OR act2="bv" OR
		act3="bv" OR act4="bv" OR act5="bv" OR act6="bv" OR act7="bv" OR 
		act8="bv" OR act9="bv" OR act10="bv")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bv" OR act2="bv" OR
		act3="bv" OR act4="bv" OR act5="bv" OR act6="bv" OR act7="bv" OR 
		act8="bv" OR act9="bv" OR act10="bv")
		THEN 1 ELSE 0 END)'];
	$bvid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bv" OR freshman_interest.act2 = "bv" OR
		freshman_interest.act3 = "bv" OR freshman_interest.act4 = "bv" OR
		freshman_interest.act5 = "bv" OR freshman_interest.act6 = "bv" OR
		freshman_interest.act7 = "bv" OR freshman_interest.act8 = "bv" OR
		freshman_interest.act9 = "bv" OR freshman_interest.act10 = "bv")');
	$t = 0;
	if ($bvcount != 0) {
		do {
			$bvhello[$t] = $bvid[$t]['email'];
			$t++;
		} while ($t < $bvcount);
	}
	if ($bvcount != 0) {
		$bvyello = implode(', ', $bvhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Marching Band', 'Here are the e-mails of the students interested in Marching Band:<br>'.$bvyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bv'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bv'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bv'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bv'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bv'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bv'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bv'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bv'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bv'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bv'));
	} else {
	}
	$bwcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bw" OR act2="bw" OR
		act3="bw" OR act4="bw" OR act5="bw" OR act6="bw" OR act7="bw" OR 
		act8="bw" OR act9="bw" OR act10="bw")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bw" OR act2="bw" OR
		act3="bw" OR act4="bw" OR act5="bw" OR act6="bw" OR act7="bw" OR 
		act8="bw" OR act9="bw" OR act10="bw")
		THEN 1 ELSE 0 END)'];
	$bwid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bw" OR freshman_interest.act2 = "bw" OR
		freshman_interest.act3 = "bw" OR freshman_interest.act4 = "bw" OR
		freshman_interest.act5 = "bw" OR freshman_interest.act6 = "bw" OR
		freshman_interest.act7 = "bw" OR freshman_interest.act8 = "bw" OR
		freshman_interest.act9 = "bw" OR freshman_interest.act10 = "bw")');
	$t = 0;
	if ($bwcount != 0) {
		do {
			$bwhello[$t] = $bwid[$t]['email'];
			$t++;
		} while ($t < $bwcount);
	}
	if ($bwcount != 0) {
		$bwyello = implode(', ', $bwhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Men\'s Choir', 'Here are the e-mails of the students interested in Men\'s Choir:<br>'.$bwyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bw'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bw'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bw'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bw'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bw'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bw'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bw'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bw'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bw'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bw'));
	} else {
	}
	$bxcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bx" OR act2="bx" OR
		act3="bx" OR act4="bx" OR act5="bx" OR act6="bx" OR act7="bx" OR 
		act8="bx" OR act9="bx" OR act10="bx")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bx" OR act2="bx" OR
		act3="bx" OR act4="bx" OR act5="bx" OR act6="bx" OR act7="bx" OR 
		act8="bx" OR act9="bx" OR act10="bx")
		THEN 1 ELSE 0 END)'];
	$bxid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bx" OR freshman_interest.act2 = "bx" OR
		freshman_interest.act3 = "bx" OR freshman_interest.act4 = "bx" OR
		freshman_interest.act5 = "bx" OR freshman_interest.act6 = "bx" OR
		freshman_interest.act7 = "bx" OR freshman_interest.act8 = "bx" OR
		freshman_interest.act9 = "bx" OR freshman_interest.act10 = "bx")');
	$t = 0;
	if ($bxcount != 0) {
		do {
			$bxhello[$t] = $bxid[$t]['email'];
			$t++;
		} while ($t < $bxcount);
	}
	if ($bxcount != 0) {
		$bxyello = implode(', ', $bxhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Orchestra', 'Here are the e-mails of the students interested in Orchestra:<br>'.$bxyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bx'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bx'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bx'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bx'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bx'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bx'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bx'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bx'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bx'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bx'));
	} else {
	}
	$bycount = database::query('SELECT count(*), SUM(CASE WHEN (act1="by" OR act2="by" OR
		act3="by" OR act4="by" OR act5="by" OR act6="by" OR act7="by" OR 
		act8="by" OR act9="by" OR act10="by")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="by" OR act2="by" OR
		act3="by" OR act4="by" OR act5="by" OR act6="by" OR act7="by" OR 
		act8="by" OR act9="by" OR act10="by")
		THEN 1 ELSE 0 END)'];
	$byid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "by" OR freshman_interest.act2 = "by" OR
		freshman_interest.act3 = "by" OR freshman_interest.act4 = "by" OR
		freshman_interest.act5 = "by" OR freshman_interest.act6 = "by" OR
		freshman_interest.act7 = "by" OR freshman_interest.act8 = "by" OR
		freshman_interest.act9 = "by" OR freshman_interest.act10 = "by")');
	$t = 0;
	if ($bycount != 0) {
		do {
			$byhello[$t] = $byid[$t]['email'];
			$t++;
		} while ($t < $bycount);
	}
	if ($bycount != 0) {
		$byyello = implode(', ', $byhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Step Team', 'Here are the e-mails of the students interested in Step Team:<br>'.$byyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'by'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'by'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'by'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'by'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'by'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'by'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'by'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'by'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'by'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'by'));
	} else {
	}
	$bzcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bz" OR act2="bz" OR
		act3="bz" OR act4="bz" OR act5="bz" OR act6="bz" OR act7="bz" OR 
		act8="bz" OR act9="bz" OR act10="bz")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bz" OR act2="bz" OR
		act3="bz" OR act4="bz" OR act5="bz" OR act6="bz" OR act7="bz" OR 
		act8="bz" OR act9="bz" OR act10="bz")
		THEN 1 ELSE 0 END)'];
	$bzid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bz" OR freshman_interest.act2 = "bz" OR
		freshman_interest.act3 = "bz" OR freshman_interest.act4 = "bz" OR
		freshman_interest.act5 = "bz" OR freshman_interest.act6 = "bz" OR
		freshman_interest.act7 = "bz" OR freshman_interest.act8 = "bz" OR
		freshman_interest.act9 = "bz" OR freshman_interest.act10 = "bz")');
	$t = 0;
	if ($bzcount != 0) {
		do {
			$bzhello[$t] = $bzid[$t]['email'];
			$t++;
		} while ($t < $bzcount);
	}
	if ($bzcount != 0) {
		$bzyello = implode(', ', $bzhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Theater Arts Productions', 'Here are the e-mails of the students interested in Theater Arts Productions:<br>'.$bzyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bz'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bz'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bz'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bz'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bz'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bz'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bz'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bz'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bz'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bz'));
	} else {
	}
	$cacount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ca" OR act2="ca" OR
		act3="ca" OR act4="ca" OR act5="ca" OR act6="ca" OR act7="ca" OR 
		act8="ca" OR act9="ca" OR act10="ca")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ca" OR act2="ca" OR
		act3="ca" OR act4="ca" OR act5="ca" OR act6="ca" OR act7="ca" OR 
		act8="ca" OR act9="ca" OR act10="ca")
		THEN 1 ELSE 0 END)'];
	$caid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ca" OR freshman_interest.act2 = "ca" OR
		freshman_interest.act3 = "ca" OR freshman_interest.act4 = "ca" OR
		freshman_interest.act5 = "ca" OR freshman_interest.act6 = "ca" OR
		freshman_interest.act7 = "ca" OR freshman_interest.act8 = "ca" OR
		freshman_interest.act9 = "ca" OR freshman_interest.act10 = "ca")');
	$t = 0;
	if ($cacount != 0) {
		do {
			$cahello[$t] = $caid[$t]['email'];
			$t++;
		} while ($t < $cacount);
	}
	if ($cacount != 0) {
		$cayello = implode(', ', $cahello);
		Mail::sendMail('Peer-to-Peer E-mail List for Tri-M Music National Honor Society', 'Here are the e-mails of the students interested in Tri-M Music National Honor Society:<br>'.$cayello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ca'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ca'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ca'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ca'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ca'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ca'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ca'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ca'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ca'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ca'));
	} else {
	}
	$cbcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cb" OR act2="cb" OR
		act3="cb" OR act4="cb" OR act5="cb" OR act6="cb" OR act7="cb" OR 
		act8="cb" OR act9="cb" OR act10="cb")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cb" OR act2="cb" OR
		act3="cb" OR act4="cb" OR act5="cb" OR act6="cb" OR act7="cb" OR 
		act8="cb" OR act9="cb" OR act10="cb")
		THEN 1 ELSE 0 END)'];
	$cbid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cb" OR freshman_interest.act2 = "cb" OR
		freshman_interest.act3 = "cb" OR freshman_interest.act4 = "cb" OR
		freshman_interest.act5 = "cb" OR freshman_interest.act6 = "cb" OR
		freshman_interest.act7 = "cb" OR freshman_interest.act8 = "cb" OR
		freshman_interest.act9 = "cb" OR freshman_interest.act10 = "cb")');
	$t = 0;
	if ($cbcount != 0) {
		do {
			$cbhello[$t] = $cbid[$t]['email'];
			$t++;
		} while ($t < $cbcount);
	}
	if ($cbcount != 0) {
		$cbyello = implode(', ', $cbhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Women\'s Choir', 'Here are the e-mails of the students interested in Women\'s Choir:<br>'.$cbyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cb'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cb'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cb'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cb'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cb'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cb'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cb'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cb'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cb'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cb'));
	} else {
	}
	$cccount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cc" OR act2="cc" OR
		act3="cc" OR act4="cc" OR act5="cc" OR act6="cc" OR act7="cc" OR 
		act8="cc" OR act9="cc" OR act10="cc")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cc" OR act2="cc" OR
		act3="cc" OR act4="cc" OR act5="cc" OR act6="cc" OR act7="cc" OR 
		act8="cc" OR act9="cc" OR act10="cc")
		THEN 1 ELSE 0 END)'];
	$ccid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cc" OR freshman_interest.act2 = "cc" OR
		freshman_interest.act3 = "cc" OR freshman_interest.act4 = "cc" OR
		freshman_interest.act5 = "cc" OR freshman_interest.act6 = "cc" OR
		freshman_interest.act7 = "cc" OR freshman_interest.act8 = "cc" OR
		freshman_interest.act9 = "cc" OR freshman_interest.act10 = "cc")');
	$t = 0;
	if ($cccount != 0) {
		do {
			$cchello[$t] = $ccid[$t]['email'];
			$t++;
		} while ($t < $cccount);
	}
	if ($cccount != 0) {
		$ccyello = implode(', ', $cchello);
		Mail::sendMail('Peer-to-Peer E-mail List for Allied Bowling', 'Here are the e-mails of the students interested in Allied Bowling:<br>'.$ccyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cc'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cc'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cc'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cc'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cc'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cc'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cc'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cc'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cc'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cc'));
	} else {
	}
	$cdcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cd" OR act2="cd" OR
		act3="cd" OR act4="cd" OR act5="cd" OR act6="cd" OR act7="cd" OR 
		act8="cd" OR act9="cd" OR act10="cd")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cd" OR act2="cd" OR
		act3="cd" OR act4="cd" OR act5="cd" OR act6="cd" OR act7="cd" OR 
		act8="cd" OR act9="cd" OR act10="cd")
		THEN 1 ELSE 0 END)'];
	$cdid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cd" OR freshman_interest.act2 = "cd" OR
		freshman_interest.act3 = "cd" OR freshman_interest.act4 = "cd" OR
		freshman_interest.act5 = "cd" OR freshman_interest.act6 = "cd" OR
		freshman_interest.act7 = "cd" OR freshman_interest.act8 = "cd" OR
		freshman_interest.act9 = "cd" OR freshman_interest.act10 = "cd")');
	$t = 0;
	if ($cdcount != 0) {
		do {
			$cdhello[$t] = $cdid[$t]['email'];
			$t++;
		} while ($t < $cdcount);
	}
	if ($cdcount != 0) {
		$cdyello = implode(', ', $cdhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Allied Soccer', 'Here are the e-mails of the students interested in Allied Soccer:<br>'.$cdyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cd'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cd'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cd'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cd'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cd'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cd'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cd'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cd'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cd'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cd'));
	} else {
	}
	$cecount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ce" OR act2="ce" OR
		act3="ce" OR act4="ce" OR act5="ce" OR act6="ce" OR act7="ce" OR 
		act8="ce" OR act9="ce" OR act10="ce")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ce" OR act2="ce" OR
		act3="ce" OR act4="ce" OR act5="ce" OR act6="ce" OR act7="ce" OR 
		act8="ce" OR act9="ce" OR act10="ce")
		THEN 1 ELSE 0 END)'];
	$ceid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ce" OR freshman_interest.act2 = "ce" OR
		freshman_interest.act3 = "ce" OR freshman_interest.act4 = "ce" OR
		freshman_interest.act5 = "ce" OR freshman_interest.act6 = "ce" OR
		freshman_interest.act7 = "ce" OR freshman_interest.act8 = "ce" OR
		freshman_interest.act9 = "ce" OR freshman_interest.act10 = "ce")');
	$t = 0;
	if ($cecount != 0) {
		do {
			$cehello[$t] = $ceid[$t]['email'];
			$t++;
		} while ($t < $cecount);
	}
	if ($cecount != 0) {
		$ceyello = implode(', ', $cehello);
		Mail::sendMail('Peer-to-Peer E-mail List for Allied Softball', 'Here are the e-mails of the students interested in Allied Softball:<br>'.$ceyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ce'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ce'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ce'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ce'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ce'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ce'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ce'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ce'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ce'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ce'));
	} else {
	}
	$cfcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cf" OR act2="cf" OR
		act3="cf" OR act4="cf" OR act5="cf" OR act6="cf" OR act7="cf" OR 
		act8="cf" OR act9="cf" OR act10="cf")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cf" OR act2="cf" OR
		act3="cf" OR act4="cf" OR act5="cf" OR act6="cf" OR act7="cf" OR 
		act8="cf" OR act9="cf" OR act10="cf")
		THEN 1 ELSE 0 END)'];
	$cfid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cf" OR freshman_interest.act2 = "cf" OR
		freshman_interest.act3 = "cf" OR freshman_interest.act4 = "cf" OR
		freshman_interest.act5 = "cf" OR freshman_interest.act6 = "cf" OR
		freshman_interest.act7 = "cf" OR freshman_interest.act8 = "cf" OR
		freshman_interest.act9 = "cf" OR freshman_interest.act10 = "cf")');
	$t = 0;
	if ($cfcount != 0) {
		do {
			$cfhello[$t] = $cfid[$t]['email'];
			$t++;
		} while ($t < $cfcount);
	}
	if ($cfcount != 0) {
		$cfyello = implode(', ', $cfhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Baseball', 'Here are the e-mails of the students interested in Baseball:<br>'.$cfyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cf'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cf'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cf'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cf'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cf'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cf'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cf'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cf'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cf'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cf'));
	} else {
	}
	$cgcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cg" OR act2="cg" OR
		act3="cg" OR act4="cg" OR act5="cg" OR act6="cg" OR act7="cg" OR 
		act8="cg" OR act9="cg" OR act10="cg")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cg" OR act2="cg" OR
		act3="cg" OR act4="cg" OR act5="cg" OR act6="cg" OR act7="cg" OR 
		act8="cg" OR act9="cg" OR act10="cg")
		THEN 1 ELSE 0 END)'];
	$cgid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cg" OR freshman_interest.act2 = "cg" OR
		freshman_interest.act3 = "cg" OR freshman_interest.act4 = "cg" OR
		freshman_interest.act5 = "cg" OR freshman_interest.act6 = "cg" OR
		freshman_interest.act7 = "cg" OR freshman_interest.act8 = "cg" OR
		freshman_interest.act9 = "cg" OR freshman_interest.act10 = "cg")');
	$t = 0;
	if ($cgcount != 0) {
		do {
			$cghello[$t] = $cgid[$t]['email'];
			$t++;
		} while ($t < $cgcount);
	}
	if ($cgcount != 0) {
		$cgyello = implode(', ', $cghello);
		Mail::sendMail('Peer-to-Peer E-mail List for Basketball - Boys', 'Here are the e-mails of the students interested in Basketball - Boys:<br>'.$cgyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cg'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cg'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cg'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cg'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cg'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cg'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cg'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cg'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cg'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cg'));
	} else {
	}
	$chcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ch" OR act2="ch" OR
		act3="ch" OR act4="ch" OR act5="ch" OR act6="ch" OR act7="ch" OR 
		act8="ch" OR act9="ch" OR act10="ch")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ch" OR act2="ch" OR
		act3="ch" OR act4="ch" OR act5="ch" OR act6="ch" OR act7="ch" OR 
		act8="ch" OR act9="ch" OR act10="ch")
		THEN 1 ELSE 0 END)'];
	$chid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ch" OR freshman_interest.act2 = "ch" OR
		freshman_interest.act3 = "ch" OR freshman_interest.act4 = "ch" OR
		freshman_interest.act5 = "ch" OR freshman_interest.act6 = "ch" OR
		freshman_interest.act7 = "ch" OR freshman_interest.act8 = "ch" OR
		freshman_interest.act9 = "ch" OR freshman_interest.act10 = "ch")');
	$t = 0;
	if ($chcount != 0) {
		do {
			$chhello[$t] = $chid[$t]['email'];
			$t++;
		} while ($t < $chcount);
	}
	if ($chcount != 0) {
		$chyello = implode(', ', $chhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Basketball - Girls', 'Here are the e-mails of the students interested in Basketball - Girls:<br>'.$chyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ch'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ch'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ch'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ch'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ch'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ch'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ch'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ch'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ch'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ch'));
	} else {
	}
	$cicount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ci" OR act2="ci" OR
		act3="ci" OR act4="ci" OR act5="ci" OR act6="ci" OR act7="ci" OR 
		act8="ci" OR act9="ci" OR act10="ci")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ci" OR act2="ci" OR
		act3="ci" OR act4="ci" OR act5="ci" OR act6="ci" OR act7="ci" OR 
		act8="ci" OR act9="ci" OR act10="ci")
		THEN 1 ELSE 0 END)'];
	$ciid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ci" OR freshman_interest.act2 = "ci" OR
		freshman_interest.act3 = "ci" OR freshman_interest.act4 = "ci" OR
		freshman_interest.act5 = "ci" OR freshman_interest.act6 = "ci" OR
		freshman_interest.act7 = "ci" OR freshman_interest.act8 = "ci" OR
		freshman_interest.act9 = "ci" OR freshman_interest.act10 = "ci")');
	$t = 0;
	if ($cicount != 0) {
		do {
			$cihello[$t] = $ciid[$t]['email'];
			$t++;
		} while ($t < $cicount);
	}
	if ($cicount != 0) {
		$ciyello = implode(', ', $cihello);
		Mail::sendMail('Peer-to-Peer E-mail List for Boys Lacrosse', 'Here are the e-mails of the students interested in Boys Lacrosse:<br>'.$ciyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ci'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ci'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ci'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ci'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ci'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ci'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ci'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ci'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ci'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ci'));
	} else {
	}
	$cjcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cj" OR act2="cj" OR
		act3="cj" OR act4="cj" OR act5="cj" OR act6="cj" OR act7="cj" OR 
		act8="cj" OR act9="cj" OR act10="cj")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cj" OR act2="cj" OR
		act3="cj" OR act4="cj" OR act5="cj" OR act6="cj" OR act7="cj" OR 
		act8="cj" OR act9="cj" OR act10="cj")
		THEN 1 ELSE 0 END)'];
	$cjid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cj" OR freshman_interest.act2 = "cj" OR
		freshman_interest.act3 = "cj" OR freshman_interest.act4 = "cj" OR
		freshman_interest.act5 = "cj" OR freshman_interest.act6 = "cj" OR
		freshman_interest.act7 = "cj" OR freshman_interest.act8 = "cj" OR
		freshman_interest.act9 = "cj" OR freshman_interest.act10 = "cj")');
	$t = 0;
	if ($cjcount != 0) {
		do {
			$cjhello[$t] = $cjid[$t]['email'];
			$t++;
		} while ($t < $cjcount);
	}
	if ($cjcount != 0) {
		$cjyello = implode(', ', $cjhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Boys Soccer', 'Here are the e-mails of the students interested in Boys Soccer:<br>'.$cjyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cj'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cj'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cj'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cj'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cj'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cj'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cj'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cj'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cj'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cj'));
	} else {
	}
	$ckcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ck" OR act2="ck" OR
		act3="ck" OR act4="ck" OR act5="ck" OR act6="ck" OR act7="ck" OR 
		act8="ck" OR act9="ck" OR act10="ck")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ck" OR act2="ck" OR
		act3="ck" OR act4="ck" OR act5="ck" OR act6="ck" OR act7="ck" OR 
		act8="ck" OR act9="ck" OR act10="ck")
		THEN 1 ELSE 0 END)'];
	$ckid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ck" OR freshman_interest.act2 = "ck" OR
		freshman_interest.act3 = "ck" OR freshman_interest.act4 = "ck" OR
		freshman_interest.act5 = "ck" OR freshman_interest.act6 = "ck" OR
		freshman_interest.act7 = "ck" OR freshman_interest.act8 = "ck" OR
		freshman_interest.act9 = "ck" OR freshman_interest.act10 = "ck")');
	$t = 0;
	if ($ckcount != 0) {
		do {
			$ckhello[$t] = $ckid[$t]['email'];
			$t++;
		} while ($t < $ckcount);
	}
	if ($ckcount != 0) {
		$ckyello = implode(', ', $ckhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Cheerleading', 'Here are the e-mails of the students interested in Cheerleading:<br>'.$ckyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ck'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ck'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ck'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ck'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ck'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ck'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ck'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ck'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ck'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ck'));
	} else {
	}
	$clcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cl" OR act2="cl" OR
		act3="cl" OR act4="cl" OR act5="cl" OR act6="cl" OR act7="cl" OR 
		act8="cl" OR act9="cl" OR act10="cl")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cl" OR act2="cl" OR
		act3="cl" OR act4="cl" OR act5="cl" OR act6="cl" OR act7="cl" OR 
		act8="cl" OR act9="cl" OR act10="cl")
		THEN 1 ELSE 0 END)'];
	$clid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cl" OR freshman_interest.act2 = "cl" OR
		freshman_interest.act3 = "cl" OR freshman_interest.act4 = "cl" OR
		freshman_interest.act5 = "cl" OR freshman_interest.act6 = "cl" OR
		freshman_interest.act7 = "cl" OR freshman_interest.act8 = "cl" OR
		freshman_interest.act9 = "cl" OR freshman_interest.act10 = "cl")');
	$t = 0;
	if ($clcount != 0) {
		do {
			$clhello[$t] = $clid[$t]['email'];
			$t++;
		} while ($t < $clcount);
	}
	if ($clcount != 0) {
		$clyello = implode(', ', $clhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Cross Country', 'Here are the e-mails of the students interested in Cross Country:<br>'.$clyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cl'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cl'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cl'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cl'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cl'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cl'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cl'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cl'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cl'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cl'));
	} else {
	}
	$cmcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cm" OR act2="cm" OR
		act3="cm" OR act4="cm" OR act5="cm" OR act6="cm" OR act7="cm" OR 
		act8="cm" OR act9="cm" OR act10="cm")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cm" OR act2="cm" OR
		act3="cm" OR act4="cm" OR act5="cm" OR act6="cm" OR act7="cm" OR 
		act8="cm" OR act9="cm" OR act10="cm")
		THEN 1 ELSE 0 END)'];
	$cmid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cm" OR freshman_interest.act2 = "cm" OR
		freshman_interest.act3 = "cm" OR freshman_interest.act4 = "cm" OR
		freshman_interest.act5 = "cm" OR freshman_interest.act6 = "cm" OR
		freshman_interest.act7 = "cm" OR freshman_interest.act8 = "cm" OR
		freshman_interest.act9 = "cm" OR freshman_interest.act10 = "cm")');
	$t = 0;
	if ($cmcount != 0) {
		do {
			$cmhello[$t] = $cmid[$t]['email'];
			$t++;
		} while ($t < $cmcount);
	}
	if ($cmcount != 0) {
		$cmyello = implode(', ', $cmhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Field Hockey', 'Here are the e-mails of the students interested in Field Hockey:<br>'.$cmyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cm'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cm'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cm'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cm'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cm'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cm'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cm'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cm'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cm'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cm'));
	} else {
	}
	$cncount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cn" OR act2="cn" OR
		act3="cn" OR act4="cn" OR act5="cn" OR act6="cn" OR act7="cn" OR 
		act8="cn" OR act9="cn" OR act10="cn")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cn" OR act2="cn" OR
		act3="cn" OR act4="cn" OR act5="cn" OR act6="cn" OR act7="cn" OR 
		act8="cn" OR act9="cn" OR act10="cn")
		THEN 1 ELSE 0 END)'];
	$cnid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cn" OR freshman_interest.act2 = "cn" OR
		freshman_interest.act3 = "cn" OR freshman_interest.act4 = "cn" OR
		freshman_interest.act5 = "cn" OR freshman_interest.act6 = "cn" OR
		freshman_interest.act7 = "cn" OR freshman_interest.act8 = "cn" OR
		freshman_interest.act9 = "cn" OR freshman_interest.act10 = "cn")');
	$t = 0;
	if ($cncount != 0) {
		do {
			$cnhello[$t] = $cnid[$t]['email'];
			$t++;
		} while ($t < $cncount);
	}
	if ($cncount != 0) {
		$cnyello = implode(', ', $cnhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Football', 'Here are the e-mails of the students interested in Football:<br>'.$cnyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cn'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cn'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cn'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cn'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cn'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cn'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cn'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cn'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cn'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cn'));
	} else {
	}
	$cocount = database::query('SELECT count(*), SUM(CASE WHEN (act1="co" OR act2="co" OR
		act3="co" OR act4="co" OR act5="co" OR act6="co" OR act7="co" OR 
		act8="co" OR act9="co" OR act10="co")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="co" OR act2="co" OR
		act3="co" OR act4="co" OR act5="co" OR act6="co" OR act7="co" OR 
		act8="co" OR act9="co" OR act10="co")
		THEN 1 ELSE 0 END)'];
	$coid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "co" OR freshman_interest.act2 = "co" OR
		freshman_interest.act3 = "co" OR freshman_interest.act4 = "co" OR
		freshman_interest.act5 = "co" OR freshman_interest.act6 = "co" OR
		freshman_interest.act7 = "co" OR freshman_interest.act8 = "co" OR
		freshman_interest.act9 = "co" OR freshman_interest.act10 = "co")');
	$t = 0;
	if ($cocount != 0) {
		do {
			$cohello[$t] = $coid[$t]['email'];
			$t++;
		} while ($t < $cocount);
	}
	if ($cocount != 0) {
		$coyello = implode(', ', $cohello);
		Mail::sendMail('Peer-to-Peer E-mail List for Girls Lacrosse', 'Here are the e-mails of the students interested in Girls Lacrosse:<br>'.$coyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'co'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'co'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'co'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'co'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'co'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'co'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'co'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'co'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'co'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'co'));
	} else {
	}
	$cpcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cp" OR act2="cp" OR
		act3="cp" OR act4="cp" OR act5="cp" OR act6="cp" OR act7="cp" OR 
		act8="cp" OR act9="cp" OR act10="cp")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cp" OR act2="cp" OR
		act3="cp" OR act4="cp" OR act5="cp" OR act6="cp" OR act7="cp" OR 
		act8="cp" OR act9="cp" OR act10="cp")
		THEN 1 ELSE 0 END)'];
	$cpid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cp" OR freshman_interest.act2 = "cp" OR
		freshman_interest.act3 = "cp" OR freshman_interest.act4 = "cp" OR
		freshman_interest.act5 = "cp" OR freshman_interest.act6 = "cp" OR
		freshman_interest.act7 = "cp" OR freshman_interest.act8 = "cp" OR
		freshman_interest.act9 = "cp" OR freshman_interest.act10 = "cp")');
	$t = 0;
	if ($cpcount != 0) {
		do {
			$cphello[$t] = $cpid[$t]['email'];
			$t++;
		} while ($t < $cpcount);
	}
	if ($cpcount != 0) {
		$cpyello = implode(', ', $cphello);
		Mail::sendMail('Peer-to-Peer E-mail List for Girls Soccer', 'Here are the e-mails of the students interested in Girls Soccer:<br>'.$cpyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cp'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cp'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cp'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cp'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cp'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cp'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cp'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cp'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cp'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cp'));
	} else {
	}
	$cqcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cq" OR act2="cq" OR
		act3="cq" OR act4="cq" OR act5="cq" OR act6="cq" OR act7="cq" OR 
		act8="cq" OR act9="cq" OR act10="cq")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cq" OR act2="cq" OR
		act3="cq" OR act4="cq" OR act5="cq" OR act6="cq" OR act7="cq" OR 
		act8="cq" OR act9="cq" OR act10="cq")
		THEN 1 ELSE 0 END)'];
	$cqid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cq" OR freshman_interest.act2 = "cq" OR
		freshman_interest.act3 = "cq" OR freshman_interest.act4 = "cq" OR
		freshman_interest.act5 = "cq" OR freshman_interest.act6 = "cq" OR
		freshman_interest.act7 = "cq" OR freshman_interest.act8 = "cq" OR
		freshman_interest.act9 = "cq" OR freshman_interest.act10 = "cq")');
	$t = 0;
	if ($cqcount != 0) {
		do {
			$cqhello[$t] = $cqid[$t]['email'];
			$t++;
		} while ($t < $cqcount);
	}
	if ($cqcount != 0) {
		$cqyello = implode(', ', $cqhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Golf', 'Here are the e-mails of the students interested in Golf:<br>'.$cqyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cq'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cq'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cq'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cq'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cq'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cq'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cq'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cq'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cq'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cq'));
	} else {
	}
	$crcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cr" OR act2="cr" OR
		act3="cr" OR act4="cr" OR act5="cr" OR act6="cr" OR act7="cr" OR 
		act8="cr" OR act9="cr" OR act10="cr")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cr" OR act2="cr" OR
		act3="cr" OR act4="cr" OR act5="cr" OR act6="cr" OR act7="cr" OR 
		act8="cr" OR act9="cr" OR act10="cr")
		THEN 1 ELSE 0 END)'];
	$crid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cr" OR freshman_interest.act2 = "cr" OR
		freshman_interest.act3 = "cr" OR freshman_interest.act4 = "cr" OR
		freshman_interest.act5 = "cr" OR freshman_interest.act6 = "cr" OR
		freshman_interest.act7 = "cr" OR freshman_interest.act8 = "cr" OR
		freshman_interest.act9 = "cr" OR freshman_interest.act10 = "cr")');
	$t = 0;
	if ($crcount != 0) {
		do {
			$crhello[$t] = $crid[$t]['email'];
			$t++;
		} while ($t < $crcount);
	}
	if ($crcount != 0) {
		$cryello = implode(', ', $crhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Ice Hockey', 'Here are the e-mails of the students interested in Ice Hockey:<br>'.$cryello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cr'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cr'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cr'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cr'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cr'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cr'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cr'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cr'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cr'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cr'));
	} else {
	}
	$cscount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cs" OR act2="cs" OR
		act3="cs" OR act4="cs" OR act5="cs" OR act6="cs" OR act7="cs" OR 
		act8="cs" OR act9="cs" OR act10="cs")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cs" OR act2="cs" OR
		act3="cs" OR act4="cs" OR act5="cs" OR act6="cs" OR act7="cs" OR 
		act8="cs" OR act9="cs" OR act10="cs")
		THEN 1 ELSE 0 END)'];
	$csid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cs" OR freshman_interest.act2 = "cs" OR
		freshman_interest.act3 = "cs" OR freshman_interest.act4 = "cs" OR
		freshman_interest.act5 = "cs" OR freshman_interest.act6 = "cs" OR
		freshman_interest.act7 = "cs" OR freshman_interest.act8 = "cs" OR
		freshman_interest.act9 = "cs" OR freshman_interest.act10 = "cs")');
	$t = 0;
	if ($cscount != 0) {
		do {
			$cshello[$t] = $csid[$t]['email'];
			$t++;
		} while ($t < $cscount);
	}
	if ($cscount != 0) {
		$csyello = implode(', ', $cshello);
		Mail::sendMail('Peer-to-Peer E-mail List for Indoor Track', 'Here are the e-mails of the students interested in Indoor Track:<br>'.$csyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cs'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cs'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cs'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cs'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cs'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cs'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cs'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cs'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cs'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cs'));
	} else {
	}
	$ctcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ct" OR act2="ct" OR
		act3="ct" OR act4="ct" OR act5="ct" OR act6="ct" OR act7="ct" OR 
		act8="ct" OR act9="ct" OR act10="ct")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ct" OR act2="ct" OR
		act3="ct" OR act4="ct" OR act5="ct" OR act6="ct" OR act7="ct" OR 
		act8="ct" OR act9="ct" OR act10="ct")
		THEN 1 ELSE 0 END)'];
	$ctid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ct" OR freshman_interest.act2 = "ct" OR
		freshman_interest.act3 = "ct" OR freshman_interest.act4 = "ct" OR
		freshman_interest.act5 = "ct" OR freshman_interest.act6 = "ct" OR
		freshman_interest.act7 = "ct" OR freshman_interest.act8 = "ct" OR
		freshman_interest.act9 = "ct" OR freshman_interest.act10 = "ct")');
	$t = 0;
	if ($ctcount != 0) {
		do {
			$cthello[$t] = $ctid[$t]['email'];
			$t++;
		} while ($t < $ctcount);
	}
	if ($ctcount != 0) {
		$ctyello = implode(', ', $cthello);
		Mail::sendMail('Peer-to-Peer E-mail List for Outdoor Track', 'Here are the e-mails of the students interested in Outdoor Track:<br>'.$ctyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ct'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ct'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ct'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ct'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ct'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ct'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ct'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ct'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ct'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ct'));
	} else {
	}
	$cucount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cu" OR act2="cu" OR
		act3="cu" OR act4="cu" OR act5="cu" OR act6="cu" OR act7="cu" OR 
		act8="cu" OR act9="cu" OR act10="cu")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cu" OR act2="cu" OR
		act3="cu" OR act4="cu" OR act5="cu" OR act6="cu" OR act7="cu" OR 
		act8="cu" OR act9="cu" OR act10="cu")
		THEN 1 ELSE 0 END)'];
	$cuid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cu" OR freshman_interest.act2 = "cu" OR
		freshman_interest.act3 = "cu" OR freshman_interest.act4 = "cu" OR
		freshman_interest.act5 = "cu" OR freshman_interest.act6 = "cu" OR
		freshman_interest.act7 = "cu" OR freshman_interest.act8 = "cu" OR
		freshman_interest.act9 = "cu" OR freshman_interest.act10 = "cu")');
	$t = 0;
	if ($cucount != 0) {
		do {
			$cuhello[$t] = $cuid[$t]['email'];
			$t++;
		} while ($t < $cucount);
	}
	if ($cucount != 0) {
		$cuyello = implode(', ', $cuhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Softball', 'Here are the e-mails of the students interested in Softball:<br>'.$cuyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cu'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cu'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cu'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cu'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cu'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cu'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cu'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cu'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cu'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cu'));
	} else {
	}
	$cvcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cv" OR act2="cv" OR
		act3="cv" OR act4="cv" OR act5="cv" OR act6="cv" OR act7="cv" OR 
		act8="cv" OR act9="cv" OR act10="cv")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cv" OR act2="cv" OR
		act3="cv" OR act4="cv" OR act5="cv" OR act6="cv" OR act7="cv" OR 
		act8="cv" OR act9="cv" OR act10="cv")
		THEN 1 ELSE 0 END)'];
	$cvid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cv" OR freshman_interest.act2 = "cv" OR
		freshman_interest.act3 = "cv" OR freshman_interest.act4 = "cv" OR
		freshman_interest.act5 = "cv" OR freshman_interest.act6 = "cv" OR
		freshman_interest.act7 = "cv" OR freshman_interest.act8 = "cv" OR
		freshman_interest.act9 = "cv" OR freshman_interest.act10 = "cv")');
	$t = 0;
	if ($cvcount != 0) {
		do {
			$cvhello[$t] = $cvid[$t]['email'];
			$t++;
		} while ($t < $cvcount);
	}
	if ($cvcount != 0) {
		$cvyello = implode(', ', $cvhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Swim Club', 'Here are the e-mails of the students interested in Swim Club:<br>'.$cvyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cv'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cv'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cv'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cv'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cv'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cv'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cv'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cv'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cv'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cv'));
	} else {
	}
	$cwcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cw" OR act2="cw" OR
		act3="cw" OR act4="cw" OR act5="cw" OR act6="cw" OR act7="cw" OR 
		act8="cw" OR act9="cw" OR act10="cw")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cw" OR act2="cw" OR
		act3="cw" OR act4="cw" OR act5="cw" OR act6="cw" OR act7="cw" OR 
		act8="cw" OR act9="cw" OR act10="cw")
		THEN 1 ELSE 0 END)'];
	$cwid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cw" OR freshman_interest.act2 = "cw" OR
		freshman_interest.act3 = "cw" OR freshman_interest.act4 = "cw" OR
		freshman_interest.act5 = "cw" OR freshman_interest.act6 = "cw" OR
		freshman_interest.act7 = "cw" OR freshman_interest.act8 = "cw" OR
		freshman_interest.act9 = "cw" OR freshman_interest.act10 = "cw")');
	$t = 0;
	if ($cwcount != 0) {
		do {
			$cwhello[$t] = $cwid[$t]['email'];
			$t++;
		} while ($t < $cwcount);
	}
	if ($cwcount != 0) {
		$cwyello = implode(', ', $cwhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Table Tennis Club', 'Here are the e-mails of the students interested in Table Tennis Club:<br>'.$cwyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cw'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cw'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cw'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cw'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cw'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cw'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cw'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cw'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cw'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cw'));
	} else {
	}
	$cxcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cx" OR act2="cx" OR
		act3="cx" OR act4="cx" OR act5="cx" OR act6="cx" OR act7="cx" OR 
		act8="cx" OR act9="cx" OR act10="cx")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cx" OR act2="cx" OR
		act3="cx" OR act4="cx" OR act5="cx" OR act6="cx" OR act7="cx" OR 
		act8="cx" OR act9="cx" OR act10="cx")
		THEN 1 ELSE 0 END)'];
	$cxid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cx" OR freshman_interest.act2 = "cx" OR
		freshman_interest.act3 = "cx" OR freshman_interest.act4 = "cx" OR
		freshman_interest.act5 = "cx" OR freshman_interest.act6 = "cx" OR
		freshman_interest.act7 = "cx" OR freshman_interest.act8 = "cx" OR
		freshman_interest.act9 = "cx" OR freshman_interest.act10 = "cx")');
	$t = 0;
	if ($cxcount != 0) {
		do {
			$cxhello[$t] = $cxid[$t]['email'];
			$t++;
		} while ($t < $cxcount);
	}
	if ($cxcount != 0) {
		$cxyello = implode(', ', $cxhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Tennis', 'Here are the e-mails of the students interested in Tennis:<br>'.$cxyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cx'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cx'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cx'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cx'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cx'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cx'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cx'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cx'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cx'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cx'));
	} else {
	}
	$cycount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cy" OR act2="cy" OR
		act3="cy" OR act4="cy" OR act5="cy" OR act6="cy" OR act7="cy" OR 
		act8="cy" OR act9="cy" OR act10="cy")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cy" OR act2="cy" OR
		act3="cy" OR act4="cy" OR act5="cy" OR act6="cy" OR act7="cy" OR 
		act8="cy" OR act9="cy" OR act10="cy")
		THEN 1 ELSE 0 END)'];
	$cyid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cy" OR freshman_interest.act2 = "cy" OR
		freshman_interest.act3 = "cy" OR freshman_interest.act4 = "cy" OR
		freshman_interest.act5 = "cy" OR freshman_interest.act6 = "cy" OR
		freshman_interest.act7 = "cy" OR freshman_interest.act8 = "cy" OR
		freshman_interest.act9 = "cy" OR freshman_interest.act10 = "cy")');
	$t = 0;
	if ($cycount != 0) {
		do {
			$cyhello[$t] = $cyid[$t]['email'];
			$t++;
		} while ($t < $cycount);
	}
	if ($cycount != 0) {
		$cyyello = implode(', ', $cyhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Volleyball', 'Here are the e-mails of the students interested in Volleyball:<br>'.$cyyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cy'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cy'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cy'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cy'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cy'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cy'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cy'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cy'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cy'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cy'));
	} else {
	}
	$czcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cz" OR act2="cz" OR
		act3="cz" OR act4="cz" OR act5="cz" OR act6="cz" OR act7="cz" OR 
		act8="cz" OR act9="cz" OR act10="cz")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cz" OR act2="cz" OR
		act3="cz" OR act4="cz" OR act5="cz" OR act6="cz" OR act7="cz" OR 
		act8="cz" OR act9="cz" OR act10="cz")
		THEN 1 ELSE 0 END)'];
	$czid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cz" OR freshman_interest.act2 = "cz" OR
		freshman_interest.act3 = "cz" OR freshman_interest.act4 = "cz" OR
		freshman_interest.act5 = "cz" OR freshman_interest.act6 = "cz" OR
		freshman_interest.act7 = "cz" OR freshman_interest.act8 = "cz" OR
		freshman_interest.act9 = "cz" OR freshman_interest.act10 = "cz")');
	$t = 0;
	if ($czcount != 0) {
		do {
			$czhello[$t] = $czid[$t]['email'];
			$t++;
		} while ($t < $czcount);
	}
	if ($czcount != 0) {
		$czyello = implode(', ', $czhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Wrestling', 'Here are the e-mails of the students interested in Wrestling:<br>'.$czyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cz'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cz'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cz'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cz'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cz'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cz'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cz'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cz'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cz'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cz'));
	} else {
	}
	$dacount = database::query('SELECT count(*), SUM(CASE WHEN (act1="da" OR act2="da" OR
		act3="da" OR act4="da" OR act5="da" OR act6="da" OR act7="da" OR 
		act8="da" OR act9="da" OR act10="da")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="da" OR act2="da" OR
		act3="da" OR act4="da" OR act5="da" OR act6="da" OR act7="da" OR 
		act8="da" OR act9="da" OR act10="da")
		THEN 1 ELSE 0 END)'];
	$daid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "da" OR freshman_interest.act2 = "da" OR
		freshman_interest.act3 = "da" OR freshman_interest.act4 = "da" OR
		freshman_interest.act5 = "da" OR freshman_interest.act6 = "da" OR
		freshman_interest.act7 = "da" OR freshman_interest.act8 = "da" OR
		freshman_interest.act9 = "da" OR freshman_interest.act10 = "da")');
	$t = 0;
	if ($dacount != 0) {
		do {
			$dahello[$t] = $daid[$t]['email'];
			$t++;
		} while ($t < $dacount);
	}
	if ($dacount != 0) {
		$dayello = implode(', ', $dahello);
		Mail::sendMail('Peer-to-Peer E-mail List for Class Board', 'Here are the e-mails of the students interested in Class Board:<br>'.$dayello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'da'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'da'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'da'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'da'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'da'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'da'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'da'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'da'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'da'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'da'));
	} else {
	}
	$dbcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="db" OR act2="db" OR
		act3="db" OR act4="db" OR act5="db" OR act6="db" OR act7="db" OR 
		act8="db" OR act9="db" OR act10="db")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="db" OR act2="db" OR
		act3="db" OR act4="db" OR act5="db" OR act6="db" OR act7="db" OR 
		act8="db" OR act9="db" OR act10="db")
		THEN 1 ELSE 0 END)'];
	$dbid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "db" OR freshman_interest.act2 = "db" OR
		freshman_interest.act3 = "db" OR freshman_interest.act4 = "db" OR
		freshman_interest.act5 = "db" OR freshman_interest.act6 = "db" OR
		freshman_interest.act7 = "db" OR freshman_interest.act8 = "db" OR
		freshman_interest.act9 = "db" OR freshman_interest.act10 = "db")');
	$t = 0;
	if ($dbcount != 0) {
		do {
			$dbhello[$t] = $dbid[$t]['email'];
			$t++;
		} while ($t < $dbcount);
	}
	if ($dbcount != 0) {
		$dbyello = implode(', ', $dbhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Executive Board', 'Here are the e-mails of the students interested in Executive Board:<br>'.$dbyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'db'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'db'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'db'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'db'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'db'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'db'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'db'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'db'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'db'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'db'));
	} else {
	}
}

#CHANGE EMAILS from joshchoi to real emails
if(isset($_POST['a'])) {
	$acount = database::query('SELECT count(*), SUM(CASE WHEN (act1="a" OR act2="a" OR
		act3="a" OR act4="a" OR act5="a" OR act6="a" OR act7="a" OR 
		act8="a" OR act9="a" OR act10="a")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="a" OR act2="a" OR
		act3="a" OR act4="a" OR act5="a" OR act6="a" OR act7="a" OR 
		act8="a" OR act9="a" OR act10="a")
		THEN 1 ELSE 0 END)'];
	$aid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "a" OR freshman_interest.act2 = "a" OR
		freshman_interest.act3 = "a" OR freshman_interest.act4 = "a" OR
		freshman_interest.act5 = "a" OR freshman_interest.act6 = "a" OR
		freshman_interest.act7 = "a" OR freshman_interest.act8 = "a" OR
		freshman_interest.act9 = "a" OR freshman_interest.act10 = "a")');
	$t = 0;
	if ($acount != 0) {
		do {
			$ahello[$t] = $aid[$t]['email'];
			$t++;
		} while ($t < $acount);
	}
	if ($acount != 0) {
		$ayello = implode(', ', $ahello);
		Mail::sendMail('Peer-to-Peer E-mail List for Film Club', 'Here are the e-mails of the students interested in Film Club:<br>'.$ayello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'a'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'a'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'a'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'a'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'a'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'a'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'a'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'a'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'a'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'a'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['b'])) {
	$bcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="b" OR act2="b" OR
		act3="b" OR act4="b" OR act5="b" OR act6="b" OR act7="b" OR 
		act8="b" OR act9="b" OR act10="b")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="b" OR act2="b" OR
		act3="b" OR act4="b" OR act5="b" OR act6="b" OR act7="b" OR 
		act8="b" OR act9="b" OR act10="b")
		THEN 1 ELSE 0 END)'];
	$bid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "b" OR freshman_interest.act2 = "b" OR
		freshman_interest.act3 = "b" OR freshman_interest.act4 = "b" OR
		freshman_interest.act5 = "b" OR freshman_interest.act6 = "b" OR
		freshman_interest.act7 = "b" OR freshman_interest.act8 = "b" OR
		freshman_interest.act9 = "b" OR freshman_interest.act10 = "b")');
	$t = 0;
	if ($bcount != 0) {
		do {
			$bhello[$t] = $bid[$t]['email'];
			$t++;
		} while ($t < $bcount);
	}
	if ($bcount != 0) {
		$byello = implode(', ', $bhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Improvisation Club', 'Here are the e-mails of the students interested in Improvisation Club:<br>'.$byello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'b'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'b'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'b'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'b'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'b'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'b'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'b'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'b'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'b'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'b'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['c'])) {
	$ccount = database::query('SELECT count(*), SUM(CASE WHEN (act1="c" OR act2="c" OR
		act3="c" OR act4="c" OR act5="c" OR act6="c" OR act7="c" OR 
		act8="c" OR act9="c" OR act10="c")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="c" OR act2="c" OR
		act3="c" OR act4="c" OR act5="c" OR act6="c" OR act7="c" OR 
		act8="c" OR act9="c" OR act10="c")
		THEN 1 ELSE 0 END)'];
	$cid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "c" OR freshman_interest.act2 = "c" OR
		freshman_interest.act3 = "c" OR freshman_interest.act4 = "c" OR
		freshman_interest.act5 = "c" OR freshman_interest.act6 = "c" OR
		freshman_interest.act7 = "c" OR freshman_interest.act8 = "c" OR
		freshman_interest.act9 = "c" OR freshman_interest.act10 = "c")');
	$t = 0;
	if ($ccount != 0) {
		do {
			$chello[$t] = $cid[$t]['email'];
			$t++;
		} while ($t < $ccount);
	}
	if ($ccount != 0) {
		$cyello = implode(', ', $chello);
		Mail::sendMail('Peer-to-Peer E-mail List for National Art Honor Society (NAHS)', 'Here are the e-mails of the students interested in National Art Honor Society (NAHS):<br>'.$cyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'c'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'c'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'c'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'c'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'c'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'c'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'c'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'c'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'c'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'c'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['d'])) {
	$dcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="d" OR act2="d" OR
		act3="d" OR act4="d" OR act5="d" OR act6="d" OR act7="d" OR 
		act8="d" OR act9="d" OR act10="d")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="d" OR act2="d" OR
		act3="d" OR act4="d" OR act5="d" OR act6="d" OR act7="d" OR 
		act8="d" OR act9="d" OR act10="d")
		THEN 1 ELSE 0 END)'];
	$did = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "d" OR freshman_interest.act2 = "d" OR
		freshman_interest.act3 = "d" OR freshman_interest.act4 = "d" OR
		freshman_interest.act5 = "d" OR freshman_interest.act6 = "d" OR
		freshman_interest.act7 = "d" OR freshman_interest.act8 = "d" OR
		freshman_interest.act9 = "d" OR freshman_interest.act10 = "d")');
	$t = 0;
	if ($dcount != 0) {
		do {
			$dhello[$t] = $did[$t]['email'];
			$t++;
		} while ($t < $dcount);
	}
	if ($dcount != 0) {
		$dyello = implode(', ', $dhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Photography Club', 'Here are the e-mails of the students interested in Photography Club:<br>'.$dyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'d'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'d'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'d'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'d'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'d'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'d'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'d'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'d'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'d'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'d'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['e'])) {
	$ecount = database::query('SELECT count(*), SUM(CASE WHEN (act1="e" OR act2="e" OR
		act3="e" OR act4="e" OR act5="e" OR act6="e" OR act7="e" OR 
		act8="e" OR act9="e" OR act10="e")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="e" OR act2="e" OR
		act3="e" OR act4="e" OR act5="e" OR act6="e" OR act7="e" OR 
		act8="e" OR act9="e" OR act10="e")
		THEN 1 ELSE 0 END)'];
	$eid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "e" OR freshman_interest.act2 = "e" OR
		freshman_interest.act3 = "e" OR freshman_interest.act4 = "e" OR
		freshman_interest.act5 = "e" OR freshman_interest.act6 = "e" OR
		freshman_interest.act7 = "e" OR freshman_interest.act8 = "e" OR
		freshman_interest.act9 = "e" OR freshman_interest.act10 = "e")');
	$t = 0;
	if ($ecount != 0) {
		do {
			$ehello[$t] = $eid[$t]['email'];
			$t++;
		} while ($t < $ecount);
	}
	if ($ecount != 0) {
		$eyello = implode(', ', $ehello);
		Mail::sendMail('Peer-to-Peer E-mail List for Theatre Arts Productions', 'Here are the e-mails of the students interested in Theatre Arts Productions:<br>'.$eyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'e'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'e'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'e'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'e'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'e'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'e'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'e'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'e'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'e'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'e'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['f'])) {
	$fcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="f" OR act2="f" OR
		act3="f" OR act4="f" OR act5="f" OR act6="f" OR act7="f" OR 
		act8="f" OR act9="f" OR act10="f")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="f" OR act2="f" OR
		act3="f" OR act4="f" OR act5="f" OR act6="f" OR act7="f" OR 
		act8="f" OR act9="f" OR act10="f")
		THEN 1 ELSE 0 END)'];
	$fid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "f" OR freshman_interest.act2 = "f" OR
		freshman_interest.act3 = "f" OR freshman_interest.act4 = "f" OR
		freshman_interest.act5 = "f" OR freshman_interest.act6 = "f" OR
		freshman_interest.act7 = "f" OR freshman_interest.act8 = "f" OR
		freshman_interest.act9 = "f" OR freshman_interest.act10 = "f")');
	$t = 0;
	if ($fcount != 0) {
		do {
			$fhello[$t] = $fid[$t]['email'];
			$t++;
		} while ($t < $fcount);
	}
	if ($fcount != 0) {
		$fyello = implode(', ', $fhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Alpha Achievers', 'Here are the e-mails of the students interested in Alpha Achievers:<br>'.$fyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'f'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'f'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'f'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'f'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'f'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'f'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'f'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'f'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'f'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'f'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['g'])) {
	$gcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="g" OR act2="g" OR
		act3="g" OR act4="g" OR act5="g" OR act6="g" OR act7="g" OR 
		act8="g" OR act9="g" OR act10="g")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="g" OR act2="g" OR
		act3="g" OR act4="g" OR act5="g" OR act6="g" OR act7="g" OR 
		act8="g" OR act9="g" OR act10="g")
		THEN 1 ELSE 0 END)'];
	$gid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "g" OR freshman_interest.act2 = "g" OR
		freshman_interest.act3 = "g" OR freshman_interest.act4 = "g" OR
		freshman_interest.act5 = "g" OR freshman_interest.act6 = "g" OR
		freshman_interest.act7 = "g" OR freshman_interest.act8 = "g" OR
		freshman_interest.act9 = "g" OR freshman_interest.act10 = "g")');
	$t = 0;
	if ($gcount != 0) {
		do {
			$ghello[$t] = $gid[$t]['email'];
			$t++;
		} while ($t < $gcount);
	}
	if ($gcount != 0) {
		$gyello = implode(', ', $ghello);
		Mail::sendMail('Peer-to-Peer E-mail List for American Red Cross Club', 'Here are the e-mails of the students interested in American Red Cross Club:<br>'.$gyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'g'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'g'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'g'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'g'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'g'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'g'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'g'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'g'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'g'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'g'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['h'])) {
	$hcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="h" OR act2="h" OR
		act3="h" OR act4="h" OR act5="h" OR act6="h" OR act7="h" OR 
		act8="h" OR act9="h" OR act10="h")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="h" OR act2="h" OR
		act3="h" OR act4="h" OR act5="h" OR act6="h" OR act7="h" OR 
		act8="h" OR act9="h" OR act10="h")
		THEN 1 ELSE 0 END)'];
	$hid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "h" OR freshman_interest.act2 = "h" OR
		freshman_interest.act3 = "h" OR freshman_interest.act4 = "h" OR
		freshman_interest.act5 = "h" OR freshman_interest.act6 = "h" OR
		freshman_interest.act7 = "h" OR freshman_interest.act8 = "h" OR
		freshman_interest.act9 = "h" OR freshman_interest.act10 = "h")');
	$t = 0;
	if ($hcount != 0) {
		do {
			$hhello[$t] = $hid[$t]['email'];
			$t++;
		} while ($t < $hcount);
	}
	if ($hcount != 0) {
		$hyello = implode(', ', $hhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Anime Club', 'Here are the e-mails of the students interested in Anime Club:<br>'.$hyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'h'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'h'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'h'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'h'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'h'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'h'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'h'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'h'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'h'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'h'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['i'])) {
	$icount = database::query('SELECT count(*), SUM(CASE WHEN (act1="i" OR act2="i" OR
		act3="i" OR act4="i" OR act5="i" OR act6="i" OR act7="i" OR 
		act8="i" OR act9="i" OR act10="i")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="i" OR act2="i" OR
		act3="i" OR act4="i" OR act5="i" OR act6="i" OR act7="i" OR 
		act8="i" OR act9="i" OR act10="i")
		THEN 1 ELSE 0 END)'];
	$iid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "i" OR freshman_interest.act2 = "i" OR
		freshman_interest.act3 = "i" OR freshman_interest.act4 = "i" OR
		freshman_interest.act5 = "i" OR freshman_interest.act6 = "i" OR
		freshman_interest.act7 = "i" OR freshman_interest.act8 = "i" OR
		freshman_interest.act9 = "i" OR freshman_interest.act10 = "i")');
	$t = 0;
	if ($icount != 0) {
		do {
			$ihello[$t] = $iid[$t]['email'];
			$t++;
		} while ($t < $icount);
	}
	if ($icount != 0) {
		$iyello = implode(', ', $ihello);
		Mail::sendMail('Peer-to-Peer E-mail List for Asian Student Union', 'Here are the e-mails of the students interested in Asian Student Union:<br>'.$iyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'i'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'i'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'i'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'i'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'i'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'i'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'i'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'i'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'i'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'i'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['j'])) {
	$jcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="j" OR act2="j" OR
		act3="j" OR act4="j" OR act5="j" OR act6="j" OR act7="j" OR 
		act8="j" OR act9="j" OR act10="j")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="j" OR act2="j" OR
		act3="j" OR act4="j" OR act5="j" OR act6="j" OR act7="j" OR 
		act8="j" OR act9="j" OR act10="j")
		THEN 1 ELSE 0 END)'];
	$jid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "j" OR freshman_interest.act2 = "j" OR
		freshman_interest.act3 = "j" OR freshman_interest.act4 = "j" OR
		freshman_interest.act5 = "j" OR freshman_interest.act6 = "j" OR
		freshman_interest.act7 = "j" OR freshman_interest.act8 = "j" OR
		freshman_interest.act9 = "j" OR freshman_interest.act10 = "j")');
	$t = 0;
	if ($jcount != 0) {
		do {
			$jhello[$t] = $jid[$t]['email'];
			$t++;
		} while ($t < $jcount);
	}
	if ($jcount != 0) {
		$jyello = implode(', ', $jhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Best Buddies', 'Here are the e-mails of the students interested in Best Buddies:<br>'.$jyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'j'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'j'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'j'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'j'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'j'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'j'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'j'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'j'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'j'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'j'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['k'])) {
	$kcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="k" OR act2="k" OR
		act3="k" OR act4="k" OR act5="k" OR act6="k" OR act7="k" OR 
		act8="k" OR act9="k" OR act10="k")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="k" OR act2="k" OR
		act3="k" OR act4="k" OR act5="k" OR act6="k" OR act7="k" OR 
		act8="k" OR act9="k" OR act10="k")
		THEN 1 ELSE 0 END)'];
	$kid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "k" OR freshman_interest.act2 = "k" OR
		freshman_interest.act3 = "k" OR freshman_interest.act4 = "k" OR
		freshman_interest.act5 = "k" OR freshman_interest.act6 = "k" OR
		freshman_interest.act7 = "k" OR freshman_interest.act8 = "k" OR
		freshman_interest.act9 = "k" OR freshman_interest.act10 = "k")');
	$t = 0;
	if ($kcount != 0) {
		do {
			$khello[$t] = $kid[$t]['email'];
			$t++;
		} while ($t < $kcount);
	}
	if ($kcount != 0) {
		$kyello = implode(', ', $khello);
		Mail::sendMail('Peer-to-Peer E-mail List for Black/African Leadership Union (BALU)', 'Here are the e-mails of the students interested in Black/African Leadership Union (BALU):<br>'.$kyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'k'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'k'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'k'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'k'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'k'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'k'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'k'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'k'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'k'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'k'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['l'])) {
	$lcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="l" OR act2="l" OR
		act3="l" OR act4="l" OR act5="l" OR act6="l" OR act7="l" OR 
		act8="l" OR act9="l" OR act10="l")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="l" OR act2="l" OR
		act3="l" OR act4="l" OR act5="l" OR act6="l" OR act7="l" OR 
		act8="l" OR act9="l" OR act10="l")
		THEN 1 ELSE 0 END)'];
	$lid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "l" OR freshman_interest.act2 = "l" OR
		freshman_interest.act3 = "l" OR freshman_interest.act4 = "l" OR
		freshman_interest.act5 = "l" OR freshman_interest.act6 = "l" OR
		freshman_interest.act7 = "l" OR freshman_interest.act8 = "l" OR
		freshman_interest.act9 = "l" OR freshman_interest.act10 = "l")');
	$t = 0;
	if ($lcount != 0) {
		do {
			$lhello[$t] = $lid[$t]['email'];
			$t++;
		} while ($t < $lcount);
	}
	if ($lcount != 0) {
		$lyello = implode(', ', $lhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Chess Club', 'Here are the e-mails of the students interested in Chess Club:<br>'.$lyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'l'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'l'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'l'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'l'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'l'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'l'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'l'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'l'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'l'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'l'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['m'])) {
	$mcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="m" OR act2="m" OR
		act3="m" OR act4="m" OR act5="m" OR act6="m" OR act7="m" OR 
		act8="m" OR act9="m" OR act10="m")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="m" OR act2="m" OR
		act3="m" OR act4="m" OR act5="m" OR act6="m" OR act7="m" OR 
		act8="m" OR act9="m" OR act10="m")
		THEN 1 ELSE 0 END)'];
	$mid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "m" OR freshman_interest.act2 = "m" OR
		freshman_interest.act3 = "m" OR freshman_interest.act4 = "m" OR
		freshman_interest.act5 = "m" OR freshman_interest.act6 = "m" OR
		freshman_interest.act7 = "m" OR freshman_interest.act8 = "m" OR
		freshman_interest.act9 = "m" OR freshman_interest.act10 = "m")');
	$t = 0;
	if ($mcount != 0) {
		do {
			$mhello[$t] = $mid[$t]['email'];
			$t++;
		} while ($t < $mcount);
	}
	if ($mcount != 0) {
		$myello = implode(', ', $mhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Culture Club', 'Here are the e-mails of the students interested in Culture Club:<br>'.$myello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'m'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'m'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'m'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'m'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'m'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'m'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'m'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'m'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'m'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'m'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['n'])) {
	$ncount = database::query('SELECT count(*), SUM(CASE WHEN (act1="n" OR act2="n" OR
		act3="n" OR act4="n" OR act5="n" OR act6="n" OR act7="n" OR 
		act8="n" OR act9="n" OR act10="n")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="n" OR act2="n" OR
		act3="n" OR act4="n" OR act5="n" OR act6="n" OR act7="n" OR 
		act8="n" OR act9="n" OR act10="n")
		THEN 1 ELSE 0 END)'];
	$nid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "n" OR freshman_interest.act2 = "n" OR
		freshman_interest.act3 = "n" OR freshman_interest.act4 = "n" OR
		freshman_interest.act5 = "n" OR freshman_interest.act6 = "n" OR
		freshman_interest.act7 = "n" OR freshman_interest.act8 = "n" OR
		freshman_interest.act9 = "n" OR freshman_interest.act10 = "n")');
	$t = 0;
	if ($ncount != 0) {
		do {
			$nhello[$t] = $nid[$t]['email'];
			$t++;
		} while ($t < $ncount);
	}
	if ($ncount != 0) {
		$nyello = implode(', ', $nhello);
		Mail::sendMail('Peer-to-Peer E-mail List for DECA', 'Here are the e-mails of the students interested in DECA:<br>'.$nyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'n'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'n'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'n'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'n'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'n'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'n'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'n'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'n'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'n'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'n'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['o'])) {
	$ocount = database::query('SELECT count(*), SUM(CASE WHEN (act1="o" OR act2="o" OR
		act3="o" OR act4="o" OR act5="o" OR act6="o" OR act7="o" OR 
		act8="o" OR act9="o" OR act10="o")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="o" OR act2="o" OR
		act3="o" OR act4="o" OR act5="o" OR act6="o" OR act7="o" OR 
		act8="o" OR act9="o" OR act10="o")
		THEN 1 ELSE 0 END)'];
	$oid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "o" OR freshman_interest.act2 = "o" OR
		freshman_interest.act3 = "o" OR freshman_interest.act4 = "o" OR
		freshman_interest.act5 = "o" OR freshman_interest.act6 = "o" OR
		freshman_interest.act7 = "o" OR freshman_interest.act8 = "o" OR
		freshman_interest.act9 = "o" OR freshman_interest.act10 = "o")');
	$t = 0;
	if ($ocount != 0) {
		do {
			$ohello[$t] = $oid[$t]['email'];
			$t++;
		} while ($t < $ocount);
	}
	if ($ocount != 0) {
		$oyello = implode(', ', $ohello);
		Mail::sendMail('Peer-to-Peer E-mail List for Delta Scholars', 'Here are the e-mails of the students interested in Delta Scholars:<br>'.$oyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'o'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'o'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'o'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'o'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'o'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'o'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'o'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'o'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'o'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'o'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['p'])) {
	$pcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="p" OR act2="p" OR
		act3="p" OR act4="p" OR act5="p" OR act6="p" OR act7="p" OR 
		act8="p" OR act9="p" OR act10="p")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="p" OR act2="p" OR
		act3="p" OR act4="p" OR act5="p" OR act6="p" OR act7="p" OR 
		act8="p" OR act9="p" OR act10="p")
		THEN 1 ELSE 0 END)'];
	$pid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "p" OR freshman_interest.act2 = "p" OR
		freshman_interest.act3 = "p" OR freshman_interest.act4 = "p" OR
		freshman_interest.act5 = "p" OR freshman_interest.act6 = "p" OR
		freshman_interest.act7 = "p" OR freshman_interest.act8 = "p" OR
		freshman_interest.act9 = "p" OR freshman_interest.act10 = "p")');
	$t = 0;
	if ($pcount != 0) {
		do {
			$phello[$t] = $pid[$t]['email'];
			$t++;
		} while ($t < $pcount);
	}
	if ($pcount != 0) {
		$pyello = implode(', ', $phello);
		Mail::sendMail('Peer-to-Peer E-mail List for Educators Rising', 'Here are the e-mails of the students interested in Educators Rising:<br>'.$pyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'p'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'p'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'p'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'p'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'p'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'p'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'p'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'p'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'p'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'p'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['q'])) {
	$qcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="q" OR act2="q" OR
		act3="q" OR act4="q" OR act5="q" OR act6="q" OR act7="q" OR 
		act8="q" OR act9="q" OR act10="q")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="q" OR act2="q" OR
		act3="q" OR act4="q" OR act5="q" OR act6="q" OR act7="q" OR 
		act8="q" OR act9="q" OR act10="q")
		THEN 1 ELSE 0 END)'];
	$qid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "q" OR freshman_interest.act2 = "q" OR
		freshman_interest.act3 = "q" OR freshman_interest.act4 = "q" OR
		freshman_interest.act5 = "q" OR freshman_interest.act6 = "q" OR
		freshman_interest.act7 = "q" OR freshman_interest.act8 = "q" OR
		freshman_interest.act9 = "q" OR freshman_interest.act10 = "q")');
	$t = 0;
	if ($qcount != 0) {
		do {
			$qhello[$t] = $qid[$t]['email'];
			$t++;
		} while ($t < $qcount);
	}
	if ($qcount != 0) {
		$qyello = implode(', ', $qhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Environmental Club (SAVE)', 'Here are the e-mails of the students interested in Environmental Club (SAVE):<br>'.$qyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'q'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'q'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'q'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'q'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'q'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'q'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'q'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'q'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'q'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'q'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['r'])) {
	$rcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="r" OR act2="r" OR
		act3="r" OR act4="r" OR act5="r" OR act6="r" OR act7="r" OR 
		act8="r" OR act9="r" OR act10="r")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="r" OR act2="r" OR
		act3="r" OR act4="r" OR act5="r" OR act6="r" OR act7="r" OR 
		act8="r" OR act9="r" OR act10="r")
		THEN 1 ELSE 0 END)'];
	$rid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "r" OR freshman_interest.act2 = "r" OR
		freshman_interest.act3 = "r" OR freshman_interest.act4 = "r" OR
		freshman_interest.act5 = "r" OR freshman_interest.act6 = "r" OR
		freshman_interest.act7 = "r" OR freshman_interest.act8 = "r" OR
		freshman_interest.act9 = "r" OR freshman_interest.act10 = "r")');
	$t = 0;
	if ($rcount != 0) {
		do {
			$rhello[$t] = $rid[$t]['email'];
			$t++;
		} while ($t < $rcount);
	}
	if ($rcount != 0) {
		$ryello = implode(', ', $rhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Fellowship of Christian Athletes (FCA)', 'Here are the e-mails of the students interested in Fellowship of Christian Athletes (FCA):<br>'.$ryello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'r'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'r'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'r'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'r'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'r'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'r'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'r'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'r'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'r'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'r'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['s'])) {
	$scount = database::query('SELECT count(*), SUM(CASE WHEN (act1="s" OR act2="s" OR
		act3="s" OR act4="s" OR act5="s" OR act6="s" OR act7="s" OR 
		act8="s" OR act9="s" OR act10="s")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="s" OR act2="s" OR
		act3="s" OR act4="s" OR act5="s" OR act6="s" OR act7="s" OR 
		act8="s" OR act9="s" OR act10="s")
		THEN 1 ELSE 0 END)'];
	$sid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "s" OR freshman_interest.act2 = "s" OR
		freshman_interest.act3 = "s" OR freshman_interest.act4 = "s" OR
		freshman_interest.act5 = "s" OR freshman_interest.act6 = "s" OR
		freshman_interest.act7 = "s" OR freshman_interest.act8 = "s" OR
		freshman_interest.act9 = "s" OR freshman_interest.act10 = "s")');
	$t = 0;
	if ($scount != 0) {
		do {
			$shello[$t] = $sid[$t]['email'];
			$t++;
		} while ($t < $scount);
	}
	if ($scount != 0) {
		$syello = implode(', ', $shello);
		Mail::sendMail('Peer-to-Peer E-mail List for Film Club', 'Here are the e-mails of the students interested in Film Club:<br>'.$syello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'s'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'s'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'s'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'s'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'s'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'s'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'s'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'s'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'s'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'s'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['t'])) {
	$tcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="t" OR act2="t" OR
		act3="t" OR act4="t" OR act5="t" OR act6="t" OR act7="t" OR 
		act8="t" OR act9="t" OR act10="t")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="t" OR act2="t" OR
		act3="t" OR act4="t" OR act5="t" OR act6="t" OR act7="t" OR 
		act8="t" OR act9="t" OR act10="t")
		THEN 1 ELSE 0 END)'];
	$tid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "t" OR freshman_interest.act2 = "t" OR
		freshman_interest.act3 = "t" OR freshman_interest.act4 = "t" OR
		freshman_interest.act5 = "t" OR freshman_interest.act6 = "t" OR
		freshman_interest.act7 = "t" OR freshman_interest.act8 = "t" OR
		freshman_interest.act9 = "t" OR freshman_interest.act10 = "t")');
	$t = 0;
	if ($tcount != 0) {
		do {
			$thello[$t] = $tid[$t]['email'];
			$t++;
		} while ($t < $tcount);
	}
	if ($tcount != 0) {
		$tyello = implode(', ', $thello);
		Mail::sendMail('Peer-to-Peer E-mail List for French Club', 'Here are the e-mails of the students interested in French Club:<br>'.$tyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'t'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'t'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'t'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'t'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'t'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'t'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'t'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'t'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'t'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'t'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['u'])) {
	$ucount = database::query('SELECT count(*), SUM(CASE WHEN (act1="u" OR act2="u" OR
		act3="u" OR act4="u" OR act5="u" OR act6="u" OR act7="u" OR 
		act8="u" OR act9="u" OR act10="u")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="u" OR act2="u" OR
		act3="u" OR act4="u" OR act5="u" OR act6="u" OR act7="u" OR 
		act8="u" OR act9="u" OR act10="u")
		THEN 1 ELSE 0 END)'];
	$uid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "u" OR freshman_interest.act2 = "u" OR
		freshman_interest.act3 = "u" OR freshman_interest.act4 = "u" OR
		freshman_interest.act5 = "u" OR freshman_interest.act6 = "u" OR
		freshman_interest.act7 = "u" OR freshman_interest.act8 = "u" OR
		freshman_interest.act9 = "u" OR freshman_interest.act10 = "u")');
	$t = 0;
	if ($ucount != 0) {
		do {
			$uhello[$t] = $uid[$t]['email'];
			$t++;
		} while ($t < $ucount);
	}
	if ($ucount != 0) {
		$uyello = implode(', ', $uhello);
		Mail::sendMail('Peer-to-Peer E-mail List for French National Honor Society', 'Here are the e-mails of the students interested in French National Honor Society:<br>'.$uyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'u'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'u'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'u'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'u'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'u'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'u'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'u'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'u'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'u'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'u'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['v'])) {
	$vcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="v" OR act2="v" OR
		act3="v" OR act4="v" OR act5="v" OR act6="v" OR act7="v" OR 
		act8="v" OR act9="v" OR act10="v")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="v" OR act2="v" OR
		act3="v" OR act4="v" OR act5="v" OR act6="v" OR act7="v" OR 
		act8="v" OR act9="v" OR act10="v")
		THEN 1 ELSE 0 END)'];
	$vid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "v" OR freshman_interest.act2 = "v" OR
		freshman_interest.act3 = "v" OR freshman_interest.act4 = "v" OR
		freshman_interest.act5 = "v" OR freshman_interest.act6 = "v" OR
		freshman_interest.act7 = "v" OR freshman_interest.act8 = "v" OR
		freshman_interest.act9 = "v" OR freshman_interest.act10 = "v")');
	$t = 0;
	if ($vcount != 0) {
		do {
			$vhello[$t] = $vid[$t]['email'];
			$t++;
		} while ($t < $vcount);
	}
	if ($vcount != 0) {
		$vyello = implode(', ', $vhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Gator Gaming Club', 'Here are the e-mails of the students interested in Gator Gaming Club:<br>'.$vyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'v'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'v'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'v'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'v'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'v'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'v'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'v'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'v'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'v'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'v'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['w'])) {
	$wcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="w" OR act2="w" OR
		act3="w" OR act4="w" OR act5="w" OR act6="w" OR act7="w" OR 
		act8="w" OR act9="w" OR act10="w")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="w" OR act2="w" OR
		act3="w" OR act4="w" OR act5="w" OR act6="w" OR act7="w" OR 
		act8="w" OR act9="w" OR act10="w")
		THEN 1 ELSE 0 END)'];
	$wid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "w" OR freshman_interest.act2 = "w" OR
		freshman_interest.act3 = "w" OR freshman_interest.act4 = "w" OR
		freshman_interest.act5 = "w" OR freshman_interest.act6 = "w" OR
		freshman_interest.act7 = "w" OR freshman_interest.act8 = "w" OR
		freshman_interest.act9 = "w" OR freshman_interest.act10 = "w")');
	$t = 0;
	if ($wcount != 0) {
		do {
			$whello[$t] = $wid[$t]['email'];
			$t++;
		} while ($t < $wcount);
	}
	if ($wcount != 0) {
		$wyello = implode(', ', $whello);
		Mail::sendMail('Peer-to-Peer E-mail List for Gator Guides', 'Here are the e-mails of the students interested in Gator Guides:<br>'.$wyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'w'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'w'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'w'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'w'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'w'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'w'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'w'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'w'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'w'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'w'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['x'])) {
	$xcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="x" OR act2="x" OR
		act3="x" OR act4="x" OR act5="x" OR act6="x" OR act7="x" OR 
		act8="x" OR act9="x" OR act10="x")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="x" OR act2="x" OR
		act3="x" OR act4="x" OR act5="x" OR act6="x" OR act7="x" OR 
		act8="x" OR act9="x" OR act10="x")
		THEN 1 ELSE 0 END)'];
	$xid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "x" OR freshman_interest.act2 = "x" OR
		freshman_interest.act3 = "x" OR freshman_interest.act4 = "x" OR
		freshman_interest.act5 = "x" OR freshman_interest.act6 = "x" OR
		freshman_interest.act7 = "x" OR freshman_interest.act8 = "x" OR
		freshman_interest.act9 = "x" OR freshman_interest.act10 = "x")');
	$t = 0;
	if ($xcount != 0) {
		do {
			$xhello[$t] = $xid[$t]['email'];
			$t++;
		} while ($t < $xcount);
	}
	if ($xcount != 0) {
		$xyello = implode(', ', $xhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Gay-Straight Alliance (GSA)', 'Here are the e-mails of the students interested in Gay-Straight Alliance (GSA):<br>'.$xyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'x'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'x'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'x'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'x'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'x'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'x'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'x'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'x'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'x'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'x'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['y'])) {
	$ycount = database::query('SELECT count(*), SUM(CASE WHEN (act1="y" OR act2="y" OR
		act3="y" OR act4="y" OR act5="y" OR act6="y" OR act7="y" OR 
		act8="y" OR act9="y" OR act10="y")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="y" OR act2="y" OR
		act3="y" OR act4="y" OR act5="y" OR act6="y" OR act7="y" OR 
		act8="y" OR act9="y" OR act10="y")
		THEN 1 ELSE 0 END)'];
	$yid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "y" OR freshman_interest.act2 = "y" OR
		freshman_interest.act3 = "y" OR freshman_interest.act4 = "y" OR
		freshman_interest.act5 = "y" OR freshman_interest.act6 = "y" OR
		freshman_interest.act7 = "y" OR freshman_interest.act8 = "y" OR
		freshman_interest.act9 = "y" OR freshman_interest.act10 = "y")');
	$t = 0;
	if ($ycount != 0) {
		do {
			$yhello[$t] = $yid[$t]['email'];
			$t++;
		} while ($t < $ycount);
	}
	if ($ycount != 0) {
		$yyello = implode(', ', $yhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Global Equality Now (School Girls Unite)', 'Here are the e-mails of the students interested in Global Equality Now (School Girls Unite):<br>'.$yyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'y'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'y'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'y'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'y'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'y'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'y'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'y'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'y'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'y'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'y'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['z'])) {
	$zcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="z" OR act2="z" OR
		act3="z" OR act4="z" OR act5="z" OR act6="z" OR act7="z" OR 
		act8="z" OR act9="z" OR act10="z")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="z" OR act2="z" OR
		act3="z" OR act4="z" OR act5="z" OR act6="z" OR act7="z" OR 
		act8="z" OR act9="z" OR act10="z")
		THEN 1 ELSE 0 END)'];
	$zid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "z" OR freshman_interest.act2 = "z" OR
		freshman_interest.act3 = "z" OR freshman_interest.act4 = "z" OR
		freshman_interest.act5 = "z" OR freshman_interest.act6 = "z" OR
		freshman_interest.act7 = "z" OR freshman_interest.act8 = "z" OR
		freshman_interest.act9 = "z" OR freshman_interest.act10 = "z")');
	$t = 0;
	if ($zcount != 0) {
		do {
			$zhello[$t] = $zid[$t]['email'];
			$t++;
		} while ($t < $zcount);
	}
	if ($zcount != 0) {
		$zyello = implode(', ', $zhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Horizon Club', 'Here are the e-mails of the students interested in Horizon Club:<br>'.$zyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'z'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'z'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'z'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'z'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'z'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'z'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'z'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'z'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'z'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'z'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['aa'])) {
	$aacount = database::query('SELECT count(*), SUM(CASE WHEN (act1="aa" OR act2="aa" OR
		act3="aa" OR act4="aa" OR act5="aa" OR act6="aa" OR act7="aa" OR 
		act8="aa" OR act9="aa" OR act10="aa")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="aa" OR act2="aa" OR
		act3="aa" OR act4="aa" OR act5="aa" OR act6="aa" OR act7="aa" OR 
		act8="aa" OR act9="aa" OR act10="aa")
		THEN 1 ELSE 0 END)'];
	$aaid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "aa" OR freshman_interest.act2 = "aa" OR
		freshman_interest.act3 = "aa" OR freshman_interest.act4 = "aa" OR
		freshman_interest.act5 = "aa" OR freshman_interest.act6 = "aa" OR
		freshman_interest.act7 = "aa" OR freshman_interest.act8 = "aa" OR
		freshman_interest.act9 = "aa" OR freshman_interest.act10 = "aa")');
	$t = 0;
	if ($aacount != 0) {
		do {
			$aahello[$t] = $aaid[$t]['email'];
			$t++;
		} while ($t < $aacount);
	}
	if ($aacount != 0) {
		$aayello = implode(', ', $aahello);
		Mail::sendMail('Peer-to-Peer E-mail List for Ice Hockey Club', 'Here are the e-mails of the students interested in Ice Hockey Club:<br>'.$aayello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'aa'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'aa'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'aa'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'aa'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'aa'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'aa'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'aa'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'aa'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'aa'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'aa'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['ab'])) {
	$abcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ab" OR act2="ab" OR
		act3="ab" OR act4="ab" OR act5="ab" OR act6="ab" OR act7="ab" OR 
		act8="ab" OR act9="ab" OR act10="ab")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ab" OR act2="ab" OR
		act3="ab" OR act4="ab" OR act5="ab" OR act6="ab" OR act7="ab" OR 
		act8="ab" OR act9="ab" OR act10="ab")
		THEN 1 ELSE 0 END)'];
	$abid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ab" OR freshman_interest.act2 = "ab" OR
		freshman_interest.act3 = "ab" OR freshman_interest.act4 = "ab" OR
		freshman_interest.act5 = "ab" OR freshman_interest.act6 = "ab" OR
		freshman_interest.act7 = "ab" OR freshman_interest.act8 = "ab" OR
		freshman_interest.act9 = "ab" OR freshman_interest.act10 = "ab")');
	$t = 0;
	if ($abcount != 0) {
		do {
			$abhello[$t] = $abid[$t]['email'];
			$t++;
		} while ($t < $abcount);
	}
	if ($abcount != 0) {
		$abyello = implode(', ', $abhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Improvisation Club', 'Here are the e-mails of the students interested in Improvisation Club:<br>'.$abyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ab'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ab'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ab'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ab'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ab'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ab'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ab'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ab'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ab'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ab'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['ac'])) {
	$account = database::query('SELECT count(*), SUM(CASE WHEN (act1="ac" OR act2="ac" OR
		act3="ac" OR act4="ac" OR act5="ac" OR act6="ac" OR act7="ac" OR 
		act8="ac" OR act9="ac" OR act10="ac")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ac" OR act2="ac" OR
		act3="ac" OR act4="ac" OR act5="ac" OR act6="ac" OR act7="ac" OR 
		act8="ac" OR act9="ac" OR act10="ac")
		THEN 1 ELSE 0 END)'];
	$acid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ac" OR freshman_interest.act2 = "ac" OR
		freshman_interest.act3 = "ac" OR freshman_interest.act4 = "ac" OR
		freshman_interest.act5 = "ac" OR freshman_interest.act6 = "ac" OR
		freshman_interest.act7 = "ac" OR freshman_interest.act8 = "ac" OR
		freshman_interest.act9 = "ac" OR freshman_interest.act10 = "ac")');
	$t = 0;
	if ($account != 0) {
		do {
			$achello[$t] = $acid[$t]['email'];
			$t++;
		} while ($t < $account);
	}
	if ($account != 0) {
		$acyello = implode(', ', $achello);
		Mail::sendMail('Peer-to-Peer E-mail List for It\'s Academic', 'Here are the e-mails of the students interested in It\'s Academic:<br>'.$acyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ac'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ac'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ac'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ac'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ac'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ac'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ac'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ac'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ac'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ac'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['ad'])) {
	$adcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ad" OR act2="ad" OR
		act3="ad" OR act4="ad" OR act5="ad" OR act6="ad" OR act7="ad" OR 
		act8="ad" OR act9="ad" OR act10="ad")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ad" OR act2="ad" OR
		act3="ad" OR act4="ad" OR act5="ad" OR act6="ad" OR act7="ad" OR 
		act8="ad" OR act9="ad" OR act10="ad")
		THEN 1 ELSE 0 END)'];
	$adid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ad" OR freshman_interest.act2 = "ad" OR
		freshman_interest.act3 = "ad" OR freshman_interest.act4 = "ad" OR
		freshman_interest.act5 = "ad" OR freshman_interest.act6 = "ad" OR
		freshman_interest.act7 = "ad" OR freshman_interest.act8 = "ad" OR
		freshman_interest.act9 = "ad" OR freshman_interest.act10 = "ad")');
	$t = 0;
	if ($adcount != 0) {
		do {
			$adhello[$t] = $adid[$t]['email'];
			$t++;
		} while ($t < $adcount);
	}
	if ($adcount != 0) {
		$adyello = implode(', ', $adhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Jazz Band', 'Here are the e-mails of the students interested in Jazz Band:<br>'.$adyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ad'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ad'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ad'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ad'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ad'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ad'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ad'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ad'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ad'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ad'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['ae'])) {
	$aecount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ae" OR act2="ae" OR
		act3="ae" OR act4="ae" OR act5="ae" OR act6="ae" OR act7="ae" OR 
		act8="ae" OR act9="ae" OR act10="ae")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ae" OR act2="ae" OR
		act3="ae" OR act4="ae" OR act5="ae" OR act6="ae" OR act7="ae" OR 
		act8="ae" OR act9="ae" OR act10="ae")
		THEN 1 ELSE 0 END)'];
	$aeid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ae" OR freshman_interest.act2 = "ae" OR
		freshman_interest.act3 = "ae" OR freshman_interest.act4 = "ae" OR
		freshman_interest.act5 = "ae" OR freshman_interest.act6 = "ae" OR
		freshman_interest.act7 = "ae" OR freshman_interest.act8 = "ae" OR
		freshman_interest.act9 = "ae" OR freshman_interest.act10 = "ae")');
	$t = 0;
	if ($aecount != 0) {
		do {
			$aehello[$t] = $aeid[$t]['email'];
			$t++;
		} while ($t < $aecount);
	}
	if ($aecount != 0) {
		$aeyello = implode(', ', $aehello);
		Mail::sendMail('Peer-to-Peer E-mail List for Le Cercle Francais', 'Here are the e-mails of the students interested in Le Cercle Francais:<br>'.$aeyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ae'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ae'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ae'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ae'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ae'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ae'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ae'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ae'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ae'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ae'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['af'])) {
	$afcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="af" OR act2="af" OR
		act3="af" OR act4="af" OR act5="af" OR act6="af" OR act7="af" OR 
		act8="af" OR act9="af" OR act10="af")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="af" OR act2="af" OR
		act3="af" OR act4="af" OR act5="af" OR act6="af" OR act7="af" OR 
		act8="af" OR act9="af" OR act10="af")
		THEN 1 ELSE 0 END)'];
	$afid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "af" OR freshman_interest.act2 = "af" OR
		freshman_interest.act3 = "af" OR freshman_interest.act4 = "af" OR
		freshman_interest.act5 = "af" OR freshman_interest.act6 = "af" OR
		freshman_interest.act7 = "af" OR freshman_interest.act8 = "af" OR
		freshman_interest.act9 = "af" OR freshman_interest.act10 = "af")');
	$t = 0;
	if ($afcount != 0) {
		do {
			$afhello[$t] = $afid[$t]['email'];
			$t++;
		} while ($t < $afcount);
	}
	if ($afcount != 0) {
		$afyello = implode(', ', $afhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Los Gators Latinos', 'Here are the e-mails of the students interested in Los Gators Latinos:<br>'.$afyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'af'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'af'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'af'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'af'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'af'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'af'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'af'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'af'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'af'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'af'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['ag'])) {
	$agcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ag" OR act2="ag" OR
		act3="ag" OR act4="ag" OR act5="ag" OR act6="ag" OR act7="ag" OR 
		act8="ag" OR act9="ag" OR act10="ag")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ag" OR act2="ag" OR
		act3="ag" OR act4="ag" OR act5="ag" OR act6="ag" OR act7="ag" OR 
		act8="ag" OR act9="ag" OR act10="ag")
		THEN 1 ELSE 0 END)'];
	$agid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ag" OR freshman_interest.act2 = "ag" OR
		freshman_interest.act3 = "ag" OR freshman_interest.act4 = "ag" OR
		freshman_interest.act5 = "ag" OR freshman_interest.act6 = "ag" OR
		freshman_interest.act7 = "ag" OR freshman_interest.act8 = "ag" OR
		freshman_interest.act9 = "ag" OR freshman_interest.act10 = "ag")');
	$t = 0;
	if ($agcount != 0) {
		do {
			$aghello[$t] = $agid[$t]['email'];
			$t++;
		} while ($t < $agcount);
	}
	if ($agcount != 0) {
		$agyello = implode(', ', $aghello);
		Mail::sendMail('Peer-to-Peer E-mail List for Lunch Choir / Concert Choir', 'Here are the e-mails of the students interested in Lunch Choir / Concert Choir:<br>'.$agyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ag'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ag'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ag'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ag'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ag'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ag'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ag'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ag'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ag'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ag'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['ah'])) {
	$ahcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ah" OR act2="ah" OR
		act3="ah" OR act4="ah" OR act5="ah" OR act6="ah" OR act7="ah" OR 
		act8="ah" OR act9="ah" OR act10="ah")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ah" OR act2="ah" OR
		act3="ah" OR act4="ah" OR act5="ah" OR act6="ah" OR act7="ah" OR 
		act8="ah" OR act9="ah" OR act10="ah")
		THEN 1 ELSE 0 END)'];
	$ahid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ah" OR freshman_interest.act2 = "ah" OR
		freshman_interest.act3 = "ah" OR freshman_interest.act4 = "ah" OR
		freshman_interest.act5 = "ah" OR freshman_interest.act6 = "ah" OR
		freshman_interest.act7 = "ah" OR freshman_interest.act8 = "ah" OR
		freshman_interest.act9 = "ah" OR freshman_interest.act10 = "ah")');
	$t = 0;
	if ($ahcount != 0) {
		do {
			$ahhello[$t] = $ahid[$t]['email'];
			$t++;
		} while ($t < $ahcount);
	}
	if ($ahcount != 0) {
		$ahyello = implode(', ', $ahhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Marching Band', 'Here are the e-mails of the students interested in Marching Band:<br>'.$ahyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ah'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ah'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ah'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ah'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ah'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ah'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ah'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ah'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ah'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ah'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['ai'])) {
	$aicount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ai" OR act2="ai" OR
		act3="ai" OR act4="ai" OR act5="ai" OR act6="ai" OR act7="ai" OR 
		act8="ai" OR act9="ai" OR act10="ai")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ai" OR act2="ai" OR
		act3="ai" OR act4="ai" OR act5="ai" OR act6="ai" OR act7="ai" OR 
		act8="ai" OR act9="ai" OR act10="ai")
		THEN 1 ELSE 0 END)'];
	$aiid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ai" OR freshman_interest.act2 = "ai" OR
		freshman_interest.act3 = "ai" OR freshman_interest.act4 = "ai" OR
		freshman_interest.act5 = "ai" OR freshman_interest.act6 = "ai" OR
		freshman_interest.act7 = "ai" OR freshman_interest.act8 = "ai" OR
		freshman_interest.act9 = "ai" OR freshman_interest.act10 = "ai")');
	$t = 0;
	if ($aicount != 0) {
		do {
			$aihello[$t] = $aiid[$t]['email'];
			$t++;
		} while ($t < $aicount);
	}
	if ($aicount != 0) {
		$aiyello = implode(', ', $aihello);
		Mail::sendMail('Peer-to-Peer E-mail List for Math National Honor Society', 'Here are the e-mails of the students interested in Math National Honor Society:<br>'.$aiyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ai'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ai'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ai'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ai'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ai'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ai'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ai'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ai'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ai'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ai'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['aj'])) {
	$ajcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="aj" OR act2="aj" OR
		act3="aj" OR act4="aj" OR act5="aj" OR act6="aj" OR act7="aj" OR 
		act8="aj" OR act9="aj" OR act10="aj")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="aj" OR act2="aj" OR
		act3="aj" OR act4="aj" OR act5="aj" OR act6="aj" OR act7="aj" OR 
		act8="aj" OR act9="aj" OR act10="aj")
		THEN 1 ELSE 0 END)'];
	$ajid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "aj" OR freshman_interest.act2 = "aj" OR
		freshman_interest.act3 = "aj" OR freshman_interest.act4 = "aj" OR
		freshman_interest.act5 = "aj" OR freshman_interest.act6 = "aj" OR
		freshman_interest.act7 = "aj" OR freshman_interest.act8 = "aj" OR
		freshman_interest.act9 = "aj" OR freshman_interest.act10 = "aj")');
	$t = 0;
	if ($ajcount != 0) {
		do {
			$ajhello[$t] = $ajid[$t]['email'];
			$t++;
		} while ($t < $ajcount);
	}
	if ($ajcount != 0) {
		$ajyello = implode(', ', $ajhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Math Team', 'Here are the e-mails of the students interested in Math Team:<br>'.$ajyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'aj'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'aj'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'aj'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'aj'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'aj'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'aj'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'aj'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'aj'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'aj'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'aj'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['ak'])) {
	$akcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ak" OR act2="ak" OR
		act3="ak" OR act4="ak" OR act5="ak" OR act6="ak" OR act7="ak" OR 
		act8="ak" OR act9="ak" OR act10="ak")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ak" OR act2="ak" OR
		act3="ak" OR act4="ak" OR act5="ak" OR act6="ak" OR act7="ak" OR 
		act8="ak" OR act9="ak" OR act10="ak")
		THEN 1 ELSE 0 END)'];
	$akid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ak" OR freshman_interest.act2 = "ak" OR
		freshman_interest.act3 = "ak" OR freshman_interest.act4 = "ak" OR
		freshman_interest.act5 = "ak" OR freshman_interest.act6 = "ak" OR
		freshman_interest.act7 = "ak" OR freshman_interest.act8 = "ak" OR
		freshman_interest.act9 = "ak" OR freshman_interest.act10 = "ak")');
	$t = 0;
	if ($akcount != 0) {
		do {
			$akhello[$t] = $akid[$t]['email'];
			$t++;
		} while ($t < $akcount);
	}
	if ($akcount != 0) {
		$akyello = implode(', ', $akhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Math, Engineering, and Science Achievement (MESA)', 'Here are the e-mails of the students interested in Math, Engineering, and Science Achievement (MESA):<br>'.$akyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ak'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ak'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ak'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ak'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ak'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ak'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ak'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ak'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ak'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ak'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['al'])) {
	$alcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="al" OR act2="al" OR
		act3="al" OR act4="al" OR act5="al" OR act6="al" OR act7="al" OR 
		act8="al" OR act9="al" OR act10="al")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="al" OR act2="al" OR
		act3="al" OR act4="al" OR act5="al" OR act6="al" OR act7="al" OR 
		act8="al" OR act9="al" OR act10="al")
		THEN 1 ELSE 0 END)'];
	$alid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "al" OR freshman_interest.act2 = "al" OR
		freshman_interest.act3 = "al" OR freshman_interest.act4 = "al" OR
		freshman_interest.act5 = "al" OR freshman_interest.act6 = "al" OR
		freshman_interest.act7 = "al" OR freshman_interest.act8 = "al" OR
		freshman_interest.act9 = "al" OR freshman_interest.act10 = "al")');
	$t = 0;
	if ($alcount != 0) {
		do {
			$alhello[$t] = $alid[$t]['email'];
			$t++;
		} while ($t < $alcount);
	}
	if ($alcount != 0) {
		$alyello = implode(', ', $alhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Men\'s Choir', 'Here are the e-mails of the students interested in Men\'s Choir:<br>'.$alyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'al'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'al'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'al'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'al'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'al'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'al'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'al'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'al'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'al'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'al'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['am'])) {
	$amcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="am" OR act2="am" OR
		act3="am" OR act4="am" OR act5="am" OR act6="am" OR act7="am" OR 
		act8="am" OR act9="am" OR act10="am")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="am" OR act2="am" OR
		act3="am" OR act4="am" OR act5="am" OR act6="am" OR act7="am" OR 
		act8="am" OR act9="am" OR act10="am")
		THEN 1 ELSE 0 END)'];
	$amid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "am" OR freshman_interest.act2 = "am" OR
		freshman_interest.act3 = "am" OR freshman_interest.act4 = "am" OR
		freshman_interest.act5 = "am" OR freshman_interest.act6 = "am" OR
		freshman_interest.act7 = "am" OR freshman_interest.act8 = "am" OR
		freshman_interest.act9 = "am" OR freshman_interest.act10 = "am")');
	$t = 0;
	if ($amcount != 0) {
		do {
			$amhello[$t] = $amid[$t]['email'];
			$t++;
		} while ($t < $amcount);
	}
	if ($amcount != 0) {
		$amyello = implode(', ', $amhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Model United Nations', 'Here are the e-mails of the students interested in Model United Nations:<br>'.$amyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'am'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'am'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'am'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'am'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'am'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'am'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'am'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'am'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'am'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'am'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['an'])) {
	$ancount = database::query('SELECT count(*), SUM(CASE WHEN (act1="an" OR act2="an" OR
		act3="an" OR act4="an" OR act5="an" OR act6="an" OR act7="an" OR 
		act8="an" OR act9="an" OR act10="an")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="an" OR act2="an" OR
		act3="an" OR act4="an" OR act5="an" OR act6="an" OR act7="an" OR 
		act8="an" OR act9="an" OR act10="an")
		THEN 1 ELSE 0 END)'];
	$anid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "an" OR freshman_interest.act2 = "an" OR
		freshman_interest.act3 = "an" OR freshman_interest.act4 = "an" OR
		freshman_interest.act5 = "an" OR freshman_interest.act6 = "an" OR
		freshman_interest.act7 = "an" OR freshman_interest.act8 = "an" OR
		freshman_interest.act9 = "an" OR freshman_interest.act10 = "an")');
	$t = 0;
	if ($ancount != 0) {
		do {
			$anhello[$t] = $anid[$t]['email'];
			$t++;
		} while ($t < $ancount);
	}
	if ($ancount != 0) {
		$anyello = implode(', ', $anhello);
		Mail::sendMail('Peer-to-Peer E-mail List for National Art Honor Society', 'Here are the e-mails of the students interested in National Art Honor Society:<br>'.$anyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'an'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'an'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'an'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'an'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'an'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'an'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'an'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'an'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'an'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'an'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['ao'])) {
	$aocount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ao" OR act2="ao" OR
		act3="ao" OR act4="ao" OR act5="ao" OR act6="ao" OR act7="ao" OR 
		act8="ao" OR act9="ao" OR act10="ao")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ao" OR act2="ao" OR
		act3="ao" OR act4="ao" OR act5="ao" OR act6="ao" OR act7="ao" OR 
		act8="ao" OR act9="ao" OR act10="ao")
		THEN 1 ELSE 0 END)'];
	$aoid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ao" OR freshman_interest.act2 = "ao" OR
		freshman_interest.act3 = "ao" OR freshman_interest.act4 = "ao" OR
		freshman_interest.act5 = "ao" OR freshman_interest.act6 = "ao" OR
		freshman_interest.act7 = "ao" OR freshman_interest.act8 = "ao" OR
		freshman_interest.act9 = "ao" OR freshman_interest.act10 = "ao")');
	$t = 0;
	if ($aocount != 0) {
		do {
			$aohello[$t] = $aoid[$t]['email'];
			$t++;
		} while ($t < $aocount);
	}
	if ($aocount != 0) {
		$aoyello = implode(', ', $aohello);
		Mail::sendMail('Peer-to-Peer E-mail List for National Latin Honor Society', 'Here are the e-mails of the students interested in National Latin Honor Society:<br>'.$aoyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ao'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ao'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ao'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ao'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ao'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ao'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ao'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ao'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ao'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ao'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['ap'])) {
	$apcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ap" OR act2="ap" OR
		act3="ap" OR act4="ap" OR act5="ap" OR act6="ap" OR act7="ap" OR 
		act8="ap" OR act9="ap" OR act10="ap")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ap" OR act2="ap" OR
		act3="ap" OR act4="ap" OR act5="ap" OR act6="ap" OR act7="ap" OR 
		act8="ap" OR act9="ap" OR act10="ap")
		THEN 1 ELSE 0 END)'];
	$apid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ap" OR freshman_interest.act2 = "ap" OR
		freshman_interest.act3 = "ap" OR freshman_interest.act4 = "ap" OR
		freshman_interest.act5 = "ap" OR freshman_interest.act6 = "ap" OR
		freshman_interest.act7 = "ap" OR freshman_interest.act8 = "ap" OR
		freshman_interest.act9 = "ap" OR freshman_interest.act10 = "ap")');
	$t = 0;
	if ($apcount != 0) {
		do {
			$aphello[$t] = $apid[$t]['email'];
			$t++;
		} while ($t < $apcount);
	}
	if ($apcount != 0) {
		$apyello = implode(', ', $aphello);
		Mail::sendMail('Peer-to-Peer E-mail List for National Technical Honor Society (NTHS)', 'Here are the e-mails of the students interested in National Technical Honor Society (NTHS):<br>'.$apyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ap'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ap'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ap'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ap'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ap'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ap'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ap'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ap'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ap'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ap'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['aq'])) {
	$aqcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="aq" OR act2="aq" OR
		act3="aq" OR act4="aq" OR act5="aq" OR act6="aq" OR act7="aq" OR 
		act8="aq" OR act9="aq" OR act10="aq")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="aq" OR act2="aq" OR
		act3="aq" OR act4="aq" OR act5="aq" OR act6="aq" OR act7="aq" OR 
		act8="aq" OR act9="aq" OR act10="aq")
		THEN 1 ELSE 0 END)'];
	$aqid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "aq" OR freshman_interest.act2 = "aq" OR
		freshman_interest.act3 = "aq" OR freshman_interest.act4 = "aq" OR
		freshman_interest.act5 = "aq" OR freshman_interest.act6 = "aq" OR
		freshman_interest.act7 = "aq" OR freshman_interest.act8 = "aq" OR
		freshman_interest.act9 = "aq" OR freshman_interest.act10 = "aq")');
	$t = 0;
	if ($aqcount != 0) {
		do {
			$aqhello[$t] = $aqid[$t]['email'];
			$t++;
		} while ($t < $aqcount);
	}
	if ($aqcount != 0) {
		$aqyello = implode(', ', $aqhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Orchestra', 'Here are the e-mails of the students interested in Orchestra:<br>'.$aqyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'aq'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'aq'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'aq'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'aq'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'aq'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'aq'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'aq'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'aq'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'aq'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'aq'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['ar'])) {
	$arcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ar" OR act2="ar" OR
		act3="ar" OR act4="ar" OR act5="ar" OR act6="ar" OR act7="ar" OR 
		act8="ar" OR act9="ar" OR act10="ar")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ar" OR act2="ar" OR
		act3="ar" OR act4="ar" OR act5="ar" OR act6="ar" OR act7="ar" OR 
		act8="ar" OR act9="ar" OR act10="ar")
		THEN 1 ELSE 0 END)'];
	$arid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ar" OR freshman_interest.act2 = "ar" OR
		freshman_interest.act3 = "ar" OR freshman_interest.act4 = "ar" OR
		freshman_interest.act5 = "ar" OR freshman_interest.act6 = "ar" OR
		freshman_interest.act7 = "ar" OR freshman_interest.act8 = "ar" OR
		freshman_interest.act9 = "ar" OR freshman_interest.act10 = "ar")');
	$t = 0;
	if ($arcount != 0) {
		do {
			$arhello[$t] = $arid[$t]['email'];
			$t++;
		} while ($t < $arcount);
	}
	if ($arcount != 0) {
		$aryello = implode(', ', $arhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Photography Club', 'Here are the e-mails of the students interested in Photography Club:<br>'.$aryello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ar'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ar'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ar'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ar'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ar'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ar'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ar'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ar'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ar'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ar'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['as'])) {
	$ascount = database::query('SELECT count(*), SUM(CASE WHEN (act1="as" OR act2="as" OR
		act3="as" OR act4="as" OR act5="as" OR act6="as" OR act7="as" OR 
		act8="as" OR act9="as" OR act10="as")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="as" OR act2="as" OR
		act3="as" OR act4="as" OR act5="as" OR act6="as" OR act7="as" OR 
		act8="as" OR act9="as" OR act10="as")
		THEN 1 ELSE 0 END)'];
	$asid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "as" OR freshman_interest.act2 = "as" OR
		freshman_interest.act3 = "as" OR freshman_interest.act4 = "as" OR
		freshman_interest.act5 = "as" OR freshman_interest.act6 = "as" OR
		freshman_interest.act7 = "as" OR freshman_interest.act8 = "as" OR
		freshman_interest.act9 = "as" OR freshman_interest.act10 = "as")');
	$t = 0;
	if ($ascount != 0) {
		do {
			$ashello[$t] = $asid[$t]['email'];
			$t++;
		} while ($t < $ascount);
	}
	if ($ascount != 0) {
		$asyello = implode(', ', $ashello);
		Mail::sendMail('Peer-to-Peer E-mail List for RC Model Club', 'Here are the e-mails of the students interested in RC Model Club:<br>'.$asyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'as'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'as'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'as'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'as'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'as'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'as'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'as'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'as'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'as'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'as'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['at'])) {
	$atcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="at" OR act2="at" OR
		act3="at" OR act4="at" OR act5="at" OR act6="at" OR act7="at" OR 
		act8="at" OR act9="at" OR act10="at")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="at" OR act2="at" OR
		act3="at" OR act4="at" OR act5="at" OR act6="at" OR act7="at" OR 
		act8="at" OR act9="at" OR act10="at")
		THEN 1 ELSE 0 END)'];
	$atid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "at" OR freshman_interest.act2 = "at" OR
		freshman_interest.act3 = "at" OR freshman_interest.act4 = "at" OR
		freshman_interest.act5 = "at" OR freshman_interest.act6 = "at" OR
		freshman_interest.act7 = "at" OR freshman_interest.act8 = "at" OR
		freshman_interest.act9 = "at" OR freshman_interest.act10 = "at")');
	$t = 0;
	if ($atcount != 0) {
		do {
			$athello[$t] = $atid[$t]['email'];
			$t++;
		} while ($t < $atcount);
	}
	if ($atcount != 0) {
		$atyello = implode(', ', $athello);
		Mail::sendMail('Peer-to-Peer E-mail List for Reservoir Christian Fellowship', 'Here are the e-mails of the students interested in Reservoir Christian Fellowship:<br>'.$atyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'at'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'at'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'at'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'at'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'at'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'at'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'at'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'at'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'at'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'at'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['au'])) {
	$aucount = database::query('SELECT count(*), SUM(CASE WHEN (act1="au" OR act2="au" OR
		act3="au" OR act4="au" OR act5="au" OR act6="au" OR act7="au" OR 
		act8="au" OR act9="au" OR act10="au")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="au" OR act2="au" OR
		act3="au" OR act4="au" OR act5="au" OR act6="au" OR act7="au" OR 
		act8="au" OR act9="au" OR act10="au")
		THEN 1 ELSE 0 END)'];
	$auid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "au" OR freshman_interest.act2 = "au" OR
		freshman_interest.act3 = "au" OR freshman_interest.act4 = "au" OR
		freshman_interest.act5 = "au" OR freshman_interest.act6 = "au" OR
		freshman_interest.act7 = "au" OR freshman_interest.act8 = "au" OR
		freshman_interest.act9 = "au" OR freshman_interest.act10 = "au")');
	$t = 0;
	if ($aucount != 0) {
		do {
			$auhello[$t] = $auid[$t]['email'];
			$t++;
		} while ($t < $aucount);
	}
	if ($aucount != 0) {
		$auyello = implode(', ', $auhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Reservoir Scholars', 'Here are the e-mails of the students interested in Reservoir Scholars:<br>'.$auyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'au'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'au'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'au'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'au'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'au'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'au'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'au'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'au'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'au'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'au'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['av'])) {
	$avcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="av" OR act2="av" OR
		act3="av" OR act4="av" OR act5="av" OR act6="av" OR act7="av" OR 
		act8="av" OR act9="av" OR act10="av")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="av" OR act2="av" OR
		act3="av" OR act4="av" OR act5="av" OR act6="av" OR act7="av" OR 
		act8="av" OR act9="av" OR act10="av")
		THEN 1 ELSE 0 END)'];
	$avid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "av" OR freshman_interest.act2 = "av" OR
		freshman_interest.act3 = "av" OR freshman_interest.act4 = "av" OR
		freshman_interest.act5 = "av" OR freshman_interest.act6 = "av" OR
		freshman_interest.act7 = "av" OR freshman_interest.act8 = "av" OR
		freshman_interest.act9 = "av" OR freshman_interest.act10 = "av")');
	$t = 0;
	if ($avcount != 0) {
		do {
			$avhello[$t] = $avid[$t]['email'];
			$t++;
		} while ($t < $avcount);
	}
	if ($avcount != 0) {
		$avyello = implode(', ', $avhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Robotics Club', 'Here are the e-mails of the students interested in Robotics Club:<br>'.$avyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'av'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'av'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'av'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'av'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'av'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'av'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'av'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'av'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'av'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'av'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['aw'])) {
	$awcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="aw" OR act2="aw" OR
		act3="aw" OR act4="aw" OR act5="aw" OR act6="aw" OR act7="aw" OR 
		act8="aw" OR act9="aw" OR act10="aw")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="aw" OR act2="aw" OR
		act3="aw" OR act4="aw" OR act5="aw" OR act6="aw" OR act7="aw" OR 
		act8="aw" OR act9="aw" OR act10="aw")
		THEN 1 ELSE 0 END)'];
	$awid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "aw" OR freshman_interest.act2 = "aw" OR
		freshman_interest.act3 = "aw" OR freshman_interest.act4 = "aw" OR
		freshman_interest.act5 = "aw" OR freshman_interest.act6 = "aw" OR
		freshman_interest.act7 = "aw" OR freshman_interest.act8 = "aw" OR
		freshman_interest.act9 = "aw" OR freshman_interest.act10 = "aw")');
	$t = 0;
	if ($awcount != 0) {
		do {
			$awhello[$t] = $awid[$t]['email'];
			$t++;
		} while ($t < $awcount);
	}
	if ($awcount != 0) {
		$awyello = implode(', ', $awhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Science National Honor Society', 'Here are the e-mails of the students interested in Science National Honor Society:<br>'.$awyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'aw'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'aw'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'aw'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'aw'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'aw'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'aw'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'aw'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'aw'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'aw'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'aw'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['ax'])) {
	$axcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ax" OR act2="ax" OR
		act3="ax" OR act4="ax" OR act5="ax" OR act6="ax" OR act7="ax" OR 
		act8="ax" OR act9="ax" OR act10="ax")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ax" OR act2="ax" OR
		act3="ax" OR act4="ax" OR act5="ax" OR act6="ax" OR act7="ax" OR 
		act8="ax" OR act9="ax" OR act10="ax")
		THEN 1 ELSE 0 END)'];
	$axid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ax" OR freshman_interest.act2 = "ax" OR
		freshman_interest.act3 = "ax" OR freshman_interest.act4 = "ax" OR
		freshman_interest.act5 = "ax" OR freshman_interest.act6 = "ax" OR
		freshman_interest.act7 = "ax" OR freshman_interest.act8 = "ax" OR
		freshman_interest.act9 = "ax" OR freshman_interest.act10 = "ax")');
	$t = 0;
	if ($axcount != 0) {
		do {
			$axhello[$t] = $axid[$t]['email'];
			$t++;
		} while ($t < $axcount);
	}
	if ($axcount != 0) {
		$axyello = implode(', ', $axhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Science Olympiad', 'Here are the e-mails of the students interested in Science Olympiad:<br>'.$axyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ax'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ax'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ax'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ax'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ax'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ax'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ax'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ax'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ax'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ax'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['ay'])) {
	$aycount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ay" OR act2="ay" OR
		act3="ay" OR act4="ay" OR act5="ay" OR act6="ay" OR act7="ay" OR 
		act8="ay" OR act9="ay" OR act10="ay")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ay" OR act2="ay" OR
		act3="ay" OR act4="ay" OR act5="ay" OR act6="ay" OR act7="ay" OR 
		act8="ay" OR act9="ay" OR act10="ay")
		THEN 1 ELSE 0 END)'];
	$ayid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ay" OR freshman_interest.act2 = "ay" OR
		freshman_interest.act3 = "ay" OR freshman_interest.act4 = "ay" OR
		freshman_interest.act5 = "ay" OR freshman_interest.act6 = "ay" OR
		freshman_interest.act7 = "ay" OR freshman_interest.act8 = "ay" OR
		freshman_interest.act9 = "ay" OR freshman_interest.act10 = "ay")');
	$t = 0;
	if ($aycount != 0) {
		do {
			$ayhello[$t] = $ayid[$t]['email'];
			$t++;
		} while ($t < $aycount);
	}
	if ($aycount != 0) {
		$ayyello = implode(', ', $ayhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Spanish National Honor Society', 'Here are the e-mails of the students interested in Spanish National Honor Society:<br>'.$ayyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ay'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ay'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ay'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ay'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ay'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ay'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ay'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ay'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ay'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ay'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['az'])) {
	$azcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="az" OR act2="az" OR
		act3="az" OR act4="az" OR act5="az" OR act6="az" OR act7="az" OR 
		act8="az" OR act9="az" OR act10="az")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="az" OR act2="az" OR
		act3="az" OR act4="az" OR act5="az" OR act6="az" OR act7="az" OR 
		act8="az" OR act9="az" OR act10="az")
		THEN 1 ELSE 0 END)'];
	$azid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "az" OR freshman_interest.act2 = "az" OR
		freshman_interest.act3 = "az" OR freshman_interest.act4 = "az" OR
		freshman_interest.act5 = "az" OR freshman_interest.act6 = "az" OR
		freshman_interest.act7 = "az" OR freshman_interest.act8 = "az" OR
		freshman_interest.act9 = "az" OR freshman_interest.act10 = "az")');
	$t = 0;
	if ($azcount != 0) {
		do {
			$azhello[$t] = $azid[$t]['email'];
			$t++;
		} while ($t < $azcount);
	}
	if ($azcount != 0) {
		$azyello = implode(', ', $azhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Speech and Debate', 'Here are the e-mails of the students interested in Speech and Debate:<br>'.$azyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'az'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'az'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'az'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'az'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'az'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'az'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'az'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'az'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'az'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'az'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['ba'])) {
	$bacount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ba" OR act2="ba" OR
		act3="ba" OR act4="ba" OR act5="ba" OR act6="ba" OR act7="ba" OR 
		act8="ba" OR act9="ba" OR act10="ba")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ba" OR act2="ba" OR
		act3="ba" OR act4="ba" OR act5="ba" OR act6="ba" OR act7="ba" OR 
		act8="ba" OR act9="ba" OR act10="ba")
		THEN 1 ELSE 0 END)'];
	$baid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ba" OR freshman_interest.act2 = "ba" OR
		freshman_interest.act3 = "ba" OR freshman_interest.act4 = "ba" OR
		freshman_interest.act5 = "ba" OR freshman_interest.act6 = "ba" OR
		freshman_interest.act7 = "ba" OR freshman_interest.act8 = "ba" OR
		freshman_interest.act9 = "ba" OR freshman_interest.act10 = "ba")');
	$t = 0;
	if ($bacount != 0) {
		do {
			$bahello[$t] = $baid[$t]['email'];
			$t++;
		} while ($t < $bacount);
	}
	if ($bacount != 0) {
		$bayello = implode(', ', $bahello);
		Mail::sendMail('Peer-to-Peer E-mail List for Step Team', 'Here are the e-mails of the students interested in Step Team:<br>'.$bayello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ba'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ba'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ba'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ba'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ba'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ba'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ba'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ba'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ba'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ba'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['bb'])) {
	$bbcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bb" OR act2="bb" OR
		act3="bb" OR act4="bb" OR act5="bb" OR act6="bb" OR act7="bb" OR 
		act8="bb" OR act9="bb" OR act10="bb")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bb" OR act2="bb" OR
		act3="bb" OR act4="bb" OR act5="bb" OR act6="bb" OR act7="bb" OR 
		act8="bb" OR act9="bb" OR act10="bb")
		THEN 1 ELSE 0 END)'];
	$bbid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bb" OR freshman_interest.act2 = "bb" OR
		freshman_interest.act3 = "bb" OR freshman_interest.act4 = "bb" OR
		freshman_interest.act5 = "bb" OR freshman_interest.act6 = "bb" OR
		freshman_interest.act7 = "bb" OR freshman_interest.act8 = "bb" OR
		freshman_interest.act9 = "bb" OR freshman_interest.act10 = "bb")');
	$t = 0;
	if ($bbcount != 0) {
		do {
			$bbhello[$t] = $bbid[$t]['email'];
			$t++;
		} while ($t < $bbcount);
	}
	if ($bbcount != 0) {
		$bbyello = implode(', ', $bbhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Student Government Association', 'Here are the e-mails of the students interested in Student Government Association:<br>'.$bbyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bb'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bb'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bb'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bb'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bb'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bb'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bb'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bb'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bb'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bb'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['bc'])) {
	$bccount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bc" OR act2="bc" OR
		act3="bc" OR act4="bc" OR act5="bc" OR act6="bc" OR act7="bc" OR 
		act8="bc" OR act9="bc" OR act10="bc")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bc" OR act2="bc" OR
		act3="bc" OR act4="bc" OR act5="bc" OR act6="bc" OR act7="bc" OR 
		act8="bc" OR act9="bc" OR act10="bc")
		THEN 1 ELSE 0 END)'];
	$bcid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bc" OR freshman_interest.act2 = "bc" OR
		freshman_interest.act3 = "bc" OR freshman_interest.act4 = "bc" OR
		freshman_interest.act5 = "bc" OR freshman_interest.act6 = "bc" OR
		freshman_interest.act7 = "bc" OR freshman_interest.act8 = "bc" OR
		freshman_interest.act9 = "bc" OR freshman_interest.act10 = "bc")');
	$t = 0;
	if ($bccount != 0) {
		do {
			$bchello[$t] = $bcid[$t]['email'];
			$t++;
		} while ($t < $bccount);
	}
	if ($bccount != 0) {
		$bcyello = implode(', ', $bchello);
		Mail::sendMail('Peer-to-Peer E-mail List for Swim Club', 'Here are the e-mails of the students interested in Swim Club:<br>'.$bcyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bc'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bc'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bc'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bc'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bc'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bc'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bc'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bc'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bc'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bc'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['bd'])) {
	$bdcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bd" OR act2="bd" OR
		act3="bd" OR act4="bd" OR act5="bd" OR act6="bd" OR act7="bd" OR 
		act8="bd" OR act9="bd" OR act10="bd")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bd" OR act2="bd" OR
		act3="bd" OR act4="bd" OR act5="bd" OR act6="bd" OR act7="bd" OR 
		act8="bd" OR act9="bd" OR act10="bd")
		THEN 1 ELSE 0 END)'];
	$bdid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bd" OR freshman_interest.act2 = "bd" OR
		freshman_interest.act3 = "bd" OR freshman_interest.act4 = "bd" OR
		freshman_interest.act5 = "bd" OR freshman_interest.act6 = "bd" OR
		freshman_interest.act7 = "bd" OR freshman_interest.act8 = "bd" OR
		freshman_interest.act9 = "bd" OR freshman_interest.act10 = "bd")');
	$t = 0;
	if ($bdcount != 0) {
		do {
			$bdhello[$t] = $bdid[$t]['email'];
			$t++;
		} while ($t < $bdcount);
	}
	if ($bdcount != 0) {
		$bdyello = implode(', ', $bdhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Table Tennis Club', 'Here are the e-mails of the students interested in Table Tennis Club:<br>'.$bdyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bd'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bd'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bd'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bd'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bd'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bd'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bd'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bd'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bd'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bd'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['be'])) {
	$becount = database::query('SELECT count(*), SUM(CASE WHEN (act1="be" OR act2="be" OR
		act3="be" OR act4="be" OR act5="be" OR act6="be" OR act7="be" OR 
		act8="be" OR act9="be" OR act10="be")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="be" OR act2="be" OR
		act3="be" OR act4="be" OR act5="be" OR act6="be" OR act7="be" OR 
		act8="be" OR act9="be" OR act10="be")
		THEN 1 ELSE 0 END)'];
	$beid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "be" OR freshman_interest.act2 = "be" OR
		freshman_interest.act3 = "be" OR freshman_interest.act4 = "be" OR
		freshman_interest.act5 = "be" OR freshman_interest.act6 = "be" OR
		freshman_interest.act7 = "be" OR freshman_interest.act8 = "be" OR
		freshman_interest.act9 = "be" OR freshman_interest.act10 = "be")');
	$t = 0;
	if ($becount != 0) {
		do {
			$behello[$t] = $beid[$t]['email'];
			$t++;
		} while ($t < $becount);
	}
	if ($becount != 0) {
		$beyello = implode(', ', $behello);
		Mail::sendMail('Peer-to-Peer E-mail List for Tea Club', 'Here are the e-mails of the students interested in Tea Club:<br>'.$beyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'be'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'be'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'be'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'be'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'be'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'be'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'be'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'be'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'be'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'be'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['bf'])) {
	$bfcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bf" OR act2="bf" OR
		act3="bf" OR act4="bf" OR act5="bf" OR act6="bf" OR act7="bf" OR 
		act8="bf" OR act9="bf" OR act10="bf")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bf" OR act2="bf" OR
		act3="bf" OR act4="bf" OR act5="bf" OR act6="bf" OR act7="bf" OR 
		act8="bf" OR act9="bf" OR act10="bf")
		THEN 1 ELSE 0 END)'];
	$bfid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bf" OR freshman_interest.act2 = "bf" OR
		freshman_interest.act3 = "bf" OR freshman_interest.act4 = "bf" OR
		freshman_interest.act5 = "bf" OR freshman_interest.act6 = "bf" OR
		freshman_interest.act7 = "bf" OR freshman_interest.act8 = "bf" OR
		freshman_interest.act9 = "bf" OR freshman_interest.act10 = "bf")');
	$t = 0;
	if ($bfcount != 0) {
		do {
			$bfhello[$t] = $bfid[$t]['email'];
			$t++;
		} while ($t < $bfcount);
	}
	if ($bfcount != 0) {
		$bfyello = implode(', ', $bfhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Theatre Arts Productions', 'Here are the e-mails of the students interested in Theatre Arts Productions:<br>'.$bfyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bf'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bf'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bf'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bf'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bf'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bf'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bf'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bf'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bf'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bf'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['bg'])) {
	$bgcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bg" OR act2="bg" OR
		act3="bg" OR act4="bg" OR act5="bg" OR act6="bg" OR act7="bg" OR 
		act8="bg" OR act9="bg" OR act10="bg")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bg" OR act2="bg" OR
		act3="bg" OR act4="bg" OR act5="bg" OR act6="bg" OR act7="bg" OR 
		act8="bg" OR act9="bg" OR act10="bg")
		THEN 1 ELSE 0 END)'];
	$bgid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bg" OR freshman_interest.act2 = "bg" OR
		freshman_interest.act3 = "bg" OR freshman_interest.act4 = "bg" OR
		freshman_interest.act5 = "bg" OR freshman_interest.act6 = "bg" OR
		freshman_interest.act7 = "bg" OR freshman_interest.act8 = "bg" OR
		freshman_interest.act9 = "bg" OR freshman_interest.act10 = "bg")');
	$t = 0;
	if ($bgcount != 0) {
		do {
			$bghello[$t] = $bgid[$t]['email'];
			$t++;
		} while ($t < $bgcount);
	}
	if ($bgcount != 0) {
		$bgyello = implode(', ', $bghello);
		Mail::sendMail('Peer-to-Peer E-mail List for Tri-M Music National Honor Society', 'Here are the e-mails of the students interested in Tri-M Music National Honor Society:<br>'.$bgyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bg'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bg'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bg'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bg'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bg'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bg'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bg'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bg'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bg'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bg'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['bh'])) {
	$bhcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bh" OR act2="bh" OR
		act3="bh" OR act4="bh" OR act5="bh" OR act6="bh" OR act7="bh" OR 
		act8="bh" OR act9="bh" OR act10="bh")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bh" OR act2="bh" OR
		act3="bh" OR act4="bh" OR act5="bh" OR act6="bh" OR act7="bh" OR 
		act8="bh" OR act9="bh" OR act10="bh")
		THEN 1 ELSE 0 END)'];
	$bhid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bh" OR freshman_interest.act2 = "bh" OR
		freshman_interest.act3 = "bh" OR freshman_interest.act4 = "bh" OR
		freshman_interest.act5 = "bh" OR freshman_interest.act6 = "bh" OR
		freshman_interest.act7 = "bh" OR freshman_interest.act8 = "bh" OR
		freshman_interest.act9 = "bh" OR freshman_interest.act10 = "bh")');
	$t = 0;
	if ($bhcount != 0) {
		do {
			$bhhello[$t] = $bhid[$t]['email'];
			$t++;
		} while ($t < $bhcount);
	}
	if ($bhcount != 0) {
		$bhyello = implode(', ', $bhhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Women\'s Choir', 'Here are the e-mails of the students interested in Women\'s Choir:<br>'.$bhyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bh'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bh'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bh'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bh'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bh'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bh'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bh'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bh'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bh'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bh'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['bi'])) {
	$bicount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bi" OR act2="bi" OR
		act3="bi" OR act4="bi" OR act5="bi" OR act6="bi" OR act7="bi" OR 
		act8="bi" OR act9="bi" OR act10="bi")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bi" OR act2="bi" OR
		act3="bi" OR act4="bi" OR act5="bi" OR act6="bi" OR act7="bi" OR 
		act8="bi" OR act9="bi" OR act10="bi")
		THEN 1 ELSE 0 END)'];
	$biid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bi" OR freshman_interest.act2 = "bi" OR
		freshman_interest.act3 = "bi" OR freshman_interest.act4 = "bi" OR
		freshman_interest.act5 = "bi" OR freshman_interest.act6 = "bi" OR
		freshman_interest.act7 = "bi" OR freshman_interest.act8 = "bi" OR
		freshman_interest.act9 = "bi" OR freshman_interest.act10 = "bi")');
	$t = 0;
	if ($bicount != 0) {
		do {
			$bihello[$t] = $biid[$t]['email'];
			$t++;
		} while ($t < $bicount);
	}
	if ($bicount != 0) {
		$biyello = implode(', ', $bihello);
		Mail::sendMail('Peer-to-Peer E-mail List for Best Buddies', 'Here are the e-mails of the students interested in Best Buddies:<br>'.$biyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bi'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bi'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bi'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bi'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bi'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bi'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bi'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bi'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bi'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bi'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['bj'])) {
	$bjcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bj" OR act2="bj" OR
		act3="bj" OR act4="bj" OR act5="bj" OR act6="bj" OR act7="bj" OR 
		act8="bj" OR act9="bj" OR act10="bj")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bj" OR act2="bj" OR
		act3="bj" OR act4="bj" OR act5="bj" OR act6="bj" OR act7="bj" OR 
		act8="bj" OR act9="bj" OR act10="bj")
		THEN 1 ELSE 0 END)'];
	$bjid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bj" OR freshman_interest.act2 = "bj" OR
		freshman_interest.act3 = "bj" OR freshman_interest.act4 = "bj" OR
		freshman_interest.act5 = "bj" OR freshman_interest.act6 = "bj" OR
		freshman_interest.act7 = "bj" OR freshman_interest.act8 = "bj" OR
		freshman_interest.act9 = "bj" OR freshman_interest.act10 = "bj")');
	$t = 0;
	if ($bjcount != 0) {
		do {
			$bjhello[$t] = $bjid[$t]['email'];
			$t++;
		} while ($t < $bjcount);
	}
	if ($bjcount != 0) {
		$bjyello = implode(', ', $bjhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Environmental Club (SAVE)', 'Here are the e-mails of the students interested in Environmental Club (SAVE):<br>'.$bjyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bj'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bj'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bj'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bj'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bj'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bj'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bj'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bj'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bj'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bj'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['bk'])) {
	$bkcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bk" OR act2="bk" OR
		act3="bk" OR act4="bk" OR act5="bk" OR act6="bk" OR act7="bk" OR 
		act8="bk" OR act9="bk" OR act10="bk")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bk" OR act2="bk" OR
		act3="bk" OR act4="bk" OR act5="bk" OR act6="bk" OR act7="bk" OR 
		act8="bk" OR act9="bk" OR act10="bk")
		THEN 1 ELSE 0 END)'];
	$bkid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bk" OR freshman_interest.act2 = "bk" OR
		freshman_interest.act3 = "bk" OR freshman_interest.act4 = "bk" OR
		freshman_interest.act5 = "bk" OR freshman_interest.act6 = "bk" OR
		freshman_interest.act7 = "bk" OR freshman_interest.act8 = "bk" OR
		freshman_interest.act9 = "bk" OR freshman_interest.act10 = "bk")');
	$t = 0;
	if ($bkcount != 0) {
		do {
			$bkhello[$t] = $bkid[$t]['email'];
			$t++;
		} while ($t < $bkcount);
	}
	if ($bkcount != 0) {
		$bkyello = implode(', ', $bkhello);
		Mail::sendMail('Peer-to-Peer E-mail List for French National Honor Society', 'Here are the e-mails of the students interested in French National Honor Society:<br>'.$bkyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bk'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bk'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bk'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bk'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bk'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bk'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bk'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bk'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bk'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bk'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['bl'])) {
	$blcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bl" OR act2="bl" OR
		act3="bl" OR act4="bl" OR act5="bl" OR act6="bl" OR act7="bl" OR 
		act8="bl" OR act9="bl" OR act10="bl")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bl" OR act2="bl" OR
		act3="bl" OR act4="bl" OR act5="bl" OR act6="bl" OR act7="bl" OR 
		act8="bl" OR act9="bl" OR act10="bl")
		THEN 1 ELSE 0 END)'];
	$blid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bl" OR freshman_interest.act2 = "bl" OR
		freshman_interest.act3 = "bl" OR freshman_interest.act4 = "bl" OR
		freshman_interest.act5 = "bl" OR freshman_interest.act6 = "bl" OR
		freshman_interest.act7 = "bl" OR freshman_interest.act8 = "bl" OR
		freshman_interest.act9 = "bl" OR freshman_interest.act10 = "bl")');
	$t = 0;
	if ($blcount != 0) {
		do {
			$blhello[$t] = $blid[$t]['email'];
			$t++;
		} while ($t < $blcount);
	}
	if ($blcount != 0) {
		$blyello = implode(', ', $blhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Math National Honor Society', 'Here are the e-mails of the students interested in Math National Honor Society:<br>'.$blyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bl'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bl'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bl'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bl'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bl'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bl'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bl'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bl'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bl'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bl'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['bm'])) {
	$bmcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bm" OR act2="bm" OR
		act3="bm" OR act4="bm" OR act5="bm" OR act6="bm" OR act7="bm" OR 
		act8="bm" OR act9="bm" OR act10="bm")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bm" OR act2="bm" OR
		act3="bm" OR act4="bm" OR act5="bm" OR act6="bm" OR act7="bm" OR 
		act8="bm" OR act9="bm" OR act10="bm")
		THEN 1 ELSE 0 END)'];
	$bmid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bm" OR freshman_interest.act2 = "bm" OR
		freshman_interest.act3 = "bm" OR freshman_interest.act4 = "bm" OR
		freshman_interest.act5 = "bm" OR freshman_interest.act6 = "bm" OR
		freshman_interest.act7 = "bm" OR freshman_interest.act8 = "bm" OR
		freshman_interest.act9 = "bm" OR freshman_interest.act10 = "bm")');
	$t = 0;
	if ($bmcount != 0) {
		do {
			$bmhello[$t] = $bmid[$t]['email'];
			$t++;
		} while ($t < $bmcount);
	}
	if ($bmcount != 0) {
		$bmyello = implode(', ', $bmhello);
		Mail::sendMail('Peer-to-Peer E-mail List for National Art Honor Society', 'Here are the e-mails of the students interested in National Art Honor Society:<br>'.$bmyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bm'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bm'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bm'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bm'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bm'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bm'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bm'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bm'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bm'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bm'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['bn'])) {
	$bncount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bn" OR act2="bn" OR
		act3="bn" OR act4="bn" OR act5="bn" OR act6="bn" OR act7="bn" OR 
		act8="bn" OR act9="bn" OR act10="bn")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bn" OR act2="bn" OR
		act3="bn" OR act4="bn" OR act5="bn" OR act6="bn" OR act7="bn" OR 
		act8="bn" OR act9="bn" OR act10="bn")
		THEN 1 ELSE 0 END)'];
	$bnid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bn" OR freshman_interest.act2 = "bn" OR
		freshman_interest.act3 = "bn" OR freshman_interest.act4 = "bn" OR
		freshman_interest.act5 = "bn" OR freshman_interest.act6 = "bn" OR
		freshman_interest.act7 = "bn" OR freshman_interest.act8 = "bn" OR
		freshman_interest.act9 = "bn" OR freshman_interest.act10 = "bn")');
	$t = 0;
	if ($bncount != 0) {
		do {
			$bnhello[$t] = $bnid[$t]['email'];
			$t++;
		} while ($t < $bncount);
	}
	if ($bncount != 0) {
		$bnyello = implode(', ', $bnhello);
		Mail::sendMail('Peer-to-Peer E-mail List for National Latin Honor Society', 'Here are the e-mails of the students interested in National Latin Honor Society:<br>'.$bnyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bn'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bn'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bn'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bn'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bn'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bn'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bn'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bn'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bn'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bn'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['bo'])) {
	$bocount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bo" OR act2="bo" OR
		act3="bo" OR act4="bo" OR act5="bo" OR act6="bo" OR act7="bo" OR 
		act8="bo" OR act9="bo" OR act10="bo")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bo" OR act2="bo" OR
		act3="bo" OR act4="bo" OR act5="bo" OR act6="bo" OR act7="bo" OR 
		act8="bo" OR act9="bo" OR act10="bo")
		THEN 1 ELSE 0 END)'];
	$boid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bo" OR freshman_interest.act2 = "bo" OR
		freshman_interest.act3 = "bo" OR freshman_interest.act4 = "bo" OR
		freshman_interest.act5 = "bo" OR freshman_interest.act6 = "bo" OR
		freshman_interest.act7 = "bo" OR freshman_interest.act8 = "bo" OR
		freshman_interest.act9 = "bo" OR freshman_interest.act10 = "bo")');
	$t = 0;
	if ($bocount != 0) {
		do {
			$bohello[$t] = $boid[$t]['email'];
			$t++;
		} while ($t < $bocount);
	}
	if ($bocount != 0) {
		$boyello = implode(', ', $bohello);
		Mail::sendMail('Peer-to-Peer E-mail List for National Technical Honor Society (NTHS)', 'Here are the e-mails of the students interested in National Technical Honor Society (NTHS):<br>'.$boyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bo'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bo'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bo'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bo'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bo'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bo'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bo'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bo'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bo'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bo'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['bp'])) {
	$bpcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bp" OR act2="bp" OR
		act3="bp" OR act4="bp" OR act5="bp" OR act6="bp" OR act7="bp" OR 
		act8="bp" OR act9="bp" OR act10="bp")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bp" OR act2="bp" OR
		act3="bp" OR act4="bp" OR act5="bp" OR act6="bp" OR act7="bp" OR 
		act8="bp" OR act9="bp" OR act10="bp")
		THEN 1 ELSE 0 END)'];
	$bpid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bp" OR freshman_interest.act2 = "bp" OR
		freshman_interest.act3 = "bp" OR freshman_interest.act4 = "bp" OR
		freshman_interest.act5 = "bp" OR freshman_interest.act6 = "bp" OR
		freshman_interest.act7 = "bp" OR freshman_interest.act8 = "bp" OR
		freshman_interest.act9 = "bp" OR freshman_interest.act10 = "bp")');
	$t = 0;
	if ($bpcount != 0) {
		do {
			$bphello[$t] = $bpid[$t]['email'];
			$t++;
		} while ($t < $bpcount);
	}
	if ($bpcount != 0) {
		$bpyello = implode(', ', $bphello);
		Mail::sendMail('Peer-to-Peer E-mail List for Science National Honor Society', 'Here are the e-mails of the students interested in Science National Honor Society:<br>'.$bpyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bp'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bp'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bp'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bp'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bp'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bp'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bp'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bp'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bp'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bp'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['bq'])) {
	$bqcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bq" OR act2="bq" OR
		act3="bq" OR act4="bq" OR act5="bq" OR act6="bq" OR act7="bq" OR 
		act8="bq" OR act9="bq" OR act10="bq")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bq" OR act2="bq" OR
		act3="bq" OR act4="bq" OR act5="bq" OR act6="bq" OR act7="bq" OR 
		act8="bq" OR act9="bq" OR act10="bq")
		THEN 1 ELSE 0 END)'];
	$bqid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bq" OR freshman_interest.act2 = "bq" OR
		freshman_interest.act3 = "bq" OR freshman_interest.act4 = "bq" OR
		freshman_interest.act5 = "bq" OR freshman_interest.act6 = "bq" OR
		freshman_interest.act7 = "bq" OR freshman_interest.act8 = "bq" OR
		freshman_interest.act9 = "bq" OR freshman_interest.act10 = "bq")');
	$t = 0;
	if ($bqcount != 0) {
		do {
			$bqhello[$t] = $bqid[$t]['email'];
			$t++;
		} while ($t < $bqcount);
	}
	if ($bqcount != 0) {
		$bqyello = implode(', ', $bqhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Tri-M Music National Honor Society (TMNHS)', 'Here are the e-mails of the students interested in Tri-M Music National Honor Society (TMNHS):<br>'.$bqyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bq'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bq'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bq'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bq'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bq'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bq'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bq'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bq'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bq'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bq'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['br'])) {
	$brcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="br" OR act2="br" OR
		act3="br" OR act4="br" OR act5="br" OR act6="br" OR act7="br" OR 
		act8="br" OR act9="br" OR act10="br")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="br" OR act2="br" OR
		act3="br" OR act4="br" OR act5="br" OR act6="br" OR act7="br" OR 
		act8="br" OR act9="br" OR act10="br")
		THEN 1 ELSE 0 END)'];
	$brid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "br" OR freshman_interest.act2 = "br" OR
		freshman_interest.act3 = "br" OR freshman_interest.act4 = "br" OR
		freshman_interest.act5 = "br" OR freshman_interest.act6 = "br" OR
		freshman_interest.act7 = "br" OR freshman_interest.act8 = "br" OR
		freshman_interest.act9 = "br" OR freshman_interest.act10 = "br")');
	$t = 0;
	if ($brcount != 0) {
		do {
			$brhello[$t] = $brid[$t]['email'];
			$t++;
		} while ($t < $brcount);
	}
	if ($brcount != 0) {
		$bryello = implode(', ', $brhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Band', 'Here are the e-mails of the students interested in Band:<br>'.$bryello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'br'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'br'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'br'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'br'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'br'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'br'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'br'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'br'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'br'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'br'));	
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['bs'])) {
	$bscount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bs" OR act2="bs" OR
		act3="bs" OR act4="bs" OR act5="bs" OR act6="bs" OR act7="bs" OR 
		act8="bs" OR act9="bs" OR act10="bs")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bs" OR act2="bs" OR
		act3="bs" OR act4="bs" OR act5="bs" OR act6="bs" OR act7="bs" OR 
		act8="bs" OR act9="bs" OR act10="bs")
		THEN 1 ELSE 0 END)'];
	$bsid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bs" OR freshman_interest.act2 = "bs" OR
		freshman_interest.act3 = "bs" OR freshman_interest.act4 = "bs" OR
		freshman_interest.act5 = "bs" OR freshman_interest.act6 = "bs" OR
		freshman_interest.act7 = "bs" OR freshman_interest.act8 = "bs" OR
		freshman_interest.act9 = "bs" OR freshman_interest.act10 = "bs")');
	$t = 0;
	if ($bscount != 0) {
		do {
			$bshello[$t] = $bsid[$t]['email'];
			$t++;
		} while ($t < $bscount);
	}
	if ($bscount != 0) {
		$bsyello = implode(', ', $bshello);
		Mail::sendMail('Peer-to-Peer E-mail List for Dance', 'Here are the e-mails of the students interested in Dance:<br>'.$bsyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bs'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bs'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bs'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bs'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bs'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bs'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bs'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bs'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bs'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bs'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['bt'])) {
	$btcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bt" OR act2="bt" OR
		act3="bt" OR act4="bt" OR act5="bt" OR act6="bt" OR act7="bt" OR 
		act8="bt" OR act9="bt" OR act10="bt")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bt" OR act2="bt" OR
		act3="bt" OR act4="bt" OR act5="bt" OR act6="bt" OR act7="bt" OR 
		act8="bt" OR act9="bt" OR act10="bt")
		THEN 1 ELSE 0 END)'];
	$btid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bt" OR freshman_interest.act2 = "bt" OR
		freshman_interest.act3 = "bt" OR freshman_interest.act4 = "bt" OR
		freshman_interest.act5 = "bt" OR freshman_interest.act6 = "bt" OR
		freshman_interest.act7 = "bt" OR freshman_interest.act8 = "bt" OR
		freshman_interest.act9 = "bt" OR freshman_interest.act10 = "bt")');
	$t = 0;
	if ($btcount != 0) {
		do {
			$bthello[$t] = $btid[$t]['email'];
			$t++;
		} while ($t < $btcount);
	}
	if ($btcount != 0) {
		$btyello = implode(', ', $bthello);
		Mail::sendMail('Peer-to-Peer E-mail List for Jazz Band', 'Here are the e-mails of the students interested in Jazz Band:<br>'.$btyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bt'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bt'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bt'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bt'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bt'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bt'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bt'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bt'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bt'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bt'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['bu'])) {
	$bucount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bu" OR act2="bu" OR
		act3="bu" OR act4="bu" OR act5="bu" OR act6="bu" OR act7="bu" OR 
		act8="bu" OR act9="bu" OR act10="bu")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bu" OR act2="bu" OR
		act3="bu" OR act4="bu" OR act5="bu" OR act6="bu" OR act7="bu" OR 
		act8="bu" OR act9="bu" OR act10="bu")
		THEN 1 ELSE 0 END)'];
	$buid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bu" OR freshman_interest.act2 = "bu" OR
		freshman_interest.act3 = "bu" OR freshman_interest.act4 = "bu" OR
		freshman_interest.act5 = "bu" OR freshman_interest.act6 = "bu" OR
		freshman_interest.act7 = "bu" OR freshman_interest.act8 = "bu" OR
		freshman_interest.act9 = "bu" OR freshman_interest.act10 = "bu")');
	$t = 0;
	if ($bucount != 0) {
		do {
			$buhello[$t] = $buid[$t]['email'];
			$t++;
		} while ($t < $bucount);
	}
	if ($bucount != 0) {
		$buyello = implode(', ', $buhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Lunch Choir / Concert Choir', 'Here are the e-mails of the students interested in Lunch Choir / Concert Choir:<br>'.$buyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bu'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bu'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bu'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bu'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bu'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bu'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bu'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bu'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bu'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bu'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['bv'])) {
	$bvcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bv" OR act2="bv" OR
		act3="bv" OR act4="bv" OR act5="bv" OR act6="bv" OR act7="bv" OR 
		act8="bv" OR act9="bv" OR act10="bv")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bv" OR act2="bv" OR
		act3="bv" OR act4="bv" OR act5="bv" OR act6="bv" OR act7="bv" OR 
		act8="bv" OR act9="bv" OR act10="bv")
		THEN 1 ELSE 0 END)'];
	$bvid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bv" OR freshman_interest.act2 = "bv" OR
		freshman_interest.act3 = "bv" OR freshman_interest.act4 = "bv" OR
		freshman_interest.act5 = "bv" OR freshman_interest.act6 = "bv" OR
		freshman_interest.act7 = "bv" OR freshman_interest.act8 = "bv" OR
		freshman_interest.act9 = "bv" OR freshman_interest.act10 = "bv")');
	$t = 0;
	if ($bvcount != 0) {
		do {
			$bvhello[$t] = $bvid[$t]['email'];
			$t++;
		} while ($t < $bvcount);
	}
	if ($bvcount != 0) {
		$bvyello = implode(', ', $bvhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Marching Band', 'Here are the e-mails of the students interested in Marching Band:<br>'.$bvyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bv'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bv'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bv'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bv'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bv'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bv'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bv'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bv'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bv'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bv'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['bw'])) {
	$bwcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bw" OR act2="bw" OR
		act3="bw" OR act4="bw" OR act5="bw" OR act6="bw" OR act7="bw" OR 
		act8="bw" OR act9="bw" OR act10="bw")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bw" OR act2="bw" OR
		act3="bw" OR act4="bw" OR act5="bw" OR act6="bw" OR act7="bw" OR 
		act8="bw" OR act9="bw" OR act10="bw")
		THEN 1 ELSE 0 END)'];
	$bwid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bw" OR freshman_interest.act2 = "bw" OR
		freshman_interest.act3 = "bw" OR freshman_interest.act4 = "bw" OR
		freshman_interest.act5 = "bw" OR freshman_interest.act6 = "bw" OR
		freshman_interest.act7 = "bw" OR freshman_interest.act8 = "bw" OR
		freshman_interest.act9 = "bw" OR freshman_interest.act10 = "bw")');
	$t = 0;
	if ($bwcount != 0) {
		do {
			$bwhello[$t] = $bwid[$t]['email'];
			$t++;
		} while ($t < $bwcount);
	}
	if ($bwcount != 0) {
		$bwyello = implode(', ', $bwhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Men\'s Choir', 'Here are the e-mails of the students interested in Men\'s Choir:<br>'.$bwyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bw'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bw'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bw'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bw'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bw'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bw'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bw'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bw'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bw'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bw'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['bx'])) {
	$bxcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bx" OR act2="bx" OR
		act3="bx" OR act4="bx" OR act5="bx" OR act6="bx" OR act7="bx" OR 
		act8="bx" OR act9="bx" OR act10="bx")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bx" OR act2="bx" OR
		act3="bx" OR act4="bx" OR act5="bx" OR act6="bx" OR act7="bx" OR 
		act8="bx" OR act9="bx" OR act10="bx")
		THEN 1 ELSE 0 END)'];
	$bxid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bx" OR freshman_interest.act2 = "bx" OR
		freshman_interest.act3 = "bx" OR freshman_interest.act4 = "bx" OR
		freshman_interest.act5 = "bx" OR freshman_interest.act6 = "bx" OR
		freshman_interest.act7 = "bx" OR freshman_interest.act8 = "bx" OR
		freshman_interest.act9 = "bx" OR freshman_interest.act10 = "bx")');
	$t = 0;
	if ($bxcount != 0) {
		do {
			$bxhello[$t] = $bxid[$t]['email'];
			$t++;
		} while ($t < $bxcount);
	}
	if ($bxcount != 0) {
		$bxyello = implode(', ', $bxhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Orchestra', 'Here are the e-mails of the students interested in Orchestra:<br>'.$bxyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bx'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bx'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bx'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bx'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bx'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bx'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bx'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bx'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bx'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bx'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['by'])) {
	$bycount = database::query('SELECT count(*), SUM(CASE WHEN (act1="by" OR act2="by" OR
		act3="by" OR act4="by" OR act5="by" OR act6="by" OR act7="by" OR 
		act8="by" OR act9="by" OR act10="by")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="by" OR act2="by" OR
		act3="by" OR act4="by" OR act5="by" OR act6="by" OR act7="by" OR 
		act8="by" OR act9="by" OR act10="by")
		THEN 1 ELSE 0 END)'];
	$byid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "by" OR freshman_interest.act2 = "by" OR
		freshman_interest.act3 = "by" OR freshman_interest.act4 = "by" OR
		freshman_interest.act5 = "by" OR freshman_interest.act6 = "by" OR
		freshman_interest.act7 = "by" OR freshman_interest.act8 = "by" OR
		freshman_interest.act9 = "by" OR freshman_interest.act10 = "by")');
	$t = 0;
	if ($bycount != 0) {
		do {
			$byhello[$t] = $byid[$t]['email'];
			$t++;
		} while ($t < $bycount);
	}
	if ($bycount != 0) {
		$byyello = implode(', ', $byhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Step Team', 'Here are the e-mails of the students interested in Step Team:<br>'.$byyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'by'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'by'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'by'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'by'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'by'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'by'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'by'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'by'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'by'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'by'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['bz'])) {
	$bzcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bz" OR act2="bz" OR
		act3="bz" OR act4="bz" OR act5="bz" OR act6="bz" OR act7="bz" OR 
		act8="bz" OR act9="bz" OR act10="bz")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bz" OR act2="bz" OR
		act3="bz" OR act4="bz" OR act5="bz" OR act6="bz" OR act7="bz" OR 
		act8="bz" OR act9="bz" OR act10="bz")
		THEN 1 ELSE 0 END)'];
	$bzid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "bz" OR freshman_interest.act2 = "bz" OR
		freshman_interest.act3 = "bz" OR freshman_interest.act4 = "bz" OR
		freshman_interest.act5 = "bz" OR freshman_interest.act6 = "bz" OR
		freshman_interest.act7 = "bz" OR freshman_interest.act8 = "bz" OR
		freshman_interest.act9 = "bz" OR freshman_interest.act10 = "bz")');
	$t = 0;
	if ($bzcount != 0) {
		do {
			$bzhello[$t] = $bzid[$t]['email'];
			$t++;
		} while ($t < $bzcount);
	}
	if ($bzcount != 0) {
		$bzyello = implode(', ', $bzhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Theater Arts Productions', 'Here are the e-mails of the students interested in Theater Arts Productions:<br>'.$bzyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'bz'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'bz'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'bz'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'bz'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'bz'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'bz'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'bz'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'bz'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'bz'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'bz'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['ca'])) {
	$cacount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ca" OR act2="ca" OR
		act3="ca" OR act4="ca" OR act5="ca" OR act6="ca" OR act7="ca" OR 
		act8="ca" OR act9="ca" OR act10="ca")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ca" OR act2="ca" OR
		act3="ca" OR act4="ca" OR act5="ca" OR act6="ca" OR act7="ca" OR 
		act8="ca" OR act9="ca" OR act10="ca")
		THEN 1 ELSE 0 END)'];
	$caid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ca" OR freshman_interest.act2 = "ca" OR
		freshman_interest.act3 = "ca" OR freshman_interest.act4 = "ca" OR
		freshman_interest.act5 = "ca" OR freshman_interest.act6 = "ca" OR
		freshman_interest.act7 = "ca" OR freshman_interest.act8 = "ca" OR
		freshman_interest.act9 = "ca" OR freshman_interest.act10 = "ca")');
	$t = 0;
	if ($cacount != 0) {
		do {
			$cahello[$t] = $caid[$t]['email'];
			$t++;
		} while ($t < $cacount);
	}
	if ($cacount != 0) {
		$cayello = implode(', ', $cahello);
		Mail::sendMail('Peer-to-Peer E-mail List for Tri-M Music National Honor Society', 'Here are the e-mails of the students interested in Tri-M Music National Honor Society:<br>'.$cayello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ca'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ca'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ca'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ca'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ca'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ca'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ca'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ca'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ca'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ca'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['cb'])) {
	$cbcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cb" OR act2="cb" OR
		act3="cb" OR act4="cb" OR act5="cb" OR act6="cb" OR act7="cb" OR 
		act8="cb" OR act9="cb" OR act10="cb")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cb" OR act2="cb" OR
		act3="cb" OR act4="cb" OR act5="cb" OR act6="cb" OR act7="cb" OR 
		act8="cb" OR act9="cb" OR act10="cb")
		THEN 1 ELSE 0 END)'];
	$cbid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cb" OR freshman_interest.act2 = "cb" OR
		freshman_interest.act3 = "cb" OR freshman_interest.act4 = "cb" OR
		freshman_interest.act5 = "cb" OR freshman_interest.act6 = "cb" OR
		freshman_interest.act7 = "cb" OR freshman_interest.act8 = "cb" OR
		freshman_interest.act9 = "cb" OR freshman_interest.act10 = "cb")');
	$t = 0;
	if ($cbcount != 0) {
		do {
			$cbhello[$t] = $cbid[$t]['email'];
			$t++;
		} while ($t < $cbcount);
	}
	if ($cbcount != 0) {
		$cbyello = implode(', ', $cbhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Women\'s Choir', 'Here are the e-mails of the students interested in Women\'s Choir:<br>'.$cbyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cb'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cb'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cb'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cb'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cb'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cb'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cb'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cb'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cb'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cb'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['cc'])) {
	$cccount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cc" OR act2="cc" OR
		act3="cc" OR act4="cc" OR act5="cc" OR act6="cc" OR act7="cc" OR 
		act8="cc" OR act9="cc" OR act10="cc")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cc" OR act2="cc" OR
		act3="cc" OR act4="cc" OR act5="cc" OR act6="cc" OR act7="cc" OR 
		act8="cc" OR act9="cc" OR act10="cc")
		THEN 1 ELSE 0 END)'];
	$ccid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cc" OR freshman_interest.act2 = "cc" OR
		freshman_interest.act3 = "cc" OR freshman_interest.act4 = "cc" OR
		freshman_interest.act5 = "cc" OR freshman_interest.act6 = "cc" OR
		freshman_interest.act7 = "cc" OR freshman_interest.act8 = "cc" OR
		freshman_interest.act9 = "cc" OR freshman_interest.act10 = "cc")');
	$t = 0;
	if ($cccount != 0) {
		do {
			$cchello[$t] = $ccid[$t]['email'];
			$t++;
		} while ($t < $cccount);
	}
	if ($cccount != 0) {
		$ccyello = implode(', ', $cchello);
		Mail::sendMail('Peer-to-Peer E-mail List for Allied Bowling', 'Here are the e-mails of the students interested in Allied Bowling:<br>'.$ccyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cc'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cc'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cc'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cc'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cc'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cc'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cc'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cc'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cc'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cc'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['cd'])) {
	$cdcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cd" OR act2="cd" OR
		act3="cd" OR act4="cd" OR act5="cd" OR act6="cd" OR act7="cd" OR 
		act8="cd" OR act9="cd" OR act10="cd")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cd" OR act2="cd" OR
		act3="cd" OR act4="cd" OR act5="cd" OR act6="cd" OR act7="cd" OR 
		act8="cd" OR act9="cd" OR act10="cd")
		THEN 1 ELSE 0 END)'];
	$cdid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cd" OR freshman_interest.act2 = "cd" OR
		freshman_interest.act3 = "cd" OR freshman_interest.act4 = "cd" OR
		freshman_interest.act5 = "cd" OR freshman_interest.act6 = "cd" OR
		freshman_interest.act7 = "cd" OR freshman_interest.act8 = "cd" OR
		freshman_interest.act9 = "cd" OR freshman_interest.act10 = "cd")');
	$t = 0;
	if ($cdcount != 0) {
		do {
			$cdhello[$t] = $cdid[$t]['email'];
			$t++;
		} while ($t < $cdcount);
	}
	if ($cdcount != 0) {
		$cdyello = implode(', ', $cdhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Allied Soccer', 'Here are the e-mails of the students interested in Allied Soccer:<br>'.$cdyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cd'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cd'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cd'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cd'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cd'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cd'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cd'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cd'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cd'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cd'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['ce'])) {
	$cecount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ce" OR act2="ce" OR
		act3="ce" OR act4="ce" OR act5="ce" OR act6="ce" OR act7="ce" OR 
		act8="ce" OR act9="ce" OR act10="ce")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ce" OR act2="ce" OR
		act3="ce" OR act4="ce" OR act5="ce" OR act6="ce" OR act7="ce" OR 
		act8="ce" OR act9="ce" OR act10="ce")
		THEN 1 ELSE 0 END)'];
	$ceid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ce" OR freshman_interest.act2 = "ce" OR
		freshman_interest.act3 = "ce" OR freshman_interest.act4 = "ce" OR
		freshman_interest.act5 = "ce" OR freshman_interest.act6 = "ce" OR
		freshman_interest.act7 = "ce" OR freshman_interest.act8 = "ce" OR
		freshman_interest.act9 = "ce" OR freshman_interest.act10 = "ce")');
	$t = 0;
	if ($cecount != 0) {
		do {
			$cehello[$t] = $ceid[$t]['email'];
			$t++;
		} while ($t < $cecount);
	}
	if ($cecount != 0) {
		$ceyello = implode(', ', $cehello);
		Mail::sendMail('Peer-to-Peer E-mail List for Allied Softball', 'Here are the e-mails of the students interested in Allied Softball:<br>'.$ceyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ce'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ce'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ce'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ce'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ce'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ce'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ce'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ce'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ce'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ce'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['cf'])) {
	$cfcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cf" OR act2="cf" OR
		act3="cf" OR act4="cf" OR act5="cf" OR act6="cf" OR act7="cf" OR 
		act8="cf" OR act9="cf" OR act10="cf")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cf" OR act2="cf" OR
		act3="cf" OR act4="cf" OR act5="cf" OR act6="cf" OR act7="cf" OR 
		act8="cf" OR act9="cf" OR act10="cf")
		THEN 1 ELSE 0 END)'];
	$cfid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cf" OR freshman_interest.act2 = "cf" OR
		freshman_interest.act3 = "cf" OR freshman_interest.act4 = "cf" OR
		freshman_interest.act5 = "cf" OR freshman_interest.act6 = "cf" OR
		freshman_interest.act7 = "cf" OR freshman_interest.act8 = "cf" OR
		freshman_interest.act9 = "cf" OR freshman_interest.act10 = "cf")');
	$t = 0;
	if ($cfcount != 0) {
		do {
			$cfhello[$t] = $cfid[$t]['email'];
			$t++;
		} while ($t < $cfcount);
	}
	if ($cfcount != 0) {
		$cfyello = implode(', ', $cfhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Baseball', 'Here are the e-mails of the students interested in Baseball:<br>'.$cfyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cf'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cf'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cf'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cf'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cf'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cf'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cf'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cf'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cf'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cf'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['cg'])) {
	$cgcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cg" OR act2="cg" OR
		act3="cg" OR act4="cg" OR act5="cg" OR act6="cg" OR act7="cg" OR 
		act8="cg" OR act9="cg" OR act10="cg")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cg" OR act2="cg" OR
		act3="cg" OR act4="cg" OR act5="cg" OR act6="cg" OR act7="cg" OR 
		act8="cg" OR act9="cg" OR act10="cg")
		THEN 1 ELSE 0 END)'];
	$cgid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cg" OR freshman_interest.act2 = "cg" OR
		freshman_interest.act3 = "cg" OR freshman_interest.act4 = "cg" OR
		freshman_interest.act5 = "cg" OR freshman_interest.act6 = "cg" OR
		freshman_interest.act7 = "cg" OR freshman_interest.act8 = "cg" OR
		freshman_interest.act9 = "cg" OR freshman_interest.act10 = "cg")');
	$t = 0;
	if ($cgcount != 0) {
		do {
			$cghello[$t] = $cgid[$t]['email'];
			$t++;
		} while ($t < $cgcount);
	}
	if ($cgcount != 0) {
		$cgyello = implode(', ', $cghello);
		Mail::sendMail('Peer-to-Peer E-mail List for Basketball - Boys', 'Here are the e-mails of the students interested in Basketball - Boys:<br>'.$cgyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cg'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cg'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cg'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cg'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cg'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cg'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cg'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cg'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cg'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cg'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['ch'])) {
	$chcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ch" OR act2="ch" OR
		act3="ch" OR act4="ch" OR act5="ch" OR act6="ch" OR act7="ch" OR 
		act8="ch" OR act9="ch" OR act10="ch")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ch" OR act2="ch" OR
		act3="ch" OR act4="ch" OR act5="ch" OR act6="ch" OR act7="ch" OR 
		act8="ch" OR act9="ch" OR act10="ch")
		THEN 1 ELSE 0 END)'];
	$chid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ch" OR freshman_interest.act2 = "ch" OR
		freshman_interest.act3 = "ch" OR freshman_interest.act4 = "ch" OR
		freshman_interest.act5 = "ch" OR freshman_interest.act6 = "ch" OR
		freshman_interest.act7 = "ch" OR freshman_interest.act8 = "ch" OR
		freshman_interest.act9 = "ch" OR freshman_interest.act10 = "ch")');
	$t = 0;
	if ($chcount != 0) {
		do {
			$chhello[$t] = $chid[$t]['email'];
			$t++;
		} while ($t < $chcount);
	}
	if ($chcount != 0) {
		$chyello = implode(', ', $chhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Basketball - Girls', 'Here are the e-mails of the students interested in Basketball - Girls:<br>'.$chyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ch'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ch'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ch'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ch'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ch'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ch'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ch'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ch'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ch'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ch'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['ci'])) {
	$cicount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ci" OR act2="ci" OR
		act3="ci" OR act4="ci" OR act5="ci" OR act6="ci" OR act7="ci" OR 
		act8="ci" OR act9="ci" OR act10="ci")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ci" OR act2="ci" OR
		act3="ci" OR act4="ci" OR act5="ci" OR act6="ci" OR act7="ci" OR 
		act8="ci" OR act9="ci" OR act10="ci")
		THEN 1 ELSE 0 END)'];
	$ciid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ci" OR freshman_interest.act2 = "ci" OR
		freshman_interest.act3 = "ci" OR freshman_interest.act4 = "ci" OR
		freshman_interest.act5 = "ci" OR freshman_interest.act6 = "ci" OR
		freshman_interest.act7 = "ci" OR freshman_interest.act8 = "ci" OR
		freshman_interest.act9 = "ci" OR freshman_interest.act10 = "ci")');
	$t = 0;
	if ($cicount != 0) {
		do {
			$cihello[$t] = $ciid[$t]['email'];
			$t++;
		} while ($t < $cicount);
	}
	if ($cicount != 0) {
		$ciyello = implode(', ', $cihello);
		Mail::sendMail('Peer-to-Peer E-mail List for Boys Lacrosse', 'Here are the e-mails of the students interested in Boys Lacrosse:<br>'.$ciyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ci'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ci'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ci'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ci'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ci'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ci'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ci'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ci'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ci'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ci'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['cj'])) {
	$cjcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cj" OR act2="cj" OR
		act3="cj" OR act4="cj" OR act5="cj" OR act6="cj" OR act7="cj" OR 
		act8="cj" OR act9="cj" OR act10="cj")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cj" OR act2="cj" OR
		act3="cj" OR act4="cj" OR act5="cj" OR act6="cj" OR act7="cj" OR 
		act8="cj" OR act9="cj" OR act10="cj")
		THEN 1 ELSE 0 END)'];
	$cjid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cj" OR freshman_interest.act2 = "cj" OR
		freshman_interest.act3 = "cj" OR freshman_interest.act4 = "cj" OR
		freshman_interest.act5 = "cj" OR freshman_interest.act6 = "cj" OR
		freshman_interest.act7 = "cj" OR freshman_interest.act8 = "cj" OR
		freshman_interest.act9 = "cj" OR freshman_interest.act10 = "cj")');
	$t = 0;
	if ($cjcount != 0) {
		do {
			$cjhello[$t] = $cjid[$t]['email'];
			$t++;
		} while ($t < $cjcount);
	}
	if ($cjcount != 0) {
		$cjyello = implode(', ', $cjhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Boys Soccer', 'Here are the e-mails of the students interested in Boys Soccer:<br>'.$cjyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cj'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cj'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cj'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cj'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cj'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cj'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cj'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cj'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cj'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cj'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['ck'])) {
	$ckcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ck" OR act2="ck" OR
		act3="ck" OR act4="ck" OR act5="ck" OR act6="ck" OR act7="ck" OR 
		act8="ck" OR act9="ck" OR act10="ck")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ck" OR act2="ck" OR
		act3="ck" OR act4="ck" OR act5="ck" OR act6="ck" OR act7="ck" OR 
		act8="ck" OR act9="ck" OR act10="ck")
		THEN 1 ELSE 0 END)'];
	$ckid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ck" OR freshman_interest.act2 = "ck" OR
		freshman_interest.act3 = "ck" OR freshman_interest.act4 = "ck" OR
		freshman_interest.act5 = "ck" OR freshman_interest.act6 = "ck" OR
		freshman_interest.act7 = "ck" OR freshman_interest.act8 = "ck" OR
		freshman_interest.act9 = "ck" OR freshman_interest.act10 = "ck")');
	$t = 0;
	if ($ckcount != 0) {
		do {
			$ckhello[$t] = $ckid[$t]['email'];
			$t++;
		} while ($t < $ckcount);
	}
	if ($ckcount != 0) {
		$ckyello = implode(', ', $ckhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Cheerleading', 'Here are the e-mails of the students interested in Cheerleading:<br>'.$ckyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ck'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ck'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ck'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ck'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ck'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ck'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ck'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ck'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ck'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ck'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['cl'])) {
	$clcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cl" OR act2="cl" OR
		act3="cl" OR act4="cl" OR act5="cl" OR act6="cl" OR act7="cl" OR 
		act8="cl" OR act9="cl" OR act10="cl")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cl" OR act2="cl" OR
		act3="cl" OR act4="cl" OR act5="cl" OR act6="cl" OR act7="cl" OR 
		act8="cl" OR act9="cl" OR act10="cl")
		THEN 1 ELSE 0 END)'];
	$clid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cl" OR freshman_interest.act2 = "cl" OR
		freshman_interest.act3 = "cl" OR freshman_interest.act4 = "cl" OR
		freshman_interest.act5 = "cl" OR freshman_interest.act6 = "cl" OR
		freshman_interest.act7 = "cl" OR freshman_interest.act8 = "cl" OR
		freshman_interest.act9 = "cl" OR freshman_interest.act10 = "cl")');
	$t = 0;
	if ($clcount != 0) {
		do {
			$clhello[$t] = $clid[$t]['email'];
			$t++;
		} while ($t < $clcount);
	}
	if ($clcount != 0) {
		$clyello = implode(', ', $clhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Cross Country', 'Here are the e-mails of the students interested in Cross Country:<br>'.$clyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cl'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cl'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cl'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cl'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cl'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cl'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cl'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cl'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cl'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cl'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['cm'])) {
	$cmcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cm" OR act2="cm" OR
		act3="cm" OR act4="cm" OR act5="cm" OR act6="cm" OR act7="cm" OR 
		act8="cm" OR act9="cm" OR act10="cm")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cm" OR act2="cm" OR
		act3="cm" OR act4="cm" OR act5="cm" OR act6="cm" OR act7="cm" OR 
		act8="cm" OR act9="cm" OR act10="cm")
		THEN 1 ELSE 0 END)'];
	$cmid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cm" OR freshman_interest.act2 = "cm" OR
		freshman_interest.act3 = "cm" OR freshman_interest.act4 = "cm" OR
		freshman_interest.act5 = "cm" OR freshman_interest.act6 = "cm" OR
		freshman_interest.act7 = "cm" OR freshman_interest.act8 = "cm" OR
		freshman_interest.act9 = "cm" OR freshman_interest.act10 = "cm")');
	$t = 0;
	if ($cmcount != 0) {
		do {
			$cmhello[$t] = $cmid[$t]['email'];
			$t++;
		} while ($t < $cmcount);
	}
	if ($cmcount != 0) {
		$cmyello = implode(', ', $cmhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Field Hockey', 'Here are the e-mails of the students interested in Field Hockey:<br>'.$cmyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cm'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cm'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cm'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cm'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cm'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cm'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cm'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cm'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cm'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cm'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['cn'])) {
	$cncount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cn" OR act2="cn" OR
		act3="cn" OR act4="cn" OR act5="cn" OR act6="cn" OR act7="cn" OR 
		act8="cn" OR act9="cn" OR act10="cn")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cn" OR act2="cn" OR
		act3="cn" OR act4="cn" OR act5="cn" OR act6="cn" OR act7="cn" OR 
		act8="cn" OR act9="cn" OR act10="cn")
		THEN 1 ELSE 0 END)'];
	$cnid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cn" OR freshman_interest.act2 = "cn" OR
		freshman_interest.act3 = "cn" OR freshman_interest.act4 = "cn" OR
		freshman_interest.act5 = "cn" OR freshman_interest.act6 = "cn" OR
		freshman_interest.act7 = "cn" OR freshman_interest.act8 = "cn" OR
		freshman_interest.act9 = "cn" OR freshman_interest.act10 = "cn")');
	$t = 0;
	if ($cncount != 0) {
		do {
			$cnhello[$t] = $cnid[$t]['email'];
			$t++;
		} while ($t < $cncount);
	}
	if ($cncount != 0) {
		$cnyello = implode(', ', $cnhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Football', 'Here are the e-mails of the students interested in Football:<br>'.$cnyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cn'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cn'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cn'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cn'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cn'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cn'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cn'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cn'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cn'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cn'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['co'])) {
	$cocount = database::query('SELECT count(*), SUM(CASE WHEN (act1="co" OR act2="co" OR
		act3="co" OR act4="co" OR act5="co" OR act6="co" OR act7="co" OR 
		act8="co" OR act9="co" OR act10="co")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="co" OR act2="co" OR
		act3="co" OR act4="co" OR act5="co" OR act6="co" OR act7="co" OR 
		act8="co" OR act9="co" OR act10="co")
		THEN 1 ELSE 0 END)'];
	$coid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "co" OR freshman_interest.act2 = "co" OR
		freshman_interest.act3 = "co" OR freshman_interest.act4 = "co" OR
		freshman_interest.act5 = "co" OR freshman_interest.act6 = "co" OR
		freshman_interest.act7 = "co" OR freshman_interest.act8 = "co" OR
		freshman_interest.act9 = "co" OR freshman_interest.act10 = "co")');
	$t = 0;
	if ($cocount != 0) {
		do {
			$cohello[$t] = $coid[$t]['email'];
			$t++;
		} while ($t < $cocount);
	}
	if ($cocount != 0) {
		$coyello = implode(', ', $cohello);
		Mail::sendMail('Peer-to-Peer E-mail List for Girls Lacrosse', 'Here are the e-mails of the students interested in Girls Lacrosse:<br>'.$coyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'co'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'co'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'co'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'co'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'co'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'co'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'co'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'co'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'co'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'co'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['cp'])) {
	$cpcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cp" OR act2="cp" OR
		act3="cp" OR act4="cp" OR act5="cp" OR act6="cp" OR act7="cp" OR 
		act8="cp" OR act9="cp" OR act10="cp")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cp" OR act2="cp" OR
		act3="cp" OR act4="cp" OR act5="cp" OR act6="cp" OR act7="cp" OR 
		act8="cp" OR act9="cp" OR act10="cp")
		THEN 1 ELSE 0 END)'];
	$cpid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cp" OR freshman_interest.act2 = "cp" OR
		freshman_interest.act3 = "cp" OR freshman_interest.act4 = "cp" OR
		freshman_interest.act5 = "cp" OR freshman_interest.act6 = "cp" OR
		freshman_interest.act7 = "cp" OR freshman_interest.act8 = "cp" OR
		freshman_interest.act9 = "cp" OR freshman_interest.act10 = "cp")');
	$t = 0;
	if ($cpcount != 0) {
		do {
			$cphello[$t] = $cpid[$t]['email'];
			$t++;
		} while ($t < $cpcount);
	}
	if ($cpcount != 0) {
		$cpyello = implode(', ', $cphello);
		Mail::sendMail('Peer-to-Peer E-mail List for Girls Soccer', 'Here are the e-mails of the students interested in Girls Soccer:<br>'.$cpyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cp'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cp'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cp'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cp'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cp'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cp'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cp'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cp'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cp'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cp'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['cq'])) {
	$cqcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cq" OR act2="cq" OR
		act3="cq" OR act4="cq" OR act5="cq" OR act6="cq" OR act7="cq" OR 
		act8="cq" OR act9="cq" OR act10="cq")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cq" OR act2="cq" OR
		act3="cq" OR act4="cq" OR act5="cq" OR act6="cq" OR act7="cq" OR 
		act8="cq" OR act9="cq" OR act10="cq")
		THEN 1 ELSE 0 END)'];
	$cqid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cq" OR freshman_interest.act2 = "cq" OR
		freshman_interest.act3 = "cq" OR freshman_interest.act4 = "cq" OR
		freshman_interest.act5 = "cq" OR freshman_interest.act6 = "cq" OR
		freshman_interest.act7 = "cq" OR freshman_interest.act8 = "cq" OR
		freshman_interest.act9 = "cq" OR freshman_interest.act10 = "cq")');
	$t = 0;
	if ($cqcount != 0) {
		do {
			$cqhello[$t] = $cqid[$t]['email'];
			$t++;
		} while ($t < $cqcount);
	}
	if ($cqcount != 0) {
		$cqyello = implode(', ', $cqhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Golf', 'Here are the e-mails of the students interested in Golf:<br>'.$cqyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cq'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cq'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cq'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cq'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cq'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cq'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cq'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cq'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cq'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cq'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['cr'])) {
	$crcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cr" OR act2="cr" OR
		act3="cr" OR act4="cr" OR act5="cr" OR act6="cr" OR act7="cr" OR 
		act8="cr" OR act9="cr" OR act10="cr")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cr" OR act2="cr" OR
		act3="cr" OR act4="cr" OR act5="cr" OR act6="cr" OR act7="cr" OR 
		act8="cr" OR act9="cr" OR act10="cr")
		THEN 1 ELSE 0 END)'];
	$crid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cr" OR freshman_interest.act2 = "cr" OR
		freshman_interest.act3 = "cr" OR freshman_interest.act4 = "cr" OR
		freshman_interest.act5 = "cr" OR freshman_interest.act6 = "cr" OR
		freshman_interest.act7 = "cr" OR freshman_interest.act8 = "cr" OR
		freshman_interest.act9 = "cr" OR freshman_interest.act10 = "cr")');
	$t = 0;
	if ($crcount != 0) {
		do {
			$crhello[$t] = $crid[$t]['email'];
			$t++;
		} while ($t < $crcount);
	}
	if ($crcount != 0) {
		$cryello = implode(', ', $crhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Ice Hockey', 'Here are the e-mails of the students interested in Ice Hockey:<br>'.$cryello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cr'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cr'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cr'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cr'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cr'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cr'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cr'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cr'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cr'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cr'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['cs'])) {
	$cscount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cs" OR act2="cs" OR
		act3="cs" OR act4="cs" OR act5="cs" OR act6="cs" OR act7="cs" OR 
		act8="cs" OR act9="cs" OR act10="cs")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cs" OR act2="cs" OR
		act3="cs" OR act4="cs" OR act5="cs" OR act6="cs" OR act7="cs" OR 
		act8="cs" OR act9="cs" OR act10="cs")
		THEN 1 ELSE 0 END)'];
	$csid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cs" OR freshman_interest.act2 = "cs" OR
		freshman_interest.act3 = "cs" OR freshman_interest.act4 = "cs" OR
		freshman_interest.act5 = "cs" OR freshman_interest.act6 = "cs" OR
		freshman_interest.act7 = "cs" OR freshman_interest.act8 = "cs" OR
		freshman_interest.act9 = "cs" OR freshman_interest.act10 = "cs")');
	$t = 0;
	if ($cscount != 0) {
		do {
			$cshello[$t] = $csid[$t]['email'];
			$t++;
		} while ($t < $cscount);
	}
	if ($cscount != 0) {
		$csyello = implode(', ', $cshello);
		Mail::sendMail('Peer-to-Peer E-mail List for Indoor Track', 'Here are the e-mails of the students interested in Indoor Track:<br>'.$csyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cs'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cs'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cs'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cs'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cs'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cs'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cs'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cs'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cs'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cs'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['ct'])) {
	$ctcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ct" OR act2="ct" OR
		act3="ct" OR act4="ct" OR act5="ct" OR act6="ct" OR act7="ct" OR 
		act8="ct" OR act9="ct" OR act10="ct")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ct" OR act2="ct" OR
		act3="ct" OR act4="ct" OR act5="ct" OR act6="ct" OR act7="ct" OR 
		act8="ct" OR act9="ct" OR act10="ct")
		THEN 1 ELSE 0 END)'];
	$ctid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "ct" OR freshman_interest.act2 = "ct" OR
		freshman_interest.act3 = "ct" OR freshman_interest.act4 = "ct" OR
		freshman_interest.act5 = "ct" OR freshman_interest.act6 = "ct" OR
		freshman_interest.act7 = "ct" OR freshman_interest.act8 = "ct" OR
		freshman_interest.act9 = "ct" OR freshman_interest.act10 = "ct")');
	$t = 0;
	if ($ctcount != 0) {
		do {
			$cthello[$t] = $ctid[$t]['email'];
			$t++;
		} while ($t < $ctcount);
	}
	if ($ctcount != 0) {
		$ctyello = implode(', ', $cthello);
		Mail::sendMail('Peer-to-Peer E-mail List for Outdoor Track', 'Here are the e-mails of the students interested in Outdoor Track:<br>'.$ctyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'ct'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'ct'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'ct'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'ct'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'ct'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'ct'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'ct'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'ct'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'ct'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'ct'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['cu'])) {
	$cucount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cu" OR act2="cu" OR
		act3="cu" OR act4="cu" OR act5="cu" OR act6="cu" OR act7="cu" OR 
		act8="cu" OR act9="cu" OR act10="cu")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cu" OR act2="cu" OR
		act3="cu" OR act4="cu" OR act5="cu" OR act6="cu" OR act7="cu" OR 
		act8="cu" OR act9="cu" OR act10="cu")
		THEN 1 ELSE 0 END)'];
	$cuid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cu" OR freshman_interest.act2 = "cu" OR
		freshman_interest.act3 = "cu" OR freshman_interest.act4 = "cu" OR
		freshman_interest.act5 = "cu" OR freshman_interest.act6 = "cu" OR
		freshman_interest.act7 = "cu" OR freshman_interest.act8 = "cu" OR
		freshman_interest.act9 = "cu" OR freshman_interest.act10 = "cu")');
	$t = 0;
	if ($cucount != 0) {
		do {
			$cuhello[$t] = $cuid[$t]['email'];
			$t++;
		} while ($t < $cucount);
	}
	if ($cucount != 0) {
		$cuyello = implode(', ', $cuhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Softball', 'Here are the e-mails of the students interested in Softball:<br>'.$cuyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cu'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cu'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cu'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cu'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cu'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cu'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cu'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cu'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cu'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cu'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['cv'])) {
	$cvcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cv" OR act2="cv" OR
		act3="cv" OR act4="cv" OR act5="cv" OR act6="cv" OR act7="cv" OR 
		act8="cv" OR act9="cv" OR act10="cv")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cv" OR act2="cv" OR
		act3="cv" OR act4="cv" OR act5="cv" OR act6="cv" OR act7="cv" OR 
		act8="cv" OR act9="cv" OR act10="cv")
		THEN 1 ELSE 0 END)'];
	$cvid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cv" OR freshman_interest.act2 = "cv" OR
		freshman_interest.act3 = "cv" OR freshman_interest.act4 = "cv" OR
		freshman_interest.act5 = "cv" OR freshman_interest.act6 = "cv" OR
		freshman_interest.act7 = "cv" OR freshman_interest.act8 = "cv" OR
		freshman_interest.act9 = "cv" OR freshman_interest.act10 = "cv")');
	$t = 0;
	if ($cvcount != 0) {
		do {
			$cvhello[$t] = $cvid[$t]['email'];
			$t++;
		} while ($t < $cvcount);
	}
	if ($cvcount != 0) {
		$cvyello = implode(', ', $cvhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Swim Club', 'Here are the e-mails of the students interested in Swim Club:<br>'.$cvyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cv'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cv'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cv'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cv'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cv'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cv'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cv'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cv'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cv'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cv'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['cw'])) {
	$cwcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cw" OR act2="cw" OR
		act3="cw" OR act4="cw" OR act5="cw" OR act6="cw" OR act7="cw" OR 
		act8="cw" OR act9="cw" OR act10="cw")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cw" OR act2="cw" OR
		act3="cw" OR act4="cw" OR act5="cw" OR act6="cw" OR act7="cw" OR 
		act8="cw" OR act9="cw" OR act10="cw")
		THEN 1 ELSE 0 END)'];
	$cwid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cw" OR freshman_interest.act2 = "cw" OR
		freshman_interest.act3 = "cw" OR freshman_interest.act4 = "cw" OR
		freshman_interest.act5 = "cw" OR freshman_interest.act6 = "cw" OR
		freshman_interest.act7 = "cw" OR freshman_interest.act8 = "cw" OR
		freshman_interest.act9 = "cw" OR freshman_interest.act10 = "cw")');
	$t = 0;
	if ($cwcount != 0) {
		do {
			$cwhello[$t] = $cwid[$t]['email'];
			$t++;
		} while ($t < $cwcount);
	}
	if ($cwcount != 0) {
		$cwyello = implode(', ', $cwhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Table Tennis Club', 'Here are the e-mails of the students interested in Table Tennis Club:<br>'.$cwyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cw'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cw'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cw'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cw'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cw'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cw'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cw'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cw'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cw'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cw'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['cx'])) {
	$cxcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cx" OR act2="cx" OR
		act3="cx" OR act4="cx" OR act5="cx" OR act6="cx" OR act7="cx" OR 
		act8="cx" OR act9="cx" OR act10="cx")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cx" OR act2="cx" OR
		act3="cx" OR act4="cx" OR act5="cx" OR act6="cx" OR act7="cx" OR 
		act8="cx" OR act9="cx" OR act10="cx")
		THEN 1 ELSE 0 END)'];
	$cxid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cx" OR freshman_interest.act2 = "cx" OR
		freshman_interest.act3 = "cx" OR freshman_interest.act4 = "cx" OR
		freshman_interest.act5 = "cx" OR freshman_interest.act6 = "cx" OR
		freshman_interest.act7 = "cx" OR freshman_interest.act8 = "cx" OR
		freshman_interest.act9 = "cx" OR freshman_interest.act10 = "cx")');
	$t = 0;
	if ($cxcount != 0) {
		do {
			$cxhello[$t] = $cxid[$t]['email'];
			$t++;
		} while ($t < $cxcount);
	}
	if ($cxcount != 0) {
		$cxyello = implode(', ', $cxhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Tennis', 'Here are the e-mails of the students interested in Tennis:<br>'.$cxyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cx'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cx'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cx'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cx'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cx'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cx'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cx'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cx'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cx'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cx'));	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['cy'])) {
	$cycount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cy" OR act2="cy" OR
		act3="cy" OR act4="cy" OR act5="cy" OR act6="cy" OR act7="cy" OR 
		act8="cy" OR act9="cy" OR act10="cy")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cy" OR act2="cy" OR
		act3="cy" OR act4="cy" OR act5="cy" OR act6="cy" OR act7="cy" OR 
		act8="cy" OR act9="cy" OR act10="cy")
		THEN 1 ELSE 0 END)'];
	$cyid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cy" OR freshman_interest.act2 = "cy" OR
		freshman_interest.act3 = "cy" OR freshman_interest.act4 = "cy" OR
		freshman_interest.act5 = "cy" OR freshman_interest.act6 = "cy" OR
		freshman_interest.act7 = "cy" OR freshman_interest.act8 = "cy" OR
		freshman_interest.act9 = "cy" OR freshman_interest.act10 = "cy")');
	$t = 0;
	if ($cycount != 0) {
		do {
			$cyhello[$t] = $cyid[$t]['email'];
			$t++;
		} while ($t < $cycount);
	}
	if ($cycount != 0) {
		$cyyello = implode(', ', $cyhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Volleyball', 'Here are the e-mails of the students interested in Volleyball:<br>'.$cyyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cy'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cy'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cy'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cy'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cy'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cy'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cy'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cy'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cy'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cy'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['cz'])) {
	$czcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cz" OR act2="cz" OR
		act3="cz" OR act4="cz" OR act5="cz" OR act6="cz" OR act7="cz" OR 
		act8="cz" OR act9="cz" OR act10="cz")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cz" OR act2="cz" OR
		act3="cz" OR act4="cz" OR act5="cz" OR act6="cz" OR act7="cz" OR 
		act8="cz" OR act9="cz" OR act10="cz")
		THEN 1 ELSE 0 END)'];
	$czid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "cz" OR freshman_interest.act2 = "cz" OR
		freshman_interest.act3 = "cz" OR freshman_interest.act4 = "cz" OR
		freshman_interest.act5 = "cz" OR freshman_interest.act6 = "cz" OR
		freshman_interest.act7 = "cz" OR freshman_interest.act8 = "cz" OR
		freshman_interest.act9 = "cz" OR freshman_interest.act10 = "cz")');
	$t = 0;
	if ($czcount != 0) {
		do {
			$czhello[$t] = $czid[$t]['email'];
			$t++;
		} while ($t < $czcount);
	}
	if ($czcount != 0) {
		$czyello = implode(', ', $czhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Wrestling', 'Here are the e-mails of the students interested in Wrestling:<br>'.$czyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'cz'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'cz'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'cz'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'cz'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'cz'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'cz'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'cz'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'cz'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'cz'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'cz'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['da'])) {
	$dacount = database::query('SELECT count(*), SUM(CASE WHEN (act1="da" OR act2="da" OR
		act3="da" OR act4="da" OR act5="da" OR act6="da" OR act7="da" OR 
		act8="da" OR act9="da" OR act10="da")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="da" OR act2="da" OR
		act3="da" OR act4="da" OR act5="da" OR act6="da" OR act7="da" OR 
		act8="da" OR act9="da" OR act10="da")
		THEN 1 ELSE 0 END)'];
	$daid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "da" OR freshman_interest.act2 = "da" OR
		freshman_interest.act3 = "da" OR freshman_interest.act4 = "da" OR
		freshman_interest.act5 = "da" OR freshman_interest.act6 = "da" OR
		freshman_interest.act7 = "da" OR freshman_interest.act8 = "da" OR
		freshman_interest.act9 = "da" OR freshman_interest.act10 = "da")');
	$t = 0;
	if ($dacount != 0) {
		do {
			$dahello[$t] = $daid[$t]['email'];
			$t++;
		} while ($t < $dacount);
	}
	if ($dacount != 0) {
		$dayello = implode(', ', $dahello);
		Mail::sendMail('Peer-to-Peer E-mail List for Class Board', 'Here are the e-mails of the students interested in Class Board:<br>'.$dayello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'da'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'da'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'da'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'da'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'da'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'da'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'da'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'da'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'da'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'da'));
	} else {
		echo "No requests for this activity.";
	}
}

if(isset($_POST['db'])) {
	$dbcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="db" OR act2="db" OR
		act3="db" OR act4="db" OR act5="db" OR act6="db" OR act7="db" OR 
		act8="db" OR act9="db" OR act10="db")
		THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="db" OR act2="db" OR
		act3="db" OR act4="db" OR act5="db" OR act6="db" OR act7="db" OR 
		act8="db" OR act9="db" OR act10="db")
		THEN 1 ELSE 0 END)'];
	$dbid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
		users.lastName, users.email FROM users, freshman_interest
		WHERE freshman_interest.userid = users.id1
		AND (freshman_interest.act1 = "db" OR freshman_interest.act2 = "db" OR
		freshman_interest.act3 = "db" OR freshman_interest.act4 = "db" OR
		freshman_interest.act5 = "db" OR freshman_interest.act6 = "db" OR
		freshman_interest.act7 = "db" OR freshman_interest.act8 = "db" OR
		freshman_interest.act9 = "db" OR freshman_interest.act10 = "db")');
	$t = 0;
	if ($dbcount != 0) {
		do {
			$dbhello[$t] = $dbid[$t]['email'];
			$t++;
		} while ($t < $dbcount);
	}
	if ($dbcount != 0) {
		$dbyello = implode(', ', $dbhello);
		Mail::sendMail('Peer-to-Peer E-mail List for Executive Board', 'Here are the e-mails of the students interested in Executive Board:<br>'.$dbyello.'', 'joshchoi7572@gmail.com');
		database::query('UPDATE freshman_interest SET act1=NULL WHERE act1=:act1', array(':act1'=>'db'));
		database::query('UPDATE freshman_interest SET act2=NULL WHERE act2=:act2', array(':act2'=>'db'));
		database::query('UPDATE freshman_interest SET act3=NULL WHERE act3=:act3', array(':act3'=>'db'));
		database::query('UPDATE freshman_interest SET act4=NULL WHERE act4=:act4', array(':act4'=>'db'));
		database::query('UPDATE freshman_interest SET act5=NULL WHERE act5=:act5', array(':act5'=>'db'));
		database::query('UPDATE freshman_interest SET act6=NULL WHERE act6=:act6', array(':act6'=>'db'));
		database::query('UPDATE freshman_interest SET act7=NULL WHERE act7=:act7', array(':act7'=>'db'));
		database::query('UPDATE freshman_interest SET act8=NULL WHERE act8=:act8', array(':act8'=>'db'));
		database::query('UPDATE freshman_interest SET act9=NULL WHERE act9=:act9', array(':act9'=>'db'));
		database::query('UPDATE freshman_interest SET act10=NULL WHERE act10=:act10', array(':act10'=>'db'));
	} else {
		echo "No requests for this activity.";
	}
}
?>
<html>
	<head>
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
        height: 50000px;
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
				<center><h1 id='tasksTitle'>Freshman Activity Interest Form - Master</h1></center>
				<p></p>

				<form name="sendemails" action="20.P2P_Master_Account_Freshman_Interest_Survey.php?usernameLogin=<?php echo $loggedInUserId; ?>" method="POST">
				
				<input name="aaabbbccc" type="submit" value="Send emails to all">

				<fieldset><legend>Film Club</legend>
				<?php
					$acount = database::query('SELECT count(*), SUM(CASE WHEN (act1="a" OR act2="a" OR
						act3="a" OR act4="a" OR act5="a" OR act6="a" OR act7="a" OR 
						act8="a" OR act9="a" OR act10="a")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="a" OR act2="a" OR
						act3="a" OR act4="a" OR act5="a" OR act6="a" OR act7="a" OR 
						act8="a" OR act9="a" OR act10="a")
						THEN 1 ELSE 0 END)'];
				if ($acount != 0) {
					if ($acount == 1) {
						echo "<p>There is currently one request for Film Club:<p>";
					} else {
						echo "<p>There are currently ".$acount." requests for Film Club:<p>";
					}
					$aid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
						users.lastName, users.email FROM users, freshman_interest
						WHERE freshman_interest.userid = users.id1
						AND (freshman_interest.act1 = "a" OR freshman_interest.act2 = "a" OR
						freshman_interest.act3 = "a" OR freshman_interest.act4 = "a" OR
						freshman_interest.act5 = "a" OR freshman_interest.act6 = "a" OR
						freshman_interest.act7 = "a" OR freshman_interest.act8 = "a" OR
						freshman_interest.act9 = "a" OR freshman_interest.act10 = "a")');
					foreach ($aid as $a) {
						echo "<a href='7.P2P_Profile.php?usernameLogin=".$a['username']."'>".$a['firstName']." ".$a['lastName']."</a> ~ ".$a['email']."<br>";
					}
				} else {
					echo "<p>None<p>";
				}
				?>
				<br>
				<input name="a" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				</br>

				<fieldset><legend>Improvisation Club</legend>
				<?php
					$bcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="b" OR act2="b" OR
						act3="b" OR act4="b" OR act5="b" OR act6="b" OR act7="b" OR 
						act8="b" OR act9="b" OR act10="b")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="b" OR act2="b" OR
						act3="b" OR act4="b" OR act5="b" OR act6="b" OR act7="b" OR 
						act8="b" OR act9="b" OR act10="b")
						THEN 1 ELSE 0 END)'];
					if ($bcount != 0) {
						if ($bcount == 1) {	
							echo "<p>There is currently one request for Improvisation Club:<p>";
						} else {
							echo "<p>There are currently ".$bcount." requests for Improvisation Club:<p>";
						}
						$bid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "b" OR freshman_interest.act2 = "b" OR
							freshman_interest.act3 = "b" OR freshman_interest.act4 = "b" OR
							freshman_interest.act5 = "b" OR freshman_interest.act6 = "b" OR
							freshman_interest.act7 = "b" OR freshman_interest.act8 = "b" OR
							freshman_interest.act9 = "b" OR freshman_interest.act10 = "b")');
						foreach ($bid as $b) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$b['username']."'>".$b['firstName']." ".$b['lastName']."</a> ~ ".$b['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="b" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>National Art Honor Society (NAHS)</legend>
				<?php
					$ccount = database::query('SELECT count(*), SUM(CASE WHEN (act1="c" OR act2="c" OR
						act3="c" OR act4="c" OR act5="c" OR act6="c" OR act7="c" OR 
						act8="c" OR act9="c" OR act10="c")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="c" OR act2="c" OR
						act3="c" OR act4="c" OR act5="c" OR act6="c" OR act7="c" OR 
						act8="c" OR act9="c" OR act10="c")
						THEN 1 ELSE 0 END)'];
					if ($ccount != 0) {
						if ($ccount == 1) {	
						echo "<p>There is currently one request for National Art Honor Society (NAHS):<p>";
						} else {
							echo "<p>There are currently ".$ccount." requests for National Art Honor Society (NAHS):<p>";
						}
						$cid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "c" OR freshman_interest.act2 = "c" OR
							freshman_interest.act3 = "c" OR freshman_interest.act4 = "c" OR
							freshman_interest.act5 = "c" OR freshman_interest.act6 = "c" OR
							freshman_interest.act7 = "c" OR freshman_interest.act8 = "c" OR
							freshman_interest.act9 = "c" OR freshman_interest.act10 = "c")');
						foreach ($cid as $c) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$c['username']."'>".$c['firstName']." ".$c['lastName']."</a> ~ ".$c['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<button>Send e-mails to Binki McKenna</button>
				</fieldset>
				<br>

				<fieldset><legend>Photography Club</legend>
				<?php
					$dcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="d" OR act2="d" OR
						act3="d" OR act4="d" OR act5="d" OR act6="d" OR act7="d" OR 
						act8="d" OR act9="d" OR act10="d")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="d" OR act2="d" OR
						act3="d" OR act4="d" OR act5="d" OR act6="d" OR act7="d" OR 
						act8="d" OR act9="d" OR act10="d")
						THEN 1 ELSE 0 END)'];
					if ($dcount != 0) {
						if ($dcount == 1) {	
							echo "<p>There is currently one request for Photography Club:<p>";
						} else {
							echo "<p>There are currently ".$dcount." requests for Photography Club:<p>";
						}
						$did = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "d" OR freshman_interest.act2 = "d" OR
							freshman_interest.act3 = "d" OR freshman_interest.act4 = "d" OR
							freshman_interest.act5 = "d" OR freshman_interest.act6 = "d" OR
							freshman_interest.act7 = "d" OR freshman_interest.act8 = "d" OR
							freshman_interest.act9 = "d" OR freshman_interest.act10 = "d")');
						foreach ($did as $d) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$d['username']."'>".$d['firstName']." ".$d['lastName']."</a> ~ ".$d['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<button>Send e-mails to Binki McKenna</button>
				</fieldset>
				<br>

				<fieldset><legend>Theatre Arts Productions</legend>
				<?php
					$ecount = database::query('SELECT count(*), SUM(CASE WHEN (act1="e" OR act2="e" OR
						act3="e" OR act4="e" OR act5="e" OR act6="e" OR act7="e" OR 
						act8="e" OR act9="e" OR act10="e")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="e" OR act2="e" OR
						act3="e" OR act4="e" OR act5="e" OR act6="e" OR act7="e" OR 
						act8="e" OR act9="e" OR act10="e")
						THEN 1 ELSE 0 END)'];
					if ($ecount != 0) {
						if ($ecount == 1) {	
							echo "<p>There is currently one request for Theatre Arts Productions:<p>";
						} else {
							echo "<p>There are currently ".$ecount." requests for Theatre Arts Productions:<p>";
						}
						$eid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "e" OR freshman_interest.act2 = "e" OR
							freshman_interest.act3 = "e" OR freshman_interest.act4 = "e" OR
							freshman_interest.act5 = "e" OR freshman_interest.act6 = "e" OR
							freshman_interest.act7 = "e" OR freshman_interest.act8 = "e" OR
							freshman_interest.act9 = "e" OR freshman_interest.act10 = "e")');
						foreach ($eid as $e) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$e['username']."'>".$e['firstName']." ".$e['lastName']."</a> ~ ".$e['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<button>Send e-mails to Binki McKenna</button>
				</fieldset>
				<br>
				
				<fieldset><legend>Alpha Achievers</legend>
				<?php
					$fcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="f" OR act2="f" OR
						act3="f" OR act4="f" OR act5="f" OR act6="f" OR act7="f" OR 
						act8="f" OR act9="f" OR act10="f")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="f" OR act2="f" OR
						act3="f" OR act4="f" OR act5="f" OR act6="f" OR act7="f" OR 
						act8="f" OR act9="f" OR act10="f")
						THEN 1 ELSE 0 END)'];
					if ($fcount != 0) {
						if ($fcount == 1) {	
							echo "<p>There is currently one request for Alpha Achievers:<p>";
						} else {
							echo "<p>There are currently ".$fcount." requests for Alpha Achievers:<p>";
						}
						$fid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "f" OR freshman_interest.act2 = "f" OR
							freshman_interest.act3 = "f" OR freshman_interest.act4 = "f" OR
							freshman_interest.act5 = "f" OR freshman_interest.act6 = "f" OR
							freshman_interest.act7 = "f" OR freshman_interest.act8 = "f" OR
							freshman_interest.act9 = "f" OR freshman_interest.act10 = "f")');
						foreach ($fid as $f) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$f['username']."'>".$f['firstName']." ".$f['lastName']."</a> ~ ".$f['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="f" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>American Red Cross Club</legend>
				<?php
					$gcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="g" OR act2="g" OR
						act3="g" OR act4="g" OR act5="g" OR act6="g" OR act7="g" OR 
						act8="g" OR act9="g" OR act10="g")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="g" OR act2="g" OR
						act3="g" OR act4="g" OR act5="g" OR act6="g" OR act7="g" OR 
						act8="g" OR act9="g" OR act10="g")
						THEN 1 ELSE 0 END)'];
					if ($gcount != 0) {
						if ($gcount == 1) {	
							echo "<p>There is currently one request for American Red Cross Club:<p>";
						} else {
							echo "<p>There are currently ".$gcount." requests for American Red Cross Club:<p>";
						}
						$gid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "g" OR freshman_interest.act2 = "g" OR
							freshman_interest.act3 = "g" OR freshman_interest.act4 = "g" OR
							freshman_interest.act5 = "g" OR freshman_interest.act6 = "g" OR
							freshman_interest.act7 = "g" OR freshman_interest.act8 = "g" OR
							freshman_interest.act9 = "g" OR freshman_interest.act10 = "g")');
						foreach ($gid as $g) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$g['username']."'>".$g['firstName']." ".$g['lastName']."</a> ~ ".$g['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="g" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Anime Club</legend>
				<?php
					$hcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="h" OR act2="h" OR
						act3="h" OR act4="h" OR act5="h" OR act6="h" OR act7="h" OR 
						act8="h" OR act9="h" OR act10="h")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="h" OR act2="h" OR
						act3="h" OR act4="h" OR act5="h" OR act6="h" OR act7="h" OR 
						act8="h" OR act9="h" OR act10="h")
						THEN 1 ELSE 0 END)'];
					if ($hcount != 0) {
						if ($hcount == 1) {	
							echo "<p>There is currently one request for Anime Club:<p>";
						} else {
							echo "<p>There are currently ".$hcount." requests for Anime Club:<p>";
						}
						$hid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "h" OR freshman_interest.act2 = "h" OR
							freshman_interest.act3 = "h" OR freshman_interest.act4 = "h" OR
							freshman_interest.act5 = "h" OR freshman_interest.act6 = "h" OR
							freshman_interest.act7 = "h" OR freshman_interest.act8 = "h" OR
							freshman_interest.act9 = "h" OR freshman_interest.act10 = "h")');
						foreach ($hid as $h) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$h['username']."'>".$h['firstName']." ".$h['lastName']."</a> ~ ".$h['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="h" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Asian Student Union</legend>
				<?php
					$icount = database::query('SELECT count(*), SUM(CASE WHEN (act1="i" OR act2="i" OR
						act3="i" OR act4="i" OR act5="i" OR act6="i" OR act7="i" OR 
						act8="i" OR act9="i" OR act10="i")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="i" OR act2="i" OR
						act3="i" OR act4="i" OR act5="i" OR act6="i" OR act7="i" OR 
						act8="i" OR act9="i" OR act10="i")
						THEN 1 ELSE 0 END)'];
					if ($icount != 0) {
						if ($icount == 1) {	
							echo "<p>There is currently one request for Asian Student Union:<p>";
						} else {
							echo "<p>There are currently ".$icount." requests for Asian Student Union:<p>";
						}
						$iid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "i" OR freshman_interest.act2 = "i" OR
							freshman_interest.act3 = "i" OR freshman_interest.act4 = "i" OR
							freshman_interest.act5 = "i" OR freshman_interest.act6 = "i" OR
							freshman_interest.act7 = "i" OR freshman_interest.act8 = "i" OR
							freshman_interest.act9 = "i" OR freshman_interest.act10 = "i")');
						foreach ($iid as $i) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$i['username']."'>".$i['firstName']." ".$i['lastName']."</a> ~ ".$i['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="i" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Best Buddies</legend>
				<?php
					$jcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="j" OR act2="j" OR
						act3="j" OR act4="j" OR act5="j" OR act6="j" OR act7="j" OR 
						act8="j" OR act9="j" OR act10="j")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="j" OR act2="j" OR
						act3="j" OR act4="j" OR act5="j" OR act6="j" OR act7="j" OR 
						act8="j" OR act9="j" OR act10="j")
						THEN 1 ELSE 0 END)'];
					if ($jcount != 0) {
						if ($jcount == 1) {	
							echo "<p>There is currently one request for Best Buddies:<p>";
						} else {
							echo "<p>There are currently ".$jcount." requests for Best Buddies:<p>";
						}
						$jid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "j" OR freshman_interest.act2 = "j" OR
							freshman_interest.act3 = "j" OR freshman_interest.act4 = "j" OR
							freshman_interest.act5 = "j" OR freshman_interest.act6 = "j" OR
							freshman_interest.act7 = "j" OR freshman_interest.act8 = "j" OR
							freshman_interest.act9 = "j" OR freshman_interest.act10 = "j")');
						foreach ($jid as $j) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$j['username']."'>".$j['firstName']." ".$j['lastName']."</a> ~ ".$j['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="j" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Black/African Leadership Union (BALU)</legend>
				<?php
					$kcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="k" OR act2="k" OR
						act3="k" OR act4="k" OR act5="k" OR act6="k" OR act7="k" OR 
						act8="k" OR act9="k" OR act10="k")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="k" OR act2="k" OR
						act3="k" OR act4="k" OR act5="k" OR act6="k" OR act7="k" OR 
						act8="k" OR act9="k" OR act10="k")
						THEN 1 ELSE 0 END)'];
					if ($kcount != 0) {
						if ($kcount == 1) {	
							echo "<p>There is currently one request for Black/African Leadership Union (BALU):<p>";
						} else {
							echo "<p>There are currently ".$kcount." requests for Black/African Leadership Union (BALU):<p>";
						}
						$kid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "k" OR freshman_interest.act2 = "k" OR
							freshman_interest.act3 = "k" OR freshman_interest.act4 = "k" OR
							freshman_interest.act5 = "k" OR freshman_interest.act6 = "k" OR
							freshman_interest.act7 = "k" OR freshman_interest.act8 = "k" OR
							freshman_interest.act9 = "k" OR freshman_interest.act10 = "k")');
						foreach ($kid as $k) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$k['username']."'>".$k['firstName']." ".$k['lastName']."</a> ~ ".$k['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="k" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Chess Club</legend>
				<?php
					$lcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="l" OR act2="l" OR
						act3="l" OR act4="l" OR act5="l" OR act6="l" OR act7="l" OR 
						act8="l" OR act9="l" OR act10="l")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="l" OR act2="l" OR
						act3="l" OR act4="l" OR act5="l" OR act6="l" OR act7="l" OR 
						act8="l" OR act9="l" OR act10="l")
						THEN 1 ELSE 0 END)'];
					if ($lcount != 0) {
						if ($lcount == 1) {	
							echo "<p>There is currently one request for Chess Club:<p>";
						} else {
							echo "<p>There are currently ".$lcount." requests for Chess Club:<p>";
						}
						$lid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "l" OR freshman_interest.act2 = "l" OR
							freshman_interest.act3 = "l" OR freshman_interest.act4 = "l" OR
							freshman_interest.act5 = "l" OR freshman_interest.act6 = "l" OR
							freshman_interest.act7 = "l" OR freshman_interest.act8 = "l" OR
							freshman_interest.act9 = "l" OR freshman_interest.act10 = "l")');
						foreach ($lid as $l) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$l['username']."'>".$l['firstName']." ".$l['lastName']."</a> ~ ".$l['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="l" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Culture Club</legend>
				<?php
					$mcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="m" OR act2="m" OR
						act3="m" OR act4="m" OR act5="m" OR act6="m" OR act7="m" OR 
						act8="m" OR act9="m" OR act10="m")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="m" OR act2="m" OR
						act3="m" OR act4="m" OR act5="m" OR act6="m" OR act7="m" OR 
						act8="m" OR act9="m" OR act10="m")
						THEN 1 ELSE 0 END)'];
					if ($mcount != 0) {
						if ($mcount == 1) {	
							echo "<p>There is currently one request for Culture Club:<p>";
						} else {
							echo "<p>There are currently ".$mcount." requests for Culture Club:<p>";
						}
						$mid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "m" OR freshman_interest.act2 = "m" OR
							freshman_interest.act3 = "m" OR freshman_interest.act4 = "m" OR
							freshman_interest.act5 = "m" OR freshman_interest.act6 = "m" OR
							freshman_interest.act7 = "m" OR freshman_interest.act8 = "m" OR
							freshman_interest.act9 = "m" OR freshman_interest.act10 = "m")');
						foreach ($mid as $m) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$m['username']."'>".$m['firstName']." ".$m['lastName']."</a> ~ ".$m['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="m" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>DECA</legend>
				<?php
					$ncount = database::query('SELECT count(*), SUM(CASE WHEN (act1="n" OR act2="n" OR
						act3="n" OR act4="n" OR act5="n" OR act6="n" OR act7="n" OR 
						act8="n" OR act9="n" OR act10="n")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="n" OR act2="n" OR
						act3="n" OR act4="n" OR act5="n" OR act6="n" OR act7="n" OR 
						act8="n" OR act9="n" OR act10="n")
						THEN 1 ELSE 0 END)'];
					if ($ncount != 0) {
						if ($ncount == 1) {	
							echo "<p>There is currently one request for DECA:<p>";
						} else {
							echo "<p>There are currently ".$ncount." requests for DECA:<p>";
						}
						$nid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "n" OR freshman_interest.act2 = "n" OR
							freshman_interest.act3 = "n" OR freshman_interest.act4 = "n" OR
							freshman_interest.act5 = "n" OR freshman_interest.act6 = "n" OR
							freshman_interest.act7 = "n" OR freshman_interest.act8 = "n" OR
							freshman_interest.act9 = "n" OR freshman_interest.act10 = "n")');
						foreach ($nid as $n) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$n['username']."'>".$n['firstName']." ".$n['lastName']."</a> ~ ".$n['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="n" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Delta Scholars</legend>
				<?php
					$ocount = database::query('SELECT count(*), SUM(CASE WHEN (act1="o" OR act2="o" OR
						act3="o" OR act4="o" OR act5="o" OR act6="o" OR act7="o" OR 
						act8="o" OR act9="o" OR act10="o")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="o" OR act2="o" OR
						act3="o" OR act4="o" OR act5="o" OR act6="o" OR act7="o" OR 
						act8="o" OR act9="o" OR act10="o")
						THEN 1 ELSE 0 END)'];
					if ($ocount != 0) {
						if ($ocount == 1) {	
							echo "<p>There is currently one request for Delta Scholars:<p>";
						} else {
							echo "<p>There are currently ".$ocount." requests for Delta Scholars:<p>";
						}
						$oid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "o" OR freshman_interest.act2 = "o" OR
							freshman_interest.act3 = "o" OR freshman_interest.act4 = "o" OR
							freshman_interest.act5 = "o" OR freshman_interest.act6 = "o" OR
							freshman_interest.act7 = "o" OR freshman_interest.act8 = "o" OR
							freshman_interest.act9 = "o" OR freshman_interest.act10 = "o")');
						foreach ($oid as $o) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$o['username']."'>".$o['firstName']." ".$o['lastName']."</a> ~ ".$o['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="o" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Educators Rising</legend>
				<?php
					$pcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="p" OR act2="p" OR
						act3="p" OR act4="p" OR act5="p" OR act6="p" OR act7="p" OR 
						act8="p" OR act9="p" OR act10="p")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="p" OR act2="p" OR
						act3="p" OR act4="p" OR act5="p" OR act6="p" OR act7="p" OR 
						act8="p" OR act9="p" OR act10="p")
						THEN 1 ELSE 0 END)'];
					if ($pcount != 0) {
						if ($pcount == 1) {	
							echo "<p>There is currently one request for Educators Rising:<p>";
						} else {
							echo "<p>There are currently ".$pcount." requests for Educators Rising:<p>";
						}
						$pid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "p" OR freshman_interest.act2 = "p" OR
							freshman_interest.act3 = "p" OR freshman_interest.act4 = "p" OR
							freshman_interest.act5 = "p" OR freshman_interest.act6 = "p" OR
							freshman_interest.act7 = "p" OR freshman_interest.act8 = "p" OR
							freshman_interest.act9 = "p" OR freshman_interest.act10 = "p")');
						foreach ($pid as $p) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$p['username']."'>".$p['firstName']." ".$p['lastName']."</a> ~ ".$p['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="p" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Environmental Club (SAVE)</legend>
				<?php
					$qcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="q" OR act2="q" OR
						act3="q" OR act4="q" OR act5="q" OR act6="q" OR act7="q" OR 
						act8="q" OR act9="q" OR act10="q")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="q" OR act2="q" OR
						act3="q" OR act4="q" OR act5="q" OR act6="q" OR act7="q" OR 
						act8="q" OR act9="q" OR act10="q")
						THEN 1 ELSE 0 END)'];
					if ($qcount != 0) {
						if ($qcount == 1) {	
							echo "<p>There is currently one request for Environmental Club (SAVE):<p>";
						} else {
							echo "<p>There are currently ".$qcount." requests for Environmental Club (SAVE):<p>";
						}
						$qid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "q" OR freshman_interest.act2 = "q" OR
							freshman_interest.act3 = "q" OR freshman_interest.act4 = "q" OR
							freshman_interest.act5 = "q" OR freshman_interest.act6 = "q" OR
							freshman_interest.act7 = "q" OR freshman_interest.act8 = "q" OR
							freshman_interest.act9 = "q" OR freshman_interest.act10 = "q")');
						foreach ($qid as $q) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$q['username']."'>".$q['firstName']." ".$q['lastName']."</a> ~ ".$q['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="q" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Fellowship of Christian Athletes (FCA)</legend>
				<?php
					$rcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="r" OR act2="r" OR
						act3="r" OR act4="r" OR act5="r" OR act6="r" OR act7="r" OR 
						act8="r" OR act9="r" OR act10="r")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="r" OR act2="r" OR
						act3="r" OR act4="r" OR act5="r" OR act6="r" OR act7="r" OR 
						act8="r" OR act9="r" OR act10="r")
						THEN 1 ELSE 0 END)'];
					if ($rcount != 0) {
						if ($rcount == 1) {	
							echo "<p>There is currently one request for Fellowship of Christian Athletes (FCA):<p>";
						} else {
							echo "<p>There are currently ".$rcount." requests for Fellowship of Christian Athletes (FCA):<p>";
						}
						$rid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "r" OR freshman_interest.act2 = "r" OR
							freshman_interest.act3 = "r" OR freshman_interest.act4 = "r" OR
							freshman_interest.act5 = "r" OR freshman_interest.act6 = "r" OR
							freshman_interest.act7 = "r" OR freshman_interest.act8 = "r" OR
							freshman_interest.act9 = "r" OR freshman_interest.act10 = "r")');
						foreach ($rid as $r) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$r['username']."'>".$r['firstName']." ".$r['lastName']."</a> ~ ".$r['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="r" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Film Club</legend>
				<?php
					$scount = database::query('SELECT count(*), SUM(CASE WHEN (act1="s" OR act2="s" OR
						act3="s" OR act4="s" OR act5="s" OR act6="s" OR act7="s" OR 
						act8="s" OR act9="s" OR act10="s")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="s" OR act2="s" OR
						act3="s" OR act4="s" OR act5="s" OR act6="s" OR act7="s" OR 
						act8="s" OR act9="s" OR act10="s")
						THEN 1 ELSE 0 END)'];
					if ($scount != 0) {						
						if ($scount == 1) {	
							echo "<p>There is currently one request for Film Club:<p>";
						} else {
							echo "<p>There are currently ".$scount." requests for Film Club:<p>";
						}
						$sid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "s" OR freshman_interest.act2 = "s" OR
							freshman_interest.act3 = "s" OR freshman_interest.act4 = "s" OR
							freshman_interest.act5 = "s" OR freshman_interest.act6 = "s" OR
							freshman_interest.act7 = "s" OR freshman_interest.act8 = "s" OR
							freshman_interest.act9 = "s" OR freshman_interest.act10 = "s")');
						foreach ($sid as $s) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$s['username']."'>".$s['firstName']." ".$s['lastName']."</a> ~ ".$s['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="s" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>French Club</legend>
				<?php
					$tcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="t" OR act2="t" OR
						act3="t" OR act4="t" OR act5="t" OR act6="t" OR act7="t" OR 
						act8="t" OR act9="t" OR act10="t")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="t" OR act2="t" OR
						act3="t" OR act4="t" OR act5="t" OR act6="t" OR act7="t" OR 
						act8="t" OR act9="t" OR act10="t")
						THEN 1 ELSE 0 END)'];
					if ($tcount != 0) {
						if ($tcount == 1) {	
							echo "<p>There is currently one request for French Club:<p>";
						} else {
							echo "<p>There are currently ".$tcount." requests for French Club:<p>";
						}
						$tid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "t" OR freshman_interest.act2 = "t" OR
							freshman_interest.act3 = "t" OR freshman_interest.act4 = "t" OR
							freshman_interest.act5 = "t" OR freshman_interest.act6 = "t" OR
							freshman_interest.act7 = "t" OR freshman_interest.act8 = "t" OR
							freshman_interest.act9 = "t" OR freshman_interest.act10 = "t")');
						foreach ($tid as $t) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$t['username']."'>".$t['firstName']." ".$t['lastName']."</a> ~ ".$t['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="t" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>French National Honor Society</legend>
				<?php
					$ucount = database::query('SELECT count(*), SUM(CASE WHEN (act1="u" OR act2="u" OR
						act3="u" OR act4="u" OR act5="u" OR act6="u" OR act7="u" OR 
						act8="u" OR act9="u" OR act10="u")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="u" OR act2="u" OR
						act3="u" OR act4="u" OR act5="u" OR act6="u" OR act7="u" OR 
						act8="u" OR act9="u" OR act10="u")
						THEN 1 ELSE 0 END)'];
					if ($ucount != 0) {
						if ($ucount == 1) {	
							echo "<p>There is currently one request for French National Honor Society:<p>";
						} else {
							echo "<p>There are currently ".$ucount." requests for French National Honor Society:<p>";
						}
						$uid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "u" OR freshman_interest.act2 = "u" OR
							freshman_interest.act3 = "u" OR freshman_interest.act4 = "u" OR
							freshman_interest.act5 = "u" OR freshman_interest.act6 = "u" OR
							freshman_interest.act7 = "u" OR freshman_interest.act8 = "u" OR
							freshman_interest.act9 = "u" OR freshman_interest.act10 = "u")');
						foreach ($uid as $u) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$u['username']."'>".$u['firstName']." ".$u['lastName']."</a> ~ ".$u['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="u" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Gator Gaming Club</legend>
				<?php
					$vcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="v" OR act2="v" OR
						act3="v" OR act4="v" OR act5="v" OR act6="v" OR act7="v" OR 
						act8="v" OR act9="v" OR act10="v")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="v" OR act2="v" OR
						act3="v" OR act4="v" OR act5="v" OR act6="v" OR act7="v" OR 
						act8="v" OR act9="v" OR act10="v")
						THEN 1 ELSE 0 END)'];
					if ($vcount != 0) {
						if ($vcount == 1) {	
							echo "<p>There is currently one request for Gator Gaming Club:<p>";
						} else {
							echo "<p>There are currently ".$vcount." requests for Gator Gaming Club:<p>";
						}
						$vid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "v" OR freshman_interest.act2 = "v" OR
							freshman_interest.act3 = "v" OR freshman_interest.act4 = "v" OR
							freshman_interest.act5 = "v" OR freshman_interest.act6 = "v" OR
							freshman_interest.act7 = "v" OR freshman_interest.act8 = "v" OR
							freshman_interest.act9 = "v" OR freshman_interest.act10 = "v")');
						foreach ($vid as $v) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$v['username']."'>".$v['firstName']." ".$v['lastName']."</a> ~ ".$v['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="v" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Gator Guides</legend>
				<?php
					$wcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="w" OR act2="w" OR
						act3="w" OR act4="w" OR act5="w" OR act6="w" OR act7="w" OR 
						act8="w" OR act9="w" OR act10="w")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="w" OR act2="w" OR
						act3="w" OR act4="w" OR act5="w" OR act6="w" OR act7="w" OR 
						act8="w" OR act9="w" OR act10="w")
						THEN 1 ELSE 0 END)'];
					if ($wcount != 0) {
						if ($wcount == 1) {	
							echo "<p>There is currently one request for Gator Guides:<p>";
						} else {
							echo "<p>There are currently ".$wcount." requests for Gator Guides:<p>";
						}
						$wid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "w" OR freshman_interest.act2 = "w" OR
							freshman_interest.act3 = "w" OR freshman_interest.act4 = "w" OR
							freshman_interest.act5 = "w" OR freshman_interest.act6 = "w" OR
							freshman_interest.act7 = "w" OR freshman_interest.act8 = "w" OR
							freshman_interest.act9 = "w" OR freshman_interest.act10 = "w")');
						foreach ($wid as $w) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$w['username']."'>".$w['firstName']." ".$w['lastName']."</a> ~ ".$w['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="w" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Gay-Straight Alliance (GSA)</legend>
				<?php
					$xcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="x" OR act2="x" OR
						act3="x" OR act4="x" OR act5="x" OR act6="x" OR act7="x" OR 
						act8="x" OR act9="x" OR act10="x")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="x" OR act2="x" OR
						act3="x" OR act4="x" OR act5="x" OR act6="x" OR act7="x" OR 
						act8="x" OR act9="x" OR act10="x")
						THEN 1 ELSE 0 END)'];
					if ($xcount != 0) {
						if ($xcount == 1) {	
							echo "<p>There is currently one request for Gay-Straight Alliance (GSA):<p>";
						} else {
							echo "<p>There are currently ".$xcount." requests for Gay-Straight Alliance (GSA):<p>";
						}
						$xid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "x" OR freshman_interest.act2 = "x" OR
							freshman_interest.act3 = "x" OR freshman_interest.act4 = "x" OR
							freshman_interest.act5 = "x" OR freshman_interest.act6 = "x" OR
							freshman_interest.act7 = "x" OR freshman_interest.act8 = "x" OR
							freshman_interest.act9 = "x" OR freshman_interest.act10 = "x")');
						foreach ($xid as $x) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$x['username']."'>".$x['firstName']." ".$x['lastName']."</a> ~ ".$x['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="x" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Global Equality Now (School Girls Unite)</legend>
				<?php
					$ycount = database::query('SELECT count(*), SUM(CASE WHEN (act1="y" OR act2="y" OR
						act3="y" OR act4="y" OR act5="y" OR act6="y" OR act7="y" OR 
						act8="y" OR act9="y" OR act10="y")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="y" OR act2="y" OR
						act3="y" OR act4="y" OR act5="y" OR act6="y" OR act7="y" OR 
						act8="y" OR act9="y" OR act10="y")
						THEN 1 ELSE 0 END)'];
					if ($ycount != 0) {
						if ($ycount == 1) {	
							echo "<p>There is currently one request for Global Equality Now (School Girls Unite):<p>";
						} else {
							echo "<p>There are currently ".$ycount." requests for Global Equality Now (School Girls Unite):<p>";
						}
						$yid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "y" OR freshman_interest.act2 = "y" OR
							freshman_interest.act3 = "y" OR freshman_interest.act4 = "y" OR
							freshman_interest.act5 = "y" OR freshman_interest.act6 = "y" OR
							freshman_interest.act7 = "y" OR freshman_interest.act8 = "y" OR
							freshman_interest.act9 = "y" OR freshman_interest.act10 = "y")');
						foreach ($yid as $y) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$y['username']."'>".$y['firstName']." ".$y['lastName']."</a> ~ ".$y['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="y" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Horizon Club</legend>
				<?php
					$zcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="z" OR act2="z" OR
						act3="z" OR act4="z" OR act5="z" OR act6="z" OR act7="z" OR 
						act8="z" OR act9="z" OR act10="z")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="z" OR act2="z" OR
						act3="z" OR act4="z" OR act5="z" OR act6="z" OR act7="z" OR 
						act8="z" OR act9="z" OR act10="z")
						THEN 1 ELSE 0 END)'];
					if ($zcount != 0) {
						if ($zcount == 1) {	
							echo "<p>There is currently one request for Horizon Club:<p>";
						} else {
							echo "<p>There are currently ".$zcount." requests for Horizon Club:<p>";
						}
						$zid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "z" OR freshman_interest.act2 = "z" OR
							freshman_interest.act3 = "z" OR freshman_interest.act4 = "z" OR
							freshman_interest.act5 = "z" OR freshman_interest.act6 = "z" OR
							freshman_interest.act7 = "z" OR freshman_interest.act8 = "z" OR
							freshman_interest.act9 = "z" OR freshman_interest.act10 = "z")');
						foreach ($zid as $z) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$z['username']."'>".$z['firstName']." ".$z['lastName']."</a> ~ ".$z['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="z" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Ice Hockey Club</legend>
				<?php
					$aacount = database::query('SELECT count(*), SUM(CASE WHEN (act1="aa" OR act2="aa" OR
						act3="aa" OR act4="aa" OR act5="aa" OR act6="aa" OR act7="aa" OR 
						act8="aa" OR act9="aa" OR act10="aa")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="aa" OR act2="aa" OR
						act3="aa" OR act4="aa" OR act5="aa" OR act6="aa" OR act7="aa" OR 
						act8="aa" OR act9="aa" OR act10="aa")
						THEN 1 ELSE 0 END)'];
					if ($aacount != 0) {
						if ($aacount == 1) {	
							echo "<p>There is currently one request for Ice Hockey Club:<p>";
						} else {
							echo "<p>There are currently ".$aacount." requests for Ice Hockey Club:<p>";
						}
						$aaid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "aa" OR freshman_interest.act2 = "aa" OR
							freshman_interest.act3 = "aa" OR freshman_interest.act4 = "aa" OR
							freshman_interest.act5 = "aa" OR freshman_interest.act6 = "aa" OR
							freshman_interest.act7 = "aa" OR freshman_interest.act8 = "aa" OR
							freshman_interest.act9 = "aa" OR freshman_interest.act10 = "aa")');
						foreach ($aaid as $aa) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$aa['username']."'>".$aa['firstName']." ".$aa['lastName']."</a> ~ ".$aa['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="aa" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Improvisation Club</legend>
				<?php
					$abcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ab" OR act2="ab" OR
						act3="ab" OR act4="ab" OR act5="ab" OR act6="ab" OR act7="ab" OR 
						act8="ab" OR act9="ab" OR act10="ab")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ab" OR act2="ab" OR
						act3="ab" OR act4="ab" OR act5="ab" OR act6="ab" OR act7="ab" OR 
						act8="ab" OR act9="ab" OR act10="ab")
						THEN 1 ELSE 0 END)'];
					if ($abcount != 0) {
						if ($abcount == 1) {	
							echo "<p>There is currently one request for Improvisation Club:<p>";
						} else {
							echo "<p>There are currently ".$abcount." requests for Improvisation Club:<p>";
						}
						$abid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "ab" OR freshman_interest.act2 = "ab" OR
							freshman_interest.act3 = "ab" OR freshman_interest.act4 = "ab" OR
							freshman_interest.act5 = "ab" OR freshman_interest.act6 = "ab" OR
							freshman_interest.act7 = "ab" OR freshman_interest.act8 = "ab" OR
							freshman_interest.act9 = "ab" OR freshman_interest.act10 = "ab")');
						foreach ($abid as $ab) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$ab['username']."'>".$ab['firstName']." ".$ab['lastName']."</a> ~ ".$ab['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="ab" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>It's Academic</legend>
				<?php
					$account = database::query('SELECT count(*), SUM(CASE WHEN (act1="ac" OR act2="ac" OR
						act3="ac" OR act4="ac" OR act5="ac" OR act6="ac" OR act7="ac" OR 
						act8="ac" OR act9="ac" OR act10="ac")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ac" OR act2="ac" OR
						act3="ac" OR act4="ac" OR act5="ac" OR act6="ac" OR act7="ac" OR 
						act8="ac" OR act9="ac" OR act10="ac")
						THEN 1 ELSE 0 END)'];
					if ($account != 0) {
						if ($account == 1) {	
							echo "<p>There is currently one request for It's Academic:<p>";
						} else {
							echo "<p>There are currently ".$account." requests for It's Academic:<p>";
						}
						$acid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "ac" OR freshman_interest.act2 = "ac" OR
							freshman_interest.act3 = "ac" OR freshman_interest.act4 = "ac" OR
							freshman_interest.act5 = "ac" OR freshman_interest.act6 = "ac" OR
							freshman_interest.act7 = "ac" OR freshman_interest.act8 = "ac" OR
							freshman_interest.act9 = "ac" OR freshman_interest.act10 = "ac")');
						foreach ($acid as $ac) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$ac['username']."'>".$ac['firstName']." ".$ac['lastName']."</a> ~ ".$ac['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="ac" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Jazz Band</legend>
				<?php
					$adcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ad" OR act2="ad" OR
						act3="ad" OR act4="ad" OR act5="ad" OR act6="ad" OR act7="ad" OR 
						act8="ad" OR act9="ad" OR act10="ad")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ad" OR act2="ad" OR
						act3="ad" OR act4="ad" OR act5="ad" OR act6="ad" OR act7="ad" OR 
						act8="ad" OR act9="ad" OR act10="ad")
						THEN 1 ELSE 0 END)'];
					if ($adcount != 0) {
						if ($adcount == 1) {	
							echo "<p>There is currently one request for Jazz Band:<p>";
						} else {
							echo "<p>There are currently ".$adcount." requests for Jazz Band:<p>";
						}
						$adid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "ad" OR freshman_interest.act2 = "ad" OR
							freshman_interest.act3 = "ad" OR freshman_interest.act4 = "ad" OR
							freshman_interest.act5 = "ad" OR freshman_interest.act6 = "ad" OR
							freshman_interest.act7 = "ad" OR freshman_interest.act8 = "ad" OR
							freshman_interest.act9 = "ad" OR freshman_interest.act10 = "ad")');
						foreach ($adid as $ad) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$ad['username']."'>".$ad['firstName']." ".$ad['lastName']."</a> ~ ".$ad['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="ad" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Le Cercle Francais</legend>
				<?php
					$aecount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ae" OR act2="ae" OR
						act3="ae" OR act4="ae" OR act5="ae" OR act6="ae" OR act7="ae" OR 
						act8="ae" OR act9="ae" OR act10="ae")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ae" OR act2="ae" OR
						act3="ae" OR act4="ae" OR act5="ae" OR act6="ae" OR act7="ae" OR 
						act8="ae" OR act9="ae" OR act10="ae")
						THEN 1 ELSE 0 END)'];
					if ($aecount != 0) {
						if ($aecount == 1) {	
							echo "<p>There is currently one request for Le Cercle Francais:<p>";
						} else {
							echo "<p>There are currently ".$aecount." requests for Le Cercle Francais:<p>";
						}
						$aeid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "ae" OR freshman_interest.act2 = "ae" OR
							freshman_interest.act3 = "ae" OR freshman_interest.act4 = "ae" OR
							freshman_interest.act5 = "ae" OR freshman_interest.act6 = "ae" OR
							freshman_interest.act7 = "ae" OR freshman_interest.act8 = "ae" OR
							freshman_interest.act9 = "ae" OR freshman_interest.act10 = "ae")');
						foreach ($aeid as $ae) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$ae['username']."'>".$ae['firstName']." ".$ae['lastName']."</a> ~ ".$ae['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="ae" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Los Gators Latinos</legend>
				<?php
					$afcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="af" OR act2="af" OR
						act3="af" OR act4="af" OR act5="af" OR act6="af" OR act7="af" OR 
						act8="af" OR act9="af" OR act10="af")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="af" OR act2="af" OR
						act3="af" OR act4="af" OR act5="af" OR act6="af" OR act7="af" OR 
						act8="af" OR act9="af" OR act10="af")
						THEN 1 ELSE 0 END)'];
					if ($afcount != 0) {
						if ($afcount == 1) {	
							echo "<p>There is currently one request for Los Gators Latinos:<p>";
						} else {
							echo "<p>There are currently ".$afcount." requests for Los Gators Latinos:<p>";
						}
						$afid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "af" OR freshman_interest.act2 = "af" OR
							freshman_interest.act3 = "af" OR freshman_interest.act4 = "af" OR
							freshman_interest.act5 = "af" OR freshman_interest.act6 = "af" OR
							freshman_interest.act7 = "af" OR freshman_interest.act8 = "af" OR
							freshman_interest.act9 = "af" OR freshman_interest.act10 = "af")');
						foreach ($afid as $af) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$af['username']."'>".$af['firstName']." ".$af['lastName']."</a> ~ ".$af['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="af" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Lunch Choir / Concert Choir</legend>
				<?php
					$agcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ag" OR act2="ag" OR
						act3="ag" OR act4="ag" OR act5="ag" OR act6="ag" OR act7="ag" OR 
						act8="ag" OR act9="ag" OR act10="ag")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ag" OR act2="ag" OR
						act3="ag" OR act4="ag" OR act5="ag" OR act6="ag" OR act7="ag" OR 
						act8="ag" OR act9="ag" OR act10="ag")
						THEN 1 ELSE 0 END)'];
					if ($agcount != 0) {
						if ($agcount == 1) {	
							echo "<p>There is currently one request for Lunch Choir / Concert Choir:<p>";
						} else {
							echo "<p>There are currently ".$agcount." requests for Lunch Choir / Concert Choir:<p>";
						}
						$agid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "ag" OR freshman_interest.act2 = "ag" OR
							freshman_interest.act3 = "ag" OR freshman_interest.act4 = "ag" OR
							freshman_interest.act5 = "ag" OR freshman_interest.act6 = "ag" OR
							freshman_interest.act7 = "ag" OR freshman_interest.act8 = "ag" OR
							freshman_interest.act9 = "ag" OR freshman_interest.act10 = "ag")');
						foreach ($agid as $ag) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$ag['username']."'>".$ag['firstName']." ".$ag['lastName']."</a> ~ ".$ag['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="ag" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Marching Band</legend>
				<?php
					$ahcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ah" OR act2="ah" OR
						act3="ah" OR act4="ah" OR act5="ah" OR act6="ah" OR act7="ah" OR 
						act8="ah" OR act9="ah" OR act10="ah")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ah" OR act2="ah" OR
						act3="ah" OR act4="ah" OR act5="ah" OR act6="ah" OR act7="ah" OR 
						act8="ah" OR act9="ah" OR act10="ah")
						THEN 1 ELSE 0 END)'];
					if ($ahcount != 0) {
						if ($ahcount == 1) {	
							echo "<p>There is currently one request for Marching Band:<p>";
						} else {
							echo "<p>There are currently ".$ahcount." requests for Marching Band:<p>";
						}
						$ahid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "ah" OR freshman_interest.act2 = "ah" OR
							freshman_interest.act3 = "ah" OR freshman_interest.act4 = "ah" OR
							freshman_interest.act5 = "ah" OR freshman_interest.act6 = "ah" OR
							freshman_interest.act7 = "ah" OR freshman_interest.act8 = "ah" OR
							freshman_interest.act9 = "ah" OR freshman_interest.act10 = "ah")');
						foreach ($ahid as $ah) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$ah['username']."'>".$ah['firstName']." ".$ah['lastName']."</a> ~ ".$ah['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="ah" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Math National Honor Society</legend>
				<?php
					$aicount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ai" OR act2="ai" OR
						act3="ai" OR act4="ai" OR act5="ai" OR act6="ai" OR act7="ai" OR 
						act8="ai" OR act9="ai" OR act10="ai")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ai" OR act2="ai" OR
						act3="ai" OR act4="ai" OR act5="ai" OR act6="ai" OR act7="ai" OR 
						act8="ai" OR act9="ai" OR act10="ai")
						THEN 1 ELSE 0 END)'];
					if ($aicount != 0) {
						if ($aicount == 1) {	
							echo "<p>There is currently one request for Math National Honor Society:<p>";
						} else {
							echo "<p>There are currently ".$aicount." requests for Math National Honor Society:<p>";
						}
						$aiid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "ai" OR freshman_interest.act2 = "ai" OR
							freshman_interest.act3 = "ai" OR freshman_interest.act4 = "ai" OR
							freshman_interest.act5 = "ai" OR freshman_interest.act6 = "ai" OR
							freshman_interest.act7 = "ai" OR freshman_interest.act8 = "ai" OR
							freshman_interest.act9 = "ai" OR freshman_interest.act10 = "ai")');
						foreach ($aiid as $ai) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$ai['username']."'>".$ai['firstName']." ".$ai['lastName']."</a> ~ ".$ai['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="ai" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Math Team</legend>
				<?php
					$ajcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="aj" OR act2="aj" OR
						act3="aj" OR act4="aj" OR act5="aj" OR act6="aj" OR act7="aj" OR 
						act8="aj" OR act9="aj" OR act10="aj")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="aj" OR act2="aj" OR
						act3="aj" OR act4="aj" OR act5="aj" OR act6="aj" OR act7="aj" OR 
						act8="aj" OR act9="aj" OR act10="aj")
						THEN 1 ELSE 0 END)'];
					if ($ajcount != 0) {
						if ($ajcount == 1) {	
							echo "<p>There is currently one request for Math Team:<p>";
						} else {
							echo "<p>There are currently ".$ajcount." requests for Math Team:<p>";
						}
						$ajid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "aj" OR freshman_interest.act2 = "aj" OR
							freshman_interest.act3 = "aj" OR freshman_interest.act4 = "aj" OR
							freshman_interest.act5 = "aj" OR freshman_interest.act6 = "aj" OR
							freshman_interest.act7 = "aj" OR freshman_interest.act8 = "aj" OR
							freshman_interest.act9 = "aj" OR freshman_interest.act10 = "aj")');
						foreach ($ajid as $aj) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$aj['username']."'>".$aj['firstName']." ".$aj['lastName']."</a> ~ ".$aj['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="aj" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Math, Engineering, and Science Achievement (MESA)</legend>
				<?php
					$akcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ak" OR act2="ak" OR
						act3="ak" OR act4="ak" OR act5="ak" OR act6="ak" OR act7="ak" OR 
						act8="ak" OR act9="ak" OR act10="ak")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ak" OR act2="ak" OR
						act3="ak" OR act4="ak" OR act5="ak" OR act6="ak" OR act7="ak" OR 
						act8="ak" OR act9="ak" OR act10="ak")
						THEN 1 ELSE 0 END)'];
					if ($akcount != 0) {
						if ($akcount == 1) {	
							echo "<p>There is currently one request for Math, Engineering, and Science Achievement (MESA):<p>";
						} else {
							echo "<p>There are currently ".$akcount." requests for Math, Engineering, and Science Achievement (MESA):<p>";
						}
						$akid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "ak" OR freshman_interest.act2 = "ak" OR
							freshman_interest.act3 = "ak" OR freshman_interest.act4 = "ak" OR
							freshman_interest.act5 = "ak" OR freshman_interest.act6 = "ak" OR
							freshman_interest.act7 = "ak" OR freshman_interest.act8 = "ak" OR
							freshman_interest.act9 = "ak" OR freshman_interest.act10 = "ak")');
						foreach ($akid as $ak) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$ak['username']."'>".$ak['firstName']." ".$ak['lastName']."</a> ~ ".$ak['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="ak" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Men's Choir</legend>
				<?php
					$alcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="al" OR act2="al" OR
						act3="al" OR act4="al" OR act5="al" OR act6="al" OR act7="al" OR 
						act8="al" OR act9="al" OR act10="al")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="al" OR act2="al" OR
						act3="al" OR act4="al" OR act5="al" OR act6="al" OR act7="al" OR 
						act8="al" OR act9="al" OR act10="al")
						THEN 1 ELSE 0 END)'];
					if ($alcount != 0) {
						if ($alcount == 1) {	
							echo "<p>There is currently one request for Men's Choir:<p>";
						} else {
							echo "<p>There are currently ".$alcount." requests for Men's Choir:<p>";
						}
						$alid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "al" OR freshman_interest.act2 = "al" OR
							freshman_interest.act3 = "al" OR freshman_interest.act4 = "al" OR
							freshman_interest.act5 = "al" OR freshman_interest.act6 = "al" OR
							freshman_interest.act7 = "al" OR freshman_interest.act8 = "al" OR
							freshman_interest.act9 = "al" OR freshman_interest.act10 = "al")');
						foreach ($alid as $al) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$al['username']."'>".$al['firstName']." ".$al['lastName']."</a> ~ ".$al['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="al" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Model United Nations</legend>
				<?php
					$amcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="am" OR act2="am" OR
						act3="am" OR act4="am" OR act5="am" OR act6="am" OR act7="am" OR 
						act8="am" OR act9="am" OR act10="am")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="am" OR act2="am" OR
						act3="am" OR act4="am" OR act5="am" OR act6="am" OR act7="am" OR 
						act8="am" OR act9="am" OR act10="am")
						THEN 1 ELSE 0 END)'];
					if ($amcount != 0) {
						if ($amcount == 1) {	
							echo "<p>There is currently one request for Model United Nations:<p>";
						} else {
							echo "<p>There are currently ".$amcount." requests for Model United Nations:<p>";
						}
						$amid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "am" OR freshman_interest.act2 = "am" OR
							freshman_interest.act3 = "am" OR freshman_interest.act4 = "am" OR
							freshman_interest.act5 = "am" OR freshman_interest.act6 = "am" OR
							freshman_interest.act7 = "am" OR freshman_interest.act8 = "am" OR
							freshman_interest.act9 = "am" OR freshman_interest.act10 = "am")');
						foreach ($amid as $am) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$am['username']."'>".$am['firstName']." ".$am['lastName']."</a> ~ ".$am['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="am" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>National Art Honor Society</legend>
				<?php
					$ancount = database::query('SELECT count(*), SUM(CASE WHEN (act1="an" OR act2="an" OR
						act3="an" OR act4="an" OR act5="an" OR act6="an" OR act7="an" OR 
						act8="an" OR act9="an" OR act10="an")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="an" OR act2="an" OR
						act3="an" OR act4="an" OR act5="an" OR act6="an" OR act7="an" OR 
						act8="an" OR act9="an" OR act10="an")
						THEN 1 ELSE 0 END)'];
					if ($ancount != 0) {
						if ($ancount == 1) {	
							echo "<p>There is currently one request for National Art Honor Society:<p>";
						} else {
							echo "<p>There are currently ".$ancount." requests for National Art Honor Society:<p>";
						}
						$anid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "an" OR freshman_interest.act2 = "an" OR
							freshman_interest.act3 = "an" OR freshman_interest.act4 = "an" OR
							freshman_interest.act5 = "an" OR freshman_interest.act6 = "an" OR
							freshman_interest.act7 = "an" OR freshman_interest.act8 = "an" OR
							freshman_interest.act9 = "an" OR freshman_interest.act10 = "an")');
						foreach ($anid as $an) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$an['username']."'>".$an['firstName']." ".$an['lastName']."</a> ~ ".$an['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="an" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>National Latin Honor Society</legend>
				<?php
					$aocount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ao" OR act2="ao" OR
						act3="ao" OR act4="ao" OR act5="ao" OR act6="ao" OR act7="ao" OR 
						act8="ao" OR act9="ao" OR act10="ao")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ao" OR act2="ao" OR
						act3="ao" OR act4="ao" OR act5="ao" OR act6="ao" OR act7="ao" OR 
						act8="ao" OR act9="ao" OR act10="ao")
						THEN 1 ELSE 0 END)'];
					if ($aocount != 0) {
						if ($aocount == 1) {	
							echo "<p>There is currently one request for National Latin Honor Society:<p>";
						} else {
							echo "<p>There are currently ".$aocount." requests for National Latin Honor Society:<p>";
						}
						$aoid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "ao" OR freshman_interest.act2 = "ao" OR
							freshman_interest.act3 = "ao" OR freshman_interest.act4 = "ao" OR
							freshman_interest.act5 = "ao" OR freshman_interest.act6 = "ao" OR
							freshman_interest.act7 = "ao" OR freshman_interest.act8 = "ao" OR
							freshman_interest.act9 = "ao" OR freshman_interest.act10 = "ao")');
						foreach ($aoid as $ao) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$ao['username']."'>".$ao['firstName']." ".$ao['lastName']."</a> ~ ".$ao['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="ao" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>National Technical Honor Society (NTHS)</legend>
				<?php
					$apcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ap" OR act2="ap" OR
						act3="ap" OR act4="ap" OR act5="ap" OR act6="ap" OR act7="ap" OR 
						act8="ap" OR act9="ap" OR act10="ap")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ap" OR act2="ap" OR
						act3="ap" OR act4="ap" OR act5="ap" OR act6="ap" OR act7="ap" OR 
						act8="ap" OR act9="ap" OR act10="ap")
						THEN 1 ELSE 0 END)'];
					if ($apcount != 0) {
						if ($apcount == 1) {	
							echo "<p>There is currently one request for National Technical Honor Society (NTHS):<p>";
						} else {
							echo "<p>There are currently ".$apcount." requests for National Technical Honor Society (NTHS):<p>";
						}
						$apid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "ap" OR freshman_interest.act2 = "ap" OR
							freshman_interest.act3 = "ap" OR freshman_interest.act4 = "ap" OR
							freshman_interest.act5 = "ap" OR freshman_interest.act6 = "ap" OR
							freshman_interest.act7 = "ap" OR freshman_interest.act8 = "ap" OR
							freshman_interest.act9 = "ap" OR freshman_interest.act10 = "ap")');
						foreach ($apid as $ap) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$ap['username']."'>".$ap['firstName']." ".$ap['lastName']."</a> ~ ".$ap['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="ap" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Orchestra</legend>
				<?php
					$aqcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="aq" OR act2="aq" OR
						act3="aq" OR act4="aq" OR act5="aq" OR act6="aq" OR act7="aq" OR 
						act8="aq" OR act9="aq" OR act10="aq")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="aq" OR act2="aq" OR
						act3="aq" OR act4="aq" OR act5="aq" OR act6="aq" OR act7="aq" OR 
						act8="aq" OR act9="aq" OR act10="aq")
						THEN 1 ELSE 0 END)'];
					if ($aqcount != 0) {
						if ($aqcount == 1) {	
							echo "<p>There is currently one request for Orchestra:<p>";
						} else {
							echo "<p>There are currently ".$aqcount." requests for Orchestra:<p>";
						}
						$aqid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "aq" OR freshman_interest.act2 = "aq" OR
							freshman_interest.act3 = "aq" OR freshman_interest.act4 = "aq" OR
							freshman_interest.act5 = "aq" OR freshman_interest.act6 = "aq" OR
							freshman_interest.act7 = "aq" OR freshman_interest.act8 = "aq" OR
							freshman_interest.act9 = "aq" OR freshman_interest.act10 = "aq")');
						foreach ($aqid as $aq) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$aq['username']."'>".$aq['firstName']." ".$aq['lastName']."</a> ~ ".$aq['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="aq" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Photography Club</legend>
				<?php
					$arcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ar" OR act2="ar" OR
						act3="ar" OR act4="ar" OR act5="ar" OR act6="ar" OR act7="ar" OR 
						act8="ar" OR act9="ar" OR act10="ar")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ar" OR act2="ar" OR
						act3="ar" OR act4="ar" OR act5="ar" OR act6="ar" OR act7="ar" OR 
						act8="ar" OR act9="ar" OR act10="ar")
						THEN 1 ELSE 0 END)'];
					if ($arcount != 0) {
						if ($arcount == 1) {	
							echo "<p>There is currently one request for Photography Club:<p>";
						} else {
							echo "<p>There are currently ".$arcount." requests for Photography Club:<p>";
						}
						$arid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "ar" OR freshman_interest.act2 = "ar" OR
							freshman_interest.act3 = "ar" OR freshman_interest.act4 = "ar" OR
							freshman_interest.act5 = "ar" OR freshman_interest.act6 = "ar" OR
							freshman_interest.act7 = "ar" OR freshman_interest.act8 = "ar" OR
							freshman_interest.act9 = "ar" OR freshman_interest.act10 = "ar")');
						foreach ($arid as $ar) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$ar['username']."'>".$ar['firstName']." ".$ar['lastName']."</a> ~ ".$ar['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="ar" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>RC Model Club</legend>
				<?php
					$ascount = database::query('SELECT count(*), SUM(CASE WHEN (act1="as" OR act2="as" OR
						act3="as" OR act4="as" OR act5="as" OR act6="as" OR act7="as" OR 
						act8="as" OR act9="as" OR act10="as")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="as" OR act2="as" OR
						act3="as" OR act4="as" OR act5="as" OR act6="as" OR act7="as" OR 
						act8="as" OR act9="as" OR act10="as")
						THEN 1 ELSE 0 END)'];
					if ($ascount != 0) {
						if ($ascount == 1) {	
							echo "<p>There is currently one request for RC Model Club:<p>";
						} else {
							echo "<p>There are currently ".$ascount." requests for RC Model Club:<p>";
						}
						$asid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "as" OR freshman_interest.act2 = "as" OR
							freshman_interest.act3 = "as" OR freshman_interest.act4 = "as" OR
							freshman_interest.act5 = "as" OR freshman_interest.act6 = "as" OR
							freshman_interest.act7 = "as" OR freshman_interest.act8 = "as" OR
							freshman_interest.act9 = "as" OR freshman_interest.act10 = "as")');
						foreach ($asid as $as) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$as['username']."'>".$as['firstName']." ".$as['lastName']."</a> ~ ".$as['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="as" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Reservoir Christian Fellowship</legend>
				<?php
					$atcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="at" OR act2="at" OR
						act3="at" OR act4="at" OR act5="at" OR act6="at" OR act7="at" OR 
						act8="at" OR act9="at" OR act10="at")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="at" OR act2="at" OR
						act3="at" OR act4="at" OR act5="at" OR act6="at" OR act7="at" OR 
						act8="at" OR act9="at" OR act10="at")
						THEN 1 ELSE 0 END)'];
					if ($atcount != 0) {
						if ($atcount == 1) {	
							echo "<p>There is currently one request for Reservoir Christian Fellowship:<p>";
						} else {
							echo "<p>There are currently ".$atcount." requests for Reservoir Christian Fellowship:<p>";
						}
						$atid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "at" OR freshman_interest.act2 = "at" OR
							freshman_interest.act3 = "at" OR freshman_interest.act4 = "at" OR
							freshman_interest.act5 = "at" OR freshman_interest.act6 = "at" OR
							freshman_interest.act7 = "at" OR freshman_interest.act8 = "at" OR
							freshman_interest.act9 = "at" OR freshman_interest.act10 = "at")');
						foreach ($atid as $at) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$at['username']."'>".$at['firstName']." ".$at['lastName']."</a> ~ ".$at['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="at" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Reservoir Scholars</legend>
				<?php
					$aucount = database::query('SELECT count(*), SUM(CASE WHEN (act1="au" OR act2="au" OR
						act3="au" OR act4="au" OR act5="au" OR act6="au" OR act7="au" OR 
						act8="au" OR act9="au" OR act10="au")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="au" OR act2="au" OR
						act3="au" OR act4="au" OR act5="au" OR act6="au" OR act7="au" OR 
						act8="au" OR act9="au" OR act10="au")
						THEN 1 ELSE 0 END)'];
					if ($aucount != 0) {
						if ($aucount == 1) {	
							echo "<p>There is currently one request for Reservoir Scholars:<p>";
						} else {
							echo "<p>There are currently ".$aucount." requests for Reservoir Scholars:<p>";
						}
						$auid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "au" OR freshman_interest.act2 = "au" OR
							freshman_interest.act3 = "au" OR freshman_interest.act4 = "au" OR
							freshman_interest.act5 = "au" OR freshman_interest.act6 = "au" OR
							freshman_interest.act7 = "au" OR freshman_interest.act8 = "au" OR
							freshman_interest.act9 = "au" OR freshman_interest.act10 = "au")');
						foreach ($auid as $au) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$au['username']."'>".$au['firstName']." ".$au['lastName']."</a> ~ ".$au['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="au" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Robotics Club</legend>
				<?php
					$avcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="av" OR act2="av" OR
						act3="av" OR act4="av" OR act5="av" OR act6="av" OR act7="av" OR 
						act8="av" OR act9="av" OR act10="av")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="av" OR act2="av" OR
						act3="av" OR act4="av" OR act5="av" OR act6="av" OR act7="av" OR 
						act8="av" OR act9="av" OR act10="av")
						THEN 1 ELSE 0 END)'];
					if ($avcount != 0) {
						if ($avcount == 1) {	
							echo "<p>There is currently one request for Robotics Club:<p>";
						} else {
							echo "<p>There are currently ".$avcount." requests for Robotics Club:<p>";
						}
						$avid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "av" OR freshman_interest.act2 = "av" OR
							freshman_interest.act3 = "av" OR freshman_interest.act4 = "av" OR
							freshman_interest.act5 = "av" OR freshman_interest.act6 = "av" OR
							freshman_interest.act7 = "av" OR freshman_interest.act8 = "av" OR
							freshman_interest.act9 = "av" OR freshman_interest.act10 = "av")');
						foreach ($avid as $av) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$av['username']."'>".$av['firstName']." ".$av['lastName']."</a> ~ ".$av['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="av" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Science National Honor Society</legend>
				<?php
					$awcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="aw" OR act2="aw" OR
						act3="aw" OR act4="aw" OR act5="aw" OR act6="aw" OR act7="aw" OR 
						act8="aw" OR act9="aw" OR act10="aw")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="aw" OR act2="aw" OR
						act3="aw" OR act4="aw" OR act5="aw" OR act6="aw" OR act7="aw" OR 
						act8="aw" OR act9="aw" OR act10="aw")
						THEN 1 ELSE 0 END)'];
					if ($awcount != 0) {
						if ($awcount == 1) {	
							echo "<p>There is currently one request for Science National Honor Society:<p>";
						} else {
							echo "<p>There are currently ".$awcount." requests for Science National Honor Society:<p>";
						}
						$awid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "aw" OR freshman_interest.act2 = "aw" OR
							freshman_interest.act3 = "aw" OR freshman_interest.act4 = "aw" OR
							freshman_interest.act5 = "aw" OR freshman_interest.act6 = "aw" OR
							freshman_interest.act7 = "aw" OR freshman_interest.act8 = "aw" OR
							freshman_interest.act9 = "aw" OR freshman_interest.act10 = "aw")');
						foreach ($awid as $aw) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$aw['username']."'>".$aw['firstName']." ".$aw['lastName']."</a> ~ ".$aw['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="aw" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Science Olympiad</legend>
				<?php
					$axcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ax" OR act2="ax" OR
						act3="ax" OR act4="ax" OR act5="ax" OR act6="ax" OR act7="ax" OR 
						act8="ax" OR act9="ax" OR act10="ax")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ax" OR act2="ax" OR
						act3="ax" OR act4="ax" OR act5="ax" OR act6="ax" OR act7="ax" OR 
						act8="ax" OR act9="ax" OR act10="ax")
						THEN 1 ELSE 0 END)'];
					if ($axcount != 0) {
						if ($axcount == 1) {	
							echo "<p>There is currently one request for Science Olympiad:<p>";
						} else {
							echo "<p>There are currently ".$axcount." requests for Science Olympiad:<p>";
						}
						$axid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "ax" OR freshman_interest.act2 = "ax" OR
							freshman_interest.act3 = "ax" OR freshman_interest.act4 = "ax" OR
							freshman_interest.act5 = "ax" OR freshman_interest.act6 = "ax" OR
							freshman_interest.act7 = "ax" OR freshman_interest.act8 = "ax" OR
							freshman_interest.act9 = "ax" OR freshman_interest.act10 = "ax")');
						foreach ($axid as $ax) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$ax['username']."'>".$ax['firstName']." ".$ax['lastName']."</a> ~ ".$ax['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="ax" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Spanish National Honor Society</legend>
				<?php
					$aycount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ay" OR act2="ay" OR
						act3="ay" OR act4="ay" OR act5="ay" OR act6="ay" OR act7="ay" OR 
						act8="ay" OR act9="ay" OR act10="ay")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ay" OR act2="ay" OR
						act3="ay" OR act4="ay" OR act5="ay" OR act6="ay" OR act7="ay" OR 
						act8="ay" OR act9="ay" OR act10="ay")
						THEN 1 ELSE 0 END)'];
					if ($aycount != 0) {
						if ($aycount == 1) {	
							echo "<p>There is currently one request for Spanish National Honor Society:<p>";
						} else {
							echo "<p>There are currently ".$aycount." requests for Spanish National Honor Society:<p>";
						}
						$ayid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "ay" OR freshman_interest.act2 = "ay" OR
							freshman_interest.act3 = "ay" OR freshman_interest.act4 = "ay" OR
							freshman_interest.act5 = "ay" OR freshman_interest.act6 = "ay" OR
							freshman_interest.act7 = "ay" OR freshman_interest.act8 = "ay" OR
							freshman_interest.act9 = "ay" OR freshman_interest.act10 = "ay")');
						foreach ($ayid as $ay) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$ay['username']."'>".$ay['firstName']." ".$ay['lastName']."</a> ~ ".$ay['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="ay" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Speech and Debate</legend>
				<?php
					$azcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="az" OR act2="az" OR
						act3="az" OR act4="az" OR act5="az" OR act6="az" OR act7="az" OR 
						act8="az" OR act9="az" OR act10="az")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="az" OR act2="az" OR
						act3="az" OR act4="az" OR act5="az" OR act6="az" OR act7="az" OR 
						act8="az" OR act9="az" OR act10="az")
						THEN 1 ELSE 0 END)'];
					if ($azcount != 0) {
						if ($azcount == 1) {	
							echo "<p>There is currently one request for Speech and Debate:<p>";
						} else {
							echo "<p>There are currently ".$azcount." requests for Speech and Debate:<p>";
						}
						$azid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "az" OR freshman_interest.act2 = "az" OR
							freshman_interest.act3 = "az" OR freshman_interest.act4 = "az" OR
							freshman_interest.act5 = "az" OR freshman_interest.act6 = "az" OR
							freshman_interest.act7 = "az" OR freshman_interest.act8 = "az" OR
							freshman_interest.act9 = "az" OR freshman_interest.act10 = "az")');
						foreach ($azid as $az) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$az['username']."'>".$az['firstName']." ".$az['lastName']."</a> ~ ".$az['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="az" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Step Team</legend>
				<?php
					$bacount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ba" OR act2="ba" OR
						act3="ba" OR act4="ba" OR act5="ba" OR act6="ba" OR act7="ba" OR 
						act8="ba" OR act9="ba" OR act10="ba")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ba" OR act2="ba" OR
						act3="ba" OR act4="ba" OR act5="ba" OR act6="ba" OR act7="ba" OR 
						act8="ba" OR act9="ba" OR act10="ba")
						THEN 1 ELSE 0 END)'];
					if ($bacount != 0) {
						if ($bacount == 1) {	
							echo "<p>There is currently one request for Step Team:<p>";
						} else {
							echo "<p>There are currently ".$bacount." requests for Step Team:<p>";
						}
						$baid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "ba" OR freshman_interest.act2 = "ba" OR
							freshman_interest.act3 = "ba" OR freshman_interest.act4 = "ba" OR
							freshman_interest.act5 = "ba" OR freshman_interest.act6 = "ba" OR
							freshman_interest.act7 = "ba" OR freshman_interest.act8 = "ba" OR
							freshman_interest.act9 = "ba" OR freshman_interest.act10 = "ba")');
						foreach ($baid as $ba) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$ba['username']."'>".$ba['firstName']." ".$ba['lastName']."</a> ~ ".$ba['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="ba" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Student Government Association</legend>
				<?php
					$bbcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bb" OR act2="bb" OR
						act3="bb" OR act4="bb" OR act5="bb" OR act6="bb" OR act7="bb" OR 
						act8="bb" OR act9="bb" OR act10="bb")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bb" OR act2="bb" OR
						act3="bb" OR act4="bb" OR act5="bb" OR act6="bb" OR act7="bb" OR 
						act8="bb" OR act9="bb" OR act10="bb")
						THEN 1 ELSE 0 END)'];
					if ($bbcount != 0) {
						if ($bbcount == 1) {	
							echo "<p>There is currently one request for Student Government Association:<p>";
						} else {
							echo "<p>There are currently ".$bbcount." requests for Student Government Association:<p>";
						}
						$bbid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "bb" OR freshman_interest.act2 = "bb" OR
							freshman_interest.act3 = "bb" OR freshman_interest.act4 = "bb" OR
							freshman_interest.act5 = "bb" OR freshman_interest.act6 = "bb" OR
							freshman_interest.act7 = "bb" OR freshman_interest.act8 = "bb" OR
							freshman_interest.act9 = "bb" OR freshman_interest.act10 = "bb")');
						foreach ($bbid as $bb) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$bb['username']."'>".$bb['firstName']." ".$bb['lastName']."</a> ~ ".$bb['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="bb" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Swim Club</legend>
				<?php
					$bccount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bc" OR act2="bc" OR
						act3="bc" OR act4="bc" OR act5="bc" OR act6="bc" OR act7="bc" OR 
						act8="bc" OR act9="bc" OR act10="bc")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bc" OR act2="bc" OR
						act3="bc" OR act4="bc" OR act5="bc" OR act6="bc" OR act7="bc" OR 
						act8="bc" OR act9="bc" OR act10="bc")
						THEN 1 ELSE 0 END)'];
					if ($bccount != 0) {
						if ($bccount == 1) {	
							echo "<p>There is currently one request for Swim Club:<p>";
						} else {
							echo "<p>There are currently ".$bccount." requests for Swim Club:<p>";
						}
						$bcid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "bc" OR freshman_interest.act2 = "bc" OR
							freshman_interest.act3 = "bc" OR freshman_interest.act4 = "bc" OR
							freshman_interest.act5 = "bc" OR freshman_interest.act6 = "bc" OR
							freshman_interest.act7 = "bc" OR freshman_interest.act8 = "bc" OR
							freshman_interest.act9 = "bc" OR freshman_interest.act10 = "bc")');
						foreach ($bcid as $bc) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$bc['username']."'>".$bc['firstName']." ".$bc['lastName']."</a> ~ ".$bc['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="bc" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Table Tennis Club</legend>
				<?php
					$bdcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bd" OR act2="bd" OR
						act3="bd" OR act4="bd" OR act5="bd" OR act6="bd" OR act7="bd" OR 
						act8="bd" OR act9="bd" OR act10="bd")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bd" OR act2="bd" OR
						act3="bd" OR act4="bd" OR act5="bd" OR act6="bd" OR act7="bd" OR 
						act8="bd" OR act9="bd" OR act10="bd")
						THEN 1 ELSE 0 END)'];
					if ($bdcount != 0) {
						if ($bdcount == 1) {	
							echo "<p>There is currently one request for Table Tennis Club:<p>";
						} else {
							echo "<p>There are currently ".$bdcount." requests for Table Tennis Club:<p>";
						}
						$bdid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "bd" OR freshman_interest.act2 = "bd" OR
							freshman_interest.act3 = "bd" OR freshman_interest.act4 = "bd" OR
							freshman_interest.act5 = "bd" OR freshman_interest.act6 = "bd" OR
							freshman_interest.act7 = "bd" OR freshman_interest.act8 = "bd" OR
							freshman_interest.act9 = "bd" OR freshman_interest.act10 = "bd")');
						foreach ($bdid as $bd) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$bd['username']."'>".$bd['firstName']." ".$bd['lastName']."</a> ~ ".$bd['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="bd" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Tea Club</legend>
				<?php
					$becount = database::query('SELECT count(*), SUM(CASE WHEN (act1="be" OR act2="be" OR
						act3="be" OR act4="be" OR act5="be" OR act6="be" OR act7="be" OR 
						act8="be" OR act9="be" OR act10="be")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="be" OR act2="be" OR
						act3="be" OR act4="be" OR act5="be" OR act6="be" OR act7="be" OR 
						act8="be" OR act9="be" OR act10="be")
						THEN 1 ELSE 0 END)'];
					if ($becount != 0) {
						if ($becount == 1) {	
							echo "<p>There is currently one request for Tea Club:<p>";
						} else {
							echo "<p>There are currently ".$becount." requests for Tea Club:<p>";
						}
						$beid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "be" OR freshman_interest.act2 = "be" OR
							freshman_interest.act3 = "be" OR freshman_interest.act4 = "be" OR
							freshman_interest.act5 = "be" OR freshman_interest.act6 = "be" OR
							freshman_interest.act7 = "be" OR freshman_interest.act8 = "be" OR
							freshman_interest.act9 = "be" OR freshman_interest.act10 = "be")');
						foreach ($beid as $be) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$be['username']."'>".$be['firstName']." ".$be['lastName']."</a> ~ ".$be['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="be" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Theatre Arts Productions</legend>
				<?php
					$bfcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bf" OR act2="bf" OR
						act3="bf" OR act4="bf" OR act5="bf" OR act6="bf" OR act7="bf" OR 
						act8="bf" OR act9="bf" OR act10="bf")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bf" OR act2="bf" OR
						act3="bf" OR act4="bf" OR act5="bf" OR act6="bf" OR act7="bf" OR 
						act8="bf" OR act9="bf" OR act10="bf")
						THEN 1 ELSE 0 END)'];
					if ($bfcount != 0) {
						if ($bfcount == 1) {	
							echo "<p>There is currently one request for Theatre Arts Productions:<p>";
						} else {
							echo "<p>There are currently ".$bfcount." requests for Theatre Arts Productions:<p>";
						}
						$bfid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "bf" OR freshman_interest.act2 = "bf" OR
							freshman_interest.act3 = "bf" OR freshman_interest.act4 = "bf" OR
							freshman_interest.act5 = "bf" OR freshman_interest.act6 = "bf" OR
							freshman_interest.act7 = "bf" OR freshman_interest.act8 = "bf" OR
							freshman_interest.act9 = "bf" OR freshman_interest.act10 = "bf")');
						foreach ($bfid as $bf) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$bf['username']."'>".$bf['firstName']." ".$bf['lastName']."</a> ~ ".$bf['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="bf" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Tri-M Music National Honor Society</legend>
				<?php
					$bgcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bg" OR act2="bg" OR
						act3="bg" OR act4="bg" OR act5="bg" OR act6="bg" OR act7="bg" OR 
						act8="bg" OR act9="bg" OR act10="bg")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bg" OR act2="bg" OR
						act3="bg" OR act4="bg" OR act5="bg" OR act6="bg" OR act7="bg" OR 
						act8="bg" OR act9="bg" OR act10="bg")
						THEN 1 ELSE 0 END)'];
					if ($bgcount != 0) {
						if ($bgcount == 1) {	
							echo "<p>There is currently one request for Tri-M Music National Honor Society:<p>";
						} else {
							echo "<p>There are currently ".$bgcount." requests for Tri-M Music National Honor Society:<p>";
						}
						$bgid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "bg" OR freshman_interest.act2 = "bg" OR
							freshman_interest.act3 = "bg" OR freshman_interest.act4 = "bg" OR
							freshman_interest.act5 = "bg" OR freshman_interest.act6 = "bg" OR
							freshman_interest.act7 = "bg" OR freshman_interest.act8 = "bg" OR
							freshman_interest.act9 = "bg" OR freshman_interest.act10 = "bg")');
						foreach ($bgid as $bg) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$bg['username']."'>".$bg['firstName']." ".$bg['lastName']."</a> ~ ".$bg['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="bg" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Women's Choir</legend>
				<?php
					$bhcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bh" OR act2="bh" OR
						act3="bh" OR act4="bh" OR act5="bh" OR act6="bh" OR act7="bh" OR 
						act8="bh" OR act9="bh" OR act10="bh")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bh" OR act2="bh" OR
						act3="bh" OR act4="bh" OR act5="bh" OR act6="bh" OR act7="bh" OR 
						act8="bh" OR act9="bh" OR act10="bh")
						THEN 1 ELSE 0 END)'];
					if ($bhcount != 0) {
						if ($bhcount == 1) {	
							echo "<p>There is currently one request for Women's Choir:<p>";
						} else {
							echo "<p>There are currently ".$bhcount." requests for Women's Choir:<p>";
						}
						$bhid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "bh" OR freshman_interest.act2 = "bh" OR
							freshman_interest.act3 = "bh" OR freshman_interest.act4 = "bh" OR
							freshman_interest.act5 = "bh" OR freshman_interest.act6 = "bh" OR
							freshman_interest.act7 = "bh" OR freshman_interest.act8 = "bh" OR
							freshman_interest.act9 = "bh" OR freshman_interest.act10 = "bh")');
						foreach ($bhid as $bh) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$bh['username']."'>".$bh['firstName']." ".$bh['lastName']."</a> ~ ".$bh['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="bh" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Best Buddies</legend>
				<?php
					$bicount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bi" OR act2="bi" OR
						act3="bi" OR act4="bi" OR act5="bi" OR act6="bi" OR act7="bi" OR 
						act8="bi" OR act9="bi" OR act10="bi")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bi" OR act2="bi" OR
						act3="bi" OR act4="bi" OR act5="bi" OR act6="bi" OR act7="bi" OR 
						act8="bi" OR act9="bi" OR act10="bi")
						THEN 1 ELSE 0 END)'];
					if ($bicount != 0) {
						if ($bicount == 1) {	
							echo "<p>There is currently one request for Best Buddies:<p>";
						} else {
							echo "<p>There are currently ".$bicount." requests for Best Buddies:<p>";
						}
						$biid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "bi" OR freshman_interest.act2 = "bi" OR
							freshman_interest.act3 = "bi" OR freshman_interest.act4 = "bi" OR
							freshman_interest.act5 = "bi" OR freshman_interest.act6 = "bi" OR
							freshman_interest.act7 = "bi" OR freshman_interest.act8 = "bi" OR
							freshman_interest.act9 = "bi" OR freshman_interest.act10 = "bi")');
						foreach ($biid as $bi) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$bi['username']."'>".$bi['firstName']." ".$bi['lastName']."</a> ~ ".$bi['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="bi" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Environmental Club (SAVE)</legend>
				<?php
					$bjcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bj" OR act2="bj" OR
						act3="bj" OR act4="bj" OR act5="bj" OR act6="bj" OR act7="bj" OR 
						act8="bj" OR act9="bj" OR act10="bj")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bj" OR act2="bj" OR
						act3="bj" OR act4="bj" OR act5="bj" OR act6="bj" OR act7="bj" OR 
						act8="bj" OR act9="bj" OR act10="bj")
						THEN 1 ELSE 0 END)'];
					if ($bjcount != 0) {
						if ($bjcount == 1) {	
							echo "<p>There is currently one request for Environmental Club (SAVE):<p>";
						} else {
							echo "<p>There are currently ".$bjcount." requests for Environmental Club (SAVE):<p>";
						}
						$bjid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "bj" OR freshman_interest.act2 = "bj" OR
							freshman_interest.act3 = "bj" OR freshman_interest.act4 = "bj" OR
							freshman_interest.act5 = "bj" OR freshman_interest.act6 = "bj" OR
							freshman_interest.act7 = "bj" OR freshman_interest.act8 = "bj" OR
							freshman_interest.act9 = "bj" OR freshman_interest.act10 = "bj")');
						foreach ($bjid as $bj) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$bj['username']."'>".$bj['firstName']." ".$bj['lastName']."</a> ~ ".$bj['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="bj" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>French National Honor Society</legend>
				<?php
					$bkcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bk" OR act2="bk" OR
						act3="bk" OR act4="bk" OR act5="bk" OR act6="bk" OR act7="bk" OR 
						act8="bk" OR act9="bk" OR act10="bk")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bk" OR act2="bk" OR
						act3="bk" OR act4="bk" OR act5="bk" OR act6="bk" OR act7="bk" OR 
						act8="bk" OR act9="bk" OR act10="bk")
						THEN 1 ELSE 0 END)'];
					if ($bkcount != 0) {
						if ($bkcount == 1) {	
							echo "<p>There is currently one request for French National Honor Society:<p>";
						} else {
							echo "<p>There are currently ".$bkcount." requests for French National Honor Society:<p>";
						}
						$bkid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "bk" OR freshman_interest.act2 = "bk" OR
							freshman_interest.act3 = "bk" OR freshman_interest.act4 = "bk" OR
							freshman_interest.act5 = "bk" OR freshman_interest.act6 = "bk" OR
							freshman_interest.act7 = "bk" OR freshman_interest.act8 = "bk" OR
							freshman_interest.act9 = "bk" OR freshman_interest.act10 = "bk")');
						foreach ($bkid as $bk) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$bk['username']."'>".$bk['firstName']." ".$bk['lastName']."</a> ~ ".$bk['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="bk" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Math National Honor Society</legend>
				<?php
					$blcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bl" OR act2="bl" OR
						act3="bl" OR act4="bl" OR act5="bl" OR act6="bl" OR act7="bl" OR 
						act8="bl" OR act9="bl" OR act10="bl")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bl" OR act2="bl" OR
						act3="bl" OR act4="bl" OR act5="bl" OR act6="bl" OR act7="bl" OR 
						act8="bl" OR act9="bl" OR act10="bl")
						THEN 1 ELSE 0 END)'];
					if ($blcount != 0) {
						if ($blcount == 1) {	
							echo "<p>There is currently one request for Math National Honor Society:<p>";
						} else {
							echo "<p>There are currently ".$blcount." requests for Math National Honor Society:<p>";
						}
						$blid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "bl" OR freshman_interest.act2 = "bl" OR
							freshman_interest.act3 = "bl" OR freshman_interest.act4 = "bl" OR
							freshman_interest.act5 = "bl" OR freshman_interest.act6 = "bl" OR
							freshman_interest.act7 = "bl" OR freshman_interest.act8 = "bl" OR
							freshman_interest.act9 = "bl" OR freshman_interest.act10 = "bl")');
						foreach ($blid as $bl) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$bl['username']."'>".$bl['firstName']." ".$bl['lastName']."</a> ~ ".$bl['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="bl" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>National Art Honor Society</legend>
				<?php
					$bmcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bm" OR act2="bm" OR
						act3="bm" OR act4="bm" OR act5="bm" OR act6="bm" OR act7="bm" OR 
						act8="bm" OR act9="bm" OR act10="bm")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bm" OR act2="bm" OR
						act3="bm" OR act4="bm" OR act5="bm" OR act6="bm" OR act7="bm" OR 
						act8="bm" OR act9="bm" OR act10="bm")
						THEN 1 ELSE 0 END)'];
					if ($bmcount != 0) {
						if ($bmcount == 1) {	
							echo "<p>There is currently one request for National Art Honor Society:<p>";
						} else {
							echo "<p>There are currently ".$bmcount." requests for National Art Honor Society:<p>";
						}
						$bmid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "bm" OR freshman_interest.act2 = "bm" OR
							freshman_interest.act3 = "bm" OR freshman_interest.act4 = "bm" OR
							freshman_interest.act5 = "bm" OR freshman_interest.act6 = "bm" OR
							freshman_interest.act7 = "bm" OR freshman_interest.act8 = "bm" OR
							freshman_interest.act9 = "bm" OR freshman_interest.act10 = "bm")');
						foreach ($bmid as $bm) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$bm['username']."'>".$bm['firstName']." ".$bm['lastName']."</a> ~ ".$bm['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="bm" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>National Latin Honor Society</legend>
				<?php
					$bncount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bn" OR act2="bn" OR
						act3="bn" OR act4="bn" OR act5="bn" OR act6="bn" OR act7="bn" OR 
						act8="bn" OR act9="bn" OR act10="bn")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bn" OR act2="bn" OR
						act3="bn" OR act4="bn" OR act5="bn" OR act6="bn" OR act7="bn" OR 
						act8="bn" OR act9="bn" OR act10="bn")
						THEN 1 ELSE 0 END)'];
					if ($bncount != 0) {
						if ($bncount == 1) {	
							echo "<p>There is currently one request for National Latin Honor Society:<p>";
						} else {
							echo "<p>There are currently ".$bncount." requests for National Latin Honor Society:<p>";
						}
						$bnid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "bn" OR freshman_interest.act2 = "bn" OR
							freshman_interest.act3 = "bn" OR freshman_interest.act4 = "bn" OR
							freshman_interest.act5 = "bn" OR freshman_interest.act6 = "bn" OR
							freshman_interest.act7 = "bn" OR freshman_interest.act8 = "bn" OR
							freshman_interest.act9 = "bn" OR freshman_interest.act10 = "bn")');
						foreach ($bnid as $bn) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$bn['username']."'>".$bn['firstName']." ".$bn['lastName']."</a> ~ ".$bn['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="bn" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>National Technical Honor Society (NTHS)</legend>
				<?php
					$bocount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bo" OR act2="bo" OR
						act3="bo" OR act4="bo" OR act5="bo" OR act6="bo" OR act7="bo" OR 
						act8="bo" OR act9="bo" OR act10="bo")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bo" OR act2="bo" OR
						act3="bo" OR act4="bo" OR act5="bo" OR act6="bo" OR act7="bo" OR 
						act8="bo" OR act9="bo" OR act10="bo")
						THEN 1 ELSE 0 END)'];
					if ($bocount != 0) {
						if ($bocount == 1) {	
							echo "<p>There is currently one request for National Technical Honor Society (NTHS):<p>";
						} else {
							echo "<p>There are currently ".$bocount." requests for National Technical Honor Society (NTHS):<p>";
						}
						$boid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "bo" OR freshman_interest.act2 = "bo" OR
							freshman_interest.act3 = "bo" OR freshman_interest.act4 = "bo" OR
							freshman_interest.act5 = "bo" OR freshman_interest.act6 = "bo" OR
							freshman_interest.act7 = "bo" OR freshman_interest.act8 = "bo" OR
							freshman_interest.act9 = "bo" OR freshman_interest.act10 = "bo")');
						foreach ($boid as $bo) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$bo['username']."'>".$bo['firstName']." ".$bo['lastName']."</a> ~ ".$bo['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="bo" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Science National Honor Society</legend>
				<?php
					$bpcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bp" OR act2="bp" OR
						act3="bp" OR act4="bp" OR act5="bp" OR act6="bp" OR act7="bp" OR 
						act8="bp" OR act9="bp" OR act10="bp")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bp" OR act2="bp" OR
						act3="bp" OR act4="bp" OR act5="bp" OR act6="bp" OR act7="bp" OR 
						act8="bp" OR act9="bp" OR act10="bp")
						THEN 1 ELSE 0 END)'];
					if ($bpcount != 0) {
						if ($bpcount == 1) {	
							echo "<p>There is currently one request for Science National Honor Society:<p>";
						} else {
							echo "<p>There are currently ".$bpcount." requests for Science National Honor Society:<p>";
						}
						$bpid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "bp" OR freshman_interest.act2 = "bp" OR
							freshman_interest.act3 = "bp" OR freshman_interest.act4 = "bp" OR
							freshman_interest.act5 = "bp" OR freshman_interest.act6 = "bp" OR
							freshman_interest.act7 = "bp" OR freshman_interest.act8 = "bp" OR
							freshman_interest.act9 = "bp" OR freshman_interest.act10 = "bp")');
						foreach ($bpid as $bp) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$bp['username']."'>".$bp['firstName']." ".$bp['lastName']."</a> ~ ".$bp['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="bp" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Tri-M Music National Honor Society (TMNHS)</legend>
				<?php
					$bqcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bq" OR act2="bq" OR
						act3="bq" OR act4="bq" OR act5="bq" OR act6="bq" OR act7="bq" OR 
						act8="bq" OR act9="bq" OR act10="bq")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bq" OR act2="bq" OR
						act3="bq" OR act4="bq" OR act5="bq" OR act6="bq" OR act7="bq" OR 
						act8="bq" OR act9="bq" OR act10="bq")
						THEN 1 ELSE 0 END)'];
					if ($bqcount != 0) {
						if ($bqcount == 1) {	
							echo "<p>There is currently one request for Tri-M Music National Honor Society (TMNHS):<p>";
						} else {
							echo "<p>There are currently ".$bqcount." requests for Tri-M Music National Honor Society (TMNHS):<p>";
						}
						$bqid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "bq" OR freshman_interest.act2 = "bq" OR
							freshman_interest.act3 = "bq" OR freshman_interest.act4 = "bq" OR
							freshman_interest.act5 = "bq" OR freshman_interest.act6 = "bq" OR
							freshman_interest.act7 = "bq" OR freshman_interest.act8 = "bq" OR
							freshman_interest.act9 = "bq" OR freshman_interest.act10 = "bq")');
						foreach ($bqid as $bq) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$bq['username']."'>".$bq['firstName']." ".$bq['lastName']."</a> ~ ".$bq['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="bq" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Band</legend>
				<?php
					$brcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="br" OR act2="br" OR
						act3="br" OR act4="br" OR act5="br" OR act6="br" OR act7="br" OR 
						act8="br" OR act9="br" OR act10="br")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="br" OR act2="br" OR
						act3="br" OR act4="br" OR act5="br" OR act6="br" OR act7="br" OR 
						act8="br" OR act9="br" OR act10="br")
						THEN 1 ELSE 0 END)'];
					if ($brcount != 0) {
						if ($brcount == 1) {	
							echo "<p>There is currently one request for Band:<p>";
						} else {
							echo "<p>There are currently ".$brcount." requests for Band:<p>";
						}
						$brid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "br" OR freshman_interest.act2 = "br" OR
							freshman_interest.act3 = "br" OR freshman_interest.act4 = "br" OR
							freshman_interest.act5 = "br" OR freshman_interest.act6 = "br" OR
							freshman_interest.act7 = "br" OR freshman_interest.act8 = "br" OR
							freshman_interest.act9 = "br" OR freshman_interest.act10 = "br")');
						foreach ($brid as $br) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$br['username']."'>".$br['firstName']." ".$br['lastName']."</a> ~ ".$br['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="br" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Dance</legend>
				<?php
					$bscount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bs" OR act2="bs" OR
						act3="bs" OR act4="bs" OR act5="bs" OR act6="bs" OR act7="bs" OR 
						act8="bs" OR act9="bs" OR act10="bs")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bs" OR act2="bs" OR
						act3="bs" OR act4="bs" OR act5="bs" OR act6="bs" OR act7="bs" OR 
						act8="bs" OR act9="bs" OR act10="bs")
						THEN 1 ELSE 0 END)'];
					if ($bscount != 0) {
						if ($bscount == 1) {	
							echo "<p>There is currently one request for Dance:<p>";
						} else {
							echo "<p>There are currently ".$bscount." requests for Dance:<p>";
						}
						$bsid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "bs" OR freshman_interest.act2 = "bs" OR
							freshman_interest.act3 = "bs" OR freshman_interest.act4 = "bs" OR
							freshman_interest.act5 = "bs" OR freshman_interest.act6 = "bs" OR
							freshman_interest.act7 = "bs" OR freshman_interest.act8 = "bs" OR
							freshman_interest.act9 = "bs" OR freshman_interest.act10 = "bs")');
						foreach ($bsid as $bs) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$bs['username']."'>".$bs['firstName']." ".$bs['lastName']."</a> ~ ".$bs['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="bs" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Jazz Band</legend>
				<?php
					$btcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bt" OR act2="bt" OR
						act3="bt" OR act4="bt" OR act5="bt" OR act6="bt" OR act7="bt" OR 
						act8="bt" OR act9="bt" OR act10="bt")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bt" OR act2="bt" OR
						act3="bt" OR act4="bt" OR act5="bt" OR act6="bt" OR act7="bt" OR 
						act8="bt" OR act9="bt" OR act10="bt")
						THEN 1 ELSE 0 END)'];
					if ($btcount != 0) {
						if ($btcount == 1) {	
							echo "<p>There is currently one request for Jazz Band:<p>";
						} else {
							echo "<p>There are currently ".$btcount." requests for Jazz Band:<p>";
						}
						$btid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "bt" OR freshman_interest.act2 = "bt" OR
							freshman_interest.act3 = "bt" OR freshman_interest.act4 = "bt" OR
							freshman_interest.act5 = "bt" OR freshman_interest.act6 = "bt" OR
							freshman_interest.act7 = "bt" OR freshman_interest.act8 = "bt" OR
							freshman_interest.act9 = "bt" OR freshman_interest.act10 = "bt")');
						foreach ($btid as $bt) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$bt['username']."'>".$bt['firstName']." ".$bt['lastName']."</a> ~ ".$bt['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="bt" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Lunch Choir / Concert Choir</legend>
				<?php
					$bucount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bu" OR act2="bu" OR
						act3="bu" OR act4="bu" OR act5="bu" OR act6="bu" OR act7="bu" OR 
						act8="bu" OR act9="bu" OR act10="bu")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bu" OR act2="bu" OR
						act3="bu" OR act4="bu" OR act5="bu" OR act6="bu" OR act7="bu" OR 
						act8="bu" OR act9="bu" OR act10="bu")
						THEN 1 ELSE 0 END)'];
					if ($bucount != 0) {
						if ($bucount == 1) {	
							echo "<p>There is currently one request for Lunch Choir / Concert Choir:<p>";
						} else {
							echo "<p>There are currently ".$bucount." requests for Lunch Choir / Concert Choir:<p>";
						}
						$buid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "bu" OR freshman_interest.act2 = "bu" OR
							freshman_interest.act3 = "bu" OR freshman_interest.act4 = "bu" OR
							freshman_interest.act5 = "bu" OR freshman_interest.act6 = "bu" OR
							freshman_interest.act7 = "bu" OR freshman_interest.act8 = "bu" OR
							freshman_interest.act9 = "bu" OR freshman_interest.act10 = "bu")');
						foreach ($buid as $bu) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$bu['username']."'>".$bu['firstName']." ".$bu['lastName']."</a> ~ ".$bu['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="bu" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Marching Band</legend>
				<?php
					$bvcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bv" OR act2="bv" OR
						act3="bv" OR act4="bv" OR act5="bv" OR act6="bv" OR act7="bv" OR 
						act8="bv" OR act9="bv" OR act10="bv")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bv" OR act2="bv" OR
						act3="bv" OR act4="bv" OR act5="bv" OR act6="bv" OR act7="bv" OR 
						act8="bv" OR act9="bv" OR act10="bv")
						THEN 1 ELSE 0 END)'];
					if ($bvcount != 0) {
						if ($bvcount == 1) {	
							echo "<p>There is currently one request for Marching Band:<p>";
						} else {
							echo "<p>There are currently ".$bvcount." requests for Marching Band:<p>";
						}
						$bvid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "bv" OR freshman_interest.act2 = "bv" OR
							freshman_interest.act3 = "bv" OR freshman_interest.act4 = "bv" OR
							freshman_interest.act5 = "bv" OR freshman_interest.act6 = "bv" OR
							freshman_interest.act7 = "bv" OR freshman_interest.act8 = "bv" OR
							freshman_interest.act9 = "bv" OR freshman_interest.act10 = "bv")');
						foreach ($bvid as $bv) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$bv['username']."'>".$bv['firstName']." ".$bv['lastName']."</a> ~ ".$bv['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="bv" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Men's Choir</legend>
				<?php
					$bwcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bw" OR act2="bw" OR
						act3="bw" OR act4="bw" OR act5="bw" OR act6="bw" OR act7="bw" OR 
						act8="bw" OR act9="bw" OR act10="bw")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bw" OR act2="bw" OR
						act3="bw" OR act4="bw" OR act5="bw" OR act6="bw" OR act7="bw" OR 
						act8="bw" OR act9="bw" OR act10="bw")
						THEN 1 ELSE 0 END)'];
					if ($bwcount != 0) {
						if ($bwcount == 1) {	
							echo "<p>There is currently one request for Men's Choir:<p>";
						} else {
							echo "<p>There are currently ".$bwcount." requests for Men's Choir:<p>";
						}
						$bwid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "bw" OR freshman_interest.act2 = "bw" OR
							freshman_interest.act3 = "bw" OR freshman_interest.act4 = "bw" OR
							freshman_interest.act5 = "bw" OR freshman_interest.act6 = "bw" OR
							freshman_interest.act7 = "bw" OR freshman_interest.act8 = "bw" OR
							freshman_interest.act9 = "bw" OR freshman_interest.act10 = "bw")');
						foreach ($bwid as $bw) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$bw['username']."'>".$bw['firstName']." ".$bw['lastName']."</a> ~ ".$bw['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="bw" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Orchestra</legend>
				<?php
					$bxcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bx" OR act2="bx" OR
						act3="bx" OR act4="bx" OR act5="bx" OR act6="bx" OR act7="bx" OR 
						act8="bx" OR act9="bx" OR act10="bx")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bx" OR act2="bx" OR
						act3="bx" OR act4="bx" OR act5="bx" OR act6="bx" OR act7="bx" OR 
						act8="bx" OR act9="bx" OR act10="bx")
						THEN 1 ELSE 0 END)'];
					if ($bxcount != 0) {
						if ($bxcount == 1) {	
							echo "<p>There is currently one request for Orchestra:<p>";
						} else {
							echo "<p>There are currently ".$bxcount." requests for Orchestra:<p>";
						}
						$bxid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "bx" OR freshman_interest.act2 = "bx" OR
							freshman_interest.act3 = "bx" OR freshman_interest.act4 = "bx" OR
							freshman_interest.act5 = "bx" OR freshman_interest.act6 = "bx" OR
							freshman_interest.act7 = "bx" OR freshman_interest.act8 = "bx" OR
							freshman_interest.act9 = "bx" OR freshman_interest.act10 = "bx")');
						foreach ($bxid as $bx) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$bx['username']."'>".$bx['firstName']." ".$bx['lastName']."</a> ~ ".$bx['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="bx" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Step Team</legend>
				<?php
					$bycount = database::query('SELECT count(*), SUM(CASE WHEN (act1="by" OR act2="by" OR
						act3="by" OR act4="by" OR act5="by" OR act6="by" OR act7="by" OR 
						act8="by" OR act9="by" OR act10="by")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="by" OR act2="by" OR
						act3="by" OR act4="by" OR act5="by" OR act6="by" OR act7="by" OR 
						act8="by" OR act9="by" OR act10="by")
						THEN 1 ELSE 0 END)'];
					if ($bycount != 0) {
						if ($bycount == 1) {	
							echo "<p>There is currently one request for Step Team:<p>";
						} else {
							echo "<p>There are currently ".$bycount." requests for Step Team:<p>";
						}
						$byid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "by" OR freshman_interest.act2 = "by" OR
							freshman_interest.act3 = "by" OR freshman_interest.act4 = "by" OR
							freshman_interest.act5 = "by" OR freshman_interest.act6 = "by" OR
							freshman_interest.act7 = "by" OR freshman_interest.act8 = "by" OR
							freshman_interest.act9 = "by" OR freshman_interest.act10 = "by")');
						foreach ($byid as $by) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$by['username']."'>".$by['firstName']." ".$by['lastName']."</a> ~ ".$by['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="by" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Theater Arts Productions</legend>
				<?php
					$bzcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="bz" OR act2="bz" OR
						act3="bz" OR act4="bz" OR act5="bz" OR act6="bz" OR act7="bz" OR 
						act8="bz" OR act9="bz" OR act10="bz")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="bz" OR act2="bz" OR
						act3="bz" OR act4="bz" OR act5="bz" OR act6="bz" OR act7="bz" OR 
						act8="bz" OR act9="bz" OR act10="bz")
						THEN 1 ELSE 0 END)'];
					if ($bzcount != 0) {
						if ($bzcount == 1) {	
							echo "<p>There is currently one request for Theater Arts Productions:<p>";
						} else {
							echo "<p>There are currently ".$bzcount." requests for Theater Arts Productions:<p>";
						}
						$bzid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "bz" OR freshman_interest.act2 = "bz" OR
							freshman_interest.act3 = "bz" OR freshman_interest.act4 = "bz" OR
							freshman_interest.act5 = "bz" OR freshman_interest.act6 = "bz" OR
							freshman_interest.act7 = "bz" OR freshman_interest.act8 = "bz" OR
							freshman_interest.act9 = "bz" OR freshman_interest.act10 = "bz")');
						foreach ($bzid as $bz) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$bz['username']."'>".$bz['firstName']." ".$bz['lastName']."</a> ~ ".$bz['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="bz" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Tri-M Music National Honor Society</legend>
				<?php
					$cacount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ca" OR act2="ca" OR
						act3="ca" OR act4="ca" OR act5="ca" OR act6="ca" OR act7="ca" OR 
						act8="ca" OR act9="ca" OR act10="ca")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ca" OR act2="ca" OR
						act3="ca" OR act4="ca" OR act5="ca" OR act6="ca" OR act7="ca" OR 
						act8="ca" OR act9="ca" OR act10="ca")
						THEN 1 ELSE 0 END)'];
					if ($cacount != 0) {
						if ($cacount == 1) {	
							echo "<p>There is currently one request for Tri-M Music National Honor Society:<p>";
						} else {
							echo "<p>There are currently ".$cacount." requests for Tri-M Music National Honor Society:<p>";
						}
						$caid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "ca" OR freshman_interest.act2 = "ca" OR
							freshman_interest.act3 = "ca" OR freshman_interest.act4 = "ca" OR
							freshman_interest.act5 = "ca" OR freshman_interest.act6 = "ca" OR
							freshman_interest.act7 = "ca" OR freshman_interest.act8 = "ca" OR
							freshman_interest.act9 = "ca" OR freshman_interest.act10 = "ca")');
						foreach ($caid as $ca) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$ca['username']."'>".$ca['firstName']." ".$ca['lastName']."</a> ~ ".$ca['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="ca" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Women's Choir</legend>
				<?php
					$cbcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cb" OR act2="cb" OR
						act3="cb" OR act4="cb" OR act5="cb" OR act6="cb" OR act7="cb" OR 
						act8="cb" OR act9="cb" OR act10="cb")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cb" OR act2="cb" OR
						act3="cb" OR act4="cb" OR act5="cb" OR act6="cb" OR act7="cb" OR 
						act8="cb" OR act9="cb" OR act10="cb")
						THEN 1 ELSE 0 END)'];
					if ($cbcount != 0) {
						if ($cbcount == 1) {	
							echo "<p>There is currently one request for Women's Choir:<p>";
						} else {
							echo "<p>There are currently ".$cbcount." requests for Women's Choir:<p>";
						}
						$cbid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "cb" OR freshman_interest.act2 = "cb" OR
							freshman_interest.act3 = "cb" OR freshman_interest.act4 = "cb" OR
							freshman_interest.act5 = "cb" OR freshman_interest.act6 = "cb" OR
							freshman_interest.act7 = "cb" OR freshman_interest.act8 = "cb" OR
							freshman_interest.act9 = "cb" OR freshman_interest.act10 = "cb")');
						foreach ($cbid as $cb) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$cb['username']."'>".$cb['firstName']." ".$cb['lastName']."</a> ~ ".$cb['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="cb" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Allied Bowling</legend>
				<?php
					$cccount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cc" OR act2="cc" OR
						act3="cc" OR act4="cc" OR act5="cc" OR act6="cc" OR act7="cc" OR 
						act8="cc" OR act9="cc" OR act10="cc")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cc" OR act2="cc" OR
						act3="cc" OR act4="cc" OR act5="cc" OR act6="cc" OR act7="cc" OR 
						act8="cc" OR act9="cc" OR act10="cc")
						THEN 1 ELSE 0 END)'];
					if ($cccount != 0) {
						if ($cccount == 1) {	
							echo "<p>There is currently one request for Allied Bowling:<p>";
						} else {
							echo "<p>There are currently ".$cccount." requests for Allied Bowling:<p>";
						}
						$ccid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "cc" OR freshman_interest.act2 = "cc" OR
							freshman_interest.act3 = "cc" OR freshman_interest.act4 = "cc" OR
							freshman_interest.act5 = "cc" OR freshman_interest.act6 = "cc" OR
							freshman_interest.act7 = "cc" OR freshman_interest.act8 = "cc" OR
							freshman_interest.act9 = "cc" OR freshman_interest.act10 = "cc")');
						foreach ($ccid as $cc) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$cc['username']."'>".$cc['firstName']." ".$cc['lastName']."</a> ~ ".$cc['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="cc" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Allied Soccer</legend>
				<?php
					$cdcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cd" OR act2="cd" OR
						act3="cd" OR act4="cd" OR act5="cd" OR act6="cd" OR act7="cd" OR 
						act8="cd" OR act9="cd" OR act10="cd")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cd" OR act2="cd" OR
						act3="cd" OR act4="cd" OR act5="cd" OR act6="cd" OR act7="cd" OR 
						act8="cd" OR act9="cd" OR act10="cd")
						THEN 1 ELSE 0 END)'];
					if ($cdcount != 0) {
						if ($cdcount == 1) {	
							echo "<p>There is currently one request for Allied Soccer:<p>";
						} else {
							echo "<p>There are currently ".$cdcount." requests for Allied Soccer:<p>";
						}
						$cdid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "cd" OR freshman_interest.act2 = "cd" OR
							freshman_interest.act3 = "cd" OR freshman_interest.act4 = "cd" OR
							freshman_interest.act5 = "cd" OR freshman_interest.act6 = "cd" OR
							freshman_interest.act7 = "cd" OR freshman_interest.act8 = "cd" OR
							freshman_interest.act9 = "cd" OR freshman_interest.act10 = "cd")');
						foreach ($cdid as $cd) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$cd['username']."'>".$cd['firstName']." ".$cd['lastName']."</a> ~ ".$cd['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="cd" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Allied Softball</legend>
				<?php
					$cecount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ce" OR act2="ce" OR
						act3="ce" OR act4="ce" OR act5="ce" OR act6="ce" OR act7="ce" OR 
						act8="ce" OR act9="ce" OR act10="ce")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ce" OR act2="ce" OR
						act3="ce" OR act4="ce" OR act5="ce" OR act6="ce" OR act7="ce" OR 
						act8="ce" OR act9="ce" OR act10="ce")
						THEN 1 ELSE 0 END)'];
					if ($cecount != 0) {
						if ($cecount == 1) {	
							echo "<p>There is currently one request for Allied Softball:<p>";
						} else {
							echo "<p>There are currently ".$cecount." requests for Allied Softball:<p>";
						}
						$ceid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "ce" OR freshman_interest.act2 = "ce" OR
							freshman_interest.act3 = "ce" OR freshman_interest.act4 = "ce" OR
							freshman_interest.act5 = "ce" OR freshman_interest.act6 = "ce" OR
							freshman_interest.act7 = "ce" OR freshman_interest.act8 = "ce" OR
							freshman_interest.act9 = "ce" OR freshman_interest.act10 = "ce")');
						foreach ($ceid as $ce) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$ce['username']."'>".$ce['firstName']." ".$ce['lastName']."</a> ~ ".$ce['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="ce" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Baseball</legend>
				<?php
					$cfcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cf" OR act2="cf" OR
						act3="cf" OR act4="cf" OR act5="cf" OR act6="cf" OR act7="cf" OR 
						act8="cf" OR act9="cf" OR act10="cf")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cf" OR act2="cf" OR
						act3="cf" OR act4="cf" OR act5="cf" OR act6="cf" OR act7="cf" OR 
						act8="cf" OR act9="cf" OR act10="cf")
						THEN 1 ELSE 0 END)'];
					if ($cfcount != 0) {
						if ($cfcount == 1) {	
							echo "<p>There is currently one request for Baseball:<p>";
						} else {
							echo "<p>There are currently ".$cfcount." requests for Baseball:<p>";
						}
						$cfid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "cf" OR freshman_interest.act2 = "cf" OR
							freshman_interest.act3 = "cf" OR freshman_interest.act4 = "cf" OR
							freshman_interest.act5 = "cf" OR freshman_interest.act6 = "cf" OR
							freshman_interest.act7 = "cf" OR freshman_interest.act8 = "cf" OR
							freshman_interest.act9 = "cf" OR freshman_interest.act10 = "cf")');
						foreach ($cfid as $cf) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$cf['username']."'>".$cf['firstName']." ".$cf['lastName']."</a> ~ ".$cf['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="cf" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Basketball - Boys</legend>
				<?php
					$cgcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cg" OR act2="cg" OR
						act3="cg" OR act4="cg" OR act5="cg" OR act6="cg" OR act7="cg" OR 
						act8="cg" OR act9="cg" OR act10="cg")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cg" OR act2="cg" OR
						act3="cg" OR act4="cg" OR act5="cg" OR act6="cg" OR act7="cg" OR 
						act8="cg" OR act9="cg" OR act10="cg")
						THEN 1 ELSE 0 END)'];
					if ($cgcount != 0) {
						if ($cgcount == 1) {	
							echo "<p>There is currently one request for Basketball - Boys:<p>";
						} else {
							echo "<p>There are currently ".$cgcount." requests for Basketball - Boys:<p>";
						}
						$cgid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "cg" OR freshman_interest.act2 = "cg" OR
							freshman_interest.act3 = "cg" OR freshman_interest.act4 = "cg" OR
							freshman_interest.act5 = "cg" OR freshman_interest.act6 = "cg" OR
							freshman_interest.act7 = "cg" OR freshman_interest.act8 = "cg" OR
							freshman_interest.act9 = "cg" OR freshman_interest.act10 = "cg")');
						foreach ($cgid as $cg) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$cg['username']."'>".$cg['firstName']." ".$cg['lastName']."</a> ~ ".$cg['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="cg" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Basketball - Girls</legend>
				<?php
					$chcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ch" OR act2="ch" OR
						act3="ch" OR act4="ch" OR act5="ch" OR act6="ch" OR act7="ch" OR 
						act8="ch" OR act9="ch" OR act10="ch")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ch" OR act2="ch" OR
						act3="ch" OR act4="ch" OR act5="ch" OR act6="ch" OR act7="ch" OR 
						act8="ch" OR act9="ch" OR act10="ch")
						THEN 1 ELSE 0 END)'];
					if ($chcount != 0) {
						if ($chcount == 1) {	
							echo "<p>There is currently one request for Basketball - Girls:<p>";
						} else {
							echo "<p>There are currently ".$chcount." requests for Basketball - Girls:<p>";
						}
						$chid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "ch" OR freshman_interest.act2 = "ch" OR
							freshman_interest.act3 = "ch" OR freshman_interest.act4 = "ch" OR
							freshman_interest.act5 = "ch" OR freshman_interest.act6 = "ch" OR
							freshman_interest.act7 = "ch" OR freshman_interest.act8 = "ch" OR
							freshman_interest.act9 = "ch" OR freshman_interest.act10 = "ch")');
						foreach ($chid as $ch) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$ch['username']."'>".$ch['firstName']." ".$ch['lastName']."</a> ~ ".$ch['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="ch" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Boys Lacrosse</legend>
				<?php
					$cicount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ci" OR act2="ci" OR
						act3="ci" OR act4="ci" OR act5="ci" OR act6="ci" OR act7="ci" OR 
						act8="ci" OR act9="ci" OR act10="ci")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ci" OR act2="ci" OR
						act3="ci" OR act4="ci" OR act5="ci" OR act6="ci" OR act7="ci" OR 
						act8="ci" OR act9="ci" OR act10="ci")
						THEN 1 ELSE 0 END)'];
					if ($cicount != 0) {
						if ($cicount == 1) {	
							echo "<p>There is currently one request for Boys Lacrosse:<p>";
						} else {
							echo "<p>There are currently ".$cicount." requests for Boys Lacrosse:<p>";
						}
						$ciid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "ci" OR freshman_interest.act2 = "ci" OR
							freshman_interest.act3 = "ci" OR freshman_interest.act4 = "ci" OR
							freshman_interest.act5 = "ci" OR freshman_interest.act6 = "ci" OR
							freshman_interest.act7 = "ci" OR freshman_interest.act8 = "ci" OR
							freshman_interest.act9 = "ci" OR freshman_interest.act10 = "ci")');
						foreach ($ciid as $ci) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$ci['username']."'>".$ci['firstName']." ".$ci['lastName']."</a> ~ ".$ci['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="ci" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Boys Soccer</legend>
				<?php
					$cjcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cj" OR act2="cj" OR
						act3="cj" OR act4="cj" OR act5="cj" OR act6="cj" OR act7="cj" OR 
						act8="cj" OR act9="cj" OR act10="cj")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cj" OR act2="cj" OR
						act3="cj" OR act4="cj" OR act5="cj" OR act6="cj" OR act7="cj" OR 
						act8="cj" OR act9="cj" OR act10="cj")
						THEN 1 ELSE 0 END)'];
					if ($cjcount != 0) {
						if ($cjcount == 1) {	
							echo "<p>There is currently one request for Boys Soccer:<p>";
						} else {
							echo "<p>There are currently ".$cjcount." requests for Boys Soccer:<p>";
						}
						$cjid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "cj" OR freshman_interest.act2 = "cj" OR
							freshman_interest.act3 = "cj" OR freshman_interest.act4 = "cj" OR
							freshman_interest.act5 = "cj" OR freshman_interest.act6 = "cj" OR
							freshman_interest.act7 = "cj" OR freshman_interest.act8 = "cj" OR
							freshman_interest.act9 = "cj" OR freshman_interest.act10 = "cj")');
						foreach ($cjid as $cj) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$cj['username']."'>".$cj['firstName']." ".$cj['lastName']."</a> ~ ".$cj['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="cj" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Cheerleading</legend>
				<?php
					$ckcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ck" OR act2="ck" OR
						act3="ck" OR act4="ck" OR act5="ck" OR act6="ck" OR act7="ck" OR 
						act8="ck" OR act9="ck" OR act10="ck")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ck" OR act2="ck" OR
						act3="ck" OR act4="ck" OR act5="ck" OR act6="ck" OR act7="ck" OR 
						act8="ck" OR act9="ck" OR act10="ck")
						THEN 1 ELSE 0 END)'];
					if ($ckcount != 0) {
						if ($ckcount == 1) {	
							echo "<p>There is currently one request for Cheerleading:<p>";
						} else {
							echo "<p>There are currently ".$ckcount." requests for Cheerleading:<p>";
						}
						$ckid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "ck" OR freshman_interest.act2 = "ck" OR
							freshman_interest.act3 = "ck" OR freshman_interest.act4 = "ck" OR
							freshman_interest.act5 = "ck" OR freshman_interest.act6 = "ck" OR
							freshman_interest.act7 = "ck" OR freshman_interest.act8 = "ck" OR
							freshman_interest.act9 = "ck" OR freshman_interest.act10 = "ck")');
						foreach ($ckid as $ck) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$ck['username']."'>".$ck['firstName']." ".$ck['lastName']."</a> ~ ".$ck['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="ck" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Cross Country</legend>
				<?php
					$clcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cl" OR act2="cl" OR
						act3="cl" OR act4="cl" OR act5="cl" OR act6="cl" OR act7="cl" OR 
						act8="cl" OR act9="cl" OR act10="cl")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cl" OR act2="cl" OR
						act3="cl" OR act4="cl" OR act5="cl" OR act6="cl" OR act7="cl" OR 
						act8="cl" OR act9="cl" OR act10="cl")
						THEN 1 ELSE 0 END)'];
					if ($clcount != 0) {
						if ($clcount == 1) {	
							echo "<p>There is currently one request for Cross Country:<p>";
						} else {
							echo "<p>There are currently ".$clcount." requests for Cross Country:<p>";
						}
						$clid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "cl" OR freshman_interest.act2 = "cl" OR
							freshman_interest.act3 = "cl" OR freshman_interest.act4 = "cl" OR
							freshman_interest.act5 = "cl" OR freshman_interest.act6 = "cl" OR
							freshman_interest.act7 = "cl" OR freshman_interest.act8 = "cl" OR
							freshman_interest.act9 = "cl" OR freshman_interest.act10 = "cl")');
						foreach ($clid as $cl) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$cl['username']."'>".$cl['firstName']." ".$cl['lastName']."</a> ~ ".$cl['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="cl" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Field Hockey</legend>
				<?php
					$cmcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cm" OR act2="cm" OR
						act3="cm" OR act4="cm" OR act5="cm" OR act6="cm" OR act7="cm" OR 
						act8="cm" OR act9="cm" OR act10="cm")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cm" OR act2="cm" OR
						act3="cm" OR act4="cm" OR act5="cm" OR act6="cm" OR act7="cm" OR 
						act8="cm" OR act9="cm" OR act10="cm")
						THEN 1 ELSE 0 END)'];
					if ($cmcount != 0) {
						if ($cmcount == 1) {	
							echo "<p>There is currently one request for Field Hockey:<p>";
						} else {
							echo "<p>There are currently ".$cmcount." requests for Field Hockey:<p>";
						}
						$cmid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "cm" OR freshman_interest.act2 = "cm" OR
							freshman_interest.act3 = "cm" OR freshman_interest.act4 = "cm" OR
							freshman_interest.act5 = "cm" OR freshman_interest.act6 = "cm" OR
							freshman_interest.act7 = "cm" OR freshman_interest.act8 = "cm" OR
							freshman_interest.act9 = "cm" OR freshman_interest.act10 = "cm")');
						foreach ($cmid as $cm) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$cm['username']."'>".$cm['firstName']." ".$cm['lastName']."</a> ~ ".$cm['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="cm" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Football</legend>
				<?php
					$cncount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cn" OR act2="cn" OR
						act3="cn" OR act4="cn" OR act5="cn" OR act6="cn" OR act7="cn" OR 
						act8="cn" OR act9="cn" OR act10="cn")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cn" OR act2="cn" OR
						act3="cn" OR act4="cn" OR act5="cn" OR act6="cn" OR act7="cn" OR 
						act8="cn" OR act9="cn" OR act10="cn")
						THEN 1 ELSE 0 END)'];
					if ($cncount != 0) {
						if ($cncount == 1) {	
							echo "<p>There is currently one request for Football:<p>";
						} else {
							echo "<p>There are currently ".$cncount." requests for Football:<p>";
						}
						$cnid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "cn" OR freshman_interest.act2 = "cn" OR
							freshman_interest.act3 = "cn" OR freshman_interest.act4 = "cn" OR
							freshman_interest.act5 = "cn" OR freshman_interest.act6 = "cn" OR
							freshman_interest.act7 = "cn" OR freshman_interest.act8 = "cn" OR
							freshman_interest.act9 = "cn" OR freshman_interest.act10 = "cn")');
						foreach ($cnid as $cn) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$cn['username']."'>".$cn['firstName']." ".$cn['lastName']."</a> ~ ".$cn['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="cn" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Girls Lacrosse</legend>
				<?php
					$cocount = database::query('SELECT count(*), SUM(CASE WHEN (act1="co" OR act2="co" OR
						act3="co" OR act4="co" OR act5="co" OR act6="co" OR act7="co" OR 
						act8="co" OR act9="co" OR act10="co")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="co" OR act2="co" OR
						act3="co" OR act4="co" OR act5="co" OR act6="co" OR act7="co" OR 
						act8="co" OR act9="co" OR act10="co")
						THEN 1 ELSE 0 END)'];
					if ($cocount != 0) {
						if ($cocount == 1) {	
							echo "<p>There is currently one request for Girls Lacrosse:<p>";
						} else {
							echo "<p>There are currently ".$cocount." requests for Girls Lacrosse:<p>";
						}
						$coid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "co" OR freshman_interest.act2 = "co" OR
							freshman_interest.act3 = "co" OR freshman_interest.act4 = "co" OR
							freshman_interest.act5 = "co" OR freshman_interest.act6 = "co" OR
							freshman_interest.act7 = "co" OR freshman_interest.act8 = "co" OR
							freshman_interest.act9 = "co" OR freshman_interest.act10 = "co")');
						foreach ($coid as $co) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$co['username']."'>".$co['firstName']." ".$co['lastName']."</a> ~ ".$co['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="co" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Girls Soccer</legend>
				<?php
					$cpcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cp" OR act2="cp" OR
						act3="cp" OR act4="cp" OR act5="cp" OR act6="cp" OR act7="cp" OR 
						act8="cp" OR act9="cp" OR act10="cp")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cp" OR act2="cp" OR
						act3="cp" OR act4="cp" OR act5="cp" OR act6="cp" OR act7="cp" OR 
						act8="cp" OR act9="cp" OR act10="cp")
						THEN 1 ELSE 0 END)'];
					if ($cpcount != 0) {
						if ($cpcount == 1) {	
							echo "<p>There is currently one request for Girls Soccer:<p>";
						} else {
							echo "<p>There are currently ".$cpcount." requests for Girls Soccer:<p>";
						}
						$cpid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "cp" OR freshman_interest.act2 = "cp" OR
							freshman_interest.act3 = "cp" OR freshman_interest.act4 = "cp" OR
							freshman_interest.act5 = "cp" OR freshman_interest.act6 = "cp" OR
							freshman_interest.act7 = "cp" OR freshman_interest.act8 = "cp" OR
							freshman_interest.act9 = "cp" OR freshman_interest.act10 = "cp")');
						foreach ($cpid as $cp) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$cp['username']."'>".$cp['firstName']." ".$cp['lastName']."</a> ~ ".$cp['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="cp" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Golf</legend>
				<?php
					$cqcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cq" OR act2="cq" OR
						act3="cq" OR act4="cq" OR act5="cq" OR act6="cq" OR act7="cq" OR 
						act8="cq" OR act9="cq" OR act10="cq")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cq" OR act2="cq" OR
						act3="cq" OR act4="cq" OR act5="cq" OR act6="cq" OR act7="cq" OR 
						act8="cq" OR act9="cq" OR act10="cq")
						THEN 1 ELSE 0 END)'];
					if ($cqcount != 0) {
						if ($cqcount == 1) {	
							echo "<p>There is currently one request for Golf:<p>";
						} else {
							echo "<p>There are currently ".$cqcount." requests for Golf:<p>";
						}
						$cqid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "cq" OR freshman_interest.act2 = "cq" OR
							freshman_interest.act3 = "cq" OR freshman_interest.act4 = "cq" OR
							freshman_interest.act5 = "cq" OR freshman_interest.act6 = "cq" OR
							freshman_interest.act7 = "cq" OR freshman_interest.act8 = "cq" OR
							freshman_interest.act9 = "cq" OR freshman_interest.act10 = "cq")');
						foreach ($cqid as $cq) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$cq['username']."'>".$cq['firstName']." ".$cq['lastName']."</a> ~ ".$cq['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="cq" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Ice Hockey</legend>
				<?php
					$crcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cr" OR act2="cr" OR
						act3="cr" OR act4="cr" OR act5="cr" OR act6="cr" OR act7="cr" OR 
						act8="cr" OR act9="cr" OR act10="cr")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cr" OR act2="cr" OR
						act3="cr" OR act4="cr" OR act5="cr" OR act6="cr" OR act7="cr" OR 
						act8="cr" OR act9="cr" OR act10="cr")
						THEN 1 ELSE 0 END)'];
					if ($crcount != 0) {
						if ($crcount == 1) {	
							echo "<p>There is currently one request for Ice Hockey:<p>";
						} else {
							echo "<p>There are currently ".$crcount." requests for Ice Hockey:<p>";
						}
						$crid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "cr" OR freshman_interest.act2 = "cr" OR
							freshman_interest.act3 = "cr" OR freshman_interest.act4 = "cr" OR
							freshman_interest.act5 = "cr" OR freshman_interest.act6 = "cr" OR
							freshman_interest.act7 = "cr" OR freshman_interest.act8 = "cr" OR
							freshman_interest.act9 = "cr" OR freshman_interest.act10 = "cr")');
						foreach ($crid as $cr) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$cr['username']."'>".$cr['firstName']." ".$cr['lastName']."</a> ~ ".$cr['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="cr" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Indoor Track</legend>
				<?php
					$cscount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cs" OR act2="cs" OR
						act3="cs" OR act4="cs" OR act5="cs" OR act6="cs" OR act7="cs" OR 
						act8="cs" OR act9="cs" OR act10="cs")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cs" OR act2="cs" OR
						act3="cs" OR act4="cs" OR act5="cs" OR act6="cs" OR act7="cs" OR 
						act8="cs" OR act9="cs" OR act10="cs")
						THEN 1 ELSE 0 END)'];
					if ($cscount != 0) {
						if ($cscount == 1) {	
							echo "<p>There is currently one request for Indoor Track:<p>";
						} else {
							echo "<p>There are currently ".$cscount." requests for Indoor Track:<p>";
						}
						$csid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "cs" OR freshman_interest.act2 = "cs" OR
							freshman_interest.act3 = "cs" OR freshman_interest.act4 = "cs" OR
							freshman_interest.act5 = "cs" OR freshman_interest.act6 = "cs" OR
							freshman_interest.act7 = "cs" OR freshman_interest.act8 = "cs" OR
							freshman_interest.act9 = "cs" OR freshman_interest.act10 = "cs")');
						foreach ($csid as $cs) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$cs['username']."'>".$cs['firstName']." ".$cs['lastName']."</a> ~ ".$cs['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="cs" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Outdoor Track</legend>
				<?php
					$ctcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="ct" OR act2="ct" OR
						act3="ct" OR act4="ct" OR act5="ct" OR act6="ct" OR act7="ct" OR 
						act8="ct" OR act9="ct" OR act10="ct")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="ct" OR act2="ct" OR
						act3="ct" OR act4="ct" OR act5="ct" OR act6="ct" OR act7="ct" OR 
						act8="ct" OR act9="ct" OR act10="ct")
						THEN 1 ELSE 0 END)'];
					if ($ctcount != 0) {
						if ($ctcount == 1) {	
							echo "<p>There is currently one request for Outdoor Track:<p>";
						} else {
							echo "<p>There are currently ".$ctcount." requests for Outdoor Track:<p>";
						}
						$ctid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "ct" OR freshman_interest.act2 = "ct" OR
							freshman_interest.act3 = "ct" OR freshman_interest.act4 = "ct" OR
							freshman_interest.act5 = "ct" OR freshman_interest.act6 = "ct" OR
							freshman_interest.act7 = "ct" OR freshman_interest.act8 = "ct" OR
							freshman_interest.act9 = "ct" OR freshman_interest.act10 = "ct")');
						foreach ($ctid as $ct) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$ct['username']."'>".$ct['firstName']." ".$ct['lastName']."</a> ~ ".$ct['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="ct" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Softball</legend>
				<?php
					$cucount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cu" OR act2="cu" OR
						act3="cu" OR act4="cu" OR act5="cu" OR act6="cu" OR act7="cu" OR 
						act8="cu" OR act9="cu" OR act10="cu")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cu" OR act2="cu" OR
						act3="cu" OR act4="cu" OR act5="cu" OR act6="cu" OR act7="cu" OR 
						act8="cu" OR act9="cu" OR act10="cu")
						THEN 1 ELSE 0 END)'];
					if ($cucount != 0) {
						if ($cucount == 1) {	
							echo "<p>There is currently one request for Softball:<p>";
						} else {
							echo "<p>There are currently ".$cucount." requests for Softball:<p>";
						}
						$cuid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "cu" OR freshman_interest.act2 = "cu" OR
							freshman_interest.act3 = "cu" OR freshman_interest.act4 = "cu" OR
							freshman_interest.act5 = "cu" OR freshman_interest.act6 = "cu" OR
							freshman_interest.act7 = "cu" OR freshman_interest.act8 = "cu" OR
							freshman_interest.act9 = "cu" OR freshman_interest.act10 = "cu")');
						foreach ($cuid as $cu) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$cu['username']."'>".$cu['firstName']." ".$cu['lastName']."</a> ~ ".$cu['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="cu" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Swim Club</legend>
				<?php
					$cvcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cv" OR act2="cv" OR
						act3="cv" OR act4="cv" OR act5="cv" OR act6="cv" OR act7="cv" OR 
						act8="cv" OR act9="cv" OR act10="cv")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cv" OR act2="cv" OR
						act3="cv" OR act4="cv" OR act5="cv" OR act6="cv" OR act7="cv" OR 
						act8="cv" OR act9="cv" OR act10="cv")
						THEN 1 ELSE 0 END)'];
					if ($cvcount != 0) {
						if ($cvcount == 1) {	
							echo "<p>There is currently one request for Swim Club:<p>";
						} else {
							echo "<p>There are currently ".$cvcount." requests for Swim Club:<p>";
						}
						$cvid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "cv" OR freshman_interest.act2 = "cv" OR
							freshman_interest.act3 = "cv" OR freshman_interest.act4 = "cv" OR
							freshman_interest.act5 = "cv" OR freshman_interest.act6 = "cv" OR
							freshman_interest.act7 = "cv" OR freshman_interest.act8 = "cv" OR
							freshman_interest.act9 = "cv" OR freshman_interest.act10 = "cv")');
						foreach ($cvid as $cv) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$cv['username']."'>".$cv['firstName']." ".$cv['lastName']."</a> ~ ".$cv['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="cv" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Table Tennis Club</legend>
				<?php
					$cwcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cw" OR act2="cw" OR
						act3="cw" OR act4="cw" OR act5="cw" OR act6="cw" OR act7="cw" OR 
						act8="cw" OR act9="cw" OR act10="cw")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cw" OR act2="cw" OR
						act3="cw" OR act4="cw" OR act5="cw" OR act6="cw" OR act7="cw" OR 
						act8="cw" OR act9="cw" OR act10="cw")
						THEN 1 ELSE 0 END)'];
					if ($cwcount != 0) {
						if ($cwcount == 1) {	
							echo "<p>There is currently one request for Table Tennis Club:<p>";
						} else {
							echo "<p>There are currently ".$cwcount." requests for Table Tennis Club:<p>";
						}
						$cwid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "cw" OR freshman_interest.act2 = "cw" OR
							freshman_interest.act3 = "cw" OR freshman_interest.act4 = "cw" OR
							freshman_interest.act5 = "cw" OR freshman_interest.act6 = "cw" OR
							freshman_interest.act7 = "cw" OR freshman_interest.act8 = "cw" OR
							freshman_interest.act9 = "cw" OR freshman_interest.act10 = "cw")');
						foreach ($cwid as $cw) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$cw['username']."'>".$cw['firstName']." ".$cw['lastName']."</a> ~ ".$cw['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="cw" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Tennis</legend>
				<?php
					$cxcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cx" OR act2="cx" OR
						act3="cx" OR act4="cx" OR act5="cx" OR act6="cx" OR act7="cx" OR 
						act8="cx" OR act9="cx" OR act10="cx")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cx" OR act2="cx" OR
						act3="cx" OR act4="cx" OR act5="cx" OR act6="cx" OR act7="cx" OR 
						act8="cx" OR act9="cx" OR act10="cx")
						THEN 1 ELSE 0 END)'];
					if ($cxcount != 0) {
						if ($cxcount == 1) {	
							echo "<p>There is currently one request for Tennis:<p>";
						} else {
							echo "<p>There are currently ".$cxcount." requests for Tennis:<p>";
						}
						$cxid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "cx" OR freshman_interest.act2 = "cx" OR
							freshman_interest.act3 = "cx" OR freshman_interest.act4 = "cx" OR
							freshman_interest.act5 = "cx" OR freshman_interest.act6 = "cx" OR
							freshman_interest.act7 = "cx" OR freshman_interest.act8 = "cx" OR
							freshman_interest.act9 = "cx" OR freshman_interest.act10 = "cx")');
						foreach ($cxid as $cx) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$cx['username']."'>".$cx['firstName']." ".$cx['lastName']."</a> ~ ".$cx['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="cx" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Volleyball</legend>
				<?php
					$cycount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cy" OR act2="cy" OR
						act3="cy" OR act4="cy" OR act5="cy" OR act6="cy" OR act7="cy" OR 
						act8="cy" OR act9="cy" OR act10="cy")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cy" OR act2="cy" OR
						act3="cy" OR act4="cy" OR act5="cy" OR act6="cy" OR act7="cy" OR 
						act8="cy" OR act9="cy" OR act10="cy")
						THEN 1 ELSE 0 END)'];
					if ($cycount != 0) {
						if ($cycount == 1) {	
							echo "<p>There is currently one request for Volleyball:<p>";
						} else {
							echo "<p>There are currently ".$cycount." requests for Volleyball:<p>";
						}
						$cyid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "cy" OR freshman_interest.act2 = "cy" OR
							freshman_interest.act3 = "cy" OR freshman_interest.act4 = "cy" OR
							freshman_interest.act5 = "cy" OR freshman_interest.act6 = "cy" OR
							freshman_interest.act7 = "cy" OR freshman_interest.act8 = "cy" OR
							freshman_interest.act9 = "cy" OR freshman_interest.act10 = "cy")');
						foreach ($cyid as $cy) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$cy['username']."'>".$cy['firstName']." ".$cy['lastName']."</a> ~ ".$cy['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="cy" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Wrestling</legend>
				<?php
					$czcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="cz" OR act2="cz" OR
						act3="cz" OR act4="cz" OR act5="cz" OR act6="cz" OR act7="cz" OR 
						act8="cz" OR act9="cz" OR act10="cz")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="cz" OR act2="cz" OR
						act3="cz" OR act4="cz" OR act5="cz" OR act6="cz" OR act7="cz" OR 
						act8="cz" OR act9="cz" OR act10="cz")
						THEN 1 ELSE 0 END)'];
					if ($czcount != 0) {
						if ($czcount == 1) {	
							echo "<p>There is currently one request for Wrestling:<p>";
						} else {
							echo "<p>There are currently ".$czcount." requests for Wrestling:<p>";
						}
						$czid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "cz" OR freshman_interest.act2 = "cz" OR
							freshman_interest.act3 = "cz" OR freshman_interest.act4 = "cz" OR
							freshman_interest.act5 = "cz" OR freshman_interest.act6 = "cz" OR
							freshman_interest.act7 = "cz" OR freshman_interest.act8 = "cz" OR
							freshman_interest.act9 = "cz" OR freshman_interest.act10 = "cz")');
						foreach ($czid as $cz) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$cz['username']."'>".$cz['firstName']." ".$cz['lastName']."</a> ~ ".$cz['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="cz" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Class Board</legend>
				<?php
					$dacount = database::query('SELECT count(*), SUM(CASE WHEN (act1="da" OR act2="da" OR
						act3="da" OR act4="da" OR act5="da" OR act6="da" OR act7="da" OR 
						act8="da" OR act9="da" OR act10="da")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="da" OR act2="da" OR
						act3="da" OR act4="da" OR act5="da" OR act6="da" OR act7="da" OR 
						act8="da" OR act9="da" OR act10="da")
						THEN 1 ELSE 0 END)'];
					if ($dacount != 0) {
						if ($dacount == 1) {	
							echo "<p>There is currently one request for Class Board:<p>";
						} else {
							echo "<p>There are currently ".$dacount." requests for Class Board:<p>";
						}
						$daid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "da" OR freshman_interest.act2 = "da" OR
							freshman_interest.act3 = "da" OR freshman_interest.act4 = "da" OR
							freshman_interest.act5 = "da" OR freshman_interest.act6 = "da" OR
							freshman_interest.act7 = "da" OR freshman_interest.act8 = "da" OR
							freshman_interest.act9 = "da" OR freshman_interest.act10 = "da")');
						foreach ($daid as $da) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$da['username']."'>".$da['firstName']." ".$da['lastName']."</a> ~ ".$da['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="da" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				<fieldset><legend>Executive Board</legend>
				<?php
					$dbcount = database::query('SELECT count(*), SUM(CASE WHEN (act1="db" OR act2="db" OR
						act3="db" OR act4="db" OR act5="db" OR act6="db" OR act7="db" OR 
						act8="db" OR act9="db" OR act10="db")
						THEN 1 ELSE 0 END) FROM freshman_interest')[0]['SUM(CASE WHEN (act1="db" OR act2="db" OR
						act3="db" OR act4="db" OR act5="db" OR act6="db" OR act7="db" OR 
						act8="db" OR act9="db" OR act10="db")
						THEN 1 ELSE 0 END)'];
					if ($dbcount != 0) {
						if ($dbcount == 1) {	
							echo "<p>There is currently one request for Executive Board:<p>";
						} else {
							echo "<p>There are currently ".$dbcount." requests for Executive Board:<p>";
						}
						$dbid = database::query('SELECT freshman_interest.*, users.`username`, users.firstName,
							users.lastName, users.email FROM users, freshman_interest
							WHERE freshman_interest.userid = users.id1
							AND (freshman_interest.act1 = "db" OR freshman_interest.act2 = "db" OR
							freshman_interest.act3 = "db" OR freshman_interest.act4 = "db" OR
							freshman_interest.act5 = "db" OR freshman_interest.act6 = "db" OR
							freshman_interest.act7 = "db" OR freshman_interest.act8 = "db" OR
							freshman_interest.act9 = "db" OR freshman_interest.act10 = "db")');
						foreach ($dbid as $db) {
							echo "<a href='7.P2P_Profile.php?usernameLogin=".$db['username']."'>".$db['firstName']." ".$db['lastName']."</a> ~ ".$db['email']."<br>";
						}
					} else {
						echo "<p>None<p>";
					}
				?>
				<br>
				<input name="db" type="submit" value="Send e-mails to Binki McKenna">
				</fieldset>
				<br>

				</form>
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