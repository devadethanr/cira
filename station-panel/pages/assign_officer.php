<?php
    session_start();
    $stat_id=$_GET['stat_id'];
    $off_id=$_GET['off_id'];
    include("cira_connect_db_server.php");
?>

<?php
    if(isset($_POST['btn_sh_dt'])){
        $cm_no=$_POST['cm_no'];
         $cm_asg="SELECT * FROM `complaints` WHERE `cm_id`='$cm_no'";
         $cm_r=mysqli_query($conn_cira,$cm_asg); 
     }
 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <title>
            CIRA DEPARTMENT dashboard
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
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    </head>

    <style>
        @import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);
        html {
            font-family: "Montserrat", Arial, sans-serif;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        body {
            background: white;
        }

        button {
            overflow: visible;
        }

        button,
        select {
            text-transform: none;
        }

        button,
        input,
        select,
        textarea {
            color: #5a5a5a;
            font: inherit;
            margin: 0;
        }

        input {
            line-height: normal;
        }

        textarea {
            overflow: auto;
        }

        #container {
            border: solid 3px #474544;
            max-width: 768px;
            margin: 60px auto;
            position: relative;
        }

        form {
            padding: 37.5px;
            margin: 50px 0;
        }

        h1 {
            color: #474544;
            font-size: 32px;
            font-weight: 700;
            letter-spacing: 7px;
            text-align: center;
            text-transform: uppercase;
        }

        .underline {
            border-bottom: solid 2px #474544;
            margin: -0.512em auto;
            width: 80px;
        }

        .icon_wrapper {
            margin: 50px auto 0;
            width: 100%;
        }

        .icon {
            display: block;
            fill: #474544;
            height: 50px;
            margin: 0 auto;
            width: 50px;
        }

        .email {
            float: right;
            width: 45%;
        }

        input[type="text"],
        [type="email"],
        select,
        textarea {
            background: none;
            border: none;
            border-bottom: solid 2px #474544;
            color: #474544;
            font-size: 1em;
            font-weight: 400;
            letter-spacing: 1px;
            margin: 0em 0 1.875em 0;
            padding: 0 0 0.875em 0;
            text-transform: uppercase;
            width: 100%;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -ms-box-sizing: border-box;
            -o-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            -ms-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;
        }

        input[type="text"]:focus,
        [type="email"]:focus,
        textarea:focus {
            outline: none;
            padding: 0 0 0.875em 0;
        }

        .message {
            float: none;
        }

        .name {
            float: left;
            width: 45%;
        }

        select {
            background: url("https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-ios7-arrow-down-32.png")
            no-repeat right;
            outline: none;
            -moz-appearance: none;
            -webkit-appearance: none;
        }

        select::-ms-expand {
            display: none;
        }

        .subject {
            width: 100%;
        }

        .telephone {
            width: 100%;
        }

        textarea {
            line-height: 150%;
            height: 150px;
            resize: none;
            width: 100%;
        }

        ::-webkit-input-placeholder {
            color: #474544;
        }

        :-moz-placeholder {
            color: #474544;
            opacity: 1;
        }

        ::-moz-placeholder {
            color: #474544;
            opacity: 1;
        }

        :-ms-input-placeholder {
            color: #474544;
        }

        #form_button {
            background: none;
            border: solid 2px #474544;
            color: #474544;
            cursor: pointer;
            display: inline-block;
            font-family: "Helvetica", Arial, sans-serif;
            font-size: 0.875em;
            font-weight: bold;
            outline: none;
            padding: 20px 35px;
            text-transform: uppercase;
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            -ms-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;
        }

        #form_button:hover {
            background: #474544;
            color: #f2f3eb;
        }

        @media screen and (max-width: 768px) {
            #container {
            margin: 20px auto;
            width: 95%;
            }
        }

        @media screen and (max-width: 480px) {
            h1 {
            font-size: 26px;
            }

            .underline {
            width: 68px;
            }

            #form_button {
            padding: 15px 25px;
            }
        }

        @media screen and (max-width: 420px) {
            h1 {
            font-size: 18px;
            }

            .icon {
            height: 35px;
            width: 35px;
            }

            .underline {
            width: 53px;
            }

            input[type="text"],
            [type="email"],
            select,
            textarea {
            font-size: 0.875em;
            }
        }
    </style>
    <body>
        
        <aside class="custom-color2 sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
            <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" >
                <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">C I R A DEPARTMENT</span>
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
                    <span class="nav-link-text ms-1">Assign officer</span>
                </a>
                </li>
                <b>&emsp; Assigning officer : &emsp;</b>
                 &emsp;<?php
                    echo $off_id;
                    $cm_list = "SELECT * FROM `complaints` WHERE `pol_id` = '$stat_id'";
                    $cm_ls_r = mysqli_query($conn_cira, $cm_list);
                    $data = array();

                    while ($row = mysqli_fetch_assoc($cm_ls_r)) {
                        $data[] = $row;
                    }

                    $dataJson = json_encode($data);
                    ?>


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
                    <form method="POST">
                        <button type="submit" class="btn btn-outline-danger"><a href="dpt_dashboard.php">go back to dashboard</a></button>
                        <button  type="submit" class="btn btn-outline-primary btn-sm mb-0 me-3" name="user_signout"target="_blank">Log Out</button>
                    </form>
                </a>
                </li>
            </ul>
            </div>
        </aside>
        <main class="main-content position-relative max-height-vh-100 h-100  border-radius-lg ">
              
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dpt_dashboard.php">cira</a></li>
                    <li class="breadcrumb-item active" aria-current="page">assign officer</li>
                </ol>
                </nav>
                
        <form method="POST">
        <table class="table align-middle mb-0 bg-white" id="myTable">
            <thead class="bg-light">
            <tr>
                <th><center>CM.NO<center></th>
                <th><center>CM reg user</center></th>
                <th><center>occurence  date</center></th>
                <th><center>Status</center></th>
                <th><center>Last update on</center></th>
                <th><center>subject</center></th>
                <th><center>Actions</center></th>
                
            </tr> 
            </thead>
            <tbody>
                <?php foreach ($data as $row): ?>
            <tr>
                <!--  -->
                <td>
                <div class="d-flex align-items-center">
                <!-- comp no -->
                    <div class="ms-3">
                    <p class="fw-bold mb-1"><?php $row['cm_id'];?></p>
                    <p class="text-muted mb-0"><b><?php echo $row['cm_id'];?></b></p>
                    <input type="hidden" name="cm_no" value="<?php echo $row['cm_id'];?>">
                    </div>
                </div>
                </td>
                <!-- comp person -->
                <td>
                <p class="text-muted mb-0"><?php echo $row['pub_id'];?></p>
                <!-- comp person -->
                <td>
                <p class="text-muted mb-0"><?php echo $row['cm_date'];?></p>
                </td>
                <!-- station status -->
                <td><center>	
                <p class="text-muted mb-0"><?php 
                    if($row['cm_status']==1){
                    echo "<div class='btn btn-outline-success' role='alert' style='transform: scale(0.7)'disabled>
                    registered
                    </div>";
                    }
                    elseif($row['cm_status']==2){
                    echo "<div class='btn btn-outline-warning' role='alert' style='transform: scale(0.7)' disabled>
                    in progress
                    </div>";
                    } 
                    elseif($row['cm_status']==3){
                    echo "<div class='btn btn-outline-danger' role='alert' style='transform: scale(0.7)'disabled>
                    Report generation
                    </div>";
                    }
                    
                    elseif($row['cm_status']==4){
                        echo "<div class='btn btn-outline-danger' role='alert' style='transform: scale(0.7)'disabled>
                        Officer Relived 
                        </div>";
                        }
                    else{ 
                    echo "<div class='spinner-border spinner-border-sm'>
                    </div>";  
                    }
                ?></p></center>
                </td>
                <td>
                    <p class="text-muted mb-0"><?php echo $row['cm_reg_date'];?></p>
                </td>
                    
                <td>
                    <p class="text-muted mb-0"><?php echo $row['cm_sub'];?></p>
                </td>
                <td>
                    <a href="show_det.php?cm_id= <?php echo $row['cm_id'] ?> & off_id= <?php echo $off_id ?> "<button name="btn_cm"  style='transform: scale(0.8)' class="polinfo btn btn-outline-secondary">
                       <i class="fas fa-spinner fa-spin"></i> Show details</b></i>
                    </button>
                </td>
            </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
            <script>
                // Step 5: Initialize DataTables
                $(document).ready(function() {
                    $('#myTable').DataTable();
                });
            </script>
        </form>
    </main>
    </body>
</html>
