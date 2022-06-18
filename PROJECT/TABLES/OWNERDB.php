<?php 
	session_start();
	$db = oci_connect('scott', 'tiger', 'localhost/XE', 'AL32UTF8');


	// initialize variables
	$oname = "";
	$email = "";
	$Onum1 = "";
	$Onum2 = "";
	$Onum3 = "";
	$oid = "";
	$update = false;

	if (isset($_POST['save'])) {
		$oid = $_POST['oid'];
		$oname = $_POST['oname'];
		$email = $_POST['email'];
		$Onum1 = $_POST['Onum1'];
		$Onum2 = $_POST['Onum2'];
		$Onum3 = $_POST['Onum3'];

		$a = oci_parse($db, "INSERT INTO OWNER (OWNER_ID, OWNER_NAME, EMAIL, OWNER_PHONE_NUMBER_1, OWNER_PHONE_NUMBER_2, OWNER_PHONE_NUMBER_3) VALUES ('$oid', '$oname', '$email', '$Onum1', '$Onum2', '$Onum3')"); 
		oci_execute($a);
		$_SESSION['message'] = "DATA ADDED SUCCESSFULLY"; 
		header('location: OWNER.php');
	}
    if (isset($_POST['update'])) {
        $oid = $_POST['oid'];
		$oname = $_POST['oname'];
		$email = $_POST['email'];
		$Onum1 = $_POST['Onum1'];
		$Onum2 = $_POST['Onum2'];
		$Onum3 = $_POST['Onum3'];
    
        $b=oci_parse($db, "UPDATE OWNER SET OWNER_NAME='$oname', email='$email', OWNER_PHONE_NUMBER_1='$Onum1', OWNER_PHONE_NUMBER_2='$Onum2', OWNER_PHONE_NUMBER_3='$Onum3' WHERE OWNER_ID=$oid");
		oci_execute($b);
        $_SESSION['message'] = "DATA UPDATED SUCCESSFULLY"; 
        header('location: OWNER.php');
    }
    if (isset($_GET['del'])) {
        $cid = $_GET['del'];
        $c = oci_parse($db, "DELETE FROM OWNER WHERE OWNER_ID=$oid");
		oci_execute($c);
        $_SESSION['message'] = "DATA DELETED SUCCESSFULLY"; 
        header('location: OWNER.php');
    }
?>