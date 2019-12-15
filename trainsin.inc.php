<?php
if(isset($_POST['trainsin-submit']))
{
    require 'dbh.inc.php';
    $coach_id=$_POST['coach_id'];
    $shirt_no=$_POST['shirt_no'];


            $sql="INSERT INTO trains(coach_id,shirt_no) values(?,?)";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql))
            {
                header("Location: ../trainsin.php?error=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt,"ss",$coach_id,$shirt_no);
                mysqli_stmt_execute($stmt);
                header("Location: ../trainsin.php?insertion=success");
                exit();                
            }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else
{
    header("Location: ../trainsin.php");
    exit(); 

}