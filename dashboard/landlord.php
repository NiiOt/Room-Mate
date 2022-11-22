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
                    
                    <div class="card">
                        <div class="card-header">
                            <h2>Add LandLord Here
                                <small>Fill out the form below correctly with details of the apartment available for rent
                                </small>
                            </h2>
                        </div>

                        <div class="card-body card-padding">
                            <div class="row">
                                <form method="post" action="php/functions.php">
                                    
                                <div class="col-sm-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="eg: Akosua Boatemaa" required="required">
                                    </div>
                                </div>

                                  <div class="col-sm-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="uname" id="uname" placeholder="eg: Boatemaa1" required="required">
                                        <span class="text-danger warn"></span>
                                    </div>
                                </div>

                                 <div class="col-sm-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="eg: ba@gmail.com" required="required">
                                    </div>
                                </div>

                                 <div class="col-sm-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="******" required="required">
                                    </div>
                                </div>

                                 <div class="col-sm-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Contact #</label>
                                        <input type="text" class="form-control" name="tel" placeholder="eg:0547343887" required="required">
                                    </div>
                                </div>



                                 <div class="col-sm-12  m-b-25">
                                    <input type="submit" name="addLandlord" class="col-sm-4 col-sm-offset-4 btn bgm-teal">

                                 </div>

                                </form>
                                
                            </div>
                        </div>
                    </div>













                    <div class="block-header">
                        <h2>Landlords</h2>

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
                                <small>Manage Landlords data here
                                </small>
                            </h2>
                        </div>

                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Telephone #</th>
                                    <th>Email</th>
                                    <th>Join date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                     <th>Telephone #</th>
                                    <th>Email</th>
                                    <th>Joinrt date</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                    
                                   <?php 
                                        $sql =mysqli_query($con,"SELECT * FROM `user` WHERE `uType`='3'");
                                         if(mysqli_num_rows($sql)>0){
                                            while($row=mysqli_fetch_assoc($sql)){
                                                $name =$row["name"];
                                                $username = $row["username"];
                                                $id = $row["id"];
                                                $phone = $row["contact"];
                                                $dj=$row["date_joined"];
                                                $email = $row["email"];
                                                // $activity = "logIn";

                                                echo "<tr>
                                                        <td>$id</td><td>$name</td><td>$username</td><td>$phone</td><td>$email</td><td>$dj</td>
                                                         <td>
                                                            <form method='post'>
                                                            <a class='btn btn-success waves-effect' href='tel:$phone' id='$id'><i class='zmdi zmdi-phone'></i></a>
                                                             <button type='button' id='$id' class='messageBtn btn btn-primary waves-effect' data-toggle='modal' href='#modalNarrower'><i class='zmdi zmdi-email'></i></button>
                                                             <button id='$id' class='btn btn-danger waves-effect' id='sa-warning'><i class='zmdi zmdi-close'></i></button>
                                                             <button id='$id' class='btn btn-info waves-effect'><i class='zmdi zmdi-trending-up'></i></button>
                                                             </form>
                                                         </td>
                                                    </tr>";
                                            }
                                        }else{
                                            echo mysqli_error($con);
                                        }
                                     ?>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </section>
        </section>
        

         <div class="modal fade" id="modalNarrower" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Message Centre</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p class="recepient">
                                               <svg class="pl-circular" viewBox="25 25 50 50">
                                                    <circle class="plc-path" cx="50" cy="50" r="20"></circle>
                                                </svg> 
                                            </p>
                                            <hr>
                                            <form>
                                                  <textarea class="form-control msgBox" rows="5" placeholder="Type your message here" required="required"></textarea>
                                                  <!-- <input type="submit" name="sendMsg" class="btn btn-info waves-effect"> -->

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-link sendBtn">Send</button>
                                            <button type="button" class="btn btn-link" data-dismiss="modal">Close
                                            </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>




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

        <script src="js/app.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#data-table-basic').DataTable();

                $("#uname").blur(function(){
                    uname = $(this).val();
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


                 $(".messageBtn").click(function(){
                rid = $(this).attr("id");
                // console.log(rid)
                $.post("php/ajax.php",{status:"getRecepient",rid:rid},function(data){
                    row=data.split("*")
                    name = row[0];
                    uname = row[1];
                    id = row[2];
                    $(".recepient").html("<p> Name: "+name+"<br/>Username: "+uname+"</p>");
                    $(".sendBtn").attr("id",id);
                })
             })

             $(".sendBtn").click(function(){
                  rid = $(this).attr("id");
                  msg = $(".msgBox").val();
                // console.log(rid)
                 $.post("php/ajax.php",{status:"sendMsg",rid:rid,msg},function(data){
                   // console.log(data)
                   swal(data, "Message Sent .", "success")
                   $(".msgBox").val("");
                }) 
             })






            } );
        </script>
    </body>
  

</html>
