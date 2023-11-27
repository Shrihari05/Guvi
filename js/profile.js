
function fetchUserProfile() {
    $.ajax({
        url: 'profile.php', 
        method: 'GET',
        success: function (data) {
        
          
        },
        error: function (error) {
            console.error('Error ', error);
        }
    });
}

