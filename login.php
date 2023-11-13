<?php
require 'config.php';
if(isset($_POST["login"])){
    $usernameemail=$_POST["usernameemail"];
    $password=$_POST["password"];
    $captcha=$_POST["captcha"];
    $captcharandom=$_POST["captcha-rand"];
    if($captcha!=$captcharandom){
        echo 
        "<script> alert('invalid captcha');</script>";
        
    
    }
    else{
        
        $result=mysqli_query($conn,"SELECT * FROM tb_users where username='$usernameemail'OR email='$usernameemail'");
        $row=mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)>0){
        if($password ==$row["password"]){
           $_SESSION["Login"] ="true";
           $_SESSION["id"]=$row["id"];
           header("location:index.php");

        }
        else{
            echo"<script> alert('Wrong Password');</script>";
        }
    }
    else
    {
        echo
        "<script> alert('User Not Registered');</script>";
    }
}
}

?>
<?php

$rand= rand(9999,1000);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kalam:wght@700&family=Poppins:wght@500;600&family=Vollkorn:ital,wght@1,500;1,600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="table-responsive">
            <div class="box">
            <h3 align="center">SIGN-IN</h3><br/>
    <form class="form2" action="" method="post" autocomplete="off" >
        <div class="form-group">
        <label for="usernameemail">Username or Email:</label>
        <input type="text" name="usernameemail" id="usernameemail"required class="form-control">
</div>
<div class="form-group">
        <label for="password">password:</label>
        <input type="password" name="password" id="password"required class="form-control">
</div>
<div class="cap">
<div class="col-md-6 form-group">
        <label for="captcha">Enter captcha:</label>
        <input type="text" name="captcha" id="captcha"  class="form-control">
        <input type="hidden" name="captcha-rand"  id="captcha"value="<?php echo $rand;?>">
        
</div>
<div class="col-md-6 form-group">
        <label for="captcha-code">Captcha-Code</label>
        <div class="captcha"><?php echo $rand; ?></div>
</div>
</div>
<div class="form-group">
        <input type="submit" name="login" class="text-light bg-dark" id="login" value="login">
</div>
        

    </form>
    <a id="newuser" href=" register.php"> New User</a>
</div>
</div>
</div>

    
</body>
</html>