<?php
  require 'dbh.inc.php';

  if(isset($_POST['submit']))
  {  
    $clubid = $_POST['clubid'];
    $player_name = $_POST['player_name'];
    $shirt_no = $_POST['shirt_no'];   

    }
    $sql = "DELETE FROM players WHERE shirt_no='$shirt_no' and player_name='$player_name'";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }