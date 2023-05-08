<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$password'")or die ('query failed');

    if(mysqli_num_rows($select) > 0){
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['id'];  
        header('location:dash.html');      
    }else{
        $message[] = 'incorrect email or password!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitwelle Trades - Account Login</title>

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
            <h3>Login Now</h3>
            <input type="email" name="email" required placeholder="Enter your email" class="box">
            <input type="password" name="password" required placeholder="Enter your password" class="box">
            <input type="submit" name="submit" class="btn" value="login now">
            <p>Not a member? <a href="register.php">Register now</a></p>
        </form>
    </div>
</body>
</html>