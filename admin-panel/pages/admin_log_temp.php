<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
    <meta charset="UTF-8">
    <title>CIRA.PUBLIC_USER.REG</title>
    <style>
        body {
            background-image: linear-gradient(to right bottom, #f35db3, #c78af4, #7bb1ff, #00cfff, #00e4ff, #37ecf2, #5df2e4, #7ff8d6, #96f5c3, #acf1b2, #c1eda3, #d5e799);
        }
        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
            }
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
        .h-custom {
            height: calc(100% - 73px);
        }
        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
        .custom-form1{
            background: rgba(255, 255, 255, 0.12);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(4.2px);
            -webkit-backdrop-filter: blur(4.2px);
            border: 1px solid rgba(255, 255, 255, 0.78);
        }
    </style>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 custom-form1">
                    <form method="POST">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="form3" class="form-control form-control-lg" name="log_mail"
                                placeholder="Enter a valid email address" />
                            <label class="form-label" for="form3">Email address</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" id="form3" class="form-control form-control-lg" name="log_pass"
                                placeholder="Enter password" />
                            <label class="form-label" for="form3">Password</label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2" />
                                <label class="form-check-label" for="form2">
                                    Remember me
                                </label>
                            </div>
                            <a href="#!" class="text-body">Forgot password?</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" name="log_btn" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="./cira_pub_user_reg.php"
                                    class="link-danger">Register</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
                Copyright © 2023. All rights reserved. C I R A
            </div>
            <!-- Copyright -->
    </section>
</body>

</html>
<?php
  include("cira_connect_db_server.php");
  if(isset($_POST['log_btn'])){
    $user_mail=$_POST['log_mail'];
    $user_pass=$_POST['log_pass'];
    $log_query="SELECT * FROM `cia_login` WHERE `log_mail` = '$user_mail' AND `log_user_pass` = '$user_pass'";
    $log_result=mysqli_query($conn_cira,$log_query);
    $num = mysqli_num_rows($log_result);
    if($num > 0) {
      $row= mysqli_fetch_array($log_result);
      $_SESSION['s_key']=$row['log_mail'];
      $_SESSION['islogged']=TRUE;
      ?>
        <script>
          window.location.href = "./dashboard.php";
        </script>
      <?php
      exit();
    }
    else{?>
<script>
    alert("try again");
    </script>
    <?php
      }
    }
  ?>

