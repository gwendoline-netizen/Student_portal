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


    $sql = "INSERT INTO users (student_number, name, surname, email, password, contact_number, module_code)

            VALUES ('$student_number', '$name', '$surname', '$email', '$password', '$contact_number','$$module_code')";



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

<form method="POST">


   
    <input type="text" name="student_number" placeholder="Student Number" required><br><br>

   
    <input type="text" name="name" placeholder="Name" required><br><br>

   
    <input type="text" name="surname" placeholder="Surname" required><br><br>

    
    <input type="email" name="email" placeholder="Email" required><br><br>

    
    <input type="number" name="contact_number" placeholder="Contact Number" required><br><br>

   
    <input type="password" name="password" placeholder="Password" required><br><br>

    <input type="text" name="module_code" placeholder="Modules" required><br><br>


      <button type="submit" name="register">Continue</button> 
    
    <br><br>

</div>

</form>



</body>

</html>

