<?php
    require 'header.php';

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylesheet.css">
    <title>DBMS Project</title>
    <style media="screen">
body {
  width: 95%;
  font-family: mons, sans-serif;
}
  table {
    width: 1000px;
    margin: 40px auto;
    border-collapse: collapse;
    border: 2px black solid;
    text-align: center;
    height: 80px;
    font-size: 18px;
  }
  h3 {
    text-align: center;
    font-size: 25px;
    line-height: 50px;
    margin-bottom: 20px;
  }
  a {
    border-style: solid;
  border-width : 1px 1px 1px 1px;
  text-decoration : none;
  padding : 4px;
  border-color : #000000;
  margin-left: 0;
  margin-right:0;
  margin: 0 45%;
    text-align: center;
    font-size: 18px;
    text-decoration: none;
    line-height: 30px;
    background: #00f2;
  }
  </style>
  </head>
  <body>
    <?php
    require 'includes/dbh.inc.php';

    echo '<a href="clubupdate.html">Update Club   </a>';
    echo '<a href="clubdelete.php">Delete Club   </a>';
    $sql = "SELECT * FROM club where clubid=".$_GET['clubid'];
    $result = mysqli_query($conn,$sql);
    echo "<h3>Club</h3>
    <table border='1'>
    <tr>
    <th>Club ID</th>
    <th>Club Name</th>
    <th>Owners</th>
    <th>Club Value</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>" . $row['clubid'] . "</td>";
      echo "<td>" . $row['club_name'] . "</td>";
      echo "<td>" . $row['owners'] . "</td>";
      echo "<td>" . $row['club_value'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";

    //Select from Players
    echo '<a href="playersin.html">Insert players  </a>';
    echo '<a href="playersupdate.html">Update players  </a>';
    echo '<a href="playersdelete.php">Delete players   </a>';
    $sql = "SELECT * FROM players where club_id=".$_GET['clubid'];
    $result = mysqli_query($conn,$sql);

    echo "<h3>Players</h3>
    <table border='1'>
    <tr>
    <th>Club ID</th>
    <th>Player Name</th>
    <th>Age</th>
    <th>Position</th>
    <th>Nationality</th>
    <th>Shirt No.</th>
    <th>Market Value</th>
    <th>Player Wages</th>
    <th>Years Left</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>" . $row['club_id'] . "</td>";
      echo "<td>" . $row['player_name'] . "</td>";
      echo "<td>" . $row['age'] . "</td>";
      echo "<td>" . $row['position'] . "</td>";
      echo "<td>" . $row['nationality'] . "</td>";
      echo "<td>" . $row['shirt_no'] . "</td>";
      echo "<td>" . $row['market_value'] . "</td>";
      echo "<td>" . $row['player_wages'] . "</td>";
      echo "<td>" . $row['years_left'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";

    //Select from MATCHES
    echo '<a href="matchin.php">Insert matches   </a>';
    echo '<a href="matchdelete.php">Delete matches   </a>';
    echo '<a href="matchesupdate.html">Update matches   </a>';
    $clubid=$_GET['clubid'];
    $sql = "SELECT * FROM matches where home_id='$clubid' or away_id='$clubid'";
    $result = mysqli_query($conn,$sql);

    echo "<h3>Matches</h3>
    <table border='1'>
    <tr>
    <th>Match ID</th>
    <th>Home Team ID</th>
    <th>Away Team ID</th>
    <th>Location</th>
    <th>Match Date</th>
    <th>Tournament</th>
    <th>Result</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>" . $row['match_id'] . "</td>";
      echo "<td>" . $row['home_id'] . "</td>";
      echo "<td>" . $row['away_id'] . "</td>";
      echo "<td>" . $row['locations'] . "</td>";
      echo "<td>" . $row['match_date'] . "</td>";
      echo "<td>" . $row['tournament'] . "</td>";
      echo "<td>" . $row['result'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";

    //Select from SPONSORS
    echo '<a href="sponsorsin.php">Insert sponsors   </a>';
    echo '<a href="sponsorsupdate.html">Update sponsors  </a>';
    echo '<a href="sponsorsdelete.php">Delete sponsors  </a>';
    $sql = "SELECT * FROM sponsors where club_id=".$_GET['clubid'];
    $result = mysqli_query($conn,$sql);

    echo "<h3>Sponsors</h3>
    <table border='1'>
    <tr>
    <th>Club ID</th>
    <th>Sponsor Name</th>
    <th>Amount</th>
    <th>Condition</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>" . $row['club_id'] . "</td>";
      echo "<td>" . $row['sponsor_name'] . "</td>";
      echo "<td>" . $row['amount'] . "</td>";
      echo "<td>" . $row['cond'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";

    //Select from TRAINS
    echo '<a href="trainsin.php">Insert trainers </a>';
    echo '<a href="trainsupdate.html">Update trainers </a>';
    $arr="SELECT shirt_no FROM players where club_id=".$_GET['clubid'];
    $arr1=mysqli_query($conn,$arr);
    $resultcheck=mysqli_num_rows($arr1);
    if($resultcheck>0)
    {
    $arr2=mysqli_fetch_array($arr1);
    $sql = "SELECT * FROM trains where shirt_no IN (".implode(',',$arr2).")";
    $result = mysqli_query($conn,$sql);
    }

    echo "<h3>Trains</h3>
    <table border='1'>
    <tr>
    <th>Coach ID</th>
    <th>Shirt No.</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>" . $row['coach_id'] . "</td>";
      echo "<td>" . $row['shirt_no'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";

    //Select from COACH
    echo '<a href="coachin.php">Insert coach  </a>';
    echo '<a href="coachupdate.html">Update coach  </a>';
    echo '<a href="coachdelete.php">Delete coach  </a>';
    $sql = "SELECT * FROM coach where club_id=".$_GET['clubid'];
    $result = mysqli_query($conn,$sql);

    echo "<h3>Coach</h3>
    <table border='1'>
    <tr>
    <th>Coach ID</th>
    <th>Coach Name</th>
    <th>Training Position</th>
    <th>Coach Wages</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>" . $row['coach_id'] . "</td>";
      echo "<td>" . $row['coach_name'] . "</td>";
      echo "<td>" . $row['train_pos'] . "</td>";
      echo "<td>" . $row['coach_wages'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
    ?>
  </body>
</html>
