<?php include "php/config.php"?>
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
                <form method="POST" action="php/functions.php">
                    
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
                <form name="rform" method="POST" action="php/functions.php">
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
    </body>


</html>
