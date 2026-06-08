<?php

session_start();

include("DataB.php");



if(isset($_POST['register'])) {



    $student_number = $_POST['student_number'];

    $name = $_POST['name'];

    $surname = $_POST['surname'];

    $email = $_POST['email'];

    $contact_number = $_POST['contact_number'];

    $password = $_POST['password'];

    $profile_picture = "";

    if(isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {

        $uploadDir = 'uploads/';
        if(!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        $fileName = time() . "_" . $_FILES['profile_picture']['name'];
       
        move_uploaded_file($_FILES['profile_picture']['tmp_name']
        , $uploadDir . $fileName);

        $profile_picture = $uploadDir . $fileName;
    }


    $sql = "INSERT INTO users (student_number, name, surname, email, password, contact_number, module_code, profile_picture)

            VALUES ('$student_number', '$name', '$surname', '$email', '$password', '$contact_number','$module_code', '$profile_picture')";



    if(mysqli_query($conn, $sql)) {

        $_SESSION['student_number'] = $student_number;


        header("Location: dashboard.php");

        exit();



    } else {

        echo "Error: " . mysqli_error($conn);

    }

}

?>



<!DOCTYPE html>

<html>

<head>

    <title>Register</title>
    <link rel="stylesheet" href="styles.css">

</head>

<body>

<div class="container">
<h1>Register</h1>

<form method="POST" enctype="multipart/form-data">


   
    <input type="text" name="student_number" placeholder="Student Number" required><br><br>

   
    <input type="text" name="name" placeholder="Name" required><br><br>

   
    <input type="text" name="surname" placeholder="Surname" required><br><br>

    
    <input type="email" name="email" placeholder="Email" required><br><br>

    
    <input type="number" name="contact_number" placeholder="Contact Number" required><br><br>

   
    <input type="password" name="password" placeholder="Password" required><br><br>

    <input type="text" name="module_code" placeholder="Modules" required><br><br>

    <div class="profile-picture-container">
        <img src="default-profile.png" 
        id= "preview"
        alt="Profile Picture" 
        class="profile-pic"><br><br>
    </div>
    <label for="profile_picture">Profile Picture:</label><br> 
    <input type="file" name="profile_picture" accept="image/*"><br><br> 

      <button type="submit" name="register">Continue</button> 
    
    <br><br>

</div>

</form>



</body>

</html>

