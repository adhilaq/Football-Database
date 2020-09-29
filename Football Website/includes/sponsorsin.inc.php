<?php
if(isset($_POST['sponsorsin-submit']))
{
    require 'dbh.inc.php';
    $club_id=$_POST['club_id'];
    $sponsor_name=$_POST['sponsor_name'];
    $amount=$_POST['amount'];
    $cond=$_POST['cond'];

    $sql= "SELECT sponsor_name from sponsors where sponsor_name=?";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../sponsorsin.php?error=sqlerror");
        exit();
    }
    else
    {        
        mysqli_stmt_bind_param($stmt,"s",$shirt_no);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck=mysqli_stmt_num_rows($stmt);
        if($resultCheck>0)
        {
            header("Location: ../sponsorsin.php?error=usertaken&mail=".$sponsor_name);
            exit();
        }
        else
        {
            $sql="INSERT INTO sponsors(club_id,sponsor_name,amount,cond) values(?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql))
            {
                header("Location: ../sponsorsin.php?error=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt,"ssss",$club_id,$sponsor_name,$amount,$cond);
                mysqli_stmt_execute($stmt);
                header("Location: ../sponsorsin.php?insertion=success");
                exit();                
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else
{
    header("Location: ../sponsorsin.php");
    exit(); 

}