<?php
    session_start();
    include("DataB.php");

    if(!isset($_SESSION['student_number']))
         {
             header("Location: login.php");
             exit();
          }

    

    $student_number = $_SESSION['student_number'];
    $sql = "SELECT * FROM users WHERE student_number ='$student_number'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);    

    if(!$result){
        die("SQL Error:" . mysqli_error($conn));
    }
        
   


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
        <div class="profile-picture-container">
            <img src="uploads/<?php echo $user['profile_picture']; ?>" alt="Profile Picture" class="profile-pic"><br><br>
</div>
        <div class="row">
            <span class="label">Name:</span>
            <span class="value"><?php echo $user['name']; ?></span>
        </div>
        <div class="row">
            <span class="label">Surname:</span>
            <span class="value"><?php echo $user['surname']; ?></span>
        </div>
        <div class="row">
            <span class="label">Student Number:</span>
            <span class="value"><?php echo $user['student_number']; ?></span>
        </div>
        <div class="row">
            <span class="label">Contact Number:</span>
            <span class="value"><?php echo $user['contact_number']; ?></span>
        </div>
        <div class="row">
            <span class="label">Module Code:</span>
            <span class="value"><?php echo $user['module_code']; ?></span>
        </div>
        <div class="row">
            <span class="label">Email:</span>
            <span class="value"><?php echo $user['email']; ?></span>
        </div>
    </div>
    <br>
    <button><a href="logout.php">Log Out</a></button>
    <br>
</body>
</html>