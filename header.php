<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Soccer Database</title>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <h1> Soccer Database </h1>

    <header>

        <div>
        <?php
                if(isset($_SESSION['userId']))
                {
                    echo '<form action="includes/logout.inc.php" method="post">
                    <button type="submit" name="logout-submit">Logout</button>
                </form>';
                }
                else
                {
                    echo ' <form action="includes/login.inc.php" method="post">
                    <input type="text" name="mailuid" placeholder="Username/Email">
                    <input type="password" name="pwd" placeholder="Password">
                    <button type="submit" name="login-submit">Login</button>
                </form>
                <a href="signup.php">Signup</a>';
                }
        ?>          

        </div>

    </header>