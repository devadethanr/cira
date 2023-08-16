<?php 
  session_start();
?>
<?php
   if($_SESSION['islogged']){
?>
<?php
  include("cira_connect_db_server.php");
  if($_SESSION['islogged']){
      $master=$_SESSION['s_key'];
      $USER_Q= "SELECT * FROM `police` WHERE `pol_id`='$master'";
      $USER_R=mysqli_query($conn_cira,$USER_Q);
      $USER_ROW=mysqli_fetch_array($USER_R);
      // $stat_id=$USER_ROW['stat_id'];

  //active cases available
      $act_case_q="SELECT * FROM `complaints` WHERE `asgn_off`='$master'";
      $act_case_re=mysqli_query($conn_cira,$act_case_q);
      $act_case_no=mysqli_num_rows($act_case_re);



//user profile and logout
    //user profile

    //logout
    if(isset($_POST['user_signout'])){
      session_destroy();
      ?>
        <script>
          window.location.href='../..//index.php';
        </script>
      <?php
    }

    if(isset($_POST[''])){

    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <title>
    CIRA OFFICER dashboard
  </title>
  <!-- refresh page reset -->
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
     }
 </script>

  <!-- delete station -->

  <style>
    .custom-color2{
        background-color: white;
      }
    body {
           background-color: white;
          /* background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
          background-size: 400% 400%;
          animation: gradient 15s ease infinite;
          height: 100vh;
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
          } */
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
</head>

<body class="custom-color g-sidenav-show-custom g-sidenav-show  bg-gray-100" id="g-sidenav-show" >
  <aside class="custom-color2 sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" >
        <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">C I R A OFFICER Dashboard</span>
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
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Active cases registered</h6>
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
                <title>manage cases</title>
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
        

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account </h6>
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
      <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
      </ol>
      </nav>
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
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Cases assigned </p>
                      <h5 class="font-weight-bolder mb-0">
                        <?php echo $act_case_no ?>
                        <span class="text-danger text-sm font-weight-bolder">avail</span>
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
        </div>
        <div class="row mt-4">
          <div class="col-lg-7 mb-lg-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="d-flex flex-column h-100">
                      <p class="mb-1 pt-2 text-bold"></p>
                      <h5 class="font-weight-bolder">CIRA OFFICER Dashboard</h5>
                      <p class="mb-5">graph </p>
                    </div>
                  </div>
                  <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                    <div class="border-radius-lg h-100">
                      <img src="../assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                      <div class="position-relative d-flex align-items-center justify-content-center h-100">
                        <img class="w-100 position-relative z-index-2 pt-4" src=" ../assets/img/curved-images/curved5-small.jpg" alt="rocket">
                      </div>
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
              <h1 class="modal-title fs-5" id="exampleModalLabel">station profile</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-success">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    
<!-- sort button query -->
    <!-- <?php
      // if(isset($_POST['btn_srt_cp'])){
        // $_SESSION['srt_val']=$_POST['comp_categ'];
        ?>
        <script>
          window.location.href="sorted_complaints.php"
        </script><?php
      // }
    ?>  -->

    <section id="manage_tables">
      <form method="POST" enctype="multipart/form-data">
        <!-- Modal for manage station -->
        <div class="modal fade modal-dialog-scrollable" id="modal_manage_station" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_manage_stationLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_manage_stationLabel">ASSIGNED COMPLAINTS</h1>&emsp;
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <table class="table align-middle mb-0 bg-white">
                  <thead class="bg-light">
                    <tr>
                      <th><center>Complaint.No<center></th>
                      <th><center>Status</center></th>
                      <th><center>Last update on</center></th>
                      <th><center>subject</center></th>
                      <th><center>more actions</center></th>
                    </tr> 
                  </thead>
                  <tbody>
                     <?php 
                        while($com_row= mysqli_fetch_array($act_case_re)){
                      ?>
                    <tr>
                      <!--  -->
                      <td>
                        <div class="d-flex align-items-center">
                        <!-- comp no -->
                          <div>
                            <p class="fw-bold mb-1"><?php $com_row['cm_id'];?></p>
                            <p class="text-muted mb-0"><b><?php echo $com_row['cm_id'];?></b></p>
                            <input type="hidden" name="cm_no" value="<?php echo $com_row['cm_id'];?>">
                          </div>
                        </div>
                      </td>
                      <!-- comp person -->
                      <!-- station status -->
                      <td><center>	
                        <p class="text-muted mb-0"><?php 
                          if($com_row['cm_status']==1){
                            echo "<div class='btn btn-outline-success' role='alert' style='transform: scale(0.7)'disabled>
                            registered
                          </div>";
                          }
                          elseif($com_row['cm_status']==2){
                            echo "<div class='btn btn-outline-warning' role='alert' style='transform: scale(0.7)' disabled>
                            in progress
                          </div>";
                          } 
                          elseif($com_row['cm_status']==3){
                            echo "<div class='btn btn-outline-danger' role='alert' style='transform: scale(0.7)'disabled>
                            Report generation
                          </div>";
                          }
                          else{ 
                            echo "<div class='spinner-border spinner-border-sm'>
                          </div>";  
                          }
                        ?></p></center>
                      </td>
                      <td>
                        <p class="text-muted mb-0"><?php echo $com_row['cm_reg_date'];?></p>
                      </td>
                          
                      <td>
                        <p class="text-muted mb-0"><?php echo $com_row['cm_sub'];?></p>
                      </td>
                      <td>
                        <center><button type="submit" name="btn_dt" class="btn btn-outline-info"> Respond</button></center>
                      </td>
                    </tr>
                    <?php 
                    }
                    ?>
                  </tbody>
              </table>
              </div>
              <div class="modal-footer">
                 <!--  &emsp;<h3 class="modal-title fs-6" id="modal_manage_stationLabel">sort by category</h3>&emsp;
                
                 <div class=""> 
                  <label for="comp_categ"></label>
                  <select placeholder="Complaint category" name="comp_categ" id="comp_categ" required>
                    <option disabled hidden selected>complaint category</option>
                    <option value="Women : harrassment /rape/bullying">Women : harrassment /rape</option>
                    <option value="Men : harrassment /rape/bullying">Men : harrassment /rape</option>
                    <option value="Child : Molesting/rape/bullying">Child : Molesting/rape/bullying</option>
                    <option value="company/organisation">company/organisation</option>
                    <option value="customer/consumer protection">customer/consumer protection</option>
                    <option value="Individual">Individual</option>
                  </select> &emsp;
                </div> 
                <button type="submit" name="btn_srt_cp" class="btn btn-light">Sort</button> &emsp;-->
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </form> 
    </section>

    <?php
        if(isset($_POST['btn_dt'])){
          $cm_no=$_POST['cm_no'];
          $_SESSION['cm_no']=$cm_no;
          ?>
            <script>
              window.location.href="complaint_details.php";
            </script>
          <?php
          exit();
        }
      ?>

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
  else header("location:../../CIRA_FORMS/cira_pub_user_login.php");
?>
