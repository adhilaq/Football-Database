<?php
  require 'dbh.inc.php';

  if(isset($_POST['submit'])){//if the submit button is clicked

	$clubid = $_POST['clubid'];
	$sponsor_name = $_POST['sponsor'];
	$amount = $_POST['amt'];
	$condition = $_POST['cond'];
	}

	$sql="UPDATE sponsors SET sponsor_name = '$sponsor_name', amount = '$amount', cond = '$condition' WHERE club_id = $clubid";
  $result = mysqli_query($conn,$sql );
  header("Location: ../sponsorsupdate.html");
?>
