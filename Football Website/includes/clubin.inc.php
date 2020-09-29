<?php
if(isset($_POST['clubin-submit']))
{
    require 'dbh.inc.php';
    $club_name=$_POST['clubname'];
    $owners=$_POST['owner'];
    $club_value=$_POST['clubvalue'];

    $sql= "SELECT club_name from club where club_name=?";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../clubin.html?error=sqlerror");
        exit();
    }
    else
    {        
        mysqli_stmt_bind_param($stmt,"s",$club_name);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck=mysqli_stmt_num_rows($stmt);
        if($resultCheck>0)
        {
            header("Location: ../clubin.html?error=usertaken&mail=".$owners);
            exit();
        }
        else
        {
            $sql="INSERT INTO club(club_name,owners,club_value) values(?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql))
            {
                header("Location: ../clubin.html?error=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt,"sss",$club_name,$owners,$club_value);
                mysqli_stmt_execute($stmt);
                header("Location: ../clubin.html?insertion=success");
                exit();                
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else
{
    header("Location: ../clubin.html");
    exit(); 

}