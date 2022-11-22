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
        <link href="vendors/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
        <link href="vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="vendors/bower_components/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
        <link href="vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">

        <!-- CSS -->
        <link href="css/app_1.min.css" rel="stylesheet">
        <link href="css/app_2.min.css" rel="stylesheet">

    </head>
    <body>
         <?php include "interface/header.php"?>

        <section id="main">
           <?php include "interface/aside.php"?>

           
            <!-- <aside id="chat" class="sidebar">

                <div class="chat-search">
                    <div class="fg-line">
                        <input type="text" class="form-control" placeholder="Search People">
                        <i class="zmdi zmdi-search"></i>
                    </div>
                </div>

                <div class="lg-body c-overflow">
                    <div class="list-group">
                        <a class="list-group-item media" href="#">
                            <div class="pull-left p-relative">
                                <img class="lgi-img" src="../img/demo/profile-pics/2.jpg" alt="">
                                <i class="chat-status-busy"></i>
                            </div>
                            <div class="media-body">
                                <div class="lgi-heading">Jonathan Morris</div>
                                <small class="lgi-text">Available</small>
                            </div>
                        </a>

                        <a class="list-group-item media" href="#">
                            <div class="pull-left">
                                <img class="lgi-img" src="../img/demo/profile-pics/1.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <div class="lgi-heading">David Belle</div>
                                <small class="lgi-text">Last seen 3 hours ago</small>
                            </div>
                        </a>

                        <a class="list-group-item media" href="#">
                            <div class="pull-left p-relative">
                                <img class="lgi-img" src="../img/demo/profile-pics/3.jpg" alt="">
                                <i class="chat-status-online"></i>
                            </div>
                            <div class="media-body">
                                <div class="lgi-heading">Fredric Mitchell Jr.</div>
                                <small class="lgi-text">Availble</small>
                            </div>
                        </a>

                        <a class="list-group-item media" href="#">
                            <div class="pull-left p-relative">
                                <img class="lgi-img" src="../img/demo/profile-pics/4.jpg" alt="">
                                <i class="chat-status-online"></i>
                            </div>
                            <div class="media-body">
                                <div class="lgi-heading">Glenn Jecobs</div>
                                <small class="lgi-text">Availble</small>
                            </div>
                        </a>

                        <a class="list-group-item media" href="#">
                            <div class="pull-left">
                                <img class="lgi-img" src="../img/demo/profile-pics/5.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <div class="lgi-heading">Bill Phillips</div>
                                <small class="lgi-text">Last seen 3 days ago</small>
                            </div>
                        </a>

                        <a class="list-group-item media" href="#">
                            <div class="pull-left">
                                <img class="lgi-img" src="../img/demo/profile-pics/6.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <div class="lgi-heading">Wendy Mitchell</div>
                                <small class="lgi-text">Last seen 2 minutes ago</small>
                            </div>
                        </a>
                    </div>
                </div>
            </aside> -->


            <section id="content">
                <div class="container">
                    <div class="block-header">
                        <h2>Dashboard</h2>

                    <!--     <ul class="actions">
                            <li>
                                <a href="#">
                                    <i class="zmdi zmdi-trending-up"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="zmdi zmdi-check-all"></i>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="#">Refresh</a>
                                    </li>
                                    <li>
                                        <a href="#">Manage Widgets</a>
                                    </li>
                                    <li>
                                        <a href="#">Widgets Settings</a>
                                    </li>
                                </ul>
                            </li>
                        </ul> -->

                    </div>
<!-- 
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
                    </div> -->

                    <div class="mini-charts">
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="mini-charts-item bgm-lightgreen">
                                    <div class="clearfix">
                                        <div class="chart stats-bar"></div>
                                        <div class="count">
                                            <small>Tenants</small>
                                            <h2 id="Tenants">987,459</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                                <div class="mini-charts-item bgm-purple">
                                    <div class="clearfix">
                                        <div class="chart stats-bar-2"></div>
                                        <div class="count">
                                            <small>Agents</small>
                                            <h2 id="Agents">356,785K</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                                <div class="mini-charts-item bgm-orange">
                                    <div class="clearfix">
                                        <div class="chart stats-line"></div>
                                        <div class="count">
                                            <small>LandLords</small>
                                            <h2 id="LandLords">$ 458,778</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                                <div class="mini-charts-item bgm-bluegray">
                                    <div class="clearfix">
                                        <div class="chart stats-line-2"></div>
                                        <div class="count">
                                            <small>Apartments</small>
                                            <h2 id="Apartments">23,856</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dash-widgets">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div id="site-visits" class="dw-item bgm-teal">
                                    <div class="dwi-header">
                                        <div class="p-30">
                                            <div class="dash-widget-visits"></div>
                                        </div>

                                        <div class="dwih-title">Other Details</div>
                                    </div>

                                    <div class="list-group lg-even-white">
                                        <div class="list-group-item media sv-item">
                                            <div class="pull-right">
                                                <div class="stats-bar"></div>
                                            </div>
                                            <div class="media-body">
                                                <small>Total Activities</small>
                                                <h3 id="logs">47,896,536</h3>
                                            </div>
                                        </div>

                                         <div class="list-group-item media sv-item">
                                            <div class="pull-right">
                                                <div class="stats-bar"></div>
                                            </div>
                                            <div class="media-body">
                                                <small>Total Images</small>
                                                <h3 id="images">47,896,536</h3>
                                            </div>
                                        </div>

                                         <div class="list-group-item media sv-item">
                                            <div class="pull-right">
                                                <div class="stats-bar"></div>
                                            </div>
                                            <div class="media-body">
                                                <small>Total Admins</small>
                                                <h3 id="admins">47,896,536</h3>
                                            </div>
                                        </div>

                                        <div class="list-group-item media sv-item">
                                            <div class="pull-right">
                                                <div class="stats-bar-2"></div>
                                            </div>
                                            <div class="media-body">
                                                <small>Total Users</small>
                                                <h3 id="users">24,456,799</h3>
                                            </div>
                                        </div>

                                        <div class="list-group-item media sv-item">
                                            <div class="pull-right">
                                                <div class="stats-line"></div>
                                            </div>
                                            <div class="media-body">
                                                <small>Total Clicks</small>
                                                <h3>13,965</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <div class="col-sm-6">
                        
                        </div>

                        <div class="col-sm-6">
                            <!-- Calendar -->
                            <div class="card" id="calendar-widget">
                                <div class="card-header bgm-teal">
                                    <div class="cwh-year"></div>
                                    <div class="cwh-day"></div>

                                    <button class="bgm-lightgreen btn btn-default bg btn-float"><i class="zmdi zmdi-plus"></i></button>
                                </div>

                                <div class="card-body card-padding-sm">
                                    <div id="cw-body"></div>
                                </div>
                            </div>

                            <!-- Recent Posts -->
                            
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <footer id="footer">
            Copyright &copy; <?php echo date('Y');?> Roomate Admin

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

        <script src="vendors/bower_components/flot/jquery.flot.js"></script>
        <script src="vendors/bower_components/flot/jquery.flot.resize.js"></script>
        <script src="vendors/bower_components/flot.curvedlines/curvedLines.js"></script>
        <script src="vendors/sparklines/jquery.sparkline.min.js"></script>
        <script src="vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>

        <script src="vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="vendors/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
        <script src="vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
        <script src="vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="vendors/bower_components/sweetalert2/dist/sweetalert2.min.js"></script>
        <script src="vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

       

        <script src="js/app.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $.post("php/ajax.php",{status:"getTenants"},function(data){
                    $("#Tenants").text(data);
                    // console.log(data)
                })

                 $.post("php/ajax.php",{status:"getLandLords"},function(data){
                    $("#LandLords").text(data);
                    // console.log(data)
                })

                $.post("php/ajax.php",{status:"getAgents"},function(data){
                    $("#Agents").text(data);
                    // console.log(data)
                })

                 $.post("php/ajax.php",{status:"getAdmins"},function(data){
                    $("#admins").text(data);
                    // console.log(data)
                })

                $.post("php/ajax.php",{status:"getUsers"},function(data){
                    $("#users").text(data);
                    // console.log(data)
                })

                $.post("php/ajax.php",{status:"getApartments"},function(data){
                    $("#Apartments").text(data);
                    // console.log(data)
                })

                $.post("php/ajax.php",{status:"getLogs"},function(data){
                    $("#logs").text(data);
                    // console.log(data)
                })

                 $.post("php/ajax.php",{status:"getImages"},function(data){
                    $("#images").text(data);
                    // console.log(data)
                })
            })
        </script>
    </body>
  
</html>
