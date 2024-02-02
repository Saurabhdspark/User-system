<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $userData = array(
        'username' => $_SESSION['username'],
        'name' => $_SESSION['name'],
        'email' => $_SESSION['email'],
        'phone' => $_SESSION['phone'],
        'profileImage' => $_SESSION['profileImage']
    );

    echo json_encode($userData);
} else {
    header('Location: login.php');
    exit();
}
?>
