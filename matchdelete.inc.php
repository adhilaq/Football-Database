<?php
  require 'dbh.inc.php';

  if(isset($_POST['matchdelete-submit']))
  {  
    $match_id = $_POST['match_id'];
    $home_id = $_POST['home_id'];
    $away_id = $_POST['away_id'];

    }
    $sql = "DELETE FROM matches WHERE match_id='$match_id' and home_id='$home_id' and away_id='$away_id'";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }