function registerUsers() {
    var formData = new FormData();
    formData.append('action', 'register');
    formData.append('name', $('#regName').val());
    formData.append('email', $('#regEmail').val());
    formData.append('phone', $('#regPhone').val());
    formData.append('password', $('#regPassword').val());
    formData.append('profileImage', $('#regProfileImage')[0].files[0]);
    console.log(formData);
    $.ajax({
        type: 'POST',
        url: 'actions.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response);
            $('#registrationResult').html(response);
            
            // Check if the response indicates successful registration
            if (response.includes("Registration successful")) {
                // Redirect to the login page after a short delay (e.g., 2 seconds)
                setTimeout(function () {
                    window.location.href = 'login.php'; // Replace 'login.php' with the actual login page URL
                }, 2000);
            }
        }
        
    });
}


function loginUser() {
    var email = $('#loginEmail').val();
    var password = $('#loginPassword').val();

    $.ajax({
        type: 'POST',
        url: 'actions.php',
        data: {
            action: 'login',
            email: email,
            password: password
        },
        success: function (response) {
            console.log(response);
            $('#loginResult').html(response);

            // Check if the response indicates successful login
            if (response.includes("Login successful")) {
                // Redirect to the welcome page after a short delay (e.g., 2 seconds)
                setTimeout(function () {
                    window.location.href = 'welcome.php'; // Replace 'welcome.php' with the actual welcome page URL
                }, 2000);
            }
        }
    });
}

