<?php

include 'config.php';

if(isset($_POST['submit'])){

    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $referral = mysqli_real_escape_string($conn, $_POST['referral']);

    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$password'")or die ('query failed');

    if(mysqli_num_rows($select) > 0){
        $message[] = 'user already exist!';
    }else{
        mysqli_query($conn, "INSERT INTO`user_form`(uname, fname, email, password, country, referral) VALUES('$uname', '$fname', '$email', '$password', '$country', '$referral')") or die('query failed');
        $message[] = 'registered successfully!';
        header('location:login.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitwelle Trades - Create Account</title>

    <link rel="shortcut icon" href="images/favicon.png" type="image/svg+xml">
    <link rel="stylesheet" href="pstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!----------GOOGLE FONTS-------------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>

<?php
if(isset($message)){
    foreach($message as $message){
        echo '<div class="message" onclick="this.remove()">'.$message.'</div>';
    }
}
?>

    <div class="form-container">
        <form action="" method="post">
            <h3>Register Now</h3>
            <input type="text" name="uname" required placeholder="Enter your username" class="box" >
            <input type="text" name="fname" required placeholder="Enter your fullname" class="box">
            <input type="email" name="email" required placeholder="Enter your email" class="box">
            <input type="password" name="password" required placeholder="Enter your password" class="box">
            <input type="country" name="country" required placeholder="Country" class="box">
            <input type="referral" name="referral"  placeholder="Referral" class="box">
            <input type="submit" name="submit" class="btn" value="Submit">
            <p>Already a member? <a href="login.php">login now</a></p>
        </form>
    </div>
</body>
</html>