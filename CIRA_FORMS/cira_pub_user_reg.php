<?php
    include("cira_connect_db_server.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="reg_form_js.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cira registeration</title>
    <linl rel="stylesheet" href="reg_form_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="./validation.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="ajax-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
     <style>
            
            .custom-form1{
                background: rgba(255, 255, 255, 0.12);
                border-radius: 16px;
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                backdrop-filter: blur(4.2px);
                -webkit-backdrop-filter: blur(4.2px);
                border: 1px solid rgba(255, 255, 255, 0.78);
                margin-top: -420px;
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
</head>

<body>
    <!-- Navbar-->
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light py-3">

        </nav>
    </header>
    <div class="container">
        <div class="row py-5 mt-4 align-items-center">
            <div class="col-md-10 pr-lg-10 mb-5 mb-md-0">
                <img src="maxim-hopman-PEJHULxUHZs-unsplash.jpg" class="img-fluid">
                <h1>C I R A</h1>
                <p>Crime Investigation Reporting and Analysis</p>
                <p class="font-italic text-muted">join us <a href="#" class="text-muted">
                        <u>NOW</u></a>
                </p>
                </div> 
                
            </div>
        </div>
    </div>
        <div style="z-index:5;transform:translate(0,-370px)">
            <!-- Registeration Form -->
            <form method="POST" action="#" enctype="multipart/form-data">
                <div class="col-md-7 col-lg-6 ml-auto">

                    <div class="row custom-form1">
                        <!-- First Name -->
                        <div class="input-group col-lg-6 mb-4">
                            <input type="text" name="firstname" id="firstName" placeholder="First Name"
                                class="form-control bg-white border-left-0 border-md" required>
                        </div>
                        <span id="f_name_er"></span>

                        <!-- Last Name -->
                        <div class="input-group col-lg-6 mb-4">
                            <input type="text" name="lastname" id="lastname" placeholder="Last Name"
                                class="form-control bg-white border-left-0 border-md" required>
                        </div>
                        <span id="l_name_er"></span>

                        <!-- Email Address -->                                      
                        <div class="input-group col-lg-12 mb-4">
                            <input id="username" name="username" placeholder="Email Address"
                                class="form-control bg-white border-left-0 border-md" v-model='email' required @keyup='checkemail()'>
                        </div>
                        <div id="uname_response" ></div>
                        <span id="email_er"></span>
                       

                        <!-- Phone Number -->
                        <div class="input-group col-lg-12 mb-4">

                            <select name="countryCode" id="countryCode" style="max-width: 80px" 
                                class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted" >
                                <option value="">+91</option>
                            </select>
                            <input type="numeric" id="phoneNumber" name="phone" placeholder="Phone Number"
                                class="form-control bg-white border-md border-left-0 pl-3" required>
                        </div>
                        <span id="phone_er"></span>

                        <!-- personal identification number -->
                        <div class="input-group col-lg-12 mb-4">
                            <input type="text" name="per_id_no" id="per_id_no" placeholder="Personal Identification"
                                class="form-control bg-white border-left-0 border-md" required>
                        </div>

                        <!-- dob -->
                        <div class="input-group col-lg-12 mb-4">
                            <input type="date" name="user_dob" id="dob" placeholder="Date of Birth"
                                class="form-control bg-white border-left-0 border-md" required>
                        </div>
                        <!-- address -->
                        <div class="input-group col-lg-12 mb-4">
                            <input type="text" name="user_address" id="user_address" placeholder="Residential address"
                                class="form-control bg-white border-left-0 border-md" required>
                        </div>

                        <!-- station -->
                        <div class="input-group col-lg-12 mb-4">
                        <?php
                            $list_station_query="SELECT * FROM `station` WHERE `stat_status`= '1';";
                            $result_station=mysqli_query($conn_cira,$list_station_query);
                        ?>
                            <select class="form-control bg-white border-left-0 border-md" name="pub_stat" aria-label="Default select" id="pub_station">
                                <option selected>find your nearest police station</option>
                                <?php
                            while($station_row=mysqli_fetch_array($result_station)){
                            ?>
                                <option value="<?php echo $station_row['stat_id'];?>"> <?php echo $station_row['stat_name'];?> </option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>

                        <!-- Password -->
                        <div class="input-group col-lg-6 mb-4">
                            <input type="password" name="password" id="password" placeholder="Password"
                                class="form-control bg-white border-left-0 border-md" required>
                        </div>
                        <span id="pass_er"></span>

                        <!-- Password Confirmation -->
                        <div class="input-group col-lg-6 mb-4">
                            <input type="text" name="passwordConfirmation" id="passwordConfirmation" placeholder="Confirm Password"
                                 class="form-control bg-white border-left-0 border-md"required>
                        </div>
                        <span id="c_pass_er"></span>

                        <!-- user photo -->
                        <div class="input-group col-lg-12 mb-4">
                            <input type="file" name="user_img" id="user_img" placeholder="Personal Image"
                                class="form-control bg-white border-left-0 border-md" required>
                        </div>

                        <!-- google recapta -->
                        <div style="padding-left: 30%;">
                            <div class="g-recaptcha" data-sitekey="6LdcqYckAAAAAMx2sP3-cpVyIM1cYSAW1_2ZYfvh" required></div>
                            </br>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group col-lg-12 mx-auto mb-0">
                            <button type="submit" name="user_reg" class="btn btn-primary btn-block">Register</button>
                        </div>


                        <!-- Divider Text -->
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
            </form>
        </div>
    </div>
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

            $pub_user_reg_log="INSERT INTO `cia_login`( `log_user_pass`, `log_mail`,`log_status`, `name`,`role`)
                VALUES ('$log_user_pass','$log_mail',1,'$user_reg_name',5)";
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