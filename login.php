<?php
    session_start();
    
    include ("DataB.php");
    
    if(isset($_POST['Login'])){
    $student_number = $_POST['student_number'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users
            WHERE student_number = '$student_number'
            AND password ='$password'";

$result = mysqli_query($conn, $sql);

    if(mysql_num_rows($result) > 0)
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
        <input type = "text" name="Student_number" placeholder="Student Number"><br><br>
         <input type = "password" name="Password" placeholder="Password"><br><br>
          <button type = "submit" name="login"> <a href ="dashboard.php">Login</a></button>
</body>
</html>