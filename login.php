<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>

<div class="container">
    <div id="login">
        <h2>Login</h2>
        <form id="loginForm" method="post">
            <label for="email">Email:</label>
            <input type="text" id="loginEmail" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="loginPassword" name="password" required>
            
            <button type="button" onclick="loginUser()">Login</button>
        </form>
        <div id="loginResult"></div>
    </div>
</div>

</body>
</html>
