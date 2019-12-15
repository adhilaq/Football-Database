<?php
if(isset($_POST['coachin-submit']))
{
    require 'dbh.inc.php';
    $club_id=$_POST['club_id'];
    $coach_id=$_POST['coach_id'];
    $coach_name=$_POST['coach_name'];
    $position=$_POST['position'];
    $coach_wages=$_POST['coach_wages'];

    $sql= "SELECT coach_id from coach where coach_id=?";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../coachin.php?error=sqlerror");
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
            header("Location: ../coachin.php?error=usertaken&mail=".$coach_id);
            exit();
        }
        else
        {
            $sql="INSERT INTO coach(club_id,coach_id,coach_name,train_pos,coach_wages) values(?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql))
            {
                header("Location: ../coachin.php?error=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt,"sssss",$club_id,$coach_id,$coach_name,$position,$coach_wages);
                mysqli_stmt_execute($stmt);
                header("Location: ../coachin.php?insertion=success");
                exit();                
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else
{
    header("Location: ../coachin.html");
    exit(); 

}