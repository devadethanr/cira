<?php 
    session_start();
    $master=$_SESSION['cm_no'];
    include("cira_connect_db_server.php");
?>

<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/5dbc32242f.js" crossorigin="anonymous"></script>
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
    <!-- ajax for update modals -->
    </style>
    <script>
            function showNotification() {
            var notificationBanner = document.getElementById("notification_banner");
            notificationBanner.style.display = "block";

            setTimeout(function() {
                notificationBanner.style.display = "none";
            }, 3000); // Hide the notification banner after 3 seconds
        }

        function showUploadFile() {
            var status = document.getElementById("status");
            var fileUpload = document.getElementById("file_upload");

            if (status.value === "3") {
                fileUpload.classList.remove("d-none");
            } else {
                fileUpload.classList.add("d-none");
            }
        }
    </script>

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
    <style>
        .form-control option.default {
            color: black;
        }

        .form-control option.in_progress {
            color: green;
        }

        .form-control option.report_ready {
            color: orange;
        }

        .form-control option.closed {
            color: red;
        }

        .notification-banner {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            text-align: center;
            display: none;
            z-index: 9999;
        }

        body{margin-top:20px;
        background:#eee;
        }

        .mar-btm {
            margin-bottom: 15px
        }


        .list-group.bg-trans .list-group-item:not(.active):not(.disabled) {
            background-color: transparent;
            border-color: transparent;
            color: inherit
        }

        .list-group.bg-trans .list-group-item .disabled {
            opacity: .5
        }

        .list-group.bg-trans a.list-group-item:hover:not(.active) {
            background-color: rgba(0, 0, 0, 0.05)
        }

        .list-group.bord-no .list-group-item {
            border-color: transparent
        }

        .list-group .list-divider {
            display: block
        }

        .list-group-item {
            border-color: #e9e9e9
        }

        .list-group-item-heading {
            margin-top: 5px
        }

        .list-group-item:first-child {
            border-top-left-radius: 0;
            border-top-right-radius: 0
        }

        .list-group-item:last-child {
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0
        }

        .list-group-item .list-group-item.disabled,
        .list-group-item .list-group-item.disabled:hover,
        .list-group-item .list-group-item.disabled:focus {
            background-color: rgba(0, 0, 0, 0.07);
            border-color: transparent
        }

        .list-group-item.active,
        .list-group-item.active:hover,
        .list-group-item.active:focus {
            background-color: #54abd9;
            border-color: #54abd9;
            color: #fff
        }

        .list-group-item.active .list-group-item-text,
        .list-group-item.active:hover .list-group-item-text,
        .list-group-item.active:focus .list-group-item-text {
            color: #fff
        }

        a.list-group-item:hover,
        a.list-group-item:focus {
            background-color: rgba(0, 0, 0, 0.05)
        }

        a.list-group-item-primary,
        .list-group-item-primary {
            background-color: #7cb3e3;
            border-color: transparent;
            color: #fff
        }

        a.list-group-item-primary:hover,
        a.list-group-item-primary:focus {
            background-color: #89bae6;
            color: #fff
        }

        a.list-group-item-info,
        .list-group-item-info {
            background-color: #64c6e2;
            border-color: transparent;
            color: #fff
        }

        a.list-group-item-info:hover,
        a.list-group-item-info:focus {
            background-color: #71cbe4;
            color: #fff
        }

        a.list-group-item-success,
        .list-group-item-success {
            background-color: #a3d272;
            border-color: transparent;
            color: #fff
        }

        a.list-group-item-success:hover,
        a.list-group-item-success:focus {
            background-color: #aad57e;
            color: #fff
        }

        a.list-group-item-warning,
        .list-group-item-warning {
            background-color: #f3b961;
            border-color: transparent;
            color: #fff
        }

        a.list-group-item-warning:hover,
        a.list-group-item-warning:focus {
            background-color: #f4bf70;
            color: #fff
        }

        a.list-group-item-danger,
        .list-group-item-danger {
            background-color: #f9826b;
            border-color: transparent;
            color: #fff
        }

        a.list-group-item-danger:hover,
        a.list-group-item-danger:focus {
            background-color: #f98e7a;
            color: #fff
        }

        a.list-group-item-mint,
        .list-group-item-mint {
            background-color: #5ed4b2;
            border-color: transparent;
            color: #fff
        }

        a.list-group-item-mint:hover,
        a.list-group-item-mint:focus {
            background-color: #6ad7b8;
            color: #fff
        }

        a.list-group-item-purple,
        .list-group-item-purple {
            background-color: #af69a4;
            border-color: transparent;
            color: #fff
        }

        a.list-group-item-purple:hover,
        a.list-group-item-purple:focus {
            background-color: #b473aa;
            color: #fff
        }

        a.list-group-item-pink,
        .list-group-item-pink {
            background-color: #e899bb;
            border-color: transparent;
            color: #fff
        }

        a.list-group-item-pink:hover,
        a.list-group-item-pink:focus {
            background-color: #eba5c3;
            color: #fff
        }

        a.list-group-item-dark,
        .list-group-item-dark {
            background-color: #44494d;
            border-color: transparent;
            color: #fff
        }

        a.list-group-item-dark:hover,
        a.list-group-item-dark:focus {
            background-color: #4b5155;
            color: #fff
        }


        .badge:empty.badge-icon {
            display: inline-block;
            width: .7em;
            height: .7em;
            padding: 0;
            min-width: 5px;
            margin: .5em;
            border-radius: 50%
        }

        .badge.badge-fw,
        .badge:empty.badge-fw {
            margin-right: 1em
        }

        .badge-default {
            background-color: #e3e8ee;
            color: #333
        }

        .badge-primary {
            background-color: #5fa2dd
        }

        .badge-info {
            background-color: #46bbdc
        }

        .badge-success {
            background-color: #91c957
        }

        .badge-warning {
            background-color: #f1aa40
        }

        .badge-danger {
            background-color: #f76549
        }

        .badge-mint {
            background-color: #42cca5
        }

        .badge-purple {
            background-color: #9f5594
        }

        .badge-pink {
            background-color: #e17ca7
        }

        .badge-dark {
            background-color: #33373a
        }

        .pad-all {
            padding: 15px;
        }
        .text-thin {
            font-weight: 300;
        }
        .bord-btm {
            border-bottom: 1px solid #e9e9e9;
        }

    </style>
    <body>
    <button type="submit" class="btn btn-outline-danger"><a href="ofc_dashboard.php">go back to dashboard</a></button>
    <center><h4>complaint progress and reports  </h4></center></br>
    
    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="ofc_dashboard.php">home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">complaint details </a></li>
                    </ol>
                    </nav>
       

        <div class="container">
        <div class="row">
            <div class="col-md-3">

             
                <!--===================================================-->
                <div class="mar-btm">
                    <h4 class="text-thin"><i class="fa fa-lightbulb-o fa-lg fa-fw text-warning"></i> Progress Updation </h4></br>
                    <p class="text-muted mar-top">Access complaint details from this tab.</br>
                    Mark progress and upload reports</p>
                    <div class="list-group bg-trans">
                        <a class="list-group-item" href="#"><span class="badge badge-purple badge-icon badge-fw pull-left"></span> registered</a>
                        <a class="list-group-item" href="#"><span class="badge badge-info badge-icon badge-fw pull-left"></span> in progress</a>
                        <a class="list-group-item" href="#"><span class="badge badge-pink badge-icon badge-fw pull-left"></span> report ready</a>
                        <a class="list-group-item" href="#"><span class="badge badge-success badge-icon badge-fw pull-left"></span> closed</a>
                    </div>
                </div>
                <!--===================================================-->

                <hr>

            </div>
            <div class="col-md-9">
                <div class="panel">
                    <div class="panel-body">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h3 class="pad-all bord-btm text-thin">Details </h3> <code> click here to expand </code> <i class="fa-light fa-circle-caret-down" style="color: #e10ff0;"></i>
                            </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               <?php 
                                    $dt_q="SELECT * FROM `complaints` WHERE `cm_id`='$master'";
                                    $dt_r=mysqli_query($conn_cira,$dt_q);?>
                                    <table>
                                        <?php
                                    while($dt_row=mysqli_fetch_array($dt_r)){ ?>
                                        <tr>
                                            <td> complaint no:</td>
                                            <td> <?php echo $dt_row['cm_id'];?></td>
                                        </tr>
                                        <tr>
                                            <td> User registered complaint :</td>
                                            <td> <?php echo $dt_row['pub_id'];?></td>
                                        </tr>
                                        <tr>
                                            <td> Category:</td>
                                            <td> <?php echo $dt_row['cm_categ'];?></td>
                                        </tr>
                                        <tr>
                                            <td> Subject:</td>
                                            <td> <?php echo $dt_row['cm_sub'];?></td>
                                        </tr>
                                        <?php 
                                    }
                                    ?>
                                    </table> 
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h3 class="pad-all bord-btm text-thin"> Complaint Description </h3><code> click here to expand </code> <i class="fa-light fa-circle-caret-down" style="color: #e10ff0;"></i>
                            </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <?php 
                                    $dt_q="SELECT * FROM `complaints` WHERE `cm_id`='$master'";
                                    $dt_r=mysqli_query($conn_cira,$dt_q);?>
                            <table>
                                    <?php
                                    while($dt_row=mysqli_fetch_array($dt_r)){ ?>
                                        <tr>
                                            <td> Entity against the complaint is:</td>
                                            <td> <?php echo $dt_row['cm_against'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Description provided:</td>
                                            <td> <?php echo $dt_row['cm_desc'];?></td>
                                        </tr>
                                        <tr>
                                            <td> registered date :</td>
                                            <td> <?php echo $dt_row['cm_reg_date'];?></td>
                                        </tr>
                                        <tr>
                                            <td> last update date:</td>
                                            <td> <?php echo $dt_row['cm_date'];?></td>
                                        </tr>
                                        <?php 
                                    }
                                    ?>
                                    </table> 
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <h3 class="pad-all bord-btm text-thin"> Progress and Reports </h3> <code> click here to expand </code><i class="fa-light fa-circle-caret-down" style="color: #e10ff0;"></i>
                            
                            </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>In this tab complaint progress can be  .</strong> <code>marked</code>
                                </br></br>
                                <form method="POST" enctype="multipart/form-data">
                                </br>
                                     <label for="statusText">update daily status for complaintant:</label>
                                     </br>
                                      <textarea class="form-control" id="statusText" name="statusText" rows="4" ></textarea>
                                      </br>
                                      <button type="submit"  name="statustext_btn" class="btn btn-primary"  onclick="showNotification()">Update Status</button>
                                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        show all updates
                                    </button>
                                      </br>
                                    <div class="form-group">
                                    <select id="status" name="status" class="form-control" onchange="showUploadFile()">
                                        <option value="default" selected class="default">Select status</option>
                                        <option value="2" class="in_progress">In Progress</option>
                                        <option value="3" class="report_ready">Report Ready</option>
                                        <option value="5" class="closed">Closed</option>
                                    </select>
                                </br>
                                </div>

                                <div class="form-group d-none" id="file_upload">
                                    <label for="report_file">Report File:</label>
                                    <input type="file" id="report_file" name="report_file" class="form-control">
                                </div>
                                    <button type="submit"  name="status_btn" class="btn btn-primary"  onclick="showNotification()">Update Status</button>
                                </form>
                            </div>
                            </div>
                            
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div> 
        <?php 
              
              $cm_q="SELECT * FROM `tbl_comp_status` WHERE `comp_id`='$master'";
              $cm_r=mysqli_query($conn_cira,$cm_q);
        ?>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Last Updates &nbsp;</h1>
                <?php 
                    $currentDateTime = date('Y-m-d H:i:s');
                    echo $currentDateTime;
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php while($st_row=mysqli_fetch_array($cm_r)){?>
                <div class="tl-item active">
                <div class="tl-dot b-warning"></div>
                <div class="tl-content">
                    <div class=""> &nbsp; <?php echo $st_row['date']?> &nbsp; <?php echo $st_row['status']?></div>
                     <hr class="mt-4 bg-primary border-2 rounded">
                    <div class="tl-date text-muted mt-1"></div>
                </div>
                </div>
                <div class="line-wrapper">
                <div class="line line-animate"></div>
                </div>
            <?php }?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
    </body>
</html>
<?php 
    if(isset($_POST['status_btn'])){
        $update = "UPDATE `complaints` SET cm_status='".$_POST["status"]."' WHERE `cm_id`='$master'";
        $stsr=mysqli_query($conn_cira,$update);
        if($stsr){
            echo '<div id="notification_banner" class="notification-banner">Status updated successfully!</div>';
            echo '<script>showNotification();</script>';
        }
    }
    if(isset($_POST['statustext_btn'])){
        $st_txt=$_POST['statusText'];
        $in_s_q="INSERT INTO `tbl_comp_status`(`comp_id`, `status`) VALUES ('$master','$st_txt')";
        $in_r=mysqli_query($conn_cira,$in_s_q);
        if($in_r){
            echo '<div id="notification_banner" class="notification-banner">Status updated successfully!</div>';
            echo '<script>showNotification();</script>';
        }
    }
?>

