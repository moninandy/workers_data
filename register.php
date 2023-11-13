<?php
require 'config.php';
if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $username=$_POST["username"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $confirmpassword=$_POST["confirmpassword"];
    $duplicate=mysqli_query($conn,"SELECT * FROM tb_users WHERE username='$username' or email='$email'");
    if(mysqli_num_rows($duplicate)>0){
        echo
        "<script> alert('Username or Email Has Already Taken');</script>";
    }
    else{
        if($password ==$confirmpassword){
            $query="INSERT INTO tb_users VALUES('','$name','$username','$email','$password')";
            mysqli_query($conn,$query);
            echo
            "<script> alert('Registration Sucess')</script>";

        }
        else{
            echo
            "<script> alert('password Does Not match' )</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kalam:wght@700&family=Poppins:wght@500;600&family=Vollkorn:ital,wght@1,500;1,600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <section>
        <h1 id="signup">SIGN UP</h1>
        <form  class="form1" action=""method="post">
            <input type="text" required name="name">
            <label for="name"> Name</label>
            <input type="text" required name="username">
            <label for="username">UserName</label>
            <input type="email" required name="email">
            <label for="email">Email</label>
            <input type="password" required name="password">
            <label for="password">Password</label>
            <input type="password" required name=" confirmpassword">
            <label>Confirm Password</label>
            <input type="submit"  name="submit" value="submit" id="submit">
            <a id="signin"href="login.php">Sign in <i class="fa fa-arrow-right"></i></a>

            
</form>
<a href="logout.php"> Logout</a>
</section>
    
</body>
</html>