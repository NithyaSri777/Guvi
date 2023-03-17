
$(document).on('submit','#loginform',function(e){
    var data=$(loginform).serialize();
    e.preventDefault();

    $.ajax({
        method:"POST",
        url:"php/login.php",
        data:data,
        success: function(response){
            if(response==0){

                $.ajax({
                    method:"POST",
                    url: "php/profile.php",
                    data:data,
                    success: function(res){

                        $('#result').html("Your personal details");
                        $('#para').html(res);

                        
                }});
            }
            else {
                $('#para').html("Password is wrong!");
            }
        }
        
        });
});

