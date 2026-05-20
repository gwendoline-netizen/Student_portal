<?php
    session_start();

    if(!isset($_SESSION['student_number']))
         {
             header("Location: login.php");
             exit();
          }

    include("DataB.php");

    $student_number = $_SESSION['student_number'];
    $sql = "SELECT * FROM users WHERE student_number ='$student_number'";
    $result = mysqli_query($conn, $sql);

    if(!$result){
        die("SQL Error:" . mysqli_error($conn));
    }
        
    $row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1>UniGwen Profile</h1>
    <p> <b>Student Number:</b><?php echo $row['student_number'];?></p>
    <p> <b>Name:</b><?php echo $row['name'];?></p>
    <p> <b>Surname:</b><?php echo $row['surname'];?></p>
    <p> <b>Contact Number:</b><?php echo $row['contact_number'];?></p>
    <p> <b>Module Code:</b><?php echo $row['module_code'];?></p>
    <p> <b>Email:</b><?php echo $row['email'];?></p>
    <br>
    <br>
    <a href="Dashboard.php">Back to Dashboard</a>
</body>
</html>