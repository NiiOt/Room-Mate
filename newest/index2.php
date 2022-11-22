<?php
	// session_start();
	include "../php/config.php";
	include "../php/functions.php";

	if(isset($_POST['login'])){	
	$username = $_POST['uname'];
	$password = md5($_POST['password']);

	$sql = mysqli_query($con,"SELECT * FROM `user` WHERE `username`='$username' AND `password` = '$password'");
	if(mysqli_num_rows($sql)>0){
		 $_SESSION['sessionkey'] = time();
        while($row=mysqli_fetch_assoc($sql)){
            $_SESSION["name"] =$row["name"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["avatar"] = $row["avatar"];
            $_SESSION["phone"] = $row["contact"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["password"] = $row["password"];
            $_SESSION["signature"] = md5($_SESSION["password"]);
            $id=$row["id"];
            $_SESSION["id"] = $id;
            $activity = "Logged In";
            $through = activityLog($id,$activity);
            
                // echo $through;
            if($through=="Success"){
                header("location: home.php");
            }

        }
		}
	}

	

	
?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title>Roomate Agent | Login Page</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<link href="../assets/css/default/app.min.css" rel="stylesheet" />

</head>
<body class="pace-top">

<div id="page-loader" class="fade show">
<span class="spinner"></span>
</div>


<div id="page-container" class="fade">

<div class="login login-with-news-feed">

<div class="news-feed">
<div class="news-image" style="background-image: url(../assets/img/login-bg/login-bg-11.jpg)"></div>
<div class="news-caption">
<h4 class="caption-title"><b>Roomate</b> Control Panel</h4>
<p>
Download the Roomate app for iPhone®, iPad®, and Android™. Enjoy the convinience of bringing properties closer to people.
</p>
</div>
</div>


<div class="right-content">

<div class="login-header">
<div class="brand">
<span class="logo"></span> <b>Roomate</b> Admin
<small>homes closer to you</small>
</div>
<div class="icon">
<i class="fa fa-sign-in-alt"></i>
</div>
</div>


<div class="login-content">
<form action="" method="POST" class="margin-bottom-0">
<div class="form-group m-b-15">
<input type="text" class="form-control form-control-lg" placeholder="Username" name="uname" required />
</div>
<div class="form-group m-b-15">
<input type="password" class="form-control form-control-lg" placeholder="Password" name="password" required />
</div>
<div class="checkbox checkbox-css m-b-30">
<input type="checkbox" id="remember_me_checkbox" value="" />
<label for="remember_me_checkbox">
Remember Me
</label>
</div>
<div class="login-buttons">
<button type="submit" name="login" class="btn btn-success btn-block btn-lg">Sign me in</button>
</div>
<div class="m-t-20 m-b-40 p-b-40 text-inverse">
Not a member yet? Click <a href="register.php">here</a> to register.
</div>
<hr />
<p class="text-center text-grey-darker mb-0">
&copy; Color Admin All Right Reserved 2020
</p>
</form>
</div>

</div>

</div>





<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>

</div>


<script src="../assets/js/app.min.js" type="4cd6126e87814134277b1b73-text/javascript"></script>
<script src="../assets/js/theme/default.min.js" type="4cd6126e87814134277b1b73-text/javascript"></script>



<script src="../assets/js/demo/login-v2.demo.js" type="4cd6126e87814134277b1b73-text/javascript"></script>

<script src="../assets/js/rocket-loader.min.js" data-cf-settings="4cd6126e87814134277b1b73-|49" defer=""></script><script defer src="../assets/js/beacon.min.js" data-cf-beacon='{"rayId":"65d1a4f05c6206c9","version":"2021.5.2","r":1,"token":"4db8c6ef997743fda032d4f73cfeff63","si":10}'></script>
</html>