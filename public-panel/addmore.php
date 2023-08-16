<!DOCTYPE html>
<html>
<head>
  <title>Registration Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    body {
      background: url("background.jpg") no-repeat center center fixed;
      background-size: cover;
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
</head>
<body>

<div class="container">
  <div class="registration-box mx-auto">
    <h2 class="text-center">Register to CIRA</h2>
    <form id="registrationForm" action="/register" method="post">
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
        <label for="policeStation">Nearest Police Station:</label>
        <select class="form-control" id="policeStation" name="policeStation" required>
          <option value="">Select Police Station</option>
          <option value="station1">Police Station 1</option>
          <option value="station2">Police Station 2</option>
          <option value="station3">Police Station 3</option>
          <!-- Add more options as needed -->
        </select>
        <span id="policeStationError" class="error-message"></span>
      </div>
      <button type="submit" id="submitBtn" class="btn btn-primary" disabled>Register</button>
    </form>
  </div>
</div>

</body>
</html>
