<?php
  session_start();
  // $master=$_GET['master'];
  $cm_id=$_GET['cm_id'];
  include("../CIRA_FORMS/cira_connect_db_server.php");
?>

<?php
  $cm_q="SELECT * FROM `tbl_comp_status` WHERE `comp_id`='$cm_id'";
  $cm_r=mysqli_query($conn_cira,$cm_q);

  $cm_det= "SELECT * FROM `complaints` WHERE `cm_id` ='$cm_id'";
  $cm_d_r=mysqli_query($conn_cira,$cm_det);
  $cm_row=mysqli_fetch_array($cm_d_r);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" media="all">
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <style>
        .page-content{
        background: rgba(255, 255, 255, 0.25);
        padding: 30px;
        border-radius: 10px;
        margin-top: 50px;
        width: 400px;
        }
    body {
    background-color: #f9f9fa
    }

    @media (min-width:992px) {
        .page-container {
            max-width: 1140px;
            margin: 0 auto
        }

        .page-sidenav {
            display: block !important
        }
    }

    .padding {
        padding: 2rem
    }

    .w-32 {
        width: 32px !important;
        height: 32px !important;
        font-size: .85em
    }

    .tl-item .avatar {
        z-index: 2
    }

    .circle {
        border-radius: 500px
    }

    .gd-warning {
        color: #fff;
        border: none;
        background: #f4c414 linear-gradient(45deg, #f4c414, #f45414)
    }

    .timeline {
        position: relative;
        border-color: rgba(160, 175, 185, .15);
        padding: 0;
        margin: 0;
    }

    .p-4 {
        padding: 1.5rem !important
    }

    .block,
    .card {
        background: #fff;
        border-width: 0;
        border-radius: .25rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, .05);
        margin-bottom: 1.5rem
    }

    .mb-4,
    .my-4 {
        margin-bottom: 1.5rem !important
    }

    .tl-item {
        border-radius: 3px;
        position: relative;
        display: -ms-flexbox;
        display: flex;
    }

    .tl-item>* {
        padding: 10px
    }

    .tl-item .avatar {
        z-index: 2
    }

    .tl-item:last-child .tl-dot:after {
        display: none
    }

    .tl-item.active .tl-dot:before {
        border-color: #448bff;
        box-shadow: 0 0 0 4px rgba(68, 139, 255, .2)
    }

    .tl-item:last-child .tl-dot:after {
        display: none
    }

    .tl-item.active .tl-dot:before {
        border-color: #448bff;
        box-shadow: 0 0 0 4px rgba(68, 139, 255, .2)
    }

    .tl-dot {
        position: relative;
        border-color: rgba(160, 175, 185, .15)
    }

    .tl-dot:after,
    .tl-dot:before {
        content: '';
        position: absolute;
        border-color: inherit;
        border-width: 2px;
        border-style: solid;
        border-radius: 50%;
        width: 10px;
        height: 10px;
        top: 15px;
        left: 50%;
        transform: translateX(-50%)
    }

    .tl-dot:after {
        width: 0;
        height: auto;
        top: 25px;
        bottom: -15px;
        border-right-width: 0;
        border-top-width: 0;
        border-bottom-width: 0;
        border-radius: 0
    }

    .tl-item.active .tl-dot:before {
        border-color: #448bff;
        box-shadow: 0 0 0 4px rgba(68, 139, 255, .2)
    }

    .tl-dot {
        position: relative;
        border-color: rgba(160, 175, 185, .15)
    }

    .tl-dot:after,
    .tl-dot:before {
        content: '';
        position: absolute;
        border-color: inherit;
        border-width: 2px;
        border-style: solid;
        border-radius: 50%;
        width: 10px;
        height: 10px;
        top: 15px;
        left: 50%;
        transform: translateX(-50%)
    }

    .tl-dot:after {
        width: 0;
        height: auto;
        top: 25px;
        bottom: -15px;
        border-right-width: 0;
        border-top-width: 0;
        border-bottom-width: 0;
        border-radius: 0
    }

    .tl-content p:last-child {
        margin-bottom: 0
    }

    .tl-date {
        font-size: .85em;
        margin-top: 2px;
        min-width: 100px;
        max-width: 100px
    }

    .avatar {
        position: relative;
        line-height: 1;
        border-radius: 500px;
        white-space: nowrap;
        font-weight: 700;
        border-radius: 100%;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-pack: center;
        justify-content: center;
        -ms-flex-align: center;
        align-items: center;
        -ms-flex-negative: 0;
        flex-shrink: 0;
        border-radius: 500px;
        box-shadow: 0 5px 10px 0 rgba(50, 50, 50, .15)
    }

    .b-warning {
        border-color: #f4c414!important;
    }

    .b-primary {
        border-color: #448bff!important;
    }

    .b-danger {
        border-color: #f54394!important;
    }

    .line-wrapper {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .line {
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        background-color: #448bff;
        width: 2px;
        height: 100%;
        z-index: 1;
    }

    .line-animate {
        animation: lineAnimation 2s ease-out;
    }

    @keyframes lineAnimation {
        0% {
            height: 0;
        }
        100% {
            height: 100%;
        }
    }
  </style>
  <script>
    $(document).ready(function() {
      $(".timeline").each(function() {
        $(this).find(".tl-item:not(.active)").hide();
        var i = 0;
        $(this).find(".tl-item").each(function() {
          var item = $(this);
          setTimeout(function() {
            item.show();
            item.addClass("animated fadeIn");
          }, i * 500);
          i++;
        });
      });

      $(".line-animate").each(function() {
        var line = $(this);
        var lineParent = line.closest(".line-wrapper");
        var lineTop = lineParent.offset().top;
        var lineBottom = lineTop + lineParent.outerHeight();
        line.css("top", lineTop);
        line.animate({ top: lineBottom }, 2000);
      });
    });
  </script>
</head>
<body>
  <div class="page-content page-container" id="page-content">
    <h3>CIRA - Complaints updates </h3>
    </br>
    <h6>complaint no : <?php echo $cm_row['cm_id']?></h6>
    <h6>complaint subject : <?php echo $cm_row['cm_sub']?></h6>
    <h6>complaint date : <?php echo $cm_row['cm_date']?></h6>

    <div class="padding">
      <div class="row">
        <div class="col-lg-12">
          <div class="timeline p-4 block mb-4">
          <?php while($st_row=mysqli_fetch_array($cm_r)){?>
            <div class="tl-item active">
              <div class="tl-dot b-warning"></div>
              <div class="tl-content">
                <div class=""><?php echo $st_row['status']?></div>
                <div class="tl-date text-muted mt-1"><?php echo $st_row['date']?></div>
              </div>
            </div>
            <div class="line-wrapper">
              <div class="line line-animate"></div>
            </div>
          <?php }?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

