<?php
    session_start();
    
    include ("DataB.php");
    
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login']))
        {
    $student_number = $_POST['student_number'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users
            WHERE student_number = '$student_number'
            AND password ='$password'";

$result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
        {
    $_SESSION['student_number'] = $student_number;
    header("Location: dashboard.php");
    exit();
        }
    else
        {
    echo"Wrong Student Number or Password";
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form method = "POST"> 
        <input type = "text" name="student_number" placeholder="Student Number"><br><br>
         <input type = "password" name="password" placeholder="Password"><br><br>
          <button type = "submit" name="login"> <a href ="profile.php">Login</a></button>
</body>
</html>