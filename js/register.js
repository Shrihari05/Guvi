$(document).ready(function() {
   // $('#register-form').validate();
    $('#reg').submit(function(e) {
       e.preventDefault();
        
        // Gather registration form data
        var username = $('#name').val();
        var mail = $('#email').val();
        var pass = $('#password').val();
        var roll = $('#rollno').val();

        // AJAX call for registration
        $.ajax({
            type:"POST",
            url: "http://localhost/GUVI/php/register.php",
            data: {
                rollno:roll,
                name: username,
                email: mail,
                password: pass
            },
            success: function(response) {
                
                
               
window.location.href = 'login.html';

             
                
            },
            error: function(xhr, status, error) {
               
                console.error(error);
                alert('Registration failed. Please try again.');
            }
        });
    });
});