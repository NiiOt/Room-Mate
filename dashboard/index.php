<?php 

// echo phpversion();
// require('fpdf.php');
include "php/config.php";
include "php/functions.php";


if(isset($_POST["loginBtn"])){
    $username=filter_var($_POST["luname"], FILTER_SANITIZE_STRING);
    $password= filter_var($_POST["lpass"], FILTER_SANITIZE_STRING);
    $password=md5($password);

    $sql = mysqli_query($con,"SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password' AND `uType`='4'");
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
    }else{
        echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
                                We do not have this username and password match or maybe You don't have an account yet
                            </div>";
        // header("location: ../index.php");
        // echo mysqli_error($con);
    } mysqli_close($con);

}if(isset($_POST["registerBtn"])){
   $name =  filter_var($_POST["name"],FILTER_SANITIZE_STRING);
   $email = filter_var($_POST["email"],FILTER_SANITIZE_STRING);
   $phone = filter_var($_POST["phone"],FILTER_SANITIZE_STRING);
   $username =filter_var($_POST["runame"],FILTER_SANITIZE_STRING);
   $password =filter_var( $_POST["rpass"],FILTER_SANITIZE_STRING);
   $rpassword =filter_var( $_POST["rrpass"],FILTER_SANITIZE_STRING);
   $avatar = filter_var($_POST["avatar"],FILTER_SANITIZE_STRING);
   // $rpassword = $("#rpassword").val();
   if($password!=$rpassword){
    echo"<div class='alert alert-danger alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
                                Passwords must match
                            </div>";
   }else{



       $password = md5($password);
      $sql ="INSERT INTO `user`(`id`, `username`, `name`, `email`, `password`, `contact`, `avatar`, `date_joined`,`uType`) VALUES ('','$username','$name','$email','$password','$phone','$avatar','$now','4')";

      $sql = mysqli_query($con,$sql);
      if($sql){
        echo "<script>alert('Registration Successful \n Please login to start'</script>";
        header("location: ../index.php");
      }else{
        echo mysqli_error($con);
      }

   }

} 



 ?>
<!DOCTYPE html>

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ROOMATE ADMIN</title>

        <!-- Vendor CSS -->
        <link href="vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- CSS -->
        <link href="css/app_1.min.css" rel="stylesheet">
        <link href="css/app_2.min.css" rel="stylesheet">
    </head>

    <body>
             <div class="login-content">
            <!-- Login -->
            <div class="lc-block toggled" id="l-login">
                <form method="POST">
                    
                <div class="lcb-form">
                    <div class="input-group m-b-20">
                        <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                        <div class="fg-line">
                            <input type="text" class="form-control" name="luname" placeholder="Username">
                        </div>
                    </div>

                    <div class="input-group m-b-20">
                        <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                        <div class="fg-line">
                            <input type="password" class="form-control" name="lpass" placeholder="Password">
                        </div>
                    </div>

                 <!--    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            <i class="input-helper"></i>
                            Keep me signed in
                        </label>
                    </div> -->

                    <button type="submit" class="btn btn-login btn-success btn-float" name="loginBtn" ><i class="zmdi zmdi-arrow-forward"></i></button>
                </div>

                <div class="lcb-navigation">
                    <a href="#" data-ma-action="login-switch" data-ma-block="#l-register"><i class="zmdi zmdi-plus"></i> <span>Register</span></a>
                    <a href="#" data-ma-action="login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
                </div>
                </form>
            </div>

            <!-- Register -->
            <div class="lc-block" id="l-register">
                <div class="lcb-form">
                <form name="rform" method="POST">
                <span class="text-danger warn"></span>
                    <div class="input-group m-b-20">
                        <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                        <div class="fg-line">
                            <input type="text" class="form-control" name="name" placeholder="Name" required="true">
                        </div>
                    </div>

                    <div class="input-group m-b-20">
                        <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                        <div class="fg-line">
                            <input type="text" class="form-control" name="runame" placeholder="Username" required="true">
                        </div>
                    </div>

                    <div class="input-group m-b-20">
                        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                        <div class="fg-line">
                            <input type="email" required="required" class="form-control" name="email" placeholder="Email Address">
                        </div>
                    </div>
<!-- 
                    <div class="input-group m-b-20">
                        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                        <div class="fg-line">
                            <input type="email" required="required" class="form-control" name="email" placeholder="Email Address">
                        </div>
                    </div> -->




                    <div class="input-group m-b-20">
                        <span class="input-group-addon"><i class="zmdi zmdi-phone"></i></span>
                        <div class="fg-line">
                            <input type="text" class="form-control" required="true" name="phone" placeholder="Phone Number">
                        </div>
                    </div>

                    <div class="input-group m-b-20">
                        <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                        <div class="fg-line">
                            <input type="password" class="form-control" required="true" name="rpass" placeholder="Password">
                        </div>
                    </div>

                    <div class="input-group m-b-20">
                        <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                        <div class="fg-line">
                            <input type="password" class="form-control" name="rrpass" placeholder="Re-Type Password">
                        </div>
                    </div>

                    <div class="input-group m-l-20 text-center">
                         <label class="radio radio-inline m-b-10">
                                <input type="radio" name="avatar" value="1.jpg" checked="true">
                                <i class="input-helper"></i>
                                <img src="img/demo/profile-pics/1.jpg">
                            </label>

                            <label class="radio radio-inline m-b-10">
                                <input type="radio" name="avatar" value="2.jpg">
                                <i class="input-helper"></i>
                                <img src="img/demo/profile-pics/2.jpg">
                            </label>

                            <label class="radio radio-inline m-b-10">
                                <input type="radio" name="avatar" value="3.jpg">
                                <i class="input-helper"></i>
                                <img src="img/demo/profile-pics/3.jpg">
                            </label>

                            <label class="radio radio-inline m-b-10">
                                <input type="radio" name="avatar" value="4.jpg">
                                <i class="input-helper"></i>
                                <img src="img/demo/profile-pics/4.jpg">
                            </label>


                    </div>

                       

                    <button type="submit" class="btn btn-login btn-success btn-float" name="registerBtn"><i class="zmdi zmdi-check"></i></button>
                    </form>
                </div>

                <div class="lcb-navigation">
                    <a href="#" data-ma-action="login-switch" data-ma-block="#l-login"><i class="zmdi zmdi-long-arrow-right"></i> <span>Sign in</span></a>
                    <a href="#" data-ma-action="login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
                </div>
            </div>

            <!-- Forgot Password -->
            <div class="lc-block" id="l-forget-password">
                <div class="lcb-form">
                    <p class="text-left">Please enter the email you registered with to continue your password processing</p>

                    <div class="input-group m-b-20">
                        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                        <div class="fg-line">
                            <input type="text" class="form-control" id="femail" placeholder="Email Address">
                        </div>
                    </div>

                    <a href="#" class="btn btn-login btn-success btn-float" id="forgotBtn"><i class="zmdi zmdi-check"></i></a>
                </div>

                <div class="lcb-navigation">
                    <a href="#" data-ma-action="login-switch" data-ma-block="#l-login"><i class="zmdi zmdi-long-arrow-right"></i> <span>Sign in</span></a>
                    <a href="#" data-ma-action="login-switch" data-ma-block="#l-register"><i class="zmdi zmdi-plus"></i> <span>Register</span></a>
                </div>
            </div>
        </div>

   

        <!-- Javascript Libraries -->
        <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <script src="vendors/bower_components/Waves/dist/waves.min.js"></script>

    
        <script src="js/app.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                // alert()
                console.log($("#runame"))
                   $("#runame").blur(function(){
                    uname = $(this).val();
                    console.log(uname)
                    $.post("php/ajax.php",{status:"getUname",uname:uname},function(data){
                        if(data=="Success"){
                            $(".warn").text("");
                        // console.log(data);
                        }else{
                            $("#uname").focus();
                            $(".warn").text("This username is already taken, please try another one");
                        }
                    })
                })
            })
        </script>
    </body>


</html>
