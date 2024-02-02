<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>

<div class="container">
    <div id="registration">
        <h2>Registration</h2>
        <form id="registrationForm" method="post" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="regName" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="regEmail" name="email" required>

            <label for="phone">Phone:</label>
            <input type="tel" id="regPhone" name="phone" required>

            <label for="password">Password:</label>
            <input type="password" id="regPassword" name="password" required>

            <label for="profileImage">Profile Image:</label>
            <input type="file" id="regProfileImage" name="profileImage" accept="image/*"  required>

            <button type="button" onclick="registerUsers()">Register</button>
        </form>
        <div id="registrationResult"></div>
    </div>
</div>

</body>
</html>
