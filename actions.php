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

    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
    $checkEmailResult = $conn->query($checkEmailQuery);

    if ($checkEmailResult->num_rows > 0) {
        // Email already exists, return an error message
        echo "Error: Email already exists. Please choose a different email.";
    } else {
        // Email does not exist, proceed with registration
        $targetDir = "uploads/";
        $fileName = basename($_FILES["profileImage"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $targetFilePath)) {
            $sql = "INSERT INTO users (name, email, phone, password, profile_image) 
                    VALUES ('$name', '$email', '$phone', '$password', '$targetFilePath')";

            if ($conn->query($sql) === TRUE) {
                echo "Registration successful!";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Error uploading image.";
        }
    }
}





function loginUser() {
    global $conn;

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user data from the database based on the provided email
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Login successful
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['phone'] = $row['phone'];
            $_SESSION['profile_image'] = $row['profile_image'];

            echo "Login successful!";
        } else {
            echo "Incorrect password. Please try again.";
        }
    } else {
        echo "User with this email does not exist.";
    }
}
?>


