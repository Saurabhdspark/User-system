<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Welcome, <span id="welcomeUsername"></span>!</h2>
        <div id="userDetails">
            <p><strong>Name:</strong> <span id="welcomeName"></span></p>
            <p><strong>Email:</strong> <span id="welcomeEmail"></span></p>
            <p><strong>Contact:</strong> <span id="welcomePhone"></span></p>
            <img src="" alt="Profile Image" id="welcomeProfileImage" class="img-thumbnail" width="150">
        </div>
        <p><a href="logout.php">Logout</a></p>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        // Fetch user data from session and display on the welcome page
        $(document).ready(function () {
            $.ajax({
                type: 'GET',
                url: 'get_user_data.php',
                success: function (userData) {
                    var user = JSON.parse(userData);
                    $('#welcomeUsername').text(user.username);
                    $('#welcomeName').text(user.name);
                    $('#welcomeEmail').text(user.email);
                    $('#welcomePhone').text(user.phone);
                    
                    var url = new URL(window.location.href);
                    var absoluteImagePath = url.origin + '/user_system/' + user.profileImage;
                    
                    $('#welcomeProfileImage').attr('src', absoluteImagePath);
                }
            });
        });
    </script>
</body>
</html>
