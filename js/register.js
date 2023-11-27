$(document).ready(function() {
   // $('#register-form').validate();
    $('#reg').submit(function(e) {
       e.preventDefault();
        
      
        var username = $('#name').val();
        var mail = $('#email').val();
        var pass = $('#password').val();
        var roll = $('#rollno').val();

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