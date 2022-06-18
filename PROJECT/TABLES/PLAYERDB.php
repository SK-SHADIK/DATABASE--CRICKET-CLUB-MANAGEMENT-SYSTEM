<?php 
	session_start();
	$db = oci_connect('scott', 'tiger', 'localhost/XE', 'AL32UTF8');


	// initialize variables
	$pname = "";
	$dob = "";
	$rdate = "";
	$skills = "";
	$Pnum1 = "";
	$Pnum2 = "";
	$Pnum3 = "";
	$sal = "";
	$pid = "";
	$update = false;

	if (isset($_POST['save'])) {
		$pid = $_POST['pid'];
		$pname = $_POST['pname'];
		$dob = $_POST['dob'];
		$rdate = $_POST['rdate'];
		$skills = $_POST['skills'];
		$Pnum1 = $_POST['Pnum1'];
		$Pnum2 = $_POST['Pnum2'];
		$Pnum3 = $_POST['Pnum3'];
		$sal = $_POST['sal'];

		$a = oci_parse($db, "INSERT INTO PLAYER (PLAYER_ID, PLAYER_NAME, DATE_OF_BIRTH, REGESTRATION_DATE, SKILLS, PLAYER_PHONE_NUMBER_1, PLAYER_PHONE_NUMBER_2, PLAYER_PHONE_NUMBER_3, PLAYER_SALARY) VALUES ('$pid', '$pname', '$dob', '$rdate', '$skills', '$Pnum1', '$Pnum2', '$Pnum3', '$sal')"); 
		oci_execute($a);
		$_SESSION['message'] = "DATA ADDED SUCCESSFULLY"; 
		header('location: PLAYER.php');
	}
    if (isset($_POST['update'])) {
        $pid = $_POST['pid'];
		$pname = $_POST['pname'];
		$dob = $_POST['dob'];
		$rdate = $_POST['rdate'];
		$skills = $_POST['skills'];
		$Pnum1 = $_POST['Pnum1'];
		$Pnum2 = $_POST['Pnum2'];
		$Pnum3 = $_POST['Pnum3'];
		$sal = $_POST['sal'];
    
        $b=oci_parse($db, "UPDATE PLAYER SET PLAYER_NAME='$pname', DATE_OF_BIRTH='$dob', REGESTRATION_DATE='$rdate', SKILLS='$skills', PLAYER_PHONE_NUMBER_1='$Pnum1', PLAYER_PHONE_NUMBER_2='$Pnum2', PLAYER_PHONE_NUMBER_3='$Pnum3', PLAYER_SALARY='$sal', WHERE PLAYER_ID=$pid");
		oci_execute($b);
        $_SESSION['message'] = "DATA UPDATED SUCCESSFULLY"; 
        header('location: PLAYER.php');
    }
    if (isset($_GET['del'])) {
        $cid = $_GET['del'];
        $c = oci_parse($db, "DELETE FROM PLAYER WHERE PLAYER_ID=$cid");
		oci_execute($c);
        $_SESSION['message'] = "DATA DELETED SUCCESSFULLY"; 
        header('location: PLAYER.php');
    }
?>