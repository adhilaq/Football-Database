<?php
if(isset($_POST['playersin-submit']))
{
    require 'dbh.inc.php';
    $club_id=$_POST['club_id'];
    $shirt_no=$_POST['shirt_no'];
    $player_name=$_POST['player_name'];
    $age=$_POST['age'];
    $nationality=$_POST['nationality'];
    $position=$_POST['position'];
    $market_value=$_POST['market_value'];
    $player_wages=$_POST['player_wages'];
    $years_left=$_POST['years_left'];

    $sql= "SELECT shirt_no from players where shirt_no=?";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../playersin.html?error=sqlerror");
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
            header("Location: ../playersin.html?error=usertaken&mail=".$shirt_no);
            exit();
        }
        else
        {
            $sql="INSERT INTO players(club_id,shirt_no,player_name,age,nationality,position,market_value,player_wages,years_left) values(?,?,?,?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql))
            {
                header("Location: ../playersin.html?error=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt,"sssssssss",$club_id,$shirt_no,$player_name,$age,$nationality,$position,$market_value,$player_wages,$years_left);
                mysqli_stmt_execute($stmt);
                header("Location: ../playersin.html?insertion=success");
                exit();                
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else
{
    header("Location: ../playersin.html");
    exit(); 

}