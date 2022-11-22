<?php 
session_start();
include "php/config.php";
if($_SESSION['name']==''){
  header('location: index.php');
}

function slider($available,$id){
  if($available=="YES"){
    return "<div class='toggle-switch toggle-switch-demo' data-ts-color='green'>
                                        <label for='$id' class='ts-label'></label>
                                        <input id='$id' type='checkbox' class='available_c' checked hidden'hidden'>
                                        <label for='$id' class='ts-helper'></label>
                                    </div>
";
  }else{
    return "<div class='toggle-switch toggle-switch-demo' data-ts-color='green'>
                                        <label for='$id' class='ts-label'></label>
                                        <input id='$id' type='checkbox' class='available_u' hidden'hidden'>
                                        <label for='$id' class='ts-helper'></label>
                                    </div>";
  }

}

function approveSlider($approve,$id){
  if($approve=="YES"){
    return "<div class='toggle-switch toggle-switch-demo' data-ts-color='purple'>
                                        <label for='$id' class='ts-label'></label>
                                        <input id='$id' type='checkbox' class='approve_c' checked hidden'hidden'>
                                        <label for='$id' class='ts-helper'></label>
                                    </div>
";
  }else{
    return "<div class='toggle-switch toggle-switch-demo' data-ts-color='purple'>
                                        <label for='$id' class='ts-label'></label>
                                        <input id='$id' type='checkbox' class='approve_u' hidden'hidden'>
                                        <label for='$id' class='ts-helper'></label>
                                    </div>";
  }

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
        <link href="vendors/bower_components/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
          <link href="vendors/bower_components/lightgallery/dist/css/lightgallery.min.css" rel="stylesheet">
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

            <aside id="chat" class="sidebar">

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
                                <img class="lgi-img" src="img/demo/profile-pics/2.jpg" alt="">
                                <i class="chat-status-busy"></i>
                            </div>
                            <div class="media-body">
                                <div class="lgi-heading">Jonathan Morris</div>
                                <small class="lgi-text">Available</small>
                            </div>
                        </a>

                        <a class="list-group-item media" href="#">
                            <div class="pull-left">
                                <img class="lgi-img" src="img/demo/profile-pics/1.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <div class="lgi-heading">David Belle</div>
                                <small class="lgi-text">Last seen 3 hours ago</small>
                            </div>
                        </a>

                        <a class="list-group-item media" href="#">
                            <div class="pull-left p-relative">
                                <img class="lgi-img" src="img/demo/profile-pics/3.jpg" alt="">
                                <i class="chat-status-online"></i>
                            </div>
                            <div class="media-body">
                                <div class="lgi-heading">Fredric Mitchell Jr.</div>
                                <small class="lgi-text">Availble</small>
                            </div>
                        </a>

                        <a class="list-group-item media" href="#">
                            <div class="pull-left p-relative">
                                <img class="lgi-img" src="img/demo/profile-pics/4.jpg" alt="">
                                <i class="chat-status-online"></i>
                            </div>
                            <div class="media-body">
                                <div class="lgi-heading">Glenn Jecobs</div>
                                <small class="lgi-text">Availble</small>
                            </div>
                        </a>

                        <a class="list-group-item media" href="#">
                            <div class="pull-left">
                                <img class="lgi-img" src="img/demo/profile-pics/5.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <div class="lgi-heading">Bill Phillips</div>
                                <small class="lgi-text">Last seen 3 days ago</small>
                            </div>
                        </a>

                        <a class="list-group-item media" href="#">
                            <div class="pull-left">
                                <img class="lgi-img" src="img/demo/profile-pics/6.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <div class="lgi-heading">Wendy Mitchell</div>
                                <small class="lgi-text">Last seen 2 minutes ago</small>
                            </div>
                        </a>
                    </div>
                </div>
            </aside>

            <section id="content">
                <div class="container">
                    
                    <div class="block-header">
                        <h2>Apartments</h2>

                        <ul class="actions">
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
                        </ul>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2>
                                <small>Manage apartment data here
                                </small>
                            </h2>
                        </div>

                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                           <thead>
                                            <th>#</th>
                                            <th>Enumerator</th>
                                            <th>Zonal Council</th>
                                            <th>Electoral Area</th>
                                            <th>Surbub</th>
                                            <th>Landmark</th>
                                            <th>Structure Type</th>
                                            <th>Business Name</th>
                                            <th>Owner's Name</th>
                                            <th>Business Phone</th>
                                            <th>Owner's Phone</th>
                                            <th>Bus. Image</th>
                                            <th>Bus. Mail</th>
                                            <th>Owner's Email</th>
                                            <th>Respondents Name</th>
                                            <th>Respondents Position</th>
                                            <th>Nature of Bus.</th>
                                            <th>Bus. Type</th>
                                            <th>Bus. Category</th>
                                            <th>OTA</th>
                                            <th>Comments</th>
                                            <th>GPS</th>
                                            <th>Sync</th>
                                        </thead>
                                <tfoot>
                                <tr>
                                      <th>#</th>
                                            <th>Enumerator</th>
                                            <th>Zonal Council</th>
                                            <th>Electoral Area</th>
                                            <th>Surbub</th>
                                            <th>Landmark</th>
                                            <th>Structure Type</th>
                                            <th>Business Name</th>
                                            <th>Owner's Name</th>
                                            <th>Business Phone</th>
                                            <th>Owner's Phone</th>
                                            <th>Bus. Image</th>
                                            <th>Bus. Mail</th>
                                            <th>Owner's Email</th>
                                            <th>Respondents Name</th>
                                            <th>Respondents Position</th>
                                            <th>Nature of Bus.</th>
                                            <th>Bus. Type</th>
                                            <th>Bus. Category</th>
                                            <th>OTA</th>
                                            <th>Comments</th>
                                            <th>GPS</th>
                                            <th>Sync</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                    <?php 

                                        $sql = mysqli_query($con,"SELECT `id`, `enumerator`, `zcouncil`, `earea`, `suburb`, `landmark`, `structype`, `bname`, `oname`, `bphone`, `ophone`, `image`, `bmail`, `omail`, `rname`, `rposition`, `nbus`, `btype`, `bcat`, `ota`, `comment`, `gps`, `recordDate`, `syncDate` FROM `knma`");
                                        if (mysqli_num_rows($sql)>0) {
                                            # code...
                                            $x = 0;
                                            while($row=mysqli_fetch_assoc($sql)){
                                                $id = $row["id"];
                                                $enumerator = $row["enumerator"];
                                                $zcouncil = $row["zcouncil"];
                                                $earea = $row["earea"];
                                                $suburb = $row["suburb"];
                                                $landmark = $row["landmark"];
                                                $structype = $row["structype"];
                                                $bname = $row["bname"];
                                                $oname = $row["oname"];
                                                $bphone = $row["bphone"];
                                                $ophone = $row["ophone"];
                                                $image = $row["image"];
                                                $bmail = $row["bmail"];
                                                $omail = $row["omail"];
                                                $rname=$row["rname"];
                                                $rposition = $row["rposition"];
                                                $nbus= $row["nbus"];
                                                $btype = $row["btype"];
                                                $ota = $row["ota"];
                                                $comment = $row["comment"];
                                                $gps = $row["gps"];
                                                $recordDate = $row["recordDate"];
                                                $syncDate = $row["syncDate"];
                                                $x++;

                                                echo "<tr>
                                                        <td>$x</td>
                                                        <td>$id</td>
                                                        <td>$enumerator</td>
                                                        <td>$zcouncil</td>
                                                        <td>$earea</td>
                                                        <td>$suburb</td>
                                                        <td>$landmark</td>
                                                        <td>$structype</td>
                                                        <td>$bname</td>
                                                        <td>$oname</td>
                                                        <td>$bphone</td>
                                                        <td>$ophone</td>
                                                        <td>$image</td>
                                                        <td>$bmail</td>
                                                        <td>$omail</td>
                                                        <td>$rname</td>
                                                        <td>$rposition</td>
                                                        <td>$nbus</td>
                                                        <td>$btype</td>
                                                        <td>$ota</td>
                                                        <td>$comment</td>
                                                        <td>$gps</td>
                                                        <td>$recordDate</td>
                                                        <td>$syncDate</td>

                                                      </tr>";
                                            }
                                        }echo "<script src='vendors/bower_components/jquery/dist/jquery.min.js'></script><script src='js/scripts.js'></script>";

                                        mysqli_close($con);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
        
          <div class="modal fade" id="modalWider" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Apartment Image Manager</h4>
                                        </div>
                                        <div class="modal-body">
                                              <div class="lightbox row">
                                                 
                                                </div>


                                          
                                            <hr>
                                            <form action="php/parser.php" class="dropzone">
                                                  <!-- <textarea class="form-control msgBox" rows="5" placeholder="Type your message here" required="required"></textarea> -->
                                                  <!-- <input type="submit" name="sendMsg" class="btn btn-info waves-effect"> -->
                                                    
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-link" data-dismiss="modal">Close
                                            </button>
                                            
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
        <script src="vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
       <script src="vendors/bower_components/dropzone/dist/min/dropzone.min.js"></script>
        <script src="vendors/bower_components/sweetalert2/dist/sweetalert2.min.js"></script>
        <script src="vendors/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
      <script src="vendors/bower_components/dropzone/dist/min/dropzone.min.js"></script>
       <script src="vendors/bower_components/lightgallery/lib/lightgallery-all.min.js"></script>


        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->

        <script src="js/app.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#data-table-basic').DataTable({responsive:true});

        
            } );
        </script>
    </body>
  

</html>