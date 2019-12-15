<?php
 	require 'dbh.inc.php';

  	if(isset($_POST['submit'])){//if the submit button is clicked

	$coachid = $_POST['coachid'];
	$shirt_no = $_POST['shirt'];
	}

	$sql="UPDATE trains SET shirt_no = '$shirt_no' WHERE coach_id = $coachid";
 	$result = mysqli_query($conn,$sql );
  	header("Location: ../trainsupdate.html");
?>
