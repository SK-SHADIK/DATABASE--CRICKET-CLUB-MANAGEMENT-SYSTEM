<?php  include('OWNERDB.php'); ?>

<?php 
	if (isset($_GET['edit'])) {
		$cid = $_GET['edit'];
		$update = true;
		$record = oci_parse($db, "SELECT * FROM OWNER WHERE OWNER_ID=$oid");
		oci_execute($record);

		if($record){

			$n = oci_fetch_array($record);
			$oid = $n['OWNER_ID'];
		    $oname = $n['OWNER_NAME'];
		    $email = $n['EMAIL'];
		    $Onum1 = $n['OWNER_PHONE_NUMBER_1'];
		    $Onum2 = $n['OWNER_PHONE_NUMBER_2'];
		    $Onum3 = $n['OWNER_PHONE_NUMBER_3'];
		}
		
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>OWNER</title>
    <link rel = "stylesheet" type = "text/css" href = "ALL ALL.css">
</head>
<body>
	<h1>OWNER DATA</h1>
	<form  method="POST" action="#">
		<input type="search" id="search" class="search_box" name="sea" placeholder="SEARCH BY ID...">
		<button name="search">SEARCH</button>
    </form>
	<?php

         if (isset($_POST['search'])) {
	    	 $cid=$_POST['sea'];
    
	    	 $sql = "SELECT OWNER_ID, OWNER_NAME, EMAIL, OWNER_PHONE_NUMBER_1, OWNER_PHONE_NUMBER_2, OWNER_PHONE_NUMBER_3 FROM OWNER WHERE OWNER_ID=$oid";
	    	 $stid = oci_parse($db, $sql);
	    	 oci_execute($stid);
	    	
	    	while ($row=oci_fetch_array($stid)) {
	    		?>
	    		<table>
	    		<td><?php echo $row['OWNER_ID']; ?></td>
	    		<td><?php echo $row['OWNER_NAME']; ?></td>
	    		<td><?php echo $row['EMAIL']; ?></td>
	    		<td><?php echo $row['OWNER_PHONE_NUMBER_1']; ?></td>
	    		<td><?php echo $row['OWNER_PHONE_NUMBER_2']; ?></td>
	    		<td><?php echo $row['OWNER_PHONE_NUMBER_3']; ?></td>
				<td><a href="OWNER.php?edit=<?php echo $row['OWNER_ID']; ?>" class="edit_btn" >EDIT</a></td>
			    <td><a href="OWNERDB.php?del=<?php echo $row['OWNER_ID']; ?>" class="del_btn">DELETE</a></td>
	    		</table>
	    		<?php
	        }
	    	
	    	
	    }
	
	?>
     <?php if (isset($_SESSION['message'])): ?>
     	<div class="msg">
     		<?php 
     			echo $_SESSION['message']; 
     			unset($_SESSION['message']);
     		?>
     	</div>
     <?php endif ?>

     <?php $results = oci_parse($db, "SELECT * FROM OWNER"); 
         oci_execute($results);  
     ?>
<table>
	<thead>
		<tr>
			<th>OWNER_ID</th>
			<th>OWNER_NAME</th>
			<th>EMAIL</th>
			<th>OWNER_PHONE_NUMBER_1</th>
			<th>OWNER_PHONE_NUMBER_2</th>
			<th>OWNER_PHONE_NUMBER_3</th>
			<th colspan="2">ACTION</th>
		</tr>
	</thead>
    <?php while ($row = oci_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['OWNER_ID']; ?></td>
			<td><?php echo $row['OWNER_NAME']; ?></td>
			<td><?php echo $row['EMAIL']; ?></td>
			<td><?php echo $row['OWNER_PHONE_NUMBER_1']; ?></td>
			<td><?php echo $row['OWNER_PHONE_NUMBER_2']; ?></td>
			<td><?php echo $row['OWNER_PHONE_NUMBER_3']; ?></td>
			<td>
				<a href="OWNER.php?edit=<?php echo $row['OWNER_ID']; ?>" class="edit_btn" >EDIT</a>
			</td>
			<td>
				<a href="OWNERDB.php?del=<?php echo $row['OWNER_ID']; ?>" class="del_btn">DELETE</a>
			</td>
		</tr>
	<?php } ?>
	
	
</table>

<hr><hr><hr>

	<form method="post" action="OWNERDB.php" >
		<div class="input-group">
			<label>OWNER ID</label>
			<input type="NUMBER" name="oid" value="<?php echo $oid; ?>">
		</div>
		<div class="input-group">
			<label>OWNER NAME</label>
			<input type="text" name="oname" value="<?php echo $oname; ?>">
		</div>
        <div class="input-group">
			<label>EMAIL</label>
			<input type="text" name="email" value="<?php echo $email; ?>">
		</div>
        <div class="input-group">
			<label>OWNER PHONE NUMBER 1</label>
			<input type="NUMBER" name="Onum1" value="<?php echo $Onum1; ?>">
		</div>
        <div class="input-group">
			<label>OWNER PHONE NUMBER 2</label>
			<input type="NUMBER" name="Onum2" value="<?php echo $Onum2; ?>">
		</div>
        <div class="input-group">
			<label>OWNER PHONE NUMBER 3</label>
			<input type="NUMBER" name="Onum3" value="<?php echo $Onum3; ?>">
		</div>


		<div class="input-group">
      <?php if ($update == true): ?>
	    <button class="btn" type="submit" name="update" style="background: #556B2F;" >UPDATE</button>
      <?php else: ?>
	    <button class="btn" type="submit" name="save" >SAVE</button>
      <?php endif ?>
		</div>
	</form>
</body>
</html>