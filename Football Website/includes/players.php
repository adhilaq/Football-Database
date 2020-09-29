<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylesheet.css">
    <title>DBMS Project</title>
  </head>
  <body>
    <?php
    require 'includes/dbh.inc.php';

    $sql = "SELECT * FROM club where clubid=".$_GET['clubid'];
    $result = mysqli_query($conn,$sql);

    echo "<table border='1'>
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

    $sql = "SELECT * FROM players where club_id=".$_GET['club_id'];
    $result = mysqli_query($conn,$sql);

    echo "<table border='1'>
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

    ?>
  </body>
</html>
