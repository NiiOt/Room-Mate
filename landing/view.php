<?php
    include "../dashboard/php/config.php";
    $view = $_GET["view"]; 
    if($view==""){
        header("location: index.php");
    }else{

    $view = substr($view, 4);
    $name = $_GET["name"];
    // echo "$name";
    global $name;
    global $view ;
    }
function getAdvance($apo){
    switch ($apo) {
        case 'LTO':
            # code...
        return "Less than 1 year";
        break;

        case 'ONE':
                # code...
        return "1 year";
        break;
    
        case 'MTO':
                # code...
        return "More than 1 year";
        break;  

        case 'NAA':
        # code...
        return "No Advance Payment Accepted";
            
        break;
        default:
            # code...
            break;
    }
}

function getUtype($utype){
    switch ($utype) {
        case '2':
            return "Agent";
            break;
        
        default:
            return "Property Owner";
            break;
    }
    }
 ?>


<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Roomate</title>

        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- custom css  -->
        <link href="css/real-estate.css" rel="stylesheet" type="text/css" media="screen">
        <!-- font awesome for icons -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- flex slider css -->
        <link href="css/flexslider.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="shortcut icon" type="image/ico" href="img/gag.ico">
        
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,900,700,500,400italic,300italic,300,100italic,100' rel='stylesheet' type='text/css'>
        <!--owl carousel css-->
        <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="screen">
        <link href="css/owl.theme.css" rel="stylesheet" type="text/css" media="screen">
        <!--mega menu -->
        <link href="css/yamm.css" rel="stylesheet" type="text/css">
        <link href="css/select.css" rel="stylesheet" type="text/css">
        <!--Revolution slider css-->
        <link href="rs-plugin/css/settings.css" rel="stylesheet" type="text/css" media="screen">
        <link href="css/rev-style.css" rel="stylesheet" type="text/css" media="screen">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
        <?php include 'interface/top.php' ?>
        <!--rev slider start-->
     <div class="divide70"></div>
        <div class="container">
            <div class="row">

                <div class="col-md-9">
                    <h3><?php 
                            $sql = mysqli_query($con,"SELECT `name` FROM `apartment` WHERE `id` ='$view' ");
                            while($row = mysqli_fetch_assoc($sql)){
                                $name = $row["name"];

                                echo "$name";
                            }
                              ?></h3>
                            
                    <div class="thumb-slider">
                        <div id="slider" class="flexslider">
                            <ul class="slides">
                               <?php
                                $sql = mysqli_query($con,"SELECT * FROM `apartment_img` WHERE `apartment_id`='$view'");
                                    while($row = mysqli_fetch_assoc($sql)){
                                        $img = $row["img"];

                                        echo "<li>
                                                    <img src='../dashboard/php/uploads/$img'  alt='' class='img-responsive' style='max-height:400px; width:relative'>
                                                </li>";
                                    }
                                ?>
                                
                            </ul>
                        </div>
                        <div id="carousel" class="flexslider">
                            <ul class="slides">
                               <?php
                                $sql = mysqli_query($con,"SELECT * FROM `apartment_img` WHERE `apartment_id`='$view'");
                                    while($row = mysqli_fetch_assoc($sql)){
                                        $img = $row["img"];

                                        echo "<li>
                                                    <img src='../dashboard/php/uploads/$img'  alt='' class='img-responsive' style='max-height:150px' >
                                                </li>";
                                    }
                                ?>
                            </ul>
                        </div>
                    </div><!--thumb slider-->
                    <div class="property-meta clearfix margin20">
                        <?php 
                             $sql = mysqli_query($con,"SELECT `apartment`.`id`,`apartment`.`name`,`regions`.`region`,`contract_type`,`apartment`.`district` AS `did`,`district`.`name` AS `district`,`town`,`hse_no`,`digital_add`,`description`,`apo`, `amount`,`available`,`user`.`name` AS `contact_person`,`user`.`contact`,`type`,`user`.`utype`,`apartment`.`currency` FROM `apartment`,`district`,`regions`,`user`,`property_type` WHERE (`apartment`.`region`=`regions`.`id`) AND (`apartment`.`district`=`district`.`id` ) AND (`apartment`.`contact_person` = `user`.`id`) AND (`apartment`.`p_type`=`property_type`.`id`) AND`apartment`.`id`='$view' AND `apartment`.`name`='$name'");
                                 if (mysqli_num_rows($sql)>0) {
                                     # code...
                                     $x = 0;
                                     while($row=mysqli_fetch_assoc($sql)){
                                         $id = $row["id"];
                                         $name = $row["name"];
                                         $region = $row["region"];
                                         $district = $row["district"];
                                         $did = $row["did"];
                                         global $did;
                                         $town = $row["town"];
                                         $hse_no = $row["hse_no"];
                                         $digital_add = $row["digital_add"];
                                         $description = $row["description"];
                                         $apo = $row["apo"];
                                         $amount = number_format($row["amount"],2);
                                         $available = $row["available"];
                                         $contact_person = $row["contact_person"];
                                         $contact = $row["contact"];
                                         $contract_type = $row["contract_type"];
                                         $type = $row["type"];// Property Type
                                         $utype = $row["utype"]; //User Type
                                         $currency = $row["currency"];

                                         echo  "<span>$type FOR $contract_type</span>
                                                <span>$region region</span>
                                                <span>$district</span>
                                                <span>$town</span>
                                                <!--span>$hse_no</span>
                                                <span>$digital_add</span-->
                                                <span>$description</span>
                                                <span>$currency $amount per year</span>

                            <div class='property-description margin20'>
                                <p>
                                    The description provided maybe narrow however you may contact the ".getUtype($utype)." <b>($contact_person)</b> on <b><a style='color:brown' href='tel:$contact'>$contact</a></b>
                                    <br/><b>Advance Payment Option :". getAdvance($apo)."</b>.
                                </p>
                                <p>
                                   Roomate is available for Android OS on the Play Store
                                </p>
                            </div>

                                         ";}
                                     }
                        ?>
                        
                    </div><!--property meta-->
                       <div class="sharethis-inline-share-buttons"></div>
                    <!--description-->
                  

                    <!-- <div class="divide70"></div> -->
                    <!-- <h3>Map</h3> -->
                    <!-- <div id="property-map" style="width:100%;height: 400px;">
                    </div> -->
                    <div class="divide60"></div>
                </div><!--content col-->
                <div class="col-md-3">
                    <div class="sidebar-box">
                        <h3>Advertisement</h3>
                        <img src="img/gag.jpg" class="img-responsive" alt="">
                    </div><!--sidebar box-->
                    <div class="sidebar-box">
                        <h3>Other Property Near</h3>
                        <?php
                            $sql =mysqli_query($con,"SELECT DISTINCT(`apartment_img`.`img`) ,`apartment`.`id`,`apartment`.`name`,`amount`,`apartment`.`currency`FROM `apartment`,`apartment_img` WHERE `apartment`.`district`='$did' AND `apartment_img`.`apartment_id`=`apartment`.`id` AND `apartment`.`id`!='$view' AND `available`='YES' AND `approved`='YES' GROUP BY `apartment_img`.`apartment_id`");
                            if(mysqli_num_rows($sql)>0){
                                while($row=mysqli_fetch_assoc($sql)){
                                    $name = $row["name"];
                                    $id = $row["id"];
                                    $img = $row["img"];
                                    $amount = number_format($row["amount"],2);
                                    $currency = $row["currency"];
                                    echo "    <div class='media'>
                                                <div class='media-left'>
                                                    <div class='image'>
                                                        <div class='content'>
                                                            <a href='#'><i class='fa fa-search-plus'></i></a>
                                                            <img src='../dashboard/php/uploads/$img' width='100' alt=''>
                                                        </div><!--content-->
                                                    </div><!--image-->
                                                </div>
                                                <div class='media-body'>
                                                    <h4 class='media-heading'><a href='#'>$name</a></h4>
                                                     <em>$currency $amount</em>
                                                    <a href='#' class='btn btn-default btn-red viewHome' id='$id' title='$name'>View</a>
                                                </div>
                                            </div><!--media-->";

                                }
                            }else{

                                echo "Roomate has  No other available property around within district";
                            }


                         ?>




                    
                        
                    </div><!--sidebar box-->
                </div><!--sidebar-->
            </div>
        </div>
        <div class="divide40"></div>
 <?php include 'interface/footer.php' ?>
        <!--scripts and plugins -->
        <!--must need plugin jquery-->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-migrate.min.js"></script> 
        <!--bootstrap js plugin-->
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>       
        <!--easing plugin for smooth scroll-->
        <script src="js/jquery.easing.1.3.min.js" type="text/javascript"></script>
        <!--flex slider plugin-->
        <script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
        <!--sticky header-->
        <script type="text/javascript" src="js/jquery.sticky.js"></script>
        <!--parallax background plugin-->
        <script src="js/jquery.stellar.min.js" type="text/javascript"></script>
        <!--owl carousel slider-->
        <script src="js/owl.carousel.min.js" type="text/javascript"></script>
        <script src="js/classie.js" type="text/javascript"></script>
        <script src="js/selectFx.js" type="text/javascript"></script>
        <!--revolution slider plugins-->
        <script src="rs-plugin/js/jquery.themepunch.tools.min.js" type="text/javascript"></script>
        <script src="rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
         <script src="js/tweetie.min.js" type="text/javascript"></script>
        <!--on scroll animation-->
        <script src="js/wow.min.js" type="text/javascript"></script>
        <!--customizable plugin edit according to your needs-->
        <script src="js/real-estate-custom.js" type="text/javascript"></script>
        <!-- <script type='text/javascript' src='http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=true&amp;ver=3.6'></script> -->
      <!-- <script type='text/javascript' src='js/gmap3.infobox.min.js'></script> -->
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                // $(".viewHome").click(function(e){
                //     e.preventDefault();
                //      var d = new Date();
                //      var m = d.getMinutes();
                //      s = d.getYear()
                //      // console.log(m+""+s)
                //     id = $(this).attr("id");
                //     name = $(this).attr("title");
                //     url = "view.php?view=v"+s+""+id+"&&name="+name;
                //     location.href = url
                // })


             
            });

        </script>
    </body>

</html>
