<?php
    require 'header.php';

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>DBMS Project</title>
    <link rel="stylesheet" href="stylesheet.css">
    <style>
    .main {
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
    background: #00f1;
  }
  </style>
  </head>
  <body>
    <?php echo '<a class="main" href="clubin.html">Insert Club </a>';?>
    <h1>Football Clubs</h1>
    <h2>Select a team to view its details.</h2>

    <div class="flex-container">
        <?php
            require 'includes/dbh.inc.php';
            $sql="SELECT * from club;";
            $result= mysqli_query($conn,$sql);
            $resultcheck=mysqli_num_rows($result);
            if($resultcheck>0)
            {
                while($row=mysqli_fetch_assoc($result))
                {  
                    echo '<div class="box"><a href="players.php?clubid='.$row["clubid"].'">'.$row["club_name"].'</a></div>';          
                }
            }
        ?>
    </div>
  </body>
</html>
