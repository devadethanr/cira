<?php 
if(isset($_POST['login'])){
// Authorisation details.
$username = "devadethan1122@gmail.com";
$hash = "eb6481623373617e2fed606a83f69e3e7f1176931a4e8be6fbfa98e19bdf535a";

// Config variables. Consult http://api.txtlocal.com/docs for more info.
$test = "0";

// Data for text message. This is the text message data.
$sender = "API Test"; // This is who the message appears to be from.
$numbers = $_POST['num']; // A single number or a comma-seperated list of numbers
$otp=mt_rand(100000,999999);
setcookie("otp",$otp);
$message = "hey dethan your otp is".$otp;
// 612 chars or less
// A single number or a comma-seperated list of numbers
$message = urlencode($message);
$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
$ch = curl_init('https://api.txtlocal.com/send/?');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); // This is the result from the API
curl_close($ch);
    echo("otp send success");
}
if(isset($_POST['verify'])){
    $verotp=$_POST['otp'];
    if($verotp==$_COOKIE['otp']){
        echo("logged syccess");
    }
    else{
        echo("otp wrong");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
        <table>
            <td>phone</td>
            <td><input type="text" name="num">
            <td></td>
            <td><input type="submit" name="login" value="sign(login)[send otp]">
            <td>otp</td>
            <td><input type="text" name="otp">
            <td><input type="submit" name="verify" value="verify otp">
        </table>
    </form>
</body>
</html>