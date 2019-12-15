<?php
  require 'dbh.inc.php';

  if(isset($_POST['submit']))
  {  
    $clubid = $_POST['clubid'];
    $sponsor_name = $_POST['sponsor'];

    }
    $sql = "DELETE FROM sponsors WHERE club_id='$clubid' and sponsor_name='$sponsor_name'";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }