<?php 
session_start();

if($_SESSION["name"]==''){
    // echo $_SESSION["name"];
  header('location: index.php');
}

?>
<!DOCTYPE html>


<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Roomate Admin</title>

        <!-- Vendor CSS -->
        <link href="../vendors/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
        <link href="../vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="../vendors/bower_components/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
        <link href="../vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="../vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">

        <!-- CSS -->
        <link href="../css/app_1.min.css" rel="stylesheet">
        <link href="../css/app_2.min.css" rel="stylesheet">

    </head>
    <body>
         <?php include "interface/header.php"?>

        <section id="main">
           <?php include "interface/aside.php"?>

          

            <section id="content">
                <div class="container">
            

                    <div class="card">
                        <div class="card-header">
                            <h2>Sales Statistics <small>Vestibulum purus quam scelerisque, mollis nonummy metus</small></h2>

                            <ul class="actions">
                                <li>
                                    <a href="#">
                                        <i class="zmdi zmdi-refresh-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="zmdi zmdi-download"></i>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="#">Change Date Range</a>
                                        </li>
                                        <li>
                                            <a href="#">Change Graph Type</a>
                                        </li>
                                        <li>
                                            <a href="#">Other Settings</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <div class="chart-edge">
                                <div id="curved-line-chart" class="flot-chart "></div>
                            </div>
                        </div>
                    </div>

                    <div class="mini-charts">
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="mini-charts-item bgm-lightgreen">
                                    <div class="clearfix">
                                        <div class="chart stats-bar"></div>
                                        <div class="count">
                                            <small>Properties Uploaded</small>
                                            <h2 id="props">987,459</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                                <div class="mini-charts-item bgm-purple">
                                    <div class="clearfix">
                                        <div class="chart stats-bar-2"></div>
                                        <div class="count">
                                            <small>Approved Properties</small>
                                            <h2 id="approvedProps">356,785K</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                                <div class="mini-charts-item bgm-orange">
                                    <div class="clearfix">
                                        <div class="chart stats-line"></div>
                                        <div class="count">
                                            <small>Properties Pending Approval</small>
                                            <h2 id="pendingApproval">$ 458,778</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                                <div class="mini-charts-item bgm-bluegray">
                                    <div class="clearfix">
                                        <div class="chart stats-line-2"></div>
                                        <div class="count">
                                            <small>Properties Still Available</small>
                                            <h2 id="stillAvailable">23,856</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                

                

                    </div>
                </div>
            </section>
        </section>

        <footer id="footer">
            Copyright &copy; <?php echo date('Y')?> Roomate Admin

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
        <script src="../vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="../vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <script src="../vendors/bower_components/flot/jquery.flot.js"></script>
        <script src="../vendors/bower_components/flot/jquery.flot.resize.js"></script>
        <script src="../vendors/bower_components/flot.curvedlines/curvedLines.js"></script>
        <script src="../vendors/sparklines/jquery.sparkline.min.js"></script>
        <script src="../vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>

        <script src="../vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="../vendors/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
        <script src="../vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
        <script src="../vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="../vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="../vendors/bower_components/sweetalert2/dist/sweetalert2.min.js"></script>
        <script src="../vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="../vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->

        <script src="../js/app.min.js"></script>

        <script type="text/javascript">
             $.post("php/ajax.php",{status:"getAgentProps"},function(data){
                    $("#props").text(data);
                    // console.log(data)
                })

             $.post("php/ajax.php",{status:"approvedProps"},function(data){
                $("#approvedProps").text(data);
             })

               $.post("php/ajax.php",{status:"pendingApproval"},function(data){
                $("#pendingApproval").text(data);
             })

             $.post("php/ajax.php",{status:"stillAvailable"},function(data){
                $("#stillAvailable").text(data);
             })
        </script>
    </body>

</html>
