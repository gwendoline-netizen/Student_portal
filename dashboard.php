<?php
   
   session_start();
    if(!isset($_SESSION['student_number']))
    {
        header("Location: profile.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        a{
            text-decoration: none;
            color: black;
            font-size: 20px;
        }
        </style>
</head>
<body>
    <H1>You are now logged in to your UniGwen Student Portal</h1>
    <br>
   <button> <a href ="profile.php">My Profile</a></button>

</body>
</html>