$(document).ready(function() {
    $('#login-form').validate();
    $('#login').submit(function(e) {
        e.preventDefault();
        
        // Gather login form data
        var email = $('#email').val();
        var password = $('#password').val();

      
        $.ajax({
            type: 'POST',
            url: 'http://localhost/GUVI/php/login.php',
            data: {
                email: email,
                password: password
            },
            success: function(response) {
                
                console.log(response);
              
                if(response=="Login successful"){
                    window.location.reload();
                }
         
            },
            error: function(xhr, status, error) {
             
                console.error(error);
                alert('Login failed. Please check your credentials.');
            }
        });
    });
});