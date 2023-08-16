<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Snippet - BBBootstrap</title>
        <link
            href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'
            rel='stylesheet'>
        <link
            href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'
            rel='stylesheet'>
        <script type='text/javascript'
            src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <script type="text/javascript" src="./validation.js"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script>
            if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
        </script>
     <style>
            body{   
                .available{
                color: green;
                }
                .notavailable{
                color: red;
                }
            }
        </style>
        <script>
            $(document).ready(function(){
            // username availability
            $("#username").keyup(function(){

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

        <style>
             ::-webkit-scrollbar {
               width: 8px;
             }
             /* Track */
             ::-webkit-scrollbar-track {
               background: #f1f1f1; 
             }

             /* Handle */
             ::-webkit-scrollbar-thumb {
               background: #888; 
             }

             /* Handle on hover */
             ::-webkit-scrollbar-thumb:hover {
               background: #555; 
             } body {
                 background: #eee
             }
             #regForm {
                 background-color: #ffffff;
                 margin: 0px auto;
                 font-family: Raleway;
                 padding: 40px;
                 border-radius: 10px
             }
             #register{
             color: #6A1B9A;
             }
             h1 {
                 text-align: center
             }
             input {
                 padding: 10px;
                 width: 100%;
                 font-size: 17px;
                 font-family: Raleway;
                 border: 1px solid #aaaaaa;
                 border-radius: 10px;
                 -webkit-appearance: none;
             }
             .tab input:focus{
             border:1px solid #6a1b9a !important;
             outline: none;
             }
             input.invalid {
            
                 border:1px solid #e03a0666;
             }
             .tab {
                 display: none
             }
             button {
                 background-color: #6A1B9A;
                 color: #ffffff;
                 border: none;
                 border-radius: 50%;
                 padding: 10px 20px;
                 font-size: 17px;
                 font-family: Raleway;
                 cursor: pointer
             }
             button:hover {
                 opacity: 0.8
             }
             button:focus{
             outline: none !important;
             }
             #prevBtn {
                 background-color: #bbbbbb
             }
             .all-steps{
                 text-align: center;
                 margin-top: 30px;
                 margin-bottom: 30px;
                 width: 100%;
                 display: inline-flex;
                 justify-content: center;
             }
             .step {
                 height: 40px;
                 width: 40px;
                 margin: 0 2px;
                 background-color: #bbbbbb;
                 border: none;
                 border-radius: 50%;
                 display: flex;
                 justify-content: center;
                 align-items: center;
                 font-size: 15px;
                 color: #6a1b9a;
                 opacity: 0.5;
             }
             .step.active {
                 opacity: 1
             }
             .step.finish {
             color: #fff;
             background: #6a1b9a;
             opacity: 1;
             }
             .all-steps {
                 text-align: center;
                 margin-top: 30px;
                 margin-bottom: 30px
             }
             .thanks-message {
                 display: none
             }
        </style>
    </head>
    <body className='snippet-body'>
        <div class="container mt-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-8">
                    <form id="regForm">
                        <h1 id="register">CIRA Register</h1>
                        <div class="all-steps" id="all-steps">
                            <span class="step"><i class="fa fa-user"></i></span>
                            <span class="step"><i class="fa fa-map-marker"></i></span>
                            <span class="step"><i class="fa fa-shopping-bag"></i></span>
                            <span class="step"><i class="fa fa-car"></i></span>
                            <span class="step"><i class="fa fa-spotify"></i></span>
                            <span class="step"><i class="fa fa-mobile-phone"></i></span>
                        </div>

                        <div class="tab">
                            <div class="input-group col-lg-12 mb-4">
                                <input type="text" name="firstname" id="firstName" placeholder="First Name"
                                    class="form-control bg-white border-left-0 border-md" required>
                            </div>
                            <span id="f_name_er"></span>

                            <div class="input-group col-lg-12 mb-4">
                                <input type="text" name="lastname" id="lastname" placeholder="Last Name"
                                    class="form-control bg-white border-left-0 border-md" required>
                            </div>
                            <span id="l_name_er"></span>

                            <div class="input-group col-lg-12 mb-4">
                                <input id="username" name="username" placeholder="Email Address"
                                    class="form-control bg-white border-left-0 border-md" v-model='email' required @keyup='checkemail()'>
                            </div>
                            <div id="uname_response" ></div>
                            <span id="email_er"></span>

                            <div class="input-group col-lg-12 mb-4">

                                <select name="countryCode" id="countryCode" style="max-width: 80px" 
                                    class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted" >
                                    <option value="">+91</option>
                                </select>
                                <input type="numeric" id="phoneNumber" name="phone" placeholder="Phone Number"
                                    class="form-control bg-white border-md border-left-0 pl-3" required>
                            </div>
                            <span id="phone_er"></span>

                        </div>
                        
                        <div class="tab">
                            <div class="input-group col-lg-12 mb-4">
                                <input type="text" name="user_address" id="user_address" placeholder="Residential address"
                                    class="form-control bg-white border-left-0 border-md" required>
                            </div>
                            <div class="input-group col-lg-12 mb-4">
                                <select name="pub_stat" id="pub_station"
                                    class="form-control custom-select bg-white border-left-0 border-md" required>
                                    <option value="">select your station</option>
                                    <option value="1">check 1</option>
                                    <option value="1">Developer</option>
                                    <option value="3">Manager</option>
                                    <option value="4">Accountant</option>
                                </select>
                            </div>

                        </div>
                        <div class="tab">
                            <!-- personal identification number -->
                            <div class="input-group col-lg-12 mb-4">
                                <input type="text" name="per_id_no" id="per_id_no" placeholder="Personal Identification"
                                    class="form-control bg-white border-left-0 border-md" required>
                            </div>
                            <div class="input-group col-lg-12 mb-4">
                                <input type="date" name="user_dob" id="dob" placeholder="Date of Birth"
                                    class="form-control bg-white border-left-0 border-md" required>
                            </div>

                        </div>
                        <div class="tab">
                            <div class="input-group col-lg-12 mb-4">
                                <input type="password" name="password" id="password" placeholder="Password"
                                    class="form-control bg-white border-left-0 border-md" required>
                            </div>
                            <span id="pass_er"></span>

                            <div class="input-group col-lg-12 mb-4">
                                <input type="text" name="passwordConfirmation" id="passwordConfirmation" placeholder="Confirm Password"
                                     class="form-control bg-white border-left-0 border-md"required>
                            </div>
                            <span id="c_pass_er"></span>

                        </div>
                       
                        <div class="tab">
                            <div class="input-group col-lg-12 mb-4">
                                <input type="file" name="user_img" id="user_img" placeholder="Personal Image"
                                    class="form-control bg-white border-left-0 border-md" required>
                            </div>

                            <div class=""input-group col-lg-12 mb-4">
                                <div class="g-recaptcha" data-sitekey="6LdcqYckAAAAAMx2sP3-cpVyIM1cYSAW1_2ZYfvh" required></div>
                                </br>
                            </div>
                        </div>
                        <div class="tab">
                            <div class="form-group col-lg-12 mx-auto mb-0">
                                <a href="#" class="btn btn-primary btn-block py-2">
                                    <input type="submit" name="user_reg" placeholder="register">
                                </a>
                            </div>
                        </div>

                        <div class="thanks-message text-center"
                            id="text-message"> <img
                                src="https://i.imgur.com/O18mJ1K.png"
                                width="100" class="mb-4">
                            <h3>Thankyou for your registering to CIRA</h3> <span>Please login wirh your
                                username and password!</span>
                        </div>
                        <div style="overflow:auto;" id="nextprevious">
                            <div style="float:right;">
                                <button type="button" id="prevBtn"
                                    onclick="nextPrev(-1)"><i class="fa
                                        fa-angle-double-left"></i></button>
                                <button type="button" id="nextBtn"
                                    onclick="nextPrev(1)"><i class="fa
                                        fa-angle-double-right"></i></button>
                            </div>
                        </div>
                        <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                            <div class="border-bottom w-100 ml-5"></div>
                            <span class="px-2 small text-muted font-weight-bold text-muted">Already Registered?</span>
                            <div class="border-bottom w-100 mr-5"></div>
                        </div>

                        <div class="form-group col-lg-12 mx-auto">
                            <a href="#" class="btn btn-primary btn-block py-2 btn-facebook">
                                <i class="fa fa-facebook-f mr-2"></i>
                                <span class="font-weight-bold">Continue to Login</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type='text/javascript'
            src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript'>var currentTab = 0;
              document.addEventListener("DOMContentLoaded", function(event) {


              showTab(currentTab);

              });

              function showTab(n) {
              var x = document.getElementsByClassName("tab");
              x[n].style.display = "block";
              if (n == 0) {
              document.getElementById("prevBtn").style.display = "none";
              } else {
              document.getElementById("prevBtn").style.display = "inline";
              }
              if (n == (x.length - 1)) {
              document.getElementById("nextBtn").innerHTML = '<i class="fa fa-angle-double-right"></i>';
              } else {
              document.getElementById("nextBtn").innerHTML = '<i class="fa fa-angle-double-right"></i>';
              }
              fixStepIndicator(n)
              }

              function nextPrev(n) {
              var x = document.getElementsByClassName("tab");
              if (n == 1 && !validateForm()) return false;
              x[currentTab].style.display = "none";
              currentTab = currentTab + n;
              if (currentTab >= x.length) {
            
              document.getElementById("nextprevious").style.display = "none";
              document.getElementById("all-steps").style.display = "none";
              document.getElementById("register").style.display = "none";
              document.getElementById("text-message").style.display = "block";




              }
              showTab(currentTab);
              }

              function validateForm() {
                   var x, y, i, valid = true;
                   x = document.getElementsByClassName("tab");
                   y = x[currentTab].getElementsByTagName("input");
                   for (i = 0; i < y.length; i++) {
                       if (y[i].value == "") {
                           y[i].className += " invalid";
                           valid = false;
                       }
                   }
                   if (valid) {
                       document.getElementsByClassName("step")[currentTab].className += " finish";
                   }
                   return valid;
               }
               function fixStepIndicator(n) {
                   var i, x = document.getElementsByClassName("step");
                   for (i = 0; i < x.length; i++) {
                       x[i].className = x[i].className.replace(" active", "");
                   }
                   x[n].className += " active";
               }
        </script>
        <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
            myLink.addEventListener('click', function(e) {
             e.preventDefault();
            });
        </script>
    </body>
    <?php
        include("cira_connect_db_server.php");
        if(isset($_POST['user_reg'])){

            $log_user_pass=$_POST['password'];
            $log_mail=$_POST['username']; //ajax username error
            $user_reg_name=$_POST['firstname'];
            $pub_reg_lname=$_POST['lastname'];
            $pub_stat=$_POST['pub_stat'];
            $per_id=$_POST['per_id_no'];
            $pub_phone=$_POST['phone'];
            $pub_address=$_POST['user_address'];

            $filename = $_FILES["user_img"]["name"];
            $tempname = $_FILES["user_img"]["tmp_name"];
            $folder = "./user_data_image_files/" . $filename;

            $pub_user_reg_log="INSERT INTO `cia_login`( `log_user_pass`, `log_mail`,`log_status`, `name`)
                VALUES ('$log_user_pass','$log_mail',1,'$user_reg_name')";
            $log_reg_query=mysqli_query($conn_cira,$pub_user_reg_log);

            if($log_reg_query){
                $pub_user_reg="INSERT INTO `public_user`(`f_name`, `l_name`, `pub_station`, `pub_status`, `per_ident_id`, `per_ident_stat`, `pub_img`,`pub_mail`, `pub_phone`, `pub_address`) 
                            VALUES ('$user_reg_name','$pub_reg_lname','$pub_stat',1,'$per_id',1,'$filename','$log_mail','$pub_phone','$pub_address')";
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
    if(move_uploaded_file($tempname,$folder)){
        echo "file uploaded successfully";
    }
    else echo"error uploading file";

         }
        }
?>
</html>