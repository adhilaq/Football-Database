<?php
  require 'dbh.inc.php';

  if(isset($_POST['submit'])){//if the submit button is clicked

	$clubid = $_POST['clubid'];
	$player_name = $_POST['player_name'];
	$age = $_POST['age'];
	$position = $_POST['position'];
  $nationality = $_POST['nationality'];
  $shirt_no = $_POST['shirt_no'];
  $market_value = $_POST['market_value'];
  $player_wages = $_POST['player_wages'];
  $years_left = $_POST['years_left'];
	}

	$sql="UPDATE players SET club_id='$clubid' ,player_name='$player_name',age = '$age', position='$position', nationality = '$nationality', shirt_no = '$shirt_no', market_value = '$market_value', player_wages = '$player_wages', years_left = '$years_left' WHERE player_name = '$player_name'";
  $result = mysqli_query($conn,$sql);
  header("Location: ../playersupdate.html?updation=success");
?>
