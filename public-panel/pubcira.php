<?php 
  session_start();
?>
<?php if($_SESSION['islogged']){
?>
<?php
  include("../CIRA_FORMS/cira_connect_db_server.php");
  if($_SESSION['islogged']){
    $master=$_SESSION['s_key'];
    $USER_Q="SELECT * FROM `public_user` WHERE `pub_mail`='$master'";
    $USER_R=mysqli_query($conn_cira,$USER_Q);
    $USER_ROW=mysqli_fetch_array($USER_R);
	$val= $USER_ROW['pub_id'];
  }
//   complaint registration query
  if(isset($_POST['btn_co_reg'])){
	$comp_reg_query="INSERT INTO `complaints`( `pub_id`,  `pol_id` ,`cm_categ`, `cm_sub`, `cm_against`, `cm_desc`, `cm_status`, `cm_date`)
				 VALUES ('$master','".$_POST['policeStation']."','".$_POST['comp_categ']."','".$_POST['comp_sub']."','".$_POST['comp_against']."','".$_POST['comp_desc']."','1','".$_POST['comp_date']."')";
	$comp_reg_res=mysqli_query($conn_cira,$comp_reg_query);
	if($comp_reg_res){
		?><script>alert("complaint filed successfully")</script><?php
		$complaintId = mysqli_insert_id($conn_cira); // Fetch the auto-incremented complaint ID
		$cm_status_q="INSERT INTO `tbl_comp_status`(`comp_id`, `status`) VALUES ('$complaintId','Complaint Registered')";
		$cm_r=mysqli_query($conn_cira,$cm_status_q);
	}
  }

  //logout btn
  if(isset($_POST['user_signout'])){
	session_destroy();
	?>
	  <script>
		window.location.href='../public-panel/index.php';
	  </script>
	<?php
  }

?>

		<?php 
			if(isset($_POST['adduser_btn'])){
				echo "<script> alert('successfully updated') </script>";
				$phn=$_POST['phoneNumber'];
				$adn=$_POST['aadhaarNumber'];
				$dob=$_POST['dob'];
				$adr=$_POST['address'];
				$ps=$_POST['policeStation'];
				$adduser_q="UPDATE `public_user` SET `pub_station`='$ps',`per_ident_id`='$adn',`per_ident_stat`='1',`pub_dob`='$dob',`pub_phone`='$phn',`pub_address`='$adr' 
				WHERE `pub_id` = '$val'";
				$add_r=mysqli_query($conn_cira,$adduser_q);
				if($add_r){
					echo "<script> alert('successfully updated') </script>";
				}
			}
		?>

<!-- '".$name."' -->
<!DOCTYPE html>
<html lang="en">
	
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<meta charset="UTF-8">
		<meta name="keywords" content="Digital marketing agency, Digital marketing company, Digital marketing services">
		<meta name="description" content="Jano creative multipurpose is a beautiful website template designed for SEO & Digital Agency websites.">
		<meta property="og:site_name" content="Jano">
		<meta property="og:url" content="https://heloshape.com/">
		<meta property="og:type" content="website">
		<meta property="og:title" content="Jano - Creative Multipurpose Bootstrap 5 Template">
		<meta name='og:image' content='images/assets/ogg.png'>
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- For Window Tab Color -->
		<!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#1d2b40">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#1d2b40">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#1d2b40">
		<title>CIRA - Crime Investigation Reporting and Analysis</title>
		<!-- Favicon -->
		<link rel="icon" type="image/png" sizes="56x56" href="images/fav-icon/icon.png">
		<!-- Main style sheet -->
		<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
		<!-- responsive style sheet -->
		<link rel="stylesheet" type="text/css" href="css/responsive.css" media="all">
		<style>
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
			.registration-box {
				background: rgba(255, 255, 255, 0.25);
				padding: 30px;
				border-radius: 10px;
				margin-top: 50px;
				width: 400px;
				}

				.registration-box form {
				text-align: left;
				}

				.error-message {
				color: red;
				font-size: 12px;
				margin-top: 5px;
				}
		</style>
		</style>
		  <!-- refresh page reset -->
		  <script>
			if ( window.history.replaceState ) {
				window.history.replaceState( null, null, window.location.href );
			}
			var today = new Date().toISOString().split("T")[0];

			// Set the maximum date for the date input field
			document.getElementById("comp_date").setAttribute("max", today);
		</script>
		  <script>
			document.addEventListener("DOMContentLoaded", function() {
			const form = document.getElementById("registrationForm");
			const submitBtn = document.getElementById("submitBtn");
			const phoneNumber = document.getElementById("phoneNumber");
			const aadhaarNumber = document.getElementById("aadhaarNumber");
			const dob = document.getElementById("dob");
			const address = document.getElementById("address");
			const phoneNumberError = document.getElementById("phoneNumberError");
			const aadhaarNumberError = document.getElementById("aadhaarNumberError");
			const dobError = document.getElementById("dobError");
			const addressError = document.getElementById("addressError");

			form.addEventListener("input", function() {
				validatePhoneNumber();
				validateAadhaarNumber();
				validateDOB();
				validateAddress();
				checkFormValidity();
			});

			function validatePhoneNumber() {
				const phoneNumberValue = phoneNumber.value.trim();
				const phoneNumberRegex = /^\d{10}$/;
				if (phoneNumberValue === "") {
				phoneNumberError.textContent = "Please enter your phone number.";
				return false;
				} else if (!phoneNumberRegex.test(phoneNumberValue)) {
				phoneNumberError.textContent = "Phone number must be a 10-digit numeric value.";
				return false;
				} else {
				phoneNumberError.textContent = "";
				return true;
				}
			}

			function validateAadhaarNumber() {
				const aadhaarValue = aadhaarNumber.value.trim();
				const aadhaarRegex = /^\d{12}$/;
				if (aadhaarValue === "") {
				aadhaarNumberError.textContent = "Please enter your Aadhaar number.";
				return false;
				} else if (!aadhaarRegex.test(aadhaarValue)) {
				aadhaarNumberError.textContent = "Aadhaar number must be a 12-digit numeric value.";
				return false;
				} else {
				aadhaarNumberError.textContent = "";
				return true;
				}
			}

			function validateDOB() {
				const dobValue = dob.value;
				const currentDate = new Date();
				const dobDate = new Date(dobValue);
				const minAge = 5; // Minimum age in years

				if (isNaN(dobDate)) {
				dobError.textContent = "Please enter a valid date of birth.";
				return false;
				} else if (currentDate.getFullYear() - dobDate.getFullYear() < minAge) {
				dobError.textContent = "You must be at least " + minAge + " years old.";
				return false;
				} else {
				dobError.textContent = "";
				return true;
				}
			}

			function validateAddress() {
				const addressValue = address.value.trim();
				if (addressValue === "") {
				addressError.textContent = "Please enter your address.";
				return false;
				} else {
				addressError.textContent = "";
				return true;
				}
			}

			function checkFormValidity() {
				if (
				validatePhoneNumber() &&
				validateAadhaarNumber() &&
				validateDOB() &&
				validateAddress()
				) {
				submitBtn.disabled = false;
				} else {
				submitBtn.disabled = true;
				}
			}
			});
		</script>
		
		<!-- status showing modal style and script -->
		<style>
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
		<div class="main-page-wrapper pattern-bg-one">
			<!-- ===================================================
				Loading Transition
			==================================================== -->
			<div id="preloader">
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
				</div>
			</div>



			<!-- 
			=============================================
				Theme Main Menu
			============================================== 
			-->
			<header class="theme-main-menu sticky-menu theme-menu-five white-vr">
				<div class="inner-content position-relative">
					<div class="d-flex align-items-center">
						<div class="logo order-lg-0"><H4><B>CIRA</B></H4></div>

						<div class="right-widget d-flex align-items-center ms-auto order-lg-3">
							<button class="donate-btn fw-500 tran3s position-relative d-none d-lg-block"class="btn btn-primary" type="button"data-bs-toggle="modal" data-bs-target="#user_details"><?PHP ECHO $USER_ROW['f_name']?> </button>
						</div> <!-- /.right-widget -->

						<nav class="navbar navbar-expand-lg ms-lg-5 order-lg-2">
							<button class="navbar-toggler d-block d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						    	<span></span>
						 	</button>
						    <div class="collapse navbar-collapse" id="navbarNav">
						    	<ul class="navbar-nav">

						    		<li class="d-block d-lg-none"><div class="logo"><a href="index.html" class="d-block"><img src="#" alt="CIRA" width="95"></a></div></li>
							        <li class="nav-item dropdown mega-dropdown">
							        	<button class="nav-link" aria-expanded="false"  data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-scroll fa-flip" style="--fa-flip-x: 1; --fa-flip-y: 0;"></i> File Complaint</button>
						            </li>

							        <li class="nav-item dropdown mega-dropdown">
							        	<button class="nav-link" aria-expanded="false" data-bs-toggle="modal" data-bs-target="#trk_co_mo"> <i class="fa-solid fa-cog fa-spin" style="--fa-animation-duration: 15s;"> </i> Track Complaint</button>
						            </li>
							        <li class="nav-item dropdown mega-dropdown">
							        	<button class="nav-link" aria-expanded="false" data-bs-toggle="modal" data-bs-target="#fir_rpt"> <i class="fa-solid fa-file-pdf fa-bounce"></i> Download Reports</button>
						            </li>
						            <li class="nav-item dropdown">
							        	<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Contact</a>
						                <ul class="dropdown-menu">
							                
							            </ul>
						            </li>
						    	</ul>
						    	<!-- Mobile Content -->
						    	<div class="mobile-content d-block d-lg-none">
						    		<div class="d-flex flex-column align-items-center justify-content-center mt-70">
										<div class="lang-dropdown position-relative mb-20">
											EN
										</div>
										<a href="contact-us.html" class="donate-btn fw-500 tran3s position-relative">Donate Now</a>
						    		</div>
						    	</div> <!-- /.mobile-content -->
						    </div>
						</nav>
					</div>
				</div> <!-- /.inner-content -->
			</header> <!-- /.theme-main-menu -->



            <!-- file complaint modal -->

            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">File your complaint NOW.</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
						<div id="container">
							<h1>&bull; Complaint registration form &bull;</h1>
							<div class="underline">
						</div>
                    	<form enctype="multipart/form-data" method="POST" id="contact_form">
							<div class="form-group">
								<?php
									$list_station_query="SELECT * FROM `station` WHERE `stat_status`= '1';";
									$result_station=mysqli_query($conn_cira,$list_station_query);
								?>
								<label for="policeStation">Nearest Police Station:</label>
								<select class="form-control" id="policeStation" name="policeStation" required>
										<?php
									while($station_row=mysqli_fetch_array($result_station)){
									?>
										<option value="<?php echo $station_row['stat_id'];?>"> <?php echo $station_row['stat_name'];?> </option>
									<?php
										}
									?>
								<!-- Add more options as needed -->
								</select>
								<span id="policeStationError" class="error-message"></span>
							</div>
							<div class="name_input">
								<label for="name_input"></label>
								<input type="text" placeholder="your name : <?php echo $USER_ROW['f_name'];?>&nbsp;<?php echo $USER_ROW['l_name'];?>" name="comp_name" id="name_input" required>
							</div>

							<div class="subject_input">  
								<label for="subject_input"></label>
								<input type="text" placeholder="Complaint Subject" name="comp_sub" id="subject_input" required>
							</div>

							<div class="comp_date">  
								<label for="comp_date">Date of Occurance</label>
								<input type="date" placeholder="Date of Occurance" name="comp_date" id="comp_date" required max="2023-07-11">
							</div>
							
							<div class="comp_against">  
								<label for="comp_against"></label>
								<input type="text" placeholder="Enter the entity name against complaint  " name="comp_against" id="comp_against" required>
							</div>

							<div class="comp_categ">
								<label for="comp_categ"></label>
								<select placeholder="Complaint category" name="comp_categ" id="comp_categ" required>
									<option disabled hidden selected>complaint category</option>
									<option value="Women : harrassment /rape/bullying">Women : harrassment /rape</option>
									<option value="Men : harrassment /rape/bullying">Men : harrassment /rape</option>
									<option value="Child : Molesting/rape/bullying">Child : Molesting/rape/bullying</option>
									<option value="company/organisation">company/organisation</option>
									<option value="customer/consumer protection">customer/consumer protection</option>
									<option value="Individual">Individual</option>
								</select>
							</div>

							<div class="comp_desc">
								<label for="comp_desc"></label>
								<textarea  placeholder="Describe the complaint" name="comp_desc" id="comp_desc" cols="30" rows="4" required></textarea>
							</div>

							<div class="comp_evd">  
								<label for="comp_evd">Any evidences if available</label>
								<input type="file"  name="comp_evd" id="comp_evd" required>
							</div>
								</div>
							</div>

							<div class="modal-footer">
								<div class="submit">
									<button type="submit"  id="form_button" data-bs-dismiss="modal">Close</button>
									<button type="submit" name="btn_co_reg" id="form_button" >file complaint</button>
								</div>
							</div>
							</div>
                    	</form><!-- // End form -->
               		</div>
            </div>

			
			<!-- file tracking and listing modal -->

			<div class="modal fade" id="trk_co_mo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
					<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title fs-5" id="staticBackdropLabel">Track Complaint Progress</h3>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div id="container">
							<h5>&bull;complaints registered in this account &bull;</h5>
						</div>
						<table class="table" >
							<thead>
								<tr>
									<th scope="col">cm.no</td>
									<th scope="col">reg date</td>
									<th scope="col">subject</td>
									<th scope="col">progress</td>
									<th scope="col">more details</td>
								</tr>
							</thead>
							<tbody>
								<?php 
									$cm_ls_qu= "SELECT * FROM `complaints` WHERE `pub_id`='$master'";
									$cm_ls_re=mysqli_query($conn_cira,$cm_ls_qu);
									while($cm_row=mysqli_fetch_array($cm_ls_re)){
								?>
								<tr>
									<td scope="col"><?php echo $cm_row['cm_id'] ?></td>
									<input type="hidden" name="cmid" value="<?php echo $cm_row['cm_id'] ?>">
									<td scope="col"><?php echo $cm_row['cm_reg_date'] ?></td>
									<td scope="col"><?php echo $cm_row['cm_sub'] ?></td>
									<td scope="col"><?php 
										if($cm_row['cm_status']==1){
											echo "<span class='label label-success'>Registered</span>" ;
										}
										elseif($cm_row['cm_status']==2){
											echo "<span class='label label-warning'>in progress</span>" ;
										}

										elseif($cm_row['cm_status']==3){
											echo "<span class='label label-info'>report generation</span>" ;
										}
										elseif($cm_row['cm_status']==4){
											echo "<span class='label label-danger'>officer relieved</span>" ;
										}
										
										elseif($cm_row['cm_status']==5){
											echo "<span class='label label-danger'>closed</span>" ;
										}
									?></td>
									
									<td>
										<a href="comp_status.php?cm_id= <?php echo $cm_row['cm_id']?>"<button  name="show_status"  style='transform: scale(0.7)' class="polinfo btn btn-outline-secondary" >
										<button type="submit" name="show_status_btn" class="btn btn-secondary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">show details</button>
									</td>
									
								</tr>
									
								<?php
									}
								?>
								
							</tbody>
						</table>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					</div>
					</div>
				</div>
			</div>
			

			<!-- report generation  -->
			
			<div class="modal fade" id="fir_rpt" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
					<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title fs-5" id="staticBackdropLabel">Download reports now</h3>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div id="container">
							<h5>&bull;complaints registered in this account &bull;</h5>
						</div>
						<table class="table" >
							<thead>
								<tr>
									<th scope="col">cm.no</td>
									<th scope="col">reg date</td>
									<th scope="col">subject</td>
									<th scope="col">Report available</td>
								</tr>
							</thead>
							<tbody>
								<?php 
									$cm_ls_qu= "SELECT * FROM `complaints` WHERE `pub_id`='$master' AND `cm_status` = 5 OR `cm_status` = 4" ;
									$cm_ls_re=mysqli_query($conn_cira,$cm_ls_qu);
									while($cm_row=mysqli_fetch_array($cm_ls_re)){
								?>
								<form method= "POST"><tr>
									<input type="hidden" name="rp_cm" value="<?php echo $cm_row['cm_id'] ?>">
									<td scope="col"><?php echo $cm_row['cm_id'] ?></td>
									<td scope="col"><?php echo $cm_row['cm_reg_date'] ?></td>
									<td scope="col"><?php echo $cm_row['cm_sub'] ?></td>
									<td scope="col"><button type="submit" name="btn_report" class="btn btn-outline-success">Download now</button></td>
								</tr>	</form>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					</div>
					</div>
				</div>
			</div>
	
			<?php
				if(isset($_POST['btn_report'])){
					$rp_cm=$_POST['rp_cm'];
					$_SESSION['rp_cm']=$rp_cm;
					?><script>
						window.location.href="../convert_pdf/index.php";
					</script><?php
				}
			?>

<!-- modal for other details -->
		<div class="modal fade " id="modal_add_userdata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_add_stationLabel" aria-hidden="true">
          <div class="modal-dialog  modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">ADD DETAILS</h1>
			</div>
			<div class="modal-body">
					<form id="registrationForm" method="POST" >
					<div class="form-group">
						<label for="phoneNumber">Phone Number:</label>
						<input type="number" class="form-control" id="phoneNumber" name="phoneNumber" required>
						<span id="phoneNumberError" class="error-message"></span>
					</div>
					<div class="form-group">
						<label for="aadhaarNumber">Aadhaar Number:</label>
						<input type="number" class="form-control" id="aadhaarNumber" name="aadhaarNumber" required>
						<span id="aadhaarNumberError" class="error-message"></span>
					</div>
					<div class="form-group">
						<label for="dob">Date of Birth:</label>
						<input type="date" class="form-control" id="dob" name="dob" required>
						<span id="dobError" class="error-message"></span>
					</div>
					<div class="form-group">
						<label for="address">Address:</label>
						<input type="text" class="form-control" id="address" name="address" required>
						<span id="addressError" class="error-message"></span>
					</div>
					<div class="form-group">
						<?php
                            $list_station_query="SELECT * FROM `station` WHERE `stat_status`= '1';";
                            $result_station=mysqli_query($conn_cira,$list_station_query);
                        ?>
						<label for="policeStation">Nearest Police Station:</label>
						<select class="form-control" id="policeStation" name="policeStation" required>
                                <?php
                            while($station_row=mysqli_fetch_array($result_station)){
                            ?>
                                <option value="<?php echo $station_row['stat_id'];?>"> <?php echo $station_row['stat_name'];?> </option>
                            <?php
                                }
                            ?>
						<!-- Add more options as needed -->
						</select>
						<span id="policeStationError" class="error-message"></span>
					</div>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" id="submitBtn" name="adduser_btn" class="btn btn-primary" disabled>Register</button>
					</form>
			</div>
			<div class="modal-footer">

			</div>
			</div>
		</div>
		</div>

			<!-- user profile view collapse -->

			<div class="modal fade right" id="user_details" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="user_detailsLabel" aria-hidden="true">
				<div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
					<div class="modal-content">
						
						<div class="modal-body text-center mb-1">

							<h5 class="mt-1 mb-2"><?php echo $USER_ROW['f_name'] ; echo "  " ; echo $USER_ROW['f_name'];?></h5>

							<div class="md-form ml-0 mr-0">
								<i class="fa-solid fa-envelope fa-bounce" style=" --fa-bounce-start-scale-x: 1; --fa-bounce-start-scale-y: 1; --fa-bounce-jump-scale-x: 1; --fa-bounce-jump-scale-y: 1; --fa-bounce-land-scale-x: 1; --fa-bounce-land-scale-y: 1; --fa-bounce-rebound: 0;" ></i>
								<label data-error="wrong" data-success="right" for="form29" class="ml-0">Email : </label>
								<label data-error="wrong" data-success="right" for="form29" class="ml-0"><?php echo $USER_ROW['pub_mail'];?></label>
							</div>
							
							<div class="md-form ml-0 mr-0">
								<i class="bi bi-telephone"></i>
								<label data-error="wrong" data-success="right" for="form29" class="ml-0">Contact :</label>
								<label data-error="wrong" data-success="right" for="form29" class="ml-0"><?php echo $USER_ROW['pub_phone'];?></label>
							</div>


							<!-- <div class="md-form ml-0 mr-0">
								<i class="fa-solid fa-circle-notch fa-spin"></i>
								<label data-error="wrong" data-success="right" for="form29" class="ml-0">Reg station : </label>
								<label data-error="wrong" data-success="right" for="form29" class="ml-0">
									<?php 
									// $pb_st=$USER_ROW['pub_station'];
									// $stat_qr= "SELECT * FROM `station` WHERE `stat_id` = '$pb_st'";
									// $st_re=mysqli_query($conn_cira,$stat_qr);
									// $st_row=mysqli_fetch_array($st_re);
									// echo $st_row['stat_name'];
								?></label>
							</div> -->
							<div class="text-center mt-4">
								<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal_add_userdata">
									Update details
								</button></br><hr>
								<?php 
								if($USER_ROW['per_ident_id']!= NULL){
									echo "details are upto date";
								}
								elseif($USER_ROW['per_ident_id']== NULL){
									echo "details need to be updatec";
								}
							?>
								<form method="POST">
									<button type="submit" name="user_signout" class="btn btn-danger">Sign Out</button>
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- 
			=============================================
			 Banner
			============================================== 
			-->
			<div class="hero-banner-five text-center position-relative">
				<div class="container">
					<div class="row">
						<div class="col-xl-10 m-auto wow fadeInUp" data-wow-delay="0.2s">
							<h1 class="hero-heading text-white mb-50 md-mb-30">Get <span class="position-relative">Loud <img src="images/shape/shape_71.svg" alt=""></span> <br> Rise your Voice Today</h1>
						</div>
					</div>
					
				</div> <!-- /.container -->
			</div> <!-- /.hero-banner-five -->

			


			<!-- 
			=============================================
				Feature Section 
			============================================== 
			-->
			<div class="fancy-feature-fourteen position-relative">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-sm-6">
							<div class="card-style-seven mb-30 text-center position-relative tran3s wow fadeInUp">
								<div class="icon d-flex align-items-end justify-content-center"><img src="images/lazy.svg" data-src="images/icon/icon_44.svg" alt="" class="lazy-img"></div>
								<h4 class="mt-25 mb-35">File/Track complaints </h4>
								<a href="#" class="read-btn tran3s">Read More</a>
								<span class="ribbon position-absolute" style="background:#FF5555;"></span>
							</div> <!-- /.card-style-seven -->
						</div>
						<div class="col-lg-3 col-sm-6">
							<div class="card-style-seven mb-30 text-center position-relative tran3s wow fadeInUp" data-wow-delay="0.2s">
								<div class="icon d-flex align-items-end justify-content-center"><img src="images/lazy.svg" data-src="images/icon/icon_45.svg" alt="" class="lazy-img"></div>
								<h4 class="mt-25 mb-35">Report Complaints</h4>
								<a href="#" class="read-btn tran3s">Read More</a>
								<span class="ribbon position-absolute" style="background:#36E0D1;"></span>
							</div> <!-- /.card-style-seven -->
						</div>
						<div class="col-lg-3 col-sm-6">
							<div class="card-style-seven mb-30 text-center position-relative tran3s wow fadeInUp" data-wow-delay="0.3s">
								<div class="icon d-flex align-items-end justify-content-center"><img src="images/lazy.svg" data-src="images/icon/icon_46.svg" alt="" class="lazy-img"></div>
								<h4 class="mt-25 mb-35">Education</h4>
								<a href="#" class="read-btn tran3s">Read More</a>
								<span class="ribbon position-absolute" style="background:#FFD94F;"></span>
							</div> <!-- /.card-style-seven -->
						</div>
						<div class="col-lg-3 col-sm-6">
							<div class="card-style-seven mb-30 text-center position-relative tran3s wow fadeInUp" data-wow-delay="0.4s">
								<div class="icon d-flex align-items-end justify-content-center"><img src="images/lazy.svg" data-src="images/icon/icon_47.svg" alt="" class="lazy-img"></div>
								<h4 class="mt-25 mb-35">Care</h4>
								<a href="#" class="read-btn tran3s">Read More</a>
								<span class="ribbon position-absolute" style="background:#B855FF;"></span>
							</div> <!-- /.card-style-seven -->
						</div>
					</div>
				</div> <!-- /.container -->
			</div> 
			


			<!-- 
			=============================================
				Feature Section
			============================================== 
			-->



			<!-- 
			=============================================
				Feature Section
			============================================== 
			-->




			<!--
			=====================================================
				Feature Section 
			=====================================================
			-->
			<div class="fancy-feature-eighteen wow fadeInUp mt-160 lg-mt-100">
				<div class="d-sm-flex">
					<div class="card-style-nine position-relative d-flex flex-column justify-content-center align-items-center" style="background-image:url(images/media/img_35.jpg);">
						<div class="icon d-flex align-items-end"><img src="images/lazy.svg" data-src="images/icon/icon_48.svg" alt="" class="lazy-img"></div>
						<div class="title text-white mt-25 mb-30">cira</div>
						<a href="#" class="btn-more rounded-circle text-center fw-light tran3s">+</a>
					</div> <!-- /.card-style-nine -->
					<div class="card-style-nine center-item position-relative d-flex flex-column justify-content-center align-items-center" style="background-image:url(images/media/img_36.jpg);">
						<div class="icon d-flex align-items-end"><img src="images/lazy.svg" data-src="images/icon/icon_49.svg" alt="" class="lazy-img"></div>
						<div class="title tx-dark mt-25 mb-15">empowering people </div>
						<p class="fs-18 text-center tx-dark">better support <br>better service</p>
					</div> <!-- /.card-style-nine -->
					<div class="card-style-nine position-relative d-flex flex-column justify-content-center align-items-center" style="background-image:url(images/media/img_37.jpg);">
						<div class="icon d-flex align-items-end"><img src="images/lazy.svg" data-src="images/icon/icon_50.svg" alt="" class="lazy-img"></div>
						<div class="title text-white mt-25 mb-30">...</div>
						<a href="#" class="btn-more rounded-circle text-center fw-light tran3s">+</a>
					</div> <!-- /.card-style-nine -->
				</div>
			</div> <!-- /.fancy-feature-eighteen -->





			<!--
			=====================================================
				
			=====================================================
			-->
			<div class="fancy-short-banner-six d-lg-flex">
				<div class="block-wrapper left-side d-flex justify-content-center justify-content-lg-end align-items-center">
					<div class="inner-wrapper wow fadeInLeft">
						<div class="row">
							<div class="col-xxl-8 col-xl-9 col-lg-10">
								<div class="title-style-six">
									<h2 class="main-title fw-500 text-white">join our newsletter forum</h2>
								</div> <!-- /.title-style-six -->
								<p class="m0 text-white text-lg pt-50 lg-pt-30 md-pt-10">Fill the form & becaome a part of us.</p>
							</div>
						</div>
					</div> <!-- /.inner-wrapper -->
				</div> <!-- /.block-wrapper -->

				<div class="block-wrapper right-side d-flex justify-content-center justify-content-lg-start align-items-center">
					<div class="inner-wrapper md-pt-50 md-pb-90 wow fadeInRight">
						<div class="row">
							<div class="col-xxl-10 col-lg-11 ms-auto">
								<h3 class="form-title tx-dark mb-50 lg-mb-30">Join Now!</h3>
								<div class="form-style-one">
									<form action="#" id="contact-form"  data-toggle="validator">
										<div class="messages"></div>
										<div class="row controls">
											<div class="col-12">
												<div class="input-group-meta form-group mb-25">
													<input type="text" placeholder="Your name*" name="name" required="required" data-error="Name is required.">
													<div class="help-block with-errors"></div>
												</div>
											</div>
											
											<div class="col-12">
												<div class="input-group-meta form-group mb-50">
													<input type="email" placeholder="Email*" name="email" required="required" data-error="Valid email is required.">
													<div class="help-block with-errors"></div>
												</div>
											</div>
											<div class="col-12">
												<div class="input-group-meta form-group mb-30">
													<textarea placeholder="Your message*" name="message" required="required" data-error="Please,leave us a message."></textarea>
													<div class="help-block with-errors"></div>
												</div>
											</div>
											<div class="col-12"><button class="btn-nine border3 w-100 fw-500 tran3s text-uppercase tx-dark">Join Now</button></div>
										</div>
									</form>
								</div> <!-- /.form-style-one -->
							</div>
						</div>
					</div> <!-- /.inner-wrapper -->
				</div> <!-- /.block-wrapper -->
			</div> <!-- /.fancy-short-banner-six -->



			<!--
			=====================================================
				Blog Section Two
			=====================================================
			-->






			<!--
			=====================================================
				Short Banner 
			=====================================================
			-->
			<div class="fancy-short-banner-seven position-relative mt-150 pt-80 pb-70 lg-mt-100 lg-pt-60 lg-pb-50">
				<div class="container">
					<div class="row">
						<div class="col-xxl-7 col-lg-8 m-auto text-center">
							<div class="title-style-four wow fadeInUp">
								<h2 class="main-title fw-500 text-white m0">Get updated by subscribe to our newsletter</h2>
							</div> <!-- /.title-style-four -->
							<p class="text-lg text-white mt-35 mb-75 lg-mt-20 lg-mb-30 wow fadeInUp">Get instant news by subscribe to our daily newsletter</p>
							<div class="subscribe-form m-auto wow fadeInUp">
								<form action="#" class="position-relative">
									<input type="email" placeholder="Email address">
									<button class="tran3s position-absolute fw-500">Try for free</button>
								</form>
							</div> <!-- /.subscribe-form -->
						</div>
					</div>
				</div>
			</div> <!-- /.fancy-short-banner-seven -->




			<!--
			=====================================================
				Footer
			=====================================================
			-->
			

			<!--
			=====================================================
				Footer
			=====================================================
			-->
			<div class="footer-style-five theme-basic-footer position-relative">
				<div class="container">
					<div class="inner-wrapper">
						<div class="row">
							<div class="col-lg-3 footer-intro mb-50">
								<div class="logo"><a href="index.html">CIRA</a></div>
								<p class="text-white fs-18 mt-30 mb-40 md-mt-10 md-mb-20 pe-xxl-5">.</p>
								<ul class="d-flex social-icon style-none">
									<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
									<li><a href="#"><i class="fab fa-twitter"></i></a></li>
									<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
								</ul>
							</div>
							<div class="col-xl-2 col-lg-3 col-sm-4 ms-auto mb-30">
								<h5 class="footer-title text-white fw-bold">Solution</h5>
								<ul class="footer-nav-link style-none">
									<li><a href="index.html">Home</a></li>
									<li><a href="about-v1.html">Learn about us</a></li>
									<li><a href="about-v1.html">Careers</a></li>
									<li><a href="service-v1.html">Features</a></li>
									<li><a href="blog-v1.html">Blog</a></li>
								</ul>
							</div>
							<div class="col-xl-3 col-lg-3 col-sm-4 mb-30">
								<h5 class="footer-title text-white fw-bold">Our Address</h5>
								<p class="mb-30">kerala,india</p>
								<a href="#" class="email tran3s fs-18">cira@kerala.gov.in</a> <br>
								<a href="#" class="mobile tran3s fs-20 mt-20 mb-30">+757 699-4478</a>
							</div>
						</div>

						<div class="bottom-footer d-md-flex align-items-center justify-content-between">
							<ul class="d-flex flex-wrap justify-content-center justify-content-md-start footer-nav style-none pb-15 order-md-last">
								<li><a href="about-v1.html">About</a></li>
								<li><a href="blog-v1.html">Blog</a></li>
								<li><a href="contact-us.html">Contact</a></li>
								<li><a href="faq.html">Privacy</a></li>
								<li><a href="faq.html">Policy</a></li>
							</ul>
							<p class="copyright text-center mb-15 text-white order-md-first">© 2002 - 2022 CIRA inc.</p>
						</div>
					</div> <!-- /.inner-wrapper -->
				</div>
			</div> <!-- /.footer-style-five -->


			<button class="scroll-top">
				<i class="bi bi-arrow-up-short"></i>
			</button>
			
			

			
			



    	<!-- jQuery first, then Bootstrap JS -->
    	<!-- jQuery -->
		<script src="vendor/jquery.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- WOW js -->
		<script src="vendor/wow/wow.min.js"></script>
		<!-- Slick Slider -->
		<script src="vendor/slick/slick.min.js"></script>
		<!-- Fancybox -->
		<script src="vendor/fancybox/dist/jquery.fancybox.min.js"></script>
		<!-- Lazy -->
    	<script src="vendor/jquery.lazy.min.js"></script>
    	<!-- js Counter -->
		<script src="vendor/jquery.counterup.min.js"></script>
		<script src="vendor/jquery.waypoints.min.js"></script>
		<!-- isotop -->
		<script  src="vendor/isotope.pkgd.min.js"></script>
		<!-- validator js -->
    	<script src="vendor/validator.js"></script>

		<!-- Theme js -->
		<script src="js/theme.js"></script>
		</div> <!-- /.main-page-wrapper -->
	</body>
</html>
<?php 
    }
    else header("location:../public-panel/index.php");
?>