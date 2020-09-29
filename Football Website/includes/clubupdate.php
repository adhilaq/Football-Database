<?php
  require 'dbh.inc.php';

  if(isset($_POST['submit'])){//if the submit button is clicked

	$clubid = $_POST['clubid'];

	$clubname = $_POST['clubname'];

	$clubowner = $_POST['owners'];

	$clubvalue = $_POST['clubvalue'];

	}

	$sql="UPDATE club SET club_name='$clubname',owners='$clubowner', club_value='$clubvalue' WHERE clubid=$clubid";
 	$result = mysqli_query($conn,$sql );
	header("Location: ../clubupdate.html");
?>
