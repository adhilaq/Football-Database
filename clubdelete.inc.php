<?php
  require 'dbh.inc.php';

  if(isset($_POST['submit']))
  {  
    $club_name = $_POST['club'];

    }
    $sql = "DELETE FROM club WHERE club_name='$club_name'";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }