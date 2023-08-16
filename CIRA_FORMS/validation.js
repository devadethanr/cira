$(document).ready(function (){
    // name 
        $("#firstName").keyup(function () {
        var n = document.getElementById("firstName");
        var letter = /^[A-Za-z]+$/;
        if (n.value == "") {
            document.getElementById("f_name_er").innerHTML = "<span class='error'>Please enter a valid name</span>";
        }
        else if (!n.value.match(letter)) {
            document.getElementById("f_name_er").innerHTML = "<span class='error'>This is not a valid name. Please try again</span>";
        }
        else if (n.value.match(letter)) {
        document.getElementById("f_name_er").innerHTML = "<span class='error'>Please enter a valid name</span>";
        }
    })
    $("#lastname").keyup(function () {
        var n = document.getElementById("lastname");
        var letter = /^[A-Za-z]+$/;
        if (n.value == "") {
            document.getElementById("l_name_er").innerHTML = "<span class='error'>Please enter a valid name</span>";
        }
        else if (!n.value.match(letter)) {
            document.getElementById("l_name_er").innerHTML = "<span class='error'>This is not a valid name. Please try again</span>";
        }
        else if (n.value.match(letter)) {
        document.getElementById("l_name_er").innerHTML = "<span class='error'>Please enter a valid name</span>";
        }
    })
    $("#email").keyup(function () {
        var n = document.getElementById("email");
        var letter =  /\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (n.value == "") {
            document.getElementById("email_er").innerHTML = "<span class='error'>Please enter a valid email</span>";
        }
        else if (!n.value.match(letter)) {
            document.getElementById("email_er").innerHTML = "<span class='error'>This is not a valid email. Please try again</span>";
        }
        else if (n.value.match(letter)) {
            document.getElementById("email_er").innerHTML = "<span class='error'></span>";
        }
    })
     $("#phoneNumber" ).keyup(function () {
        var n = document.getElementById("phoneNumber");
        p = /([789][0-9]{9})+$/;
        if (n.value == "") {
        document.getElementById("phone_er").innerHTML = "<span class='error'>Please enter a valid phone number</span>";
        }

         else if (!n.value.match(p) ) {
            document.getElementById("phone_er").innerHTML = "<span class='error'>This is not a valid phone number</span>";
        }
        else if (n.value.match(p)) {
            document.getElementById("phone_er").innerHTML = "<span class='error'></span>";
        }
                  
    })      
    $("#password").keyup(function () {
        var n = document.getElementById("password");
        p = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
        if (n.value == "") {
          document.getElementById("pass_er").innerHTML ="<span class='error'>Please enter a valid password</span>";
        }
        else if (!n.value.match(p) ) {
          document.getElementById("pass_er").innerHTML ="<span class='error'>Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</span>";
        }
        else if (n.value.match(p)) {
          document.getElementById("pass_er").innerHTML ="<span class='error'></span>";
        }
      })
    $("#passwordConfirmation" ).keyup(function () {
        var password=document.getElementById("password").value
        var confirmPassword = document.getElementById("passwordConfirmation").value;

        console.log("Pass: ", password)

          if (password != confirmPassword)
          document.getElementById("c_pass_er").innerHTML = "<span class='error'>Password doesn't match</span>";
          else
          document.getElementById("c_pass_er").innerHTML = "<span class='error' style='color:green'>Password match</span>";
                
      })
});
