<?php
if(isset($_POST['login-submit']))
{
    require 'dbh.inc.php';
    $mailuid= $_POST['mailuid'];
    $password= $_POST['pwd'];

    $sql= "SELECT * FROM users WHERE username=? OR email=?;";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../index.php?error=sqlerror");
        exit(); 
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"ss",$mailuid,$mailuid);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        if($row=mysqli_fetch_assoc($result))
        {
            $pwdCheck= password_verify($password,$row['pwd']);
            if($pwdCheck==false)
            {
                header("Location: ../index.php?error=wrongpwd");
                exit(); 
            }
            else if($pwdCheck==true)
            {
                session_start();
                $_SESSION['userId']=$row['userid'];
                $_SESSION['userName']=$row['username'];
                header("Location: ../index.php?login=success");
                exit();       
            }
            else
            {
                header("Location: ../index.php?error=wrongpwd");
                exit(); 
            }
        }
        else
        {
            header("Location: ../index.php?error=nouser");
            exit(); 
        }
    }
}
else
{
    header("Location: ../index.php");
    exit(); 
}