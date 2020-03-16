<?php 
session_start();
include "php/config.php";
if($_SESSION['name']==''){
  header('location: index.php');
}




?>
<!DOCTYPE html>

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Roomate</title>
        
        <!-- Vendor CSS -->

        <link href="vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="vendors/bower_components/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
        <link href="vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
        <link href="vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">
        <link href="vendors/bower_components/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">

        <!-- CSS -->
        <link href="css/app_1.min.css" rel="stylesheet">
        <link href="css/app_2.min.css" rel="stylesheet">
    </head>
    <body>
        <?php include "interface/header.php"?>

        <section id="main">
           <?php include "interface/aside.php"?>
               <section id="content">
                <div class="container container-alt">

                    <div class="block-header">
                        <h2><?php echo $_SESSION["name"]; ?>
                            <small>Admin</small>
                        </h2>

                      
                    </div>

            

            <div class="card" id="profile-main">
                        <div class="pm-overview c-overflow">

                            <div class="pmo-pic">
                                <div class="p-relative">
                                    <a href="#">
                                        <?php echo "<img class='img-responsive' src='img/demo/profile-pics/".$_SESSION['avatar'].".jpg' alt=''>";?> 
                                    </a>

                               

                                  
                                </div>


                                
                            </div>

                            <div class="pmo-block pmo-contact hidden-xs">
                                <h2>Contact</h2>

                                <ul>
                                    <li><i class="zmdi zmdi-phone"></i><?php echo $_SESSION["phone"]; ?></li>
                                    <li><i class="zmdi zmdi-email"></i><?php echo $_SESSION["email"]; ?></li>

                                   
                                  
                                </ul>
                            </div>

                            <div class="pmo-block pmo-contact hidden-xs">
                                <h2>Signature</h2>

                                <ul>
                                    <?php echo $_SESSION["signature"]; ?></li>
                                    

                                   
                                  
                                </ul>
                            </div>

                        </div>

                        <div class="pm-body clearfix">
                            <ul class="tab-nav tn-justified">
                                <li class="active"><a href="#">Edit</a></li>
                             
                            </ul>


                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="zmdi zmdi-image m-r-10"></i> Avatar</h2>

                                    <!-- <ul class="actions">
                                        <li class="dropdown">
                                            <a href="#" data-toggle="dropdown">
                                                <i class="zmdi zmdi-more-vert"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a data-ma-action="profile-edit" href="#">Edit</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul> -->
                                </div>
                                <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view">
                                        <form id="avatar" method="POST" action="php/functions.php">
                                             <!-- <p>Please Choose an avatar</p> -->
                                        <!-- <input type="radio" name="avatar" value="1">1 -->
                                           <div class="row">
                                            <div class="col-sm-12"> 
                                               <div class="col-sm-6">
                                                <label class="radio radio-inline m-r-20">
                                                    <input type="radio" name="avatar" id="a1" value="1">
                                                    <i class="input-helper"></i>
                                                    <span><img src="img/demo/profile-pics/1.jpg"></span>
                                                </label>


                                                <!--   <input name="avatar" id="a1" type="radio" value="1" />
                                                  <label for="a1">
                                                    <span><img src="img/demo/profile-pics/1.jpg"></span>
                                                  </label>
                                                </div> -->
                                              </div>

                                                <div class="col-sm-6">
                                                  <label class="radio radio-inline m-r-20">
                                                    <input type="radio" name="avatar" id="a2" value="2">
                                                    <i class="input-helper"></i>
                                                    <span><img src="img/demo/profile-pics/2.jpg"></span>
                                                </label>
                                                </div> 
                                              </div>
                                              </div> 
                                              <hr>

                                           <div class="row">
                                            <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                  <label class="radio radio-inline m-r-20">
                                                    <input type="radio" name="avatar" id="a3" value="3">
                                                    <i class="input-helper"></i>
                                                    <span><img src="img/demo/profile-pics/3.jpg"></span>
                                                </label>
                                                </div>
                                          
                                              
                                                <div class="col-sm-6">
                                                 <label class="radio radio-inline m-r-20">
                                                    <input type="radio" name="avatar" id="a4" value="4">
                                                    <i class="input-helper"></i>
                                                    <span><img src="img/demo/profile-pics/4.jpg"></span>
                                                </label>
                                                </div>   
                                              </div>
                                            </div>
                                            <hr>

                                          <div class="row">
                                            <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                  <label class="radio radio-inline m-r-20">
                                                    <input type="radio" name="avatar" id="a5" value="5">
                                                    <i class="input-helper"></i>
                                                    <span><img src="img/demo/profile-pics/5.jpg"></span>
                                                </label>
                                                </div>

                                                <div class="col-sm-6">
                                                  <label class="radio radio-inline m-r-20">
                                                    <input type="radio" name="avatar" id="a6" value="6">
                                                    <i class="input-helper"></i>
                                                    <span><img src="img/demo/profile-pics/6.jpg"></span>
                                                </label>
                                                </div> 
                                              
                                            </div>
                                          </div>
                                          <hr> 
                                           <div class="m-t-30">
                                            <button class="btn btn-primary btn-sm" type="submit" name="avatarChange">Change</button>
                                            <!-- <button data-ma-action="profile-edit-cancel" class="btn btn-link btn-sm">Cancel</button> -->
                                        </div>
                                          </form>

                                    </div>

                                   
                                </div>
                            </div>

                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="zmdi zmdi-account m-r-10"></i>Password Change</h2>

                               
                                </div>
                                <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view">
                                        <form method="POST" action="php/functions.php">
                                         <dl class="dl-horizontal">
                                            <dt class="p-t-10">Old Password</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="password" name="opass" class="form-control" id="opass" required="required">
                                                </div>

                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">New Password</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="password" name="npass" class="form-control" id="npass" required="required">
                                                </div>

                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Re-Type Password</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="password" name="rpass" class="form-control" id="rpass" required="required">
                                                    <span class="text-danger"></span>
                                                </div>

                                            </dd>
                                        </dl>
                                         <div class="m-t-30">
                                            <button type="submit" class="btn btn-primary btn-sm" name="passChange">Change</button>
                                            <!-- <button data-ma-action="profile-edit-cancel" class="btn btn-link btn-sm">Cancel</button> -->
                                        </div></form>
                                    </div>

                                    
                                </div>
                            </div>

                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="zmdi zmdi-phone m-r-10"></i> Contact Update</h2>

                                  
                                </div>
                                <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view">
                                      <form method="POST" action="php/functions.php">
                                      <dl class="dl-horizontal">
                                            <dt class="p-t-10">Mobile Phone</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control"
                                                           placeholder="eg. 00971 12345678 9" name="phone" value=<?php echo $_SESSION["phone"]; ?>>
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Email Address</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="email" class="form-control"
                                                           placeholder="eg. malinda.h@gmail.com" name="email" value=<?php echo $_SESSION["email"]; ?>>
                                                </div>
                                            </dd>
                                        </dl>
                                         <div class="m-t-30">
                                            <button type="submit" name="contactChange" class="btn btn-primary btn-sm">Change</button>
                                            <!-- <button data-ma-action="profile-edit-cancel" class="btn btn-link btn-sm">Cancel</button> -->
                                        </div>
                                    </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>



        <footer id="footer">
            Copyright &copy; 2015 Roomate Admin
            
            <ul class="f-menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </footer>

        <!-- Page Loader -->
        <div class="page-loader">
            <div class="preloader pls-blue">
                <svg class="pl-circular" viewBox="25 25 50 50">
                    <circle class="plc-path" cx="50" cy="50" r="20" />
                </svg>

                <p>Please wait...</p>
            </div>
        </div>

     

        <!-- Javascript Libraries -->
        <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        
        <script src="vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="vendors/bower_components/Waves/dist/waves.min.js"></script>
        <!-- <script src="vendors/bootstrap-growl/bootstrap-growl.min.js"></script> -->
        <script src="vendors/bower_components/sweetalert2/dist/sweetalert2.min.js"></script>
        <script src="vendors/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>

        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->


        <script type="text/javascript">
            $(document).ready(function() {
                // console.log("here")
              $.post("php/ajax.php",{status:"getAvatar"},function(data){
                  // console.log(data)
                  $("#a"+data).attr("checked","true");
              })

              $("#rpass").on("input",function(){
                 npass = $("#npass").val();
                 rpass = $(this).val();

                 if(rpass!=npass){
                    $(".text-danger").text("Passwords must match");
                 }else{
                   $(".text-danger").text(""); 
                 }
              })





            } );
        </script>
        <script src="js/app.min.js"></script>
    </body>
  

</html>