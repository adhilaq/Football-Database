<?php
if(isset($_POST['matchin-submit']))
{
    require 'dbh.inc.php';
    $match_id=$_POST['match_id'];
    $home_id=$_POST['home_id'];
    $away_id=$_POST['away_id'];
    $location=$_POST['location'];
    $matchdate=$_POST['matchdate'];
    $tournament=$_POST['tournament'];
    $result=$_POST['result'];

    $sql= "SELECT match_id from matches where match_id=?";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../matchin.php?error=sqlerror1");
        exit();
    }
    else
    {        
        mysqli_stmt_bind_param($stmt,"s",$coach_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck=mysqli_stmt_num_rows($stmt);
        if($resultCheck>0)
        {
            header("Location: ../matchin.php?error=usertaken&mail=".$coach_id);
            exit();
        }
        else
        {
            $sql="INSERT INTO matches(match_id,home_id,away_id,locations,match_date,tournament,result) values(?,?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql))
            {
                header("Location: ../matchin.php?error=sqlerror2");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt,"sssssss",$match_id,$home_id,$away_id,$location,$matchdate,$tournament,$result);
                mysqli_stmt_execute($stmt);
                header("Location: ../matchin.php?insertion=success");
                exit();                
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else
{
    header("Location: ../matchin.php");
    exit(); 

}