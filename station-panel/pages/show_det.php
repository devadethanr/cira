<?php 
    session_start();
    $master=$_GET['cm_id'];
    $officer=$_GET['off_id'];
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
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dpt_dashboard.php">cira</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="assign_officer.php">assign officer </a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="show_det.php">assign officer</a></li>
            </ol>
        </nav>
        <p><button type="submit" class="btn btn-outline-danger"><a href="dpt_dashboard.php">go back to dashboard</a></button> <center><h5>complaint details and officer assign </h5></center></p>
        
        <div class="container">
        <div class="row">
            <div class="col-md-3">
                <!--===================================================-->
                <div class="mar-btm">
                    <h4 class="text-thin"><i class="fa fa-lightbulb-o fa-lg fa-fw text-warning"></i> <?php echo $officer ?></h4></br>
                    <p class="text-muted mar-top">complaints can be assigned to choosen officer </br>
                    After assigning they can provide and track progress of the complaints</p>
                    <!-- <div class="list-group bg-trans">
                        <a class="list-group-item" href="#"><span class="badge badge-purple badge-icon badge-fw pull-left"></span> registered</a>
                        <a class="list-group-item" href="#"><span class="badge badge-info badge-icon badge-fw pull-left"></span> in progress</a>
                        <a class="list-group-item" href="#"><span class="badge badge-pink badge-icon badge-fw pull-left"></span> report ready</a>
                        <a class="list-group-item" href="#"><span class="badge badge-success badge-icon badge-fw pull-left"></span> closed</a>
                    </div> -->
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
                                <h3 class="pad-all bord-btm text-thin">Details </h3> <code> click here to expand </code><i class="fa-light fa-circle-caret-down" style="color: #e10ff0;"></i>
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
                            <h3 class="pad-all bord-btm text-thin"> Complaint Description </h3> <code> click here to expand </code><i class="fa-light fa-circle-caret-down" style="color: #e10ff0;"></i>
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
                            <h3 class="pad-all bord-btm text-thin"> Assign officer </h3> <code> click here to expand </code><i class="fa-light fa-circle-caret-down" style="color: #e10ff0;"></i>
                            
                            </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This complaint will be assigned to the officer.</strong> <code><?php echo $officer ?></code>, the access will be allowed .
                                </br></br><form method="POST">
                                    <button type="submit" class="btn btn-success" name="btn_asgn">assign officer</button>
                                    <button type="submit" class="btn btn-danger" name="btn_unas">Relieve officer </button>
                                </form>
                            </div>
                            </div>
                            <?php
                                if(isset($_POST['btn_asgn'])){
                                    $asgn_q="UPDATE `complaints` SET `asgn_off`='$officer',`cm_status`='2' WHERE `cm_id`='$master'";
                                    $asgn_r=mysqli_query($conn_cira,$asgn_q);
                                    if($asgn_r){
                                        ?>
                                            <script>
                                                alert("officer assigned successfully");
                                            </script>
                                        <?php
                                    }
                                }
                                if(isset($_POST['btn_unas'])){
                                    $un_q="UPDATE `complaints` SET `asgn_off`='NULL',`cm_status`='4' WHERE `cm_id` = '$master'";
                                    $un_r=mysqli_query($conn_cira,$un_q);
                                    if($un_r){
                                        ?>
                                            <script>
                                                alert("officer relieved from the case successfully");
                                            </script>
                                        <?php

                                    }
                                }
                            ?>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>