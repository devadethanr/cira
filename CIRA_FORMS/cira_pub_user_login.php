
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
</head>

<body>
    <!-- Section: Design Block -->
<section class="text-center text-lg-start">
  <style>
        body {
            background-image: url("log.png");
            background-size:     cover;       
            background-repeat:   no-repeat;
            background-position: center center;
        }
        .copyright {
        position: absolute;
        bottom: 0;
        width: 100%;
        background-color: #808080;
        padding: 10px;
        text-align: center;
        }
    .cascading-right {
      margin-right: -50px;
    }

    @media (max-width: 991.98px) {
      .cascading-right {
        margin-right: 0;
      }
    }
  </style>

  <!-- Jumbotron -->
</br>
</br>
</br>   
  <div class="container py-4">
    <div class="row g-0 align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
          <div class="card-body p-5 shadow-5 text-center">
            <h2 class="fw-bold mb-5">Sign in to CIRA </h2>
            <form  method="POST">

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="form3Example3" class="form-control" name="log_mail"/>
                <label class="form-label" for="form3Example3">Email address</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="form3Example4" class="form-control" name="log_pass" />
                <label class="form-label" for="form3Example4">Password</label>
              </div>

              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-center mb-4">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                <label class="form-check-label" for="form2Example33">
                  remember me
                </label>
              </div>

              <!-- Submit button -->
              <button type="submit" name="log_btn" class="btn btn-primary btn-block mb-4">
                Sign in
              </button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>or sign up now :</p>
                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="./cirauserreg.php"
                                    class="link-danger">Register</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
        <!-- <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary"> -->
           
        <!-- </div> -->
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->
<div class="copyright">
     &copy;  Copyright © 2023. All rights reserved. C I R A
 </div>
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
      if($row['role']==2){
      ?>
        <script>
          window.location.href = "../admin-panel/pages/dashboard.php";
        </script>
      <?php
      exit();
    }
    elseif($row['role']==5){
        ?>
        <script>
          window.location.href = "../public-panel/pubcira.php";
        </script>
      <?php
      exit();
    }
    elseif($row['role']==3){
        ?>
        <script>
          window.location.href = "../station-panel/pages/dpt_dashboard.php";
        </script>
      <?php
      exit();
    }
    elseif($row['role']==4){
        ?>
        <script>    
          window.location.href = "../officer-panel/pages/ofc_dashboard.php";
        </script>
      <?php
      exit();
    }
}
    else{?>
<script>
    alert("try again");
    </script>
    <?php
      }
    }
  ?>

