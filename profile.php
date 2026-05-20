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
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="profile-container">
        <div class="row">
            <span class="label">Name:</span>
            <span class="value"><?php echo $row['name']; ?></span>
        </div>
        <div class="row">
            <span class="label">Surname:</span>
            <span class="value"><?php echo $row['surname']; ?></span>
        </div>
        <div class="row">
            <span class="label">Student Number:</span>
            <span class="value"><?php echo $row['student_number']; ?></span>
        </div>
        <div class="row">
            <span class="label">Contact Number:</span>
            <span class="value"><?php echo $row['contact_number']; ?></span>
        </div>
        <div class="row">
            <span class="label">Module Code:</span>
            <span class="value"><?php echo $row['module_code']; ?></span>
        </div>
        <div class="row">
            <span class="label">Email:</span>
            <span class="value"><?php echo $row['email']; ?></span>
        </div>
    </div>
    <br>
    <button><a href="logout.php">Log Out</a></button>
    <br>
</body>
</html>