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
<!-- 
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
                </div> -->
            </aside>

            <section id="content">
                <div class="container">
                    
                    <div class="card">
                        <div class="card-header">
                            <h2>Add Apartments Here
                                <small>Fill out the form below correctly with details of the apartment available for rent
                                </small>
                            </h2>
                        </div>

                        <div class="card-body card-padding">
                            <div class="row">
                                <form method="post" action="php/functions.php">
                                    
                                <div class="col-sm-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Apartment Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="eg:Agya Paye">
                                    </div>
                                </div>

                                <div class="col-sm-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Region.</label>

                                    <select class="selectpicker" data-live-search="true" name="region" id="region" required="required">
                                          
                                          <?php 
                                            $sql = mysqli_query($con,"SELECT `region`,`id` FROM `regions` ORDER BY `region`"  );
                                            if(mysqli_num_rows($sql)>0){
                                                while($row=mysqli_fetch_assoc($sql)){
                                                    $id = $row["id"];
                                                    $name =$row["region"];
                                                    // $username = $row["username"];
                                                    echo "<option value='$id'>$name </option>";
                                                }
                                             }


                                        ?><option selected="true"></option>
                                    </select>
                                </div>
                                </div>

                                <div class="col-sm-3 m-b-20">
                                        <div class="form-group fg-line">
                                            <label>District.</label>

                                            <select class="selectpicker" data-live-search="true" name="district" id="district" required="required">
                                                 
                                            </select>
                                             <!-- <select  data-live-search="true" id="districti">
                                                 <option>no no on non</option>
                                            </select> -->

                                        </div>
                                 </div>
                                

                                <div class="col-sm-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Town</label>
                                        <input type="text" class="form-control" name="town" placeholder="eg: Kasoa Tuba" required="required">
                                    </div>
                                </div>

                                <div class="col-sm-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>House No.</label>
                                        <input type="text" class="form-control" name="hse_no" placeholder="KT 365">
                                    </div>
                                </div>

                                  <div class="col-sm-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Property Type</label>

                                        <select class="selectpicker" name="p_type" data-live-search="true" required="required">
                                            <?php 
                                                $sql = mysqli_query($con,"SELECT * FROM `property_type` ORDER BY `type` ASC");
                                                if(mysqli_num_rows($sql)>0){
                                                    while($row=mysqli_fetch_assoc($sql)){
                                                        $id = $row["id"];
                                                        $name =$row["type"];
                                                        // $username = $row["username"];
                                                        echo "<option value='$id'>$name</option>";
                                                    }
                                                 }


                                            ?>
              
                                                                                 
                                        </select>
                                    </div>
                                </div>
                                          

                                
                                <div class="col-sm-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Advance Payment Options.</label>

                                        <select class="selectpicker" name="apo" data-live-search="true" required="required">
                                            <option value="NAA">No advance accepted</option>
                                            <option value="LTO">Less than 1 year</option>
                                            <option value="ONE">1 year</option>
                                            <option value="MTO">More than 1 year</option>
                                                                                 
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Short Description</label>
                                        <textarea class="form-control" name="description" rows="2" placeholder="SINGLE ROOM  WITH PORCH" required="required" required="required"></textarea>
                                    </div>
                                </div>

                               


                                 <div class="col-sm-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Long Description.</label>
                                        <textarea class="form-control" name="digital_add" placeholder="" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Sale/Rent(per year) Amount .</label>
                                        <select class="selectpicker m-b-20" name="currency" data-live-search="true" required="required">
                                            <option value="GHÂ¢">GH¢</option>
                                            <option value="USD">USD</option>
                                                                                                                          
                                        </select>
                                        <input type="text" class="form-control" name="amount" placeholder="250" required="required">
                                    </div>
                                </div>

                                 <div class="col-sm-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Contract Type</label>
                                        <select class="selectpicker" name="contract_type" data-live-search="true" required="required">
                                            <option value="RENT">FOR RENT</option>
                                            <option value="SALE">FOR SALE</option>
                                            
                                                                                 
                                        </select>
                                    </div>
                                </div>

                         

                                <div class="col-sm-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Contact Person</label>

                                        <select class="selectpicker" name="contact_person" data-live-search="true" required="required">
                                            <?php 
                                                $sql = mysqli_query($con,"SELECT `name`,`username`,`id` FROM `user` WHERE `uType`='3'");
                                                if(mysqli_num_rows($sql)>0){
                                                    while($row=mysqli_fetch_assoc($sql)){
                                                        $id = $row["id"];
                                                        $name =$row["name"];
                                                        $username = $row["username"];
                                                        echo "<option value='$id'>$name --- $username</option>";
                                                    }
                                                 }


                                            ?>
              
                                                                                 
                                        </select>
                                    </div>
                                </div>
                                           
 <!-- <button type='button' id='id' class='btnapartment btn btn-primary waves-effect' data-toggle='modal' href='#modalWider1'><i class='zmdi zmdi-upload'></i>vsdfdfsd</button>                         -->
                                     <div class="col-sm-6 col-sm-offset-6 m-b-20">
                                        <input type="submit" name="addApartment" class="btn bgm-teal">

                                     </div>

                                </form>
                                
                            </div>
                        </div>
                    </div>













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
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Region</th>
                                    <th>District</th>
                                    <th>Town</th>
                                    <th>Hse No</th>
                                    <th>Digital Address</th>
                                    <th>Description</th>
                                    <th title="Advance Payment Option">APO</th>
                                    <th>Contract Type</th>
                                    <th>Rent Amount</th>
                                    <th>Available?</th>
                                    <th>Approved?</th>
                                    <th>Contact Person</th>
                                    <th>More</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Region</th>
                                    <th>District</th>
                                    <th>Town</th>
                                    <th>Hse No</th>
                                    <th>Digital Address</th>
                                    <th>Description</th>
                                    <th title="Advance Payment Option">APO</th>
                                    <th>Contract Type</th>
                                    <th>Rent Amount</th>
                                    <th>Available?</th>
                                    <th>Approved?</th>
                                    <th>Contact Person</th>
                                    <th>More</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                    <?php 

                                        $sql = mysqli_query($con,"SELECT `apartment`.`id`,`apartment`.`name`,`contract_type`,`regions`.`region`,`district`.`name` AS `district`,`town`,`hse_no`,`digital_add`,`description`,`apo`, `amount`,`available`,`approved`,`user`.`name` AS `contact_person`,`user`.`contact` FROM `apartment`,`district`,`regions`,`user` WHERE (`apartment`.`region`=`regions`.`id`) AND (`apartment`.`district`=`district`.`id` ) AND (`apartment`.`contact_person` = `user`.`id`) ORDER BY `apartment`.`id` DESC");
                                        if (mysqli_num_rows($sql)>0) {
                                            # code...
                                            $x = 0;
                                            while($row=mysqli_fetch_assoc($sql)){
                                                $id = $row["id"];
                                                $name = $row["name"];
                                                $region = $row["region"];
                                                $district = $row["district"];
                                                $town = $row["town"];
                                                $hse_no = $row["hse_no"];
                                                $digital_add = $row["digital_add"];
                                                $description = $row["description"];
                                                $apo = $row["apo"];
                                                $amount = $row["amount"];
                                                $available = $row["available"];
                                                $available = slider($available,$id);
                                                $approve = $row["approved"];
                                                $approve = approveSlider($approve,$id);
                                                $contract_type =$row["contract_type"];

                                                $contact_person = $row["contact_person"];
                                                $contact = $row["contact"];
                                                $x++;


                                                $view = $id + 1;
                                                $edit = $id + 2;
                                                $delete = $id + 3;

                                                echo "<tr>
                                                        <td>$x</td>
                                                        <td>$name</td>
                                                        <td>$region</td>
                                                        <td>$district</td>
                                                        <td>$town</td>
                                                        <td>$hse_no</td>
                                                        <td>$digital_add</td>
                                                        <td>$description</td>
                                                        <td>$apo</td>
                                                        <td>$contract_type</td>
                                                        <td>$amount</td>
                                                        <td>$available</td>
                                                        <td>$approve</td>
                                                        <td><a href='tel:$contact'>$contact_person</a></td>
                                                        <td>
                                                            <button type='button' id='$id' class='btnapartment btn btn-primary waves-effect' data-toggle='modal' href='#modalWider'><i class='zmdi zmdi-upload'></i></button>
                                                            <a class='btn btn-info waves-effect'><i class='zmdi zmdi-image' id='$view' class='btnapartment btn btn-primary waves-effect' data-toggle='modal' href='#modalWider1'></i></a>
                                                            <a class='btn btn-success waves-effect' id='$edit' ><i class='zmdi zmdi-image'></i></a>
                                                            <a class='btn btn-danger waves-effect' id='$delete'><i class='zmdi zmdi-image'></i></a>

                                                        </td>

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

                               <div class="modal fade" id="modalWider1" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Apartment Image Manager</h4>
                                        </div>
                                       <!--  <div class="modal-body">
                                              <div class="lightbox row">
                                                    <div data-src='php/uploads/13.jpg' class='col-md-2 col-sm-4 col-xs-6'>
                                                        <div class='lightbox-item'>
                                                            <img src='php/uploads/13.jpg' alt=''/>
                                                        </div>
                                                    </div>

                                                      <div data-src='php/uploads/13.jpg' class='col-md-2 col-sm-4 col-xs-6'>
                                                        <div class='lightbox-item '>
                                                            <img src='php/uploads/13.jpg' alt=''/>
                                                        </div>
                                                    </div>

                                                      <div data-src='php/uploads/13.jpg' class='col-md-2 col-sm-4 col-xs-6'>
                                                        <div class='lightbox-item '>
                                                            <img src='php/uploads/13.jpg' alt=''/>
                                                        </div>
                                                    </div>
                                                </div>
                                        
                                           
                                        </div> -->
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
                $('#data-table-basic').DataTable();

                $('#region').change(function(){
                    region = $(this).val();
                    console.log(region)

                    $.post("php/ajax.php",{status:"getDistrict",region:region},function(data){
                        $("#district").html(data);
                        $("#district").selectpicker('refresh');

                    })
                              
                })

                  $(".available_c").click(function(){//available sliders checked click function
                        id=$(this).attr("id");

                         $.post("php/ajax.php",{status:"updateAvailability",available:"NO",id:id},function(data){
                             // console.log(data)
                            if(data=="Success"){
                                $("#"+id).attr("class","available_u")
                                swal("Availabilty Updated to NO","success");
                            }else{
                                console.log(data);
                            }
                         })

                    })

                    $(".available_u").click(function(){//available sliders unchecked click function
                        id=$(this).attr("id");
                        // console.log(id)
                         $.post("php/ajax.php",{status:"updateAvailability",available:"YES",id:id},function(data){
                            console.log(data)
                            if(data=="Success"){
                                 $("#"+id).attr("class","available_c")
                                swal("Availabilty Updated to YES","success");
                            }else{
                                console.log(data);
                            }
                         })

                    })


                    $(".approve_c").click(function(){//available sliders checked click function
                        id=$(this).attr("id");

                         $.post("php/ajax.php",{status:"updateApproval",approve:"NO",id:id},function(data){
                             // console.log(data)
                            if(data=="Success"){
                                $("#"+id).attr("class","approve_u")
                                swal("Approval Updated to NO","success");
                            }else{
                                console.log(data);
                            }
                         })

                    })

                    $(".approve_u").click(function(){//available sliders unchecked click function
                        id=$(this).attr("id");
                        // console.log(id)
                         $.post("php/ajax.php",{status:"updateApproval",approve:"YES",id:id},function(data){
                            // console.log(data)
                            if(data=="Success"){
                                 $("#"+id).attr("class","approve_c")
                                swal("Approval Updated to YES","success");
                            }else{
                                console.log(data);
                            }
                         })

                    })

            } );


            // for(var i = 0; i<=9; i++){
            //     for(var j = 0; j <=i; j++){
            //         console.log("*");
            //     }
            //     console.log("\n");
            // }



        </script>
    </body>
  

</html>
<?php
//    echo "php" + 1;
//
//  ?>