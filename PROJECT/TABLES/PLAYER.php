<?php  include('PLAYERDB.php'); ?>

<?php 
	if (isset($_GET['edit'])) {
		$cid = $_GET['edit'];
		$update = true;
		$record = oci_parse($db, "SELECT * FROM PLAYER WHERE PLAYER_ID=$pid");
		oci_execute($record);

		if($record){

			$n = oci_fetch_array($record);
			$pid = $n['pid'];
		    $pname =$n['pname'];
		    $dob = $n['dob'];
		    $rdate =$n['rdate'];
		    $skills = $n['skills'];
		    $Pnum1 =$n['Pnum1'];
		    $Pnum2 =$n['Pnum2'];
		    $Pnum3 =$n['Pnum3'];
		    $sal = $n['sal'];
		}
		
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>PLAYER</title>
    <link rel = "stylesheet" type = "text/css" href = "ALL ALL.css">
</head>
<body>
	<h1>PLAYER DATA</h1>
	<form  method="POST" action="#">
		<input type="search" id="search" class="search_box" name="sea" placeholder="SEARCH BY ID...">
		<button name="search">SEARCH</button>
    </form>
	<?php

         if (isset($_POST['search'])) {
	    	 $cid=$_POST['sea'];
    
	    	 $sql = "SELECT PLAYER_ID, PLAYER_NAME, DATE_OF_BIRTH, REGESTRATION_DATE, SKILLS, PLAYER_PHONE_NUMBER_1, PLAYER_PHONE_NUMBER_2, PLAYER_PHONE_NUMBER_3, PLAYER_SALARY FROM PLAYER WHERE PLAYER_ID=$pid";
	    	 $stid = oci_parse($db, $sql);
	    	 oci_execute($stid);
	    	
	    	while ($row=oci_fetch_array($stid)) {
	    		?>
	    		<table>
	    		<td><?php echo $row['PLAYER_ID']; ?></td>
	    		<td><?php echo $row['PLAYER_NAME']; ?></td>
	    		<td><?php echo $row['DATE_OF_BIRTH']; ?></td>
	    		<td><?php echo $row['REGESTRATION_DATE']; ?></td>
	    		<td><?php echo $row['SKILLS']; ?></td>
	    		<td><?php echo $row['PLAYER_PHONE_NUMBER_1']; ?></td>
	    		<td><?php echo $row['PLAYER_PHONE_NUMBER_2']; ?></td>
	    		<td><?php echo $row['PLAYER_PHONE_NUMBER_3']; ?></td>
	    		<td><?php echo $row['SALARY']; ?></td>
				<td><a href="PLAYER.php?edit=<?php echo $row['PLAYER_ID']; ?>" class="edit_btn" >EDIT</a></td>
			    <td><a href="PLAYERDB.php?del=<?php echo $row['PLAYER_ID']; ?>" class="del_btn">DELETE</a></td>
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

     <?php $results = oci_parse($db, "SELECT * FROM PLAYER"); 
         oci_execute($results);  
     ?>
<table>
	<thead>
		<tr>
			<th>PLAYER_ID</th>
			<th>PLAYER_NAME</th>
			<th>DATE_OF_BIRTH</th>
			<th>REGESTRATION_DATE</th>
			<th>SKILLS</th>
			<th>PLAYER_PHONE_NUMBER_1</th>
			<th>PLAYER_PHONE_NUMBER_2</th>
			<th>PLAYER_PHONE_NUMBER_3</th>
			<th>SALARY</th>
			<th colspan="2">ACTION</th>
		</tr>
	</thead>
    <?php while ($row = oci_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['PLAYER_ID']; ?></td>
			<td><?php echo $row['PLAYER_NAME']; ?></td>
			<td><?php echo $row['DATE_OF_BIRTH']; ?></td>
			<td><?php echo $row['REGESTRATION_DATE']; ?></td>
			<td><?php echo $row['SKILLS']; ?></td>
			<td><?php echo $row['PLAYER_PHONE_NUMBER_1']; ?></td>
			<td><?php echo $row['PLAYER_PHONE_NUMBER_2']; ?></td>
			<td><?php echo $row['PLAYER_PHONE_NUMBER_3']; ?></td>
			<td><?php echo $row['PLAYER_SALARY']; ?></td>
			<td>
				<a href="PLAYER.php?edit=<?php echo $row['PLAYER_ID']; ?>" class="edit_btn" >EDIT</a>
			</td>
			<td>
				<a href="PLAYERDB.php?del=<?php echo $row['PLAYER_ID']; ?>" class="del_btn">DELETE</a>
			</td>
		</tr>
	<?php } ?>
	
	
</table>

<hr><hr><hr>

	<form method="post" action="PLAYERDB.php" >
		<div class="input-group">
			<label>PLAYER ID</label>
			<input type="NUMBER" name="pid" value="<?php echo $pid; ?>">
		</div>
		<div class="input-group">
			<label>PLAYER NAME</label>
			<input type="text" name="pname" value="<?php echo $pname; ?>">
		</div>
        <div class="input-group">
			<label>DATE OF BIRTH</label>
			<input type="text" name="dob" value="<?php echo $dob; ?>">
		</div>
        <div class="input-group">
			<label>REGESTRATION DATE</label>
			<input type="text" name="rdate" value="<?php echo $rdate; ?>">
		</div>
        <div class="input-group">
			<label>SKILLS</label>
			<input type="text" name="skills" value="<?php echo $skills; ?>">
		</div>
        <div class="input-group">
			<label>PLAYER PHONE NUMBER 1</label>
			<input type="NUMBER" name="Pnum1" value="<?php echo $Pnum1; ?>">
		</div>
        <div class="input-group">
			<label>PLAYER PHONE NUMBER 2</label>
			<input type="NUMBER" name="Pnum2" value="<?php echo $Pnum2; ?>">
		</div>
        <div class="input-group">
			<label>PLAYER PHONE NUMBER 3</label>
			<input type="NUMBER" name="Pnum3" value="<?php echo $Pnum3; ?>">
		</div>
        <div class="input-group">
			<label>PLAYER SALARY</label>
			<input type="text" name="sal" value="<?php echo $sal; ?>">
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