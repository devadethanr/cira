<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method ="POST">
        <input type="text" name="check">
        <input type="submit" name="btn1">
    </form>
</body>
</html>
<?php
    if(isset($_POST['btn1'])){
        $val=$_POST['check'];
        $conn=mysqli_connect("localhost","512150","itUT!w2dJnhf_.T","512150");
        $qr="INSERT INTO `feedback_user`(`fkey`, `feedback`) VALUES ([value-1],'$val')";
        $re=mysqli_query($conn,$qr);
    }
?>