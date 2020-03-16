<!DOCTYPE html>
<html lang="en">
    

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Roomate Admin</title>

        <!-- Bootstrap -->
        <link href="../../landing/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- custom css  -->
        <link href="../../landing/css/real-estate.css" rel="stylesheet" type="text/css" media="screen">
        <!-- font awesome for icons -->
        <link href="../../landing/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,900,700,500,400italic,300italic,300,100italic,100' rel='stylesheet' type='text/css'>
        <!--owl carousel css-->
        <link href="../../landing/css/owl.carousel.css" rel="stylesheet" type="text/css" media="screen">
        <link href="../../landing/css/owl.theme.css" rel="stylesheet" type="text/css" media="screen">
        <!--mega menu -->
        <link href="../../landing/css/yamm.css" rel="stylesheet" type="text/css">
        <link href="../../landing/css/select.css" rel="stylesheet" type="text/css">
        <!--Revolution slider css-->
        <link href="../../landing/rs-plugin/css/settings.css" rel="stylesheet" type="text/css" media="screen">
        <link href="../../landing/css/rev-style.css" rel="stylesheet" type="text/css" media="screen">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="../../landing/https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="../../landing/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
 
        <div class="header-logo-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-7">
                        <a href="index.php" class="header-logo">
                            <span class="header-icon"><i class="fa fa-home"></i></span>
                            <span class="header-title">Roomate</span><!-- /.header-title
                           <img src="img/gag.jpg" class="img-responsive" height="50px" width="80px"> -->
                           <!--  <span class="header-slogan">Real Estate  <br> </span> --><!-- /.header-slogan -->
                        </a>
                    </div>
                    <div class="col-md-5 col-lg-5 hidden-sm hidden-xs">
                        <div class="contact-info-blocks hidden-sm hidden-xs">
                            <div>
                                <a href="tel:+233547343887">
                                <i class="fa fa-phone"></i> Call us</a>
                                <span>+233 547343887</span>
                            </div>
                            <div>
                                <a href="mailto:roomate@hupgo.com"><i class="fa fa-envelope"></i> Email Us
                                <span>roomate@hupgo.com</span></a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-3 col-sm-5">
                        <div class="top-search">
                            <form role="form" class="search-widget">
                                <input type="text" class="form-control" placeholder="Find property">
                                <button type="submit" class="btn btn-submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>  
                    </div> -->
                </div>
            </div>
        </div>

       <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 hidden-xs">
                        <span class="top-welcome">Homes closer to you</span>
                    </div>
                    <div class="col-sm-6">
                        <div class="top-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="divide40"></div>
        <div class="container">
            <div class="row" id="login">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="login-reg-box">
                        <h4>Login</h4>
                        <form name="rform" method="POST" action="php/functions.php">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="luname" placeholder="Username" required="required">
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" name="lpass" placeholder="Password" required="required">
                            </div>
                            <div class="divide20"></div>
                            
                            <div class="clearfix">
                                <button type="submit" name="loginBtn" class="btn btn-red btn-lg pull-left">Login</button>
                                <!-- <a href="#" class="pull-right">Forget Password?</a>  -->
                            </div>

                            <div class="divide20"></div>
                            <div class="form-bottom">
                                <p>New to Roomate? <a href="#" id="showRegister">Register</a></p>
                                <br>
                            </div>
                               <!--  <p>Recover your social account</p>
                                <div class="social-buttons">
                                    <a href="#" class="facebook social-btn"><i class="fa fa-facebook"></i> Facebook</a>
                                      <a href="#" class="g-plus social-btn"><i class="fa fa-google-plus"></i> Google +</a>
                                </div>
                            </div> -->
                        </form>
                    </div>

                </div>
            </div>

            <div class="row" id="register">
                  <div class="col-sm-6 col-sm-offset-3" >
                    <div class="login-reg-box">
                        <h4>Create an account?</h4>
                        <form name="rform" method="POST" action="php/functions.php">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="name" placeholder="Name" required="required">
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="runame" placeholder="Username" required="required">
                            </div><br>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="tel" class="form-control" name="phone" placeholder="Email" required="required">
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" name="rpass" placeholder="Password" required="required">
                            </div><br>
                             <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" name="rrpass" placeholder="Repeat Password" required="required">
                            </div><br/>
                            <div class="form-group select-option">
                                <section class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <select class="cs-select cs-skin-elastic" name="uType">
                                        <option value="" disabled selected>Account Type</option>
                                        <option value="agent">Agent</option>
                                        <option value="po">Property Owner</option>
                                    </select>
                                </section>
                            </div>

                            <div class="divide20"></div>
                            <div class="clearfix">
                                <input type="submit" class="btn btn-red btn-lg pull-left" name="registerBtn" value="Register">
                            </div>
                            <div class="divide20"></div>
                            <div class="form-bottom">
                                <p>Already a member? <a href="#" id="showLogin">Login</a></p>
                            </div>
                        </form>
                        <div class="divide20"></div>
                    </div>

                </div>
            </div> 
            <div class="divide20"></div>



        </div>
        <div class="divide40"></div>
        <div class="down" style="position: fixed;bottom:0;width: 100%">
        <div class="call-to-action hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 text-center">
                        <h3>Welcome on board</h3> 
                    </div>
                    
                </div>
            </div>
           
        </div>
        
        <div class="copyright">
                <div class="container text-center">
                    <span>&copy; Copyright 2015. All right reserved. Assan real estate</span>
                </div>
            </div>
        </div>
        <!--scripts and plugins -->
        <!--must need plugin jquery-->
        <script src="../../landing/js/jquery.min.js"></script>
        <script src="../../landing/js/jquery-migrate.min.js"></script> 
        <!--bootstrap js plugin-->
        <script src="../../landing/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>       
        <!--easing plugin for smooth scroll-->
        <script src="../../landing/js/jquery.easing.1.3.min.js" type="text/javascript"></script>
        <!--flex slider plugin-->
        <script src="../../landing/js/jquery.flexslider-min.js" type="text/javascript"></script>
        <!--sticky header-->
        <script type="text/javascript" src="../../landing/js/jquery.sticky.js"></script>
        <!--parallax background plugin-->
        <script src="../../landing/js/jquery.stellar.min.js" type="text/javascript"></script>
        <!--owl carousel slider-->
        <script src="../../landing/js/owl.carousel.min.js" type="text/javascript"></script>
        <script src="../../landing/js/classie.js" type="text/javascript"></script>
        <script src="../../landing/js/selectFx.js" type="text/javascript"></script>
        <!--revolution slider plugins-->
        <script src="../../landing/rs-plugin/js/jquery.themepunch.tools.min.js" type="text/javascript"></script>
        <script src="../../landing/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
         <script src="../../landing/js/tweetie.min.js" type="text/javascript"></script>
        <!--on scroll animation-->
        <script src="../../landing/js/wow.min.js" type="text/javascript"></script>
        <!--customizable plugin edit according to your needs-->
        <script src="../../landing/js/real-estate-custom.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#register").slideUp(500);

                $("#showRegister").click(function(e){
                    e.preventDefault();
                    $("#login").slideUp(500);
                    $("#register").slideDown(500);
                })

                $("#showLogin").click(function(e){
                    e.preventDefault();
                    $("#register").slideUp(500);
                    $("#login").slideDown(500);
                })
            })
        </script>

    </body>

</html>
