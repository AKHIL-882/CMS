<?php
include('includes/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $contactno=$_POST['contactno'];
    $status=1;
    $query=mysqli_query($con,"insert into users(fullName,userEmail,password,contactNo,status) values('$fullname','$email','$password','$contactno','$status')");
    $msg="Registration successfull. Now You can login !";
}
?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS | Sign UP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/registration_style.css">


    <script type="text/javascript">
        function userAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
            url: "check_availability.php",
            data:'email='+$("#email").val(),
            type: "POST",
            success:function(data){
            $("#user-availability-status1").html(data);
            $("#loaderIcon").hide();
            },
            error:function (){}
            });
        }
    </script>
</head>
<body style="background-image: url('assets/img/registration_pic.jpg');
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;">

<nav class="navbar navbar-dark bg-light" style="padding-left: 60px; padding-right: 60px; margin-top: 2px;">
  <div class="collapse navbar-collapse">
    <ul class="navbar-nav">
      <li class="nav-item" >
        <a class="nav-link" href="http://localhost/cms/users/registration.php" style="float: left; font-weight: bold; font-size: 25px; color: #1f3ad1">CMS | Sign Up</a>
        <a class="nav-link" href="http://localhost/cms" style="float: right;">Back To Portal</a>
      </li>
    </ul>
  </div>
</nav>




        <div class="inner">
            <div class="photo">
                <img src="assets/img/registration-form.png">
            </div>
            <div class="user-form">
                <h1>Welcome! CMS User</h1>
                <p style="padding-left: 1%; color: red">
                    <?php if($msg){
echo htmlentities($msg);
                        }?>
                </p>
            <span></span>
                <form method="post">
                    <i class="fas fa-user icon"></i> 
                    <input type="text" name="fullname" placeholder="Full Name" required="required" >

                    <i class="fas fa-envelope icon"></i> 
                    <input type="email" placeholder="E-mail Id" id="email"onBlur="userAvailability()" name="email" required="required">

                     <span id="user-availability-status1" style="font-size:12px;"></span>

                    <i class="fas fa-lock icon"></i> 
                    <input type="password" placeholder="Create password" name="password" required="required">

                    <i class="fa fa-mobile" aria-hidden="true"></i> 
                    <input type="number" placeholder="Phone Number" maxlength="10" name="contactno" required="required" >
                    
                    <div class="action-btn">
                        <button class="btn primary" name="submit" id="submit">Create Account</button>

                        <button class="btn"><a href="http://localhost/cms/users">Sign In</button>
                    </div>
                </form>
            </div>
        </div>

<footer style="padding-top: 600px">
    <p align="center">Designed and Developed by Team - <a href="#">GhostRiders</p>
</footer>

</body>
</html>

