<?php
    session_start();
    $srt_val=$_SESSION['srt_val'];
    include("cira_connect_db_server.php");
?>
<?php
    $srt_q="SELECT * FROM `complaints` WHERE `cm_categ`= '$srt_val'";
    $srt_re=mysqli_query($conn_cira,$srt_q);
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
</head>

<style>
    @import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);
    html {
        font-family: "Montserrat", Arial, sans-serif;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
    }

    body {
        background: #f2f3eb;
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
    <div class="main-page-wrapper pattern-bg-one">
        <!-- ===================================================
            Loading Transition
        ==================================================== -->
        <!-- <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="animation-preloader">
                <div class="icon"><img src="images/logo/logo_01.svg" alt="" class="m-auto d-block" width="40"></div>
                <div class="txt-loading mt-3">
                    <span data-text-preloader="C" class="letters-loading">
                        c
                    </span>
                    <span data-text-preloader="I" class="letters-loading">
                        I
                    </span>
                    <span data-text-preloader="R" class="letters-loading">
                        R
                    </span>
                    <span data-text-preloader="A" class="letters-loading">
                        A
                    </span>
                </div>
            </div>	
        </div> -->
    </div>
    
    <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark"  onclick="window.location.href='../../station-panel/pages/dpt_dashboard.php'"><i class="fas fa-spinner fa-spin"></i> Go back</button>
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
        <tr>
            <th><center>CM.NO<center></th>
            <th><center>CM reg user</center></th>
            <th><center>occurence  date</center></th>
            <th><center>Status</center></th>
            <th><center>Last update on</center></th>
            <th><center>subject</center></th>
        </tr> 
        </thead>
        <tbody>
            <?php 
            while($com_row= mysqli_fetch_array($srt_re)){
            ?>
        <tr>
            <!--  -->
            <td>
            <div class="d-flex align-items-center">
                <img
                    src=""
                    alt="image"
                    style="width: 45px; height: 45px"
                    class="rounded-circle"
                    />
            <!-- comp no -->
                <div class="ms-3">
                <p class="fw-bold mb-1"><?php $com_row['cm_id'];?></p>
                <p class="text-muted mb-0"><b><?php echo $com_row['cm_id'];?></b></p>
                </div>
            </div>
            </td>
            <!-- comp person -->
            <td>
            <p class="text-muted mb-0"><?php echo $com_row['pub_id'];?></p>
            <!-- comp person -->
            <td>
            <p class="text-muted mb-0"><?php echo $com_row['cm_date'];?></p>
            </td>
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

        </tr>
        <?php 
        }
        ?>
        </tbody>
    </table>
</body>
</html>