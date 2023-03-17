
$(document).on('submit','#registerform',function(e){

    e.preventDefault();
    
    var password = document.getElementById("password").value;
    no=0;
    small=0;
    cap=0;
    special=0;
    for(let i=0; i<password.length; i++){
        if(password[i]>=0 && password[i]<=9) no++;
        else if(password[i]>='a' && password[i]<='z') small++;
        else if(password[i]>='A' && password[i]<='Z') cap++;
        else special++;
        
    }
    
    if(password.length>=8){
      if(cap>=1){
        if(small>=1){
          if(no>=1){
            if(special>=1){
                //AJAX CALL
                var data=$(registerform).serialize();
                $.ajax({
                    method:"POST",
                    url: "php/register.php",
                    data:data,
                    success: function(data){
                        window.location.href = "login.html"; 
                }});
            }
            else{
              document.getElementById("msg").innerHTML="Include a special character in your Password!";
            }
          }
          else{
             document.getElementById("msg").innerHTML= "Password must contain atleast one number!";
          }
        }
        else{
            document.getElementById("msg").innerHTML="Password must contain atleast one lowercase letter!";
        }
      }
      else{
        document.getElementById("msg").innerHTML="Password must contain atleast one uppercase letter!";
      }
    }
    else {
        document.getElementById("msg").innerHTML="Password must be of atleast 8 characters!";
    }
});
