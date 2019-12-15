<?php
  require 'dbh.inc.php';

  if(isset($_POST['submit'])){//if the submit button is clicked

	$coachid = $_POST['coachid'];
	$coach_name = $_POST['name'];
	$train_pos = $_POST['pos'];
	$coach_wages = $_POST['wages'];
	}

	$sql="UPDATE coach SET coach_name = '$coach_name', train_pos = '$train_pos', coach_wages = '$coach_wages' WHERE coach_id = $coachid";
	$result = mysqli_query($conn,$sql);
	header("Location: ../coachupdate.html"); 
?>
