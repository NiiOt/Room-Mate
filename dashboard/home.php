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

                            <!-- <div class="col-md-4 col-sm-6">
                                <div id="pie-charts" class="dw-item bgm-cyan c-white">

                                    <div class="dw-item">
                                        <div class="dwi-header">
                                            <div class="dwih-title">Email Statistics</div>
                                        </div>

                                        <div class="clearfix"></div>

                                        <div class="text-center p-20 m-t-25">
                                            <div class="easy-pie main-pie" data-percent="75">
                                                <div class="percent">45</div>
                                                <div class="pie-title">Total Emails Sent</div>
                                            </div>
                                        </div>

                                        <div class="p-t-25 p-b-20 text-center">
                                            <div class="easy-pie sub-pie-1" data-percent="56">
                                                <div class="percent">56</div>
                                                <div class="pie-title">Bounce Rate</div>
                                            </div>
                                            <div class="easy-pie sub-pie-2" data-percent="84">
                                                <div class="percent">84</div>
                                                <div class="pie-title">Total Opened</div>
                                            </div>
                                            <div class="easy-pie sub-pie-2" data-percent="21">
                                                <div class="percent">21</div>
                                                <div class="pie-title">Total Ignored</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> -->

                           <!--  <div class="col-md-4 col-sm-6">
                                <div class="dw-item bgm-lime">
                                    <div id="weather-widget"></div>
                                </div>
                            </div> -->
                      <!--   </div>
                    </div>

                    <div class="row"> -->
                        <div class="col-sm-6">
                            <!-- Recent Items -->
                           <!--  <div class="card">
                                <div class="card-header">
                                    <h2>Recent Items <small>Phasellus condimentum ipsum id auctor imperdie</small></h2>
                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="#" data-toggle="dropdown">
                                                <i class="zmdi zmdi-more-vert"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a href="#">Refresh</a>
                                                </li>
                                                <li>
                                                    <a href="#">Settings</a>
                                                </li>
                                                <li>
                                                    <a href="#">Other Settings</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                                <div class="card-body m-t-0">
                                    <table class="table table-inner table-vmiddle">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th style="width: 60px">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="f-500 c-cyan">2569</td>
                                                <td>Samsung Galaxy Mega</td>
                                                <td class="f-500 c-cyan">$521</td>
                                            </tr>
                                            <tr>
                                                <td class="f-500 c-cyan">9658</td>
                                                <td>Huawei Ascend P6</td>
                                                <td class="f-500 c-cyan">$440</td>
                                            </tr>
                                            <tr>
                                                <td class="f-500 c-cyan">1101</td>
                                                <td>HTC One M8</td>
                                                <td class="f-500 c-cyan">$680</td>
                                            </tr>
                                            <tr>
                                                <td class="f-500 c-cyan">6598</td>
                                                <td>Samsung Galaxy Alpha</td>
                                                <td class="f-500 c-cyan">$870</td>
                                            </tr>
                                            <tr>
                                                <td class="f-500 c-cyan">4562</td>
                                                <td>LG G3</td>
                                                <td class="f-500 c-cyan">$690</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="recent-items-chart" class="flot-chart"></div>
                            </div> -->

                            <!-- Todo -->
                           <!--  <div id="todo" class="card card-light">
                                <div class="card-header ch-alt">
                                    <h2>Todo Lists <small>Add, edit and manage your Todo Lists</small></h2>
                                </div>

                                <div class="card-body card-padding">
                                    <div class="t-add">
                                        <i class="ta-btn zmdi zmdi-plus" data-ma-action="todo-form-open"></i>

                                        <div class="ta-block">
                                            <textarea placeholder="What you want to do..."></textarea>

                                            <div class="tab-actions">
                                                <a data-ma-action="todo-form-close" href="#" class="c-red"><i class="zmdi zmdi-close"></i></a>
                                                <a data-ma-action="todo-form-close" href="#" class="c-green"><i class="zmdi zmdi-check"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list-group">
                                        <div class="list-group-item media">
                                            <div class="pull-right">
                                                <ul class="actions actions-alt">
                                                    <li class="dropdown">
                                                        <a href="#" data-toggle="dropdown">
                                                            <i class="zmdi zmdi-more-vert"></i>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#">Delete</a></li>
                                                            <li><a href="#">Archive</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="media-body">
                                                <div class="checkbox checkbox-light">
                                                    <label>
                                                        <input type="checkbox">
                                                        <i class="input-helper"></i>
                                                        <span>
                                                            Duis vitae nibh molestie pharetra augue vitae
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="list-group-item media">
                                            <div class="pull-right">
                                                <ul class="actions actions-alt">
                                                    <li class="dropdown">
                                                        <a href="#" data-toggle="dropdown">
                                                            <i class="zmdi zmdi-more-vert"></i>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#">Delete</a></li>
                                                            <li><a href="#">Archive</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="media-body">
                                                <div class="checkbox checkbox-light">
                                                    <label>
                                                        <input type="checkbox">
                                                        <i class="input-helper"></i>
                                                        <span>
                                                            Duis vitae nibh molestie pharetra augue vitae
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="list-group-item media">
                                            <div class="pull-right">
                                                <ul class="actions actions-alt">
                                                    <li class="dropdown">
                                                        <a href="#" data-toggle="dropdown">
                                                            <i class="zmdi zmdi-more-vert"></i>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#">Delete</a></li>
                                                            <li><a href="#">Archive</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="media-body">
                                                <div class="checkbox checkbox-light">
                                                    <label>
                                                        <input type="checkbox">
                                                        <i class="input-helper"></i>
                                                        <span>
                                                            In vel imperdiet leoorbi mollis leo sit amet quam fringilla varius mauris orci turpis
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="list-group-item media">
                                            <div class="pull-right">
                                                <ul class="actions actions-alt">
                                                    <li class="dropdown">
                                                        <a href="#" data-toggle="dropdown">
                                                            <i class="zmdi zmdi-more-vert"></i>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#">Delete</a></li>
                                                            <li><a href="#">Archive</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="media-body">
                                                <div class="checkbox checkbox-light">
                                                    <label>
                                                        <input type="checkbox">
                                                        <i class="input-helper"></i>
                                                        <span>
                                                            Suspendisse quis sollicitudin erosvel dictum nunc
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="list-group-item media">
                                            <div class="pull-right">
                                                <ul class="actions actions-alt">
                                                    <li class="dropdown">
                                                        <a href="#" data-toggle="dropdown">
                                                            <i class="zmdi zmdi-more-vert"></i>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#">Delete</a></li>
                                                            <li><a href="#">Archive</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="media-body">
                                                <div class="checkbox checkbox-light">
                                                    <label>
                                                        <input type="checkbox">
                                                        <i class="input-helper"></i>
                                                        <span>
                                                            Curabitur egestas finibus sapien quis faucibusras bibendum ut justo at sagittis. In hac habitasse platea dictumst
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="list-group-item media">
                                            <div class="pull-right">
                                                <ul class="actions actions-alt">
                                                    <li class="dropdown">
                                                        <a href="#" data-toggle="dropdown">
                                                            <i class="zmdi zmdi-more-vert"></i>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#">Delete</a></li>
                                                            <li><a href="#">Archive</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="media-body">
                                                <div class="checkbox checkbox-light">
                                                    <label>
                                                        <input type="checkbox">
                                                        <i class="input-helper"></i>
                                                        <span>
                                                            Suspendisse potenti. Cras dolor augue, tincidunt sit amet lorem id, blandit rutrum libero
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
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

        <!-- Older IE warning message -->
        <!--[if lt IE 9]>
            <div class="ie-warning">
                <h1 class="c-white">Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
                <div class="iew-container">
                    <ul class="iew-download">
                        <li>
                            <a href="http://www.google.com/chrome/">
                                <img src="img/browsers/chrome.png" alt="">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="img/browsers/firefox.png" alt="">
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img src="img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img src="img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                <img src="img/browsers/ie.png" alt="">
                                <div>IE (New)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>
        <![endif]-->

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
