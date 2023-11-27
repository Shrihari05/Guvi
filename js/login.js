$(document).ready(function() {
    $('#login-form').validate();
    $('#login').submit(function(e) {
        e.preventDefault();
        
        // Gather login form data
        var email = $('#email').val();
        var password = $('#password').val();

        // AJAX call for login
        $.ajax({
            type: 'POST',
            url: 'http://localhost/GUVI/php/login.php',
            data: {
                email: email,
                password: password
            },
            success: function(response) {
                // Handle success response
                console.log(response);
                // Redirect to profile page upon successful login
                if(response=="Login successful"){
                    window.location.reload();
                }
                //window.location.href = 'profile.html';
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(error);
                alert('Login failed. Please check your credentials.');
            }
        });
    });
});