<?php
  require 'dbh.inc.php';

  if(isset($_POST['submit']))
  {  
    $coachid = $_POST['coachid'];
    $coach_name = $_POST['coach'];

    }
    $sql = "DELETE FROM coach WHERE coach_id='$coachid' and coach_name='$coach_name'";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }