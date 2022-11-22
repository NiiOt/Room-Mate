<?php
 
 include '../php/config.php';
 include '../php/functions.php';

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
<html lang="en">


<head>
<meta charset="utf-8" />
<title>Roomate | Agent Dashboard</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<link href="../assets/css/default/app.min.css" rel="stylesheet" />


<link href="//cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css" rel="stylesheet" />
<!-- <link href="../assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" /> -->


</head>
<body>

<div id="page-loader" class="fade show">
<span class="spinner"></span>
</div>


<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
<?php include "ui/header.php";?>


<div id="sidebar" class="sidebar">
<?php include "ui/sidebar.php";?>


</div>
<div class="sidebar-bg"></div>


<div id="content" class="content">

<ol class="breadcrumb float-xl-right">
<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
<li class="breadcrumb-item active">Properties</li>
</ol>


<h1 class="page-header">Properties <small>add & manage</small></h1>





<div class="row">
    <div class="container">
        <div class="col-xl-12">
            <form action="" method="POST">

                
            </form>




        </div>
    </div>


</div>

<div class="row">
    <div class="container">
<div class="col-xl-9">
<table id="dtable" class="table table-striped table-bordered table-td-valign-middle">
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
                                    <th>Contract Type</th>
                                    <th title="Advace Payment Option">APO</th>
                                    <th>Rent Amount</th>
                                    <th>Available</th>
                                    <th>Approved?</th>
                                    <th>Images</th>
                                    
                                    <!-- <th>More</th> -->
                                </tr>
                                </thead>
                             
                                <tbody>
                                     <?php 
                                        $uid = $_SESSION["id"];
                                        $sql = mysqli_query($con,"SELECT `apartment`.`id`,`apartment`.`name`,`regions`.`region`,`contract_type`,`district`.`name` AS `district`,`town`,`hse_no`,`apo`,`description`,`digital_add`,`amount`,`available`,`approved` FROM `apartment` INNER JOIN `regions` ON `regions`.`id`=`apartment`.`region` INNER JOIN `district` ON `district`.`id`=`apartment`.`district` WHERE `contact_person`='$uid'");
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
                                                $approved = $row["approved"];
                                                $contract_type = $row["contract_type"];
                                                // $contact = $row["contact"];
                                                $x++;

                                                echo "<tr>
                                                        <td>$x</td>
                                                        <td>$name</td>
                                                        <td>$region</td>
                                                        <td>$district</td>
                                                        <td>$town</td>
                                                        <td>$hse_no</td>
                                                        <td>$digital_add</td>
                                                        <td>$description</td>
                                                        <td>$contract_type</td>
                                                        <td>$apo</td>
                                                        <td>$amount</td>
                                                        <td>$available</td>
                                                        <td>$approved</td>
                                                        
                                                        <td>
                                                            <button type='button' id='$id' class='btnapartment btn btn-primary waves-effect' data-toggle='modal' href='#modalWider'><i class='zmdi zmdi-image'></i></button>
                                                        

                                                        </td>

                                                      </tr>";
                                            }
                                        }

                                        echo "<script src='js/jquery.min.js'></script><script src='js/scripts.js'></script>";


                                    ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
        </div>
    </div>



<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>

</div>



<script src="../assets/js/app.min.js" type="text/javascript"></script>
<script src="../assets/js/theme/default.min.js" type="text/javascript"></script>




<script src="../assets/js/rocket-loader.min.js" data-cf-settings="|49" defer=""></script><script defer src="../assets/js/beacon.min.js" data-cf-beacon='{"rayId":"65d1a4f05c6206c9","version":"2021.5.2","r":1,"token":"4db8c6ef997743fda032d4f73cfeff63","si":10}'></script>




<script src="//cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js" type="text/javascript"></script>
<!-- <script src="../assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js" type="text/javascript"></script> -->
<!-- <script src="../assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js" type="text/javascript"></script> -->
<!-- <script src="../assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js" type="text/javascript"></script> -->
<!-- <script src="../assets/js/demo/table-manage-responsive.demo.js" type="text/javascript"></script> -->


<script type="text/javascript">
    $('#dtable').DataTable({
            responsive: true
        });
</script>


</body>


</html>