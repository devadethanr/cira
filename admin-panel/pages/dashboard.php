<?php 
  session_start();
?>
<?php if($_SESSION['islogged']){
?>
<?php
  include("cira_connect_db_server.php");
  if($_SESSION['islogged']){

    $master=$_SESSION['s_key'];
//managing and listing queries

    //manage station
    $stat_manage_query="SELECT * FROM `station` ORDER BY `stat_name` ASC ;";
    $stat_manage_result=mysqli_query($conn_cira,$stat_manage_query);
    $data = array();
    $stat_no=mysqli_num_rows($stat_manage_result);

    if ( $stat_no > 0) {
      while ($row = mysqli_fetch_array($stat_manage_result)) {
          $data[] = $row;
      }
    }
    $dataJson = json_encode($data);


    //manage officer
    $pol_manage_query="SELECT * FROM `police` ORDER BY `pol_name` ASC;";
    $pol_manage_result=mysqli_query($conn_cira,$pol_manage_query);
    $data2=array();
    $pol_no=mysqli_num_rows($pol_manage_result);

    if ($pol_no > 0) {
      while ($row = mysqli_fetch_array($pol_manage_result)) {
          $data2[] = $row;
      }
    }
    $dataJson2 = json_encode($data2);

    //toal public users
    $tot_pub_qry="SELECT * FROM `public_user` WHERE `pub_status`=1";
    $tot_pub_rslt=mysqli_query($conn_cira,$tot_pub_qry);
    $tot_pub=mysqli_num_rows($tot_pub_rslt);

    //total officers
    $tot_pol_query="SELECT * FROM `police` WHERE `pol_status`= 1";
    $tot_pol_result=mysqli_query($conn_cira, $tot_pol_query);
    $tot_pol= mysqli_num_rows($tot_pol_result);

    //total stations 
    $tot_stat_query="SELECT * FROM `station` WHERE `stat_status`=1";
    $tot_stat_result=mysqli_query($conn_cira,$tot_stat_query);
    $tot_stat= mysqli_num_rows($tot_stat_result);

    // list city query
    $list_state_qry="SELECT * FROM `state_district_tbl`";
    $res_l_state=mysqli_query($conn_cira,$list_state_qry);
    $state_row=mysqli_fetch_array($res_l_state);
    
    //list admin profile query
    $admin_qry="SELECT * FROM `cia_login` WHERE `role` = 2 AND `log_status`=1 AND `log_mail`= '$master'";
    $adm_result=mysqli_query($conn_cira,$admin_qry);
   
//updation modals and tables  

    //update station modal data
    //its on jquery updateuserinfomodal.php
    if(isset($_POST['update_station_details_btn'])){
      $up_st_nm=$_POST['up_station_name'];
      $up_st_ml=$_POST['up_station_mail'];
      $up_st_ps=$_POST['up_station_pass'];
      $up_st_st=$_POST['up_station_status'];
      $up_master=$_POST['up_stat_id'];

      $up_st_query="UPDATE `station` SET `stat_name`='$up_st_nm',`stat_mail`='$up_st_ml',`stat_status`=$up_st_st WHERE `stat_id`= $up_master";
      $up_stat_result=mysqli_query($conn_cira,$up_st_query);        
      }
    

    //update police modal data
    //on jquery updatepoliceinfomodal.php
    if(isset($_POST['update_pol_details_btn'])){
      $up_pol_nm=$_POST['up_officer_name'];
      $up_pol_ml=$_POST['up_officer_mail'];
      $up_pol_ps=$_POST['up_officer_pass'];
      $up_pol_st=$_POST['up_officer_status'];
      $up_master2=$_POST['up_pol_id'];

      $up_pol_query="UPDATE `police` SET `pol_name`='$up_pol_nm',`pol_status`=' $up_pol_st',`pol_mail`=' $up_pol_ml' WHERE `pol_id`='$up_master2'";
      $up_pol_result=mysqli_query($conn_cira,$up_pol_query);
    }
//user profile and logout
    //user profile

    //logout
    if(isset($_POST['user_signout'])){
      session_destroy();
      ?>
        <script>
          window.location.href='../../index.php';
        </script>
      <?php
    }

    if(isset($_POST[''])){

    }

//registraton tables and modals

   //station registration query
   if(isset($_POST['reg_stat_btn'])){

    include("cira_connect_db_server.php");
    $stat_pass= $_POST["station_pass"];
    $stat_mail=$_POST["station_mail"];
    $stat_name= $_POST["station_name"];
    $stat_addr=$_POST['station_address'];
    $dist_name=$_POST['dist_name'];
    //LOG TABLE
    $reg_stat_log="INSERT INTO `cia_login`( `log_user_pass`, `log_mail`, `log_status`, `name`, `role`) 
        VALUES ('$stat_pass','$stat_mail','1','$stat_name','3')";
    $reg_stat_re=mysqli_query($conn_cira,$reg_stat_log);

    //REG TABLE
    $reg_stat="INSERT INTO `station`(`stat_name`,`stat_address`, `dist_name`, `stat_mail`,`stat_status`)
        VALUES ('$stat_name','$stat_addr','$dist_name','$stat_mail','1')";
    $reg_re=mysqli_query($conn_cira,$reg_stat);
    
    if($reg_stat_re||$reg_re){
    ?>
      <div name="updatesuccess" id="updatesuccess" style="width: 348px; margin-left: 1154px;">
        <div class="alert alert-success" role="alert">
              station added successfully !
        </div>
      </div>
    <?php
      }
    }
    //officer registration query
    if(isset($_POST['reg_officer_btn'])){
      $off_pass=$_POST['Officer_pass'];
      $off_name=$_POST['Officer_name'];
      $off_desg=$_POST['Officer_desg'];
      $off_mail=$_POST['Officer_mail'];
      $off_addrs=$_POST['Officer_address'];
      $off_state=$_POST['off_state'];
      $off_stat=$_POST['Officer_station'];
      $off_phone=$_POST['Officer_phone'];
      $reg_officer_log="INSERT INTO `cia_login`( `log_user_pass`, `log_mail`, `log_status`, `name`, `role`) 
      VALUES ('$off_pass','$off_mail','1','$off_name','4')";
      $reg_officer_re=mysqli_query($conn_cira,$reg_officer_log);
      $reg_off="INSERT INTO `police`(`stat_id`,`pol_status`,`pol_name`,`pol_mail`,`pol_phone`,`pol_address`,`state_id`,`pol_desg`)
      VALUES ('$off_stat','1','$off_name','$off_mail','$off_phone','$off_addrs','$off_state','$off_desg')";
      $reg_officer=mysqli_query($conn_cira,$reg_off);
      if($reg_officer_re||$reg_off){
        ?><script>
        alert("officer added successfully");
        </script>
        <?php
      }
  }

  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <title>
    cira admin dashboard
  </title>
  <!-- refresh page reset -->
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
     }
  </script>
  <!-- ajax for update modals -->
  <script type="text/javascript">
    $(document).ready(function(){
      // console.log("check1");
      $('.userinfo').click(function(){
        var userid=$(this).data('id');
        $.ajax({
          url:'updateuserinfomodal.php',
          type:'post',
          data:{userid:userid},
          success:function(response){
            $('.modal-updstat').html(response);
            $('#modal_update_stat').modal('show');
          }
        });
      });
    });
  </script>
  
  <script type="text/javascript">
    $(document).ready(function(){
      // console.log("check2");
      $('.polinfo').click(function(){
        var pol_id=$(this).data('id');
        $.ajax({
          url:'updatepoliceinfomodal.php',
          type:'post',
          data:{pol_id:pol_id},
          success:function(response){
            $('.modal-updpol').html(response);
            $('#modal_update_pol').modal('show');
          }
        });
      });
    });
  </script>

  <!-- validation  -->
  <script>
        
        function validateName() {
            var name = document.getElementById("name").value;
            var namePattern = /^[a-zA-Z ]{2,}$/; // Only allows alphabets and spaces, with a minimum length of 2

            if (!namePattern.test(name)) {
                document.getElementById("name-error").innerHTML = "Invalid name";
                return false;
            } else {
                document.getElementById("name-error").innerHTML = "";
                return true;
            }
        }

        function validateEmail() {
            var email = document.getElementById("email").value;
            var emailPattern = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/; // Validates the email format

            if (!emailPattern.test(email)) {
                document.getElementById("email-error").innerHTML = "Invalid email";
                return false;
            } else {
                document.getElementById("email-error").innerHTML = "";
                return true;
            }
        }

        function validatePassword() {
            var password = document.getElementById("password").value;
            var passwordPattern =  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[a-zA-Z\d@$!%*?&]{8,}$/; // Requires at least 8 characters with at least one lowercase, one uppercase, one digit and a special character

            if (!passwordPattern.test(password)) {
                document.getElementById("password-error").innerHTML = "Invalid password";
                return false;
            } else {
                document.getElementById("password-error").innerHTML = "";
                return true;
            }
        }

        function validateAddress() {
            var address = document.getElementById("address").value;
            var addressPattern = /^[a-zA-Z0-9\s,.-]{5,}$/; // Allows alphanumeric characters, spaces, commas, periods, and hyphens, with a minimum length of 5

            if (!addressPattern.test(address)) {
                document.getElementById("address-error").innerHTML = "Invalid address";
                return false;
            } else {
                document.getElementById("address-error").innerHTML = "";
                return true;
            }
        }
        // ................................................................................................\
        function validateoffname() {
            var offname = document.getElementById("offname").value;
            var namePattern = /^[a-zA-Z ]{2,}$/; // Only allows alphabets and spaces, with a minimum length of 2

            if (!namePattern.test(offname)) {
                document.getElementById("offname-error").innerHTML = "Invalid name";
                return false;
            } else {
                document.getElementById("offname-error").innerHTML = "";
                return true;
            }
        }

        function validateoffemail() {
            var offemail = document.getElementById("offemail").value;
            var emailPattern = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/; // Validates the email format

            if (!emailPattern.test(offemail)) {
                document.getElementById("offemail-error").innerHTML = "Invalid email";
                return false;
            } else {
                document.getElementById("offemail-error").innerHTML = "";
                return true;
            }
        }

        function validateoffaddress() {
            var offaddress = document.getElementById("offaddress").value;
            var addressPattern = /^[a-zA-Z0-9\s,.-]{5,}$/; // Allows alphanumeric characters, spaces, commas, periods, and hyphens, with a minimum length of 5

            if (!addressPattern.test(offaddress)) {
                document.getElementById("offaddress-error").innerHTML = "Invalid address";
                return false;
            } else {
                document.getElementById("offaddress-error").innerHTML = "";
                return true;
            }
        }

        function validateoffpassword() {
            var offpassword = document.getElementById("offpassword").value;
            var passwordPattern =  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[a-zA-Z\d@$!%*?&]{8,}$/; // Requires at least 8 characters with at least one lowercase, one uppercase, one digit and a special character

            if (!passwordPattern.test(offpassword)) {
                document.getElementById("offpassword-error").innerHTML = "Invalid password";
                return false;
            } else {
                document.getElementById("offpassword-error").innerHTML = "";
                return true;
            }
        }

        function validateoffphonenumber() {
            var offphoneNumber = document.getElementById("offphone").value;
            var phonePattern = /^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/; // Validates Indian phone numbers in the format +91XXXXXXXXXX or 0XXXXXXXXXX

            if (!phonePattern.test(offphoneNumber)) {
                document.getElementById("offphone-error").innerHTML = "Invalid phone number";
                return false;
            } else {
                document.getElementById("offphone-error").innerHTML = "";
                return true;
            }
        }
//.................................................................................................................\
        function enableSubmitButton() {
            var nameValid = validateName();
            var emailValid = validateEmail();
            var passwordValid = validatePassword();
            var addressValid = validateAddress();

            var submitButton = document.getElementById("submit-btn");
            submitButton.disabled = !(nameValid && emailValid && passwordValid && addressValid);
        }

        function enableSubmitButton2(){
            var offnameValid = validateoffname();
            var offemailValid = validateoffemail();
            var offpasswordValid = validateoffpassword();
            var offaddressValid = validateoffaddress();
            var offphoneValid = validateoffphonenumber();

            var submitButton2 = document.getElementById("submit-btn2");
            submitButton2.disabled = !(offnameValid && offemailValid && offpasswordValid && offaddressValid && offphoneValid);
        }
    </script>

  <!-- delete station -->

  <style>
    .custom-color2{
        background-color: white;
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

      .custom-color{
        /* background: #D3CCE3;  fallback for old browsers */
        /* background: -webkit-linear-gradient(to right, #E9E4F0, #D3CCE3);  Chrome 10-25, Safari 5.1-6 */
        /* background: linear-gradient(to right, #E9E4F0, #D3CCE3); W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
        .custom-color2{
          /* background: rgb(2,0,36); */
          /* background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(229,233,230,1) 0%, rgba(214,240,245,1) 100%); */
        }
        .modal-custom{
          position: absolute;
          top: 400px;
          right: 100px;
          bottom: 0;
          left: 0;
          z-index: 10040;
          overflow: auto;
          overflow-y: auto;
        }
  </style>

  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- bootsrtap 5.3 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
</head>

<body class="custom-color g-sidenav-show-custom g-sidenav-show  bg-gray-100" id="g-sidenav-show" >

  <aside class="custom-color2 sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" >
        <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">C I R A ADMIN Dashboard</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link  active" href="#">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"> 
              <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title></title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(0.000000, 148.000000)">
                        <path class="color-background opacity-6" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                        <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

         <!-- station modal buttons and nav items - manage stations and add stations -->
         <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Station(Enforc Dept)</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link  " >
            <!-- list station -->
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"> 
              <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>office</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g id="office" transform="translate(153.000000, 2.000000)">
                        <path class="color-background opacity-6" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"></path>
                        <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="btn btn-outline-primary btn-sm mb-0 me-3" data-bs-toggle="modal" data-bs-target="#modal_add_station">Add</span>
          </a>
        </li>
        <form method="POST">
          <?php 
                include("cira_connect_db_server.php");
                if(isset($_POST['manage_station'])){
                $stat_manage_query="SELECT * FROM `station`;";
                $stat_manage_result=mysqli_query($conn_cira,$stat_manage_query);
                //  
                }
            ?>
       </form>
        <li class="nav-item">
          <a class="nav-link  " >
            <!-- list station -->
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>manage stations</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g id="office" transform="translate(153.000000, 2.000000)">
                        <path class="color-background opacity-6" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"></path>
                        <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="btn btn-outline-primary btn-sm mb-0 me-3" name="manage_station" data-bs-toggle="modal" data-bs-target="#modal_manage_station">manage</span>
          </a>
        </li>
        <!-- station manage end here -->
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Police (Enfoc Officers)</h6>
        </li>
         <!-- officer modal buttons and nav items - manage officers and add officers-->
        <li class="nav-item">
          <a class="nav-link">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(453.000000, 454.000000)">
                        <path class="color-background opacity-6" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"></path>
                        <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg> 
            </div>
           <span class="btn btn-outline-primary btn-sm mb-0 me-3" data-bs-toggle="modal" data-bs-target="#modal_add_officer" >Add</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(453.000000, 454.000000)">
                        <path class="color-background opacity-6" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"></path>
                        <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
           <span class="btn btn-outline-primary btn-sm mb-0 me-3" data-bs-toggle="modal" data-bs-target="#modal_manage_officer" >Manage</span>
          </a>
        </li>
        

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account</h6>
        </li>

        <li class="nav-item">
          <a class="nav-link  " href="#!">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>document</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(154.000000, 300.000000)">
                        <path class="color-background opacity-6" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"></path>
                        <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <form method="POST">
            <button  type="submit" class="btn btn-outline-primary btn-sm mb-0 me-3" name="user_signout"target="_blank">Log Out</button>
            </form>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="btn  btn mb-0 me-3" target="_blank"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a class="btn btn-outline-primary btn-sm mb-0 me-3" target="_blank"><?PHP echo($_SESSION['s_key'])?></a>
            </li>
            </a>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <section id="sec1">
      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Active Enf:Stations</p>
                      <h5 class="font-weight-bolder mb-0">
                        <?php echo $tot_stat?>
                        <span class="text-success text-sm font-weight-bolder">avail</span>
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="fas fa-building"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Active Enf:Officers</p>
                      <h5 class="font-weight-bolder mb-0">
                      <?php echo $tot_pol?>
                        <span class="text-success text-sm font-weight-bolder">avail</span>
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="fas fa-users"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">New Public Users</p>
                      <h5 class="font-weight-bolder mb-0">
                        
                        <span class="text-danger text-sm font-weight-bolder"></span>
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="fas fa-user-clock"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Public Users</p>
                      <h5 class="font-weight-bolder mb-0">
                        <?php echo $tot_pub?>
                        <span class="text-success text-sm font-weight-bolder">active</span>
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="fas fa-users"></i> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row my-4">
          <div class="col-lg-4 col-md-6">
            <div class="card h-100">
              <div class="card-header pb-0">
                <h6>Crimes overview</h6>
                <p class="text-sm">
                  <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                  <span class="font-weight-bold">24 </span> this month
                </p>
              </div>
              <div class="card-body p-3">
                <div class="timeline timeline-one-side">
                  <div class="timeline-block mb-3">
                    <span class="timeline-step">
                      <i class="ni ni-bell-55 text-success text-gradient"></i>
                    </span>
                    <div class="timeline-content">
                      <h6 class="text-dark text-sm font-weight-bold mb-0">2400 crime/month</h6>
                      <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">user-data</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
      </div>
    </section> 
    <section id="user_view">
      <!-- user profile modal -->
      <div class="modal-user-view modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-custom modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Admin profile</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-success">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section id="reg_forms">
      <form method="POST" enctype="multipart/form-data">
        <!-- Modal add station -->
        <div class="modal fade " id="modal_add_station" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_add_stationLabel" aria-hidden="true">
          <div class="modal-dialog  modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_add_stationLabel">Add New Station</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body"></br>
                <div class="form-floating">
                    <select class="form-select" name="dist_name">
                      <option selected>choose your district</option>
                      <?php
                        while($state_row=mysqli_fetch_array($res_l_state)){
                      ?>
                        <option value="<?php echo $state_row['district_id'];?>"> <?php echo $state_row['district_name'];?> </option>
                      <?php
                        }
                      ?>
                    </select>
                  </div></br>
                <div class="form-floating">
                    <input type="text" class="form-control" id="name" name="station_name"placeholder="station name" onkeyup="enableSubmitButton()"  required>
                    <label for="floatingstationname">Station Name</label>
                    <span id="name-error"></span>
                </div></br>
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="email" name="station_mail" placeholder="station@maildomain.com"onkeyup="enableSubmitButton()" required>
                  <label for="station_mail">Email address</label>
                  <span id="email-error"></span>
                </div>
                <div class="form-floating">
                  <input type="password" class="form-control" id="password" name="station_pass" placeholder="Password" onkeyup="enableSubmitButton()"  required>
                  <label for="floatingPassword">Password</label>
                  <span id="password-error"></span>
                </div></br>
                <div class="form-floating">
                  <textarea class="form-control" placeholder="enter full station address" name="station_address" id="address" style="height: 100px" onkeyup="enableSubmitButton()" ></textarea>
                  <label for="station_address">Station Address</label>
                  <span id="address-error"></span>
                </div></br>
                <div class="mb-3">
                  <label for="station_img" class="form-label">Station Image</label>
                  <input class="form-control" type="file" name="station_img" id="station_img">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-outline-success" name="reg_stat_btn" id="submit-btn" disabled>Confirm and Add</button>
                <script>
                    // Enable submit button initially if all fields are filled
                    window.addEventListener('DOMContentLoaded', (event) => {
                        enableSubmitButton();
                    });
                </script>
              </div>
            </div>
          </div>
        </div>
      </form>
      <form method="POST" enctype="multipart/form-data">
        <!-- modal add police officer -->
        <div class="modal fade" id="modal_add_officer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_add_officerLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="modal_add_officerLabel">Add New Officer</h1>
            </div>
            <div class="modal-body">
              <div class="form-floating">
                  <?php
                      $list_state_qry="SELECT * FROM `state_district_tbl`";
                      $res_l_state=mysqli_query($conn_cira,$list_state_qry);
                  ?>
                  <select class="form-select" name="off_state"  aria-label="Default select">
                    <option>list of districts</option>
                    <?php
                      while($state_row=mysqli_fetch_array($res_l_state)){
                    ?>
                      <option value="<?php echo $state_row['city_code'];?>"> <?php echo $state_row['district_name'];?> </option>
                    <?php
                      }
                    ?>
                  </select>
                </div></br>
                
                <div class="form-floating">
                <?php
                      $list_station_query="SELECT * FROM `station` WHERE `stat_status`= '1';";
                      $result_station=mysqli_query($conn_cira,$list_station_query);
                  ?>
                    <select class="form-select" name="Officer_station" aria-label="Default select">
                        <option selected>list of Station</option>
                        <?php
                      while($station_row=mysqli_fetch_array($result_station)){
                      ?>
                        <option value="<?php echo $station_row['stat_id'];?>"> <?php echo $station_row['stat_name'];?> </option>
                      <?php
                        }
                      ?>
                    </select>
                </div></br>
                <div class="form-floating">
                    <input type="text" class="form-control" id="offname" name="Officer_name" placeholder="Officer name" required onkeyup="enableSubmitButton2()" >
                    <label for="floatingOfficername">Officer Name</label>
                    <span id="offname-error"></span>
                </div></br>
                <div class="form-floating">
                    <select class="form-select" class="form-control" id="floatingOfficerdesg" name="Officer_desg" required>
                      <option selected>Designation </option>
                      <option value="Circle Inspector">Circle Inspector</option>
                      <option value="Sub Inspector">Sub Inspector</option>
                      <option value="Constable">Constable</option>
                      <option value="head constable">head constable</option>
                    </select>
                </div></br>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="offemail" name="Officer_mail" placeholder="Officer@maildomain.com" required onkeyup="enableSubmitButton2()">
                    <label for="Officer_mail">Officer's Email</label>
                    <span id="offemail-error"></span>
                </div>
                <div class="form-outline mb-3">
                <label class="form-label" for="Officer_phone">Phone number</label>
                  <input type="number" class="form-control" id="offphone" name="Officer_phone" data-mdb-input-mask="+91 999-999-9999" placeholder="officer's phone" required onkeyup="enableSubmitButton2()">
                  <span id="offphone-error"></span>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="offpassword" name="Officer_pass" placeholder="Password" required onkeyup="enableSubmitButton2()">
                    <label for="floatingOfficerPassword">Password</label>
                    <span id="offpassword-error"></span>
                </div></br>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="enter full Officer address" id="offaddress" name="Officer_address" style="height: 100px" onkeyup="enableSubmitButton2()" ></textarea>
                    <label for="Officern_address">Officer's Residential Address</label>
                    <span id="offaddress-error"></span>
                </div></br>
                <div class="mb-3">
                    <label for="Officer_img" class="form-label">Officer's Image</label>
                    <input class="form-control" type="file" name="Officer_img" id="Officer_img">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-outline-success" name="reg_officer_btn" id="submit-btn2" disabled>Confirm and Add</button>
                <script>
                    // Enable submit button initially if all fields are filled
                    window.addEventListener('DOMContentLoaded', (event) => {
                        enableSubmitButton2();
                    });
                </script>
              </div>
            </div>
          </div>
        </div>
      </form>

      <!-- //...................................................... -->
      <!-- validation for add officer need to be done -->
      <!-- //......................................................................... -->
    </section>

    <section id="manage_tables">
      <form method="POST" enctype="multipart/form-data">
        <!-- Modal for manage station -->
        <div class="modal fade" id="modal_manage_station" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_manage_stationLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_manage_stationLabel">MANAGE STATION</h1>&emsp;
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <table class="table align-middle mb-0 bg-white" id="myTable">
                  <thead class="bg-light">
                    <tr>
                      <th><center>Station Name<center></th>
                      <th><center>District <center></th>
                      <th><center>Station Mail</center></th>
                      <th><center>Status</center></th>
                      <th><center>Last update on</center></th>
                      <th><center>Actions</center></th>
                    </tr> 
                  </thead>
                  <tbody>
                    <?php foreach ($data as $row): ?>
                    <tr>
                      <!-- station pic -->
                      <td>
                        <div class="d-flex align-items-center">
                        <!-- station name -->
                          <div class="ms-3">
                            <p class="fw-bold mb-1"><?php $row['stat_name'];?></p>
                            <p class="text-muted mb-0"><b><center><?php echo $row['stat_name']?></b></p>
                          </div>
                        </div>
                      </td>
                      <!-- station district -->
                      <?php 
                        $dist= $row['dist_name'];
                        $distq="SELECT * FROM `state_district_tbl` WHERE `district_id` = '$dist'";
                        $distres=mysqli_query($conn_cira,$distq);
                        while($distr= mysqli_fetch_array($distres)){
                      ?>
                      <div class="d-flex align-items-center">
                        <div class="ms-3">
                          <td>
                            <p class="text-muted mb-0"><?php echo $distr['district_name']?></p>
                          </td>
                        </div>
                      </div>
                      <?php } ?>
                      <!-- station mail -->
                      <td>
                        <p class="text-muted mb-0" style="align=left"><?php echo $row['stat_mail']?></p>
                      </td>
                      <!-- station status -->
                      <td><center>
                        <p class="text-muted mb-0"><?php 
                          if($row['stat_status']==1){
                            echo "<div class='btn btn-outline-success' role='alert' style='transform: scale(0.7)'disabled>
                            Active
                          </div>";
                          }
                          elseif($row['stat_status']==2){
                            echo "<div class='btn btn-outline-warning' role='alert' style='transform: scale(0.7)' disabled>
                            suspended
                          </div>";
                          } 
                          elseif($row['stat_status']==3){
                            echo "<div class='btn btn-outline-danger' role='alert' style='transform: scale(0.7)'disabled>
                            Removed
                          </div>";
                          }
                          else{ 
                            echo "<div class='spinner-border spinner-border-sm'>
                          </div>";  
                          }
                        ?></p></center>
                      </td>
                      <td><center><?php echo $row['stat_up_date']?></center></td>
                          
                      <td><center>
                        <button data-id='<?php echo $row['stat_id']?>' type="button" style='transform: scale(0.7)' class="userinfo btn btn-outline-secondary" >
                          <i class="fas fa-user-edit"></i>
                        </button>
                        </center>
                      </td> 
                    </tr> 
                    <?php endforeach; ?>
                  </tbody>
              </table>
                  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
                  <script>
                      //  Initialize DataTables
                      $(document).ready(function() {
                          $('#myTable').DataTable();
                      });
                  </script>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </form> 

      <form method="POST" enctype="multipart/form-data">
        <!-- Modal for manage officers -->
        <div class="modal fade" id="modal_manage_officer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_manage_stationLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_manage_stationLabel">MANAGE OFFICERS</h1>&emsp;
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <table class="table align-middle mb-0 bg-white" id="table2">
                  <thead class="bg-light">
                    <tr>
                      <th><center>Officer Name<center></th>
                      <th><center> Mail</center></th>
                      <th><center>Status</center></th>
                      <th><center>Last update on</center></th>
                      <th><center>Station</center></th>
                      <th><center>Designation</center></th>
                      <th><center>Actions</center></th>
                    </tr> 
                  </thead>
                  <tbody>
                    <?php foreach ($data2 as $row): ?>
                    <tr>
                      <!-- officer pic -->
                      <td>
                        <div class="d-flex align-items-center">
                        <!-- officer name -->
                          <div class="ms-3">
                            <p class="fw-bold mb-1"><?php $row['pol_name'];?></p>
                            <center><p class="text-muted mb-0"><b><?php echo $row['pol_name']?></b></p></center>
                          </div>
                        </div>
                      </td>
                      <!-- officer mail -->
                      <td>
                        <p class="text-muted mb-0"><?php echo $row['pol_mail']?></p>
                      </td>
                      <!-- officer status -->
                      <td><center>
                        <p class="text-muted mb-0"><?php 
                          if($row['pol_status']==1){
                            echo "<div class='btn btn-outline-success' role='alert' style='transform: scale(0.7)'disabled>
                            Active
                          </div>";
                          }
                          elseif($row['pol_status']==2){
                            echo "<div class='btn btn-outline-warning' role='alert' style='transform: scale(0.7)' disabled>
                            suspended
                          </div>";
                          } 
                          elseif($row['pol_status']==3){
                            echo "<div class='btn btn-outline-danger' role='alert' style='transform: scale(0.7)'disabled>
                            Removed
                          </div>";
                          }
                          else{ 
                            echo "<div class='spinner-border spinner-border-sm'>
                          </div>";  
                          }
                        ?></p></center>
                      </td>
                      <!-- pol latest change date -->
                      <td><center><?php echo $row['pol_up_date']?></center></td>
                      
                      <!-- station name -->
                      <?php 
                        $stat_id= $row['stat_id'];
                        $st_q="SELECT * FROM `station` WHERE `stat_id`='$stat_id'";
                        $st_r=mysqli_query($conn_cira,$st_q);
                      ?>
                      <td>
                        <?php while($st_name=mysqli_fetch_array($st_r)){ ?>
                        <p class="text-muted mb-0"><?php echo $st_name['stat_name'];?></p>
                        <?php  
                          }
                        ?>
                      </td>

                      <!-- officer designation -->
                      <td>
                        <p class="text-muted mb-0"><center><?php echo $row['pol_desg']?></center></p>
                      </td>

                      <td>
                        <button data-id='<?php echo $row['pol_id']?>' type="button" style='transform: scale(0.7)' class="polinfo btn btn-outline-secondary" >
                          <i class="fas fa-user-edit"></i>
                        </button>
                      </td> 
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
                  <script>
                      //  Initialize DataTables
                      $(document).ready(function() {
                          $('#table2').DataTable();
                      });
                  </script>
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </form> 
    </section>
    
    <section id="update_forms">
      <!-- update station modal -->
      <form method="POST">
        <div class="modal fade" id="modal_update_stat" tabindex="-1" aria-labelledby="modal_update_statLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_update_statLabel">Update station</h1>
              </div>
              <div class="modal-body modal-updstat">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="update_station_details_btn" >Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </form>

      <!-- update station modal -->
      <form method="POST">
        <div class="modal fade" id="modal_update_pol" tabindex="-1" aria-labelledby="modal_update_polLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_update_polLabel">Update station</h1>
              </div>
              <div class="modal-body modal-updpol">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="update_pol_details_btn">Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
  </main>  
</body>
</html>

<?php }
  else header("location:admin_log_temp.php");
?>
