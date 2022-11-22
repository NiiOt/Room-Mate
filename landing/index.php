<?php
    include "../dashboard/php/config.php";


 ?>


<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
       <!--  <meta http-equiv="refresh" content="10"> -->
        <meta name="theme-color" content="#123456">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Roomate</title>

        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- custom css  -->
        <link href="css/real-estate.css" rel="stylesheet" type="text/css" media="screen">
        <!-- font awesome for icons -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
        
       <link href='https://fonts.googleapis.com/css?family=Roboto:400,900,700,500,400italic,300italic,300,100italic,100' rel='stylesheet' type='text/css'>
        <!--owl carousel css-->
        <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="screen">
        <link href="css/owl.theme.css" rel="stylesheet" type="text/css" media="screen">
        <!--mega menu -->
        <link href="css/yamm.css" rel="stylesheet" type="text/css">
        <link href="css/select.css" rel="stylesheet" type="text/css">
        <!-- <link href="../dashboard/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet"> -->
        <!--Revolution slider css-->
        <link href="rs-plugin/css/settings.css" rel="stylesheet" type="text/css" media="screen">
        <link href="css/rev-style.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="shortcut icon" type="image/ico" href="img/gag.ico">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
        <?php include "interface/top.php"?>
        <!--rev slider start-->
<!-- 
        <input type="color" name="">
        <input type="text" x-webkit-speech> -->


        <div class="fullwidthbanner">
            <div class="tp-banner">
                <ul>
                    <!-- SLIDE -->
                    <li data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Good Morning">
                        <!-- MAIN IMAGE -->
                        <img src="img/estate/img-7.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        <div class="caption slider-title sft"
                             data-x="50"
                             data-y="160"
                             data-speed="1000"
                             data-start="1000"
                             data-easing="easeOutExpo">
                            27523 Pacific Coast
                        </div>
                        <div class="caption slider-text sfl"
                             data-x="50"
                             data-y="214"
                             data-speed="1000"
                             data-start="1800"
                             data-easing="easeOutExpo">
                            124, Munna wali 
                        </div>
                        <div class="caption sfb slider-price tp-resizeme"
                             data-x="50"
                             data-y="258"
                             data-speed="500"
                             data-start="1800"
                             data-easing="Sine.easeOut">
                            $16000
                        </div>                       
                    </li>
                    <!-- SLIDE -->
                    <li data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Real Real Estate">
                        <!-- MAIN IMAGE -->
                        <img src="img/estate/img-14.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        <div class="caption slider-title sft"
                             data-x="50"
                             data-y="160"
                             data-speed="1000"
                             data-start="1000"
                             data-easing="easeOutExpo">
                            27523 West Hill Mall
                        </div>
                        <div class="caption slider-text sfl"
                             data-x="50"
                             data-y="214"
                             data-speed="1000"
                             data-start="1800"
                             data-easing="easeOutExpo">
                            124, Eden Heights
                        </div>
                        <div class="caption sfb slider-price tp-resizeme"
                             data-x="50"
                             data-y="258"
                             data-speed="500"
                             data-start="1800"
                             data-easing="Sine.easeOut">
                            $16000
                        </div>                       
                    </li>
                    <!-- SLIDE -->
                    <li data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Everything you need">
                        <!-- MAIN IMAGE -->
                        <img src="img/estate/img-6.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        <div class="caption slider-title sft"
                             data-x="50"
                             data-y="160"
                             data-speed="1000"
                             data-start="1000"
                             data-easing="easeOutExpo">
                            27523 Mountain View
                        </div>
                        <div class="caption slider-text sfl"
                             data-x="50"
                             data-y="214"
                             data-speed="1000"
                             data-start="1800"
                             data-easing="easeOutExpo">
                            124, Trassaco Valley
                        </div>
                        <div class="caption sfb slider-price tp-resizeme"
                             data-x="50"
                             data-y="258"
                             data-speed="500"
                             data-start="1800"
                             data-easing="Sine.easeOut">
                            $16000
                        </div>                       
                    </li>
                </ul>
            </div>
        </div><!--full width banner-->
        <!--revolution end-->
        
        <div class="search-filter">
            <div class="container">
                <form role="form">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 margin20 select-option">
                            <section>
                                <select class="form-control" id="region">
                                    <option value="" disabled selected>Region</option>
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


                                        ?>
                                </select>
                            </section>
                        </div>
                        <div class="col-md-3 col-sm-6 margin20 select-option">
                            <section>
                                <select class="form-control" id="district">
                                    <option value="" disabled selected>District</option>
                                  
                                </select>
                                <i class="fa fa-spinner fa-spin" id="loader">Loading</i> 
                            </section>
                        </div>
                        <div class="col-md-3 col-sm-6 margin20 select-option">
                            <section>
                                <select class="form-control" id="p_type">
                                    <option value="" disabled selected>Property Type</option>
                                   
                                      <?php 
                                            $sql = mysqli_query($con,"SELECT `type`,`id` FROM `property_type` ORDER BY `id` ASC"  );
                                            if(mysqli_num_rows($sql)>0){
                                                while($row=mysqli_fetch_assoc($sql)){
                                                    $id = $row["id"];
                                                    $type =$row["type"];
                                                    
                                                    echo "<option value='$id'>$type </option>";
                                                }
                                             }


                                        ?>
                                </select>
                            </section>
                        </div>
                        <div class="col-md-3 col-sm-6 margin20">
                            <a href="#" class="btn btn-red btn-lg btn-block" id="searchBtn"><i class="fa fa-search"></i>Search</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="divide40"></div>
    



      
        <!-- <div class="divide70"></div> -->
        <div class="container">
            <div class="row here">
                <div class="col-md-9">
            <h3 class="title-section clearfix">Featured property </h3>
                <?php
                $sql = mysqli_query($con,"SELECT `apartment`.`name`,`apartment`.`id`,`regions`.`region`,`contract_type`,`amount`,`description`,`apartment_img`.`img`,`district`.`name` AS `district` ,`type`,`apartment`.`currency` FROM `apartment`,`regions`,`apartment_img`,`district`,`property_type` WHERE `apartment`.`region`=`regions`.`id` AND `apartment_img`.`apartment_id`=`apartment`.`id` AND `apartment`.`available` = 'YES' AND `approved`='YES' AND `district`.`id` = `apartment`.`district` AND `apartment`.`p_type`=`property_type`.`id` GROUP BY `apartment_img`.`apartment_id`");

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

                            echo " <div class='col-sm-6 col-md-4 margin30 viewHome' id='$id' title='$name'>
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
                                                <span class='location'><b>$region</b></span>
                                                <div class='pull-left'>
                                                    <p><b>Details:</b></p>
                                                </div>
                                                <div class='pull-right'>
                                                    <span><img src='img/estate/bedrooms.png' alt=''> 4</span>
                                                    <span><img src='img/estate/bathrooms.png' alt=''> 3</span>
                                                </div>

                                               
                                            </div><!--property details-->
                                        </div><!--property-->
                                    </div><!--property columns-->";
                                }
                            }else{
                                
                            }


                ?>
                </div>
                <div class="col-md-3">
                    <h3 class="title-section clearfix">Paid Promos Here</h3>
                </div>
            </div>
        </div>
        
        
        <div class="divide40"></div>
       <?php include 'interface/footer.php'; ?>
        <!--scripts and plugins -->
        <!--must need plugin jquery-->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-migrate.min.js"></script> 
        <!--bootstrap js plugin-->
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>       
        <!--easing plugin for smooth scroll-->
        <script src="js/jquery.easing.1.3.min.js" type="text/javascript"></script>
        <!--sticky header-->
        <script type="text/javascript" src="js/jquery.sticky.js"></script>
          <!--flex slider plugin-->
        <script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
        <!--parallax background plugin-->
        <script src="js/jquery.stellar.min.js" type="text/javascript"></script>
        <!--owl carousel slider-->
        <script src="js/owl.carousel.min.js" type="text/javascript"></script>
        <!-- <script href="../dashboard/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script> -->
        <script src="js/selectFx.js" type="text/javascript"></script>
        <script src="js/classie.js" type="text/javascript"></script>
        <!--revolution slider plugins-->
        <script src="rs-plugin/js/jquery.themepunch.tools.min.js" type="text/javascript"></script>
        <script src="rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
         <script src="js/tweetie.min.js" type="text/javascript"></script>
        <!--on scroll animation-->
        <script src="js/wow.min.js" type="text/javascript"></script>
        <!--customizable plugin edit according to your needs-->
        <script src="js/real-estate-custom.js" type="text/javascript"></script>


        <script type="text/javascript">
               $(".h").attr("class","active")
               $("#loader").hide();
                // console.log($('#region'))
             // setTimeout(function(){
             //     $('#region').append("<option>Script</option>")
             // },1500)

              $('#region').change(function(){
                    region = $(this).val();
                    // console.log(region)

                        $("#loader").show();
                    $.post("../dashboard/php/ajax.php",{status:"getDistrict",region:region},function(data){
                        $("#district").html(data);
                        $("#loader").hide();
                        // $("#district").selectpicker('refresh');

                    })
                              
                })

                $(".viewHome").click(function(e){
                    e.preventDefault();
                     var d = new Date();
                     var m = d.getMinutes();
                     s = d.getYear()
                     // console.log(m+""+s)
                    id = $(this).attr("id");
                    name = $(this).attr("title")
                    console.log(s)
                    url = "view.php?view=v"+s+""+id+"&&name="+name;
                    location.href = url
                })
              // console.log($("#viewHome"))

              $("#searchBtn").click(function(e){
                e.preventDefault();
                 district = $("#district").val();
                 ptype = $("#p_type").val();
                 console.log(district)
                 $.post("../dashboard/php/ajax.php",{status:"homeSearch",district:district,ptype:ptype},function(data){
                    $(".here").html(data)
                 })
              })
        </script>


    </body>

</html>
