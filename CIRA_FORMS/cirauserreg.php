<!DOCTYPE html>
<html>
    <head>
    <title>cira registeration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="ajax-script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        body {
        /* background: linear-gradient(to right, lightblue, lightblue, lightgreen); */
        background: url("maxim-hopman-PEJHULxUHZs-unsplash.jpg") no-repeat center center fixed;
        background-size: cover;
        }

        .registration-box {
        background: rgba(255, 255, 255, 0.25);
        padding: 30px;
        border-radius: 10px;
        margin-top: 50px;
        width: 400px;
        }

        .registration-box form {
        text-align: left;
        }

        .registration-box input[type="text"],
        .registration-box input[type="email"],
        .registration-box input[type="password"] {
        width: 100%;
        }

        .error-message {
        color: red;
        font-size: 12px;
        margin-top: 5px;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("registrationForm");
        const submitBtn = document.getElementById("submitBtn");
        const firstName = document.getElementById("firstName");
        const lastName = document.getElementById("lastName");
        const email = document.getElementById("email");
        const password = document.getElementById("password");
        const confirmPassword = document.getElementById("confirmPassword");
        const firstNameError = document.getElementById("firstNameError");
        const lastNameError = document.getElementById("lastNameError");
        const emailError = document.getElementById("emailError");
        const passwordError = document.getElementById("passwordError");
        const confirmPasswordError = document.getElementById("confirmPasswordError");

        form.addEventListener("input", function() {
            validateFirstName();
            validateLastName();
            validateEmail();
            validatePassword();
            validateConfirmPassword();
            checkFormValidity();
        });

        function validateFirstName() {
            const firstNameValue = firstName.value.trim();
            if (firstNameValue === "") {
            firstNameError.textContent = "Please enter your first name.";
            return false;
            } else {
            firstNameError.textContent = "";
            return true;
            }
        }

        function validateLastName() {
            const lastNameValue = lastName.value.trim();
            if (lastNameValue === "") {
            lastNameError.textContent = "Please enter your last name.";
            return false;
            } else {
            lastNameError.textContent = "";
            return true;
            }
        }

        function validateEmail() {
            const emailValue = email.value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (emailValue === "") {
            emailError.textContent = "Please enter your email address.";
            return false;
            } else if (!emailRegex.test(emailValue)) {
            emailError.textContent = "Please enter a valid email address.";
            return false;
            } else {
            emailError.textContent = "";
            return true;
            }
        }

        function validatePassword() {
            const passwordValue = password.value;
            const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9]).{8,}$/;
            if (passwordValue === "") {
            passwordError.textContent = "Please enter a password.";
            return false;
            } else if (!passwordRegex.test(passwordValue)) {
            passwordError.textContent = "Password must contain 1 uppercase letter, 1 lowercase letter, 1 special character, and be at least 8 characters long.";
            return false;
            } else {
            passwordError.textContent = "";
            return true;
            }
        }

        function validateConfirmPassword() {
            const confirmPasswordValue = confirmPassword.value;
            if (confirmPasswordValue === "") {
            confirmPasswordError.textContent = "Please confirm your password.";
            return false;
            } else if (confirmPasswordValue !== password.value) {
            confirmPasswordError.textContent = "Passwords do not match.";
            return false;
            } else {
            confirmPasswordError.textContent = "";
            return true;
            }
        }

        function checkFormValidity() {
            if (
            validateFirstName() &&
            validateLastName() &&
            validateEmail() &&
            validatePassword() &&
            validateConfirmPassword()
            ) {
            submitBtn.disabled = false;
            } else {
            submitBtn.disabled = true;
            }
        }
        });
    </script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <script>
    $(document).ready(function(){
    // username availability
    $("#email").keyup(function(){
        var username = $(this).val().trim();
        if(username != ''){
            $.ajax({
                url: 'mailavail.php',
                type: 'post',
                data: {username: username},
                success: function(response){
                    $('#uname_response').html(response);
                }
            });
        }else{
            $("#uname_response").html("");
        }
        });
    });
    </script>
    </head>
    <body>

    <div class="container">
    <div class="registration-box mx-auto">
    <h1>C I R A</h1>
                    <p>Crime Investigation Reporting and Analysis</p>
        <form id="registrationForm" method="POST">
        <div class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" class="form-control" id="firstName" name="firstname" required>
            <span id="firstNameError" class="error-message"></span>
        </div>
        <div class="form-group">
            <label for="lastName">Last Name:</label>
            <input type="text" class="form-control" id="lastName" name="lastName" required>
            <span id="lastNameError" class="error-message"></span>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="username" required @keyup='checkemail()'>
            <span id="emailError" class="error-message"></span>
            <div id="uname_response" ></div>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <span id="passwordError" class="error-message"></span>
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" class="form-control" id="confirmPassword" name="passwordConfirmation" required>
            <span id="confirmPasswordError" class="error-message"></span>
        </div>
        <button type="submit"  name ="user_reg" id="submitBtn" class="btn btn-primary" disabled>Register</button>
        </form>
        <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
           <div class="border-bottom w-100 ml-5"></div>
           <span class="px-2 small text-muted font-weight-bold text-muted">Already Registered?</span>
           <div class="border-bottom w-100 mr-5"></div>
       </div>
       <div class="form-group col-lg-12 mx-auto">
           <a href="cira_pub_user_login.php" class="btn btn-primary btn-block py-2 btn-facebook">
               <span class="font-weight-bold">Continue to Login</span>
           </a>
       </div>
    </div>
    </div>
    </body>
    <?php
    include("cira_connect_db_server.php");
    if(isset($_POST['user_reg'])){
        $log_user_pass=$_POST['password'];
        $log_mail=$_POST['username']; //ajax username error
        $user_reg_name=$_POST['firstname'];
        $pub_reg_lname=$_POST['lastName'];
        $pub_user_reg_log="INSERT INTO `cia_login`( `log_user_pass`, `log_mail`,`log_status`, `name`,`role`,`pub_phone`)
            VALUES ('$log_user_pass','$log_mail',1,'$user_reg_name',5,'00-000')";
        $log_reg_query=mysqli_query($conn_cira,$pub_user_reg_log);
        if($log_reg_query){
            $pub_user_reg="INSERT INTO `public_user`(`f_name`, `l_name`, `pub_status`,`pub_mail`) 
                        VALUES ('$user_reg_name','$pub_reg_lname',1,'$log_mail')";
            $reg_query=mysqli_query($conn_cira,$pub_user_reg);
        }
        if($log_reg_query||$reg_query){
            ?>
        <div name="updatesuccess" id="updatesuccess" style="width: 348px; margin-left: 1154px;">
            <div class="alert alert-success" role="alert">
                user registered successfully !
            </div>
        </div>
<?php
         }
        }
?>
</html>
