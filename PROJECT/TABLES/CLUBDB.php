<?php 
	session_start();
	$db = oci_connect('scott', 'tiger', 'localhost/XE', 'AL32UTF8');


	// initialize variables
	$cname = "";
	$dateE = "";
	$Cnum1 = "";
	$Cnum2 = "";
	$Cnum3 = "";
	$cid = "";
	$update = false;

	if (isset($_POST['save'])) {
		$cid = $_POST['cid'];
		$cname = $_POST['cname'];
		$dateE = $_POST['dateE'];
		$Cnum1 = $_POST['Cnum1'];
		$Cnum2 = $_POST['Cnum2'];
		$Cnum3 = $_POST['Cnum3'];

		$a = oci_parse($db, "INSERT INTO CLUB (CLUB_ID, CLUB_NAME, DATE_OF_ESTABILISHED, CLUB_PHONE_NUMBER_1, CLUB_PHONE_NUMBER_2, CLUB_PHONE_NUMBER_3) VALUES ('$cid', '$cname', '$dateE', '$Cnum1', '$Cnum2', '$Cnum3')"); 
		oci_execute($a);
		$_SESSION['message'] = "DATA ADDED SUCCESSFULLY"; 
		header('location: CLUB.php');
	}
    if (isset($_POST['update'])) {
        $cid = $_POST['cid'];
		$cname = $_POST['cname'];
		$dateE = $_POST['dateE'];
		$Cnum1 = $_POST['Cnum1'];
		$Cnum2 = $_POST['Cnum2'];
		$Cnum3 = $_POST['Cnum3'];
    
        $b=oci_parse($db, "UPDATE CLUB SET CLUB_NAME='$cname', DATE_OF_ESTABILISHED='$dateE', CLUB_PHONE_NUMBER_1='$Cnum1', CLUB_PHONE_NUMBER_2='$Cnum2', CLUB_PHONE_NUMBER_3='$Cnum3' WHERE CLUB_ID=$cid");
		oci_execute($b);
        $_SESSION['message'] = "DATA UPDATED SUCCESSFULLY"; 
        header('location: CLUB.php');
    }
    if (isset($_GET['del'])) {
        $cid = $_GET['del'];
        $c = oci_parse($db, "DELETE FROM CLUB WHERE CLUB_ID=$cid");
		oci_execute($c);
        $_SESSION['message'] = "DATA DELETED SUCCESSFULLY"; 
        header('location: CLUB.php');
    }
?>