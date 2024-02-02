<?php
session_start();
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'register') {
        registerUser();
    } elseif ($_POST['action'] == 'login') {
        loginUser();
    }
}

function registerUser() {
    global $conn;

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $targetDir = "uploads/";
    $fileName = basename($_FILES["profileImage"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    // var_dump($fileName);
    if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $targetFilePath)) {
        $sql = "INSERT INTO users (name, email, phone, password, profile_image) 
                VALUES ('$name', '$email', '$phone', '$password', '$targetFilePath')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Error uploading image. Error code: " . $_FILES["profileImage"]["error"];
    }
    
}




function loginUser() {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve user data from the database (replace with your database logic)
    // Example: $sql = "SELECT * FROM users WHERE username='$username'";
    // Execute the SQL query and fetch the result

    // Check if the user exists and the password is correct
    // Example: if ($result && password_verify($password, $result['password'])) {
    // Set session variables and handle successful login
    // } else {
    // Handle failed login
    // }

    echo "Login successful!";
}
?>
