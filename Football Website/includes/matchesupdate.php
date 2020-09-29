<?php
  require 'dbh.inc.php';

  if(isset($_POST['submit'])){//if the submit button is clicked

	$clubid = $_POST['clubid'];
	$matchid = $_POST['matchid'];
	$opponent = $_POST['opponent'];
	$match_date = $_POST['date'];
  $location = $_POST['loc'];
  $tournament = $_POST['tournament'];
  $result = $_POST['result'];
	}

	$sql="UPDATE matches SET match_id='$matchid',home_id='$clubid', away_id = '$opponent', match_date = '$match_date', locations = '$location', tournament = '$tournament', result = '$result' WHERE match_id = '$matchid'";
  $result = mysqli_query($conn,$sql );
	header("Location: ../matchesupdate.html");
?>
