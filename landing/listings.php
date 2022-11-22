<?php
    include "../dashboard/php/config.php";
    $view = base64_decode($_GET["list"]);
    $view = base64_decode($view); 
     $name = $_GET["name"];
    if($view=="" || $name==""){
        header("location: index.php");
    }else{

        $sql = mysqli_query($con,"SELECT `apartment`.`contact_person`, `user`.`name` AS `name` FROM `apartment` INNER JOIN `user` ON `apartment`.`contact_person` = `user`.`id` WHERE `apartment`.`id`='$view'");
        if(mysqli_num_rows($sql)>0){
            while($rows = mysqli_fetch_assoc($sql)){
                $cid = $rows['contact_person'];
                $cname = $rows['name'];
            }
        }
    // $view = substr($view, 4);
   
    // echo "$name";
    global $cname;
    global $cid ;
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
            <h3 class="title-section clearfix"><?php echo $cname."'s Property Listing"?>  </h3>
            <div class="row here">
                <?php
                $sql = mysqli_query($con,"SELECT `apartment`.`name`,`apartment`.`id`,`regions`.`region`,`contract_type`,`amount`,`description`,`apartment_img`.`img`,`district`.`name` AS `district` ,`type`,`apartment`.`currency` FROM `apartment`,`regions`,`apartment_img`,`district`,`property_type` WHERE `apartment`.`region`=`regions`.`id` AND `apartment_img`.`apartment_id`=`apartment`.`id` AND `apartment`.`available` = 'YES' AND `approved`='YES' AND `district`.`id` = `apartment`.`district` AND `apartment`.`p_type`=`property_type`.`id` AND `apartment`.`contact_person`='$cid' GROUP BY `apartment_img`.`apartment_id`");

                    if(mysqli_num_rows($sql)>0){
                        while($row = mysqli_fetch_assoc($sql)){
                            $id = $row["id"];
                            $name = $row["name"];
                            $region = $row["region"];
                            $amount = number_format($row["amount"],2);
                            $description =$row["description"];
                            $img = $row["img"];
                            $district = $row["district"];
                            $contract_type = $row["contract_type"];
                            $p_type = $row["type"];
                            $currency = $row["currency"];

                            echo " <div class='col-sm-6 col-md-3 margin30 viewHome' id='$id' title='$name'>
                                        <div class='property clearfix'>
                                            <div class='image'>
                                                <div class='content'>
                                                    <a href='#' ><i class='fa fa-search-plus'></i></a>
                                                    <img src='../dashboard/php/uploads/$img' height='150px' width='300px' alt='$name'>
                                                    <span class='label-property'>FOR $contract_type</span>
                                                    <span class='label-price'>$currency $amount</span>
                                                </div><!--content-->
                                            </div><!--image-->
                                            <div class='property-detail'>
                                                <h5 class='title'><a href='#'>$name</a> <a class='pull-right hidden-xs'>($p_type)</a></h5>
                                                <span class='location'>$region</span>
                                                <div class='pull-left'>
                                                    <p><b>District:</b> $district</p>
                                                </div>
                                               
                                            </div><!--property details-->
                                        </div><!--property-->
                                    </div><!--property columns-->";
                                }
                            }else{
                                
                            }


                ?>
                
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
