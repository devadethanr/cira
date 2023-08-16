<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .custom-form1 {
            max-width: 500px;
            margin: 0 auto;
        }
        .translucent-box {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row py-5 mt-4 align-items-center">
            <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
                <img src="maxim-hopman-PEJHULxUHZs-unsplash.jpg" class="img-fluid">
            </div>
            <div class="col-md-7 col-lg-6 ml-auto">
                <div class="custom-form1">
                    <div class="translucent-box">
                        <h2 class="mb-4">User Registration</h2>
                        <form method="POST" action="#" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" name="firstname" id="firstName" placeholder="First Name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="lastname" id="lastname" placeholder="Last Name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="username" id="username" placeholder="Email Address" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">+91</span>
                                    </div>
                                    <input type="numeric" id="phoneNumber" name="phone" placeholder="Phone Number" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="per_id_no" id="per_id_no" placeholder="Personal Identification" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="date" name="user_dob" id="dob" placeholder="Date of Birth" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="user_address" id="user_address" placeholder="Residential address" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="pub_stat" id="pub_station">
                                    <option selected disabled>Find your nearest police station</option>
                                    <option value="1">Station 1</option>
                                    <option value="2">Station 2</option>
                                    <option value="3">Station 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="passwordConfirmation" id="passwordConfirmation" placeholder="Confirm Password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="file" name="user_img" id="user_img" placeholder="Personal Image" class="form-control-file" required>
                            </div>
                            <div class="g-recaptcha" data-sitekey="your-site-key"></div>
                            <div class="form-group">
                                <button type="submit" name="user_reg" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="form-group text-center mt-4">
                        <p class="text-muted">Already Registered? <a href="cira_pub_user_login.php">Continue to Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>
