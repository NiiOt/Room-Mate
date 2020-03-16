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
       <?php include 'interface/top.php'; ?>
        <div class="divide70"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                  <div id="property-map" style="width:100%;height: 400px;">
                  </div>
                </div>
            </div> <div class="divide70"></div>

            <div class="row">
                <div class="col-sm-6 contact-column">
                     <h4>Contact us</h4>
                    <p>
                        We are glad you want to contact us, fill out this form and we will reply you shortly.
                    </p>
                    <div class="divide10"></div>

                     <div class="form-contact">
                        <div class="required">
                            <p>( <span>*</span> fields are required )</p>
                        </div>

                       <form name="sentMessage" id="contactForm" method="post" novalidate>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                            <label>Name<span>*</span></label>
                                            <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                            <label>Email Address<span>*</span></label>
                                            <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                            <p class="help-block"></p>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12  controls">
                                    <label>Phone Number<span>*</span></label>
                                    <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 controls">
                                    <label>Message<span>*</span></label>
                                    <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <br>
                            <div id="success"></div>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <button type="submit" class="btn btn-red btn-lg">Send Message</button>
                                </div>
                            </div>
                        </form>

                    </div><!--contact form-->

                </div><!--col-->
                <div class="col-sm-5 col-sm-offset-1 contact-column">
                     <h4>Contact info</h4>
                    <ul class="list-unstyled contact contact-info">
                        <li><p><strong><i class="fa fa-map-marker"></i> Digital Address:</strong> GS-3720-071</p></li> 
                        <li><p><strong><i class="fa fa-envelope"></i> Mail Us:</strong> <a href="#">roomate@hupgo.com.com</a></p></li>
                        <li> <p><strong><i class="fa fa-phone"></i> Phone:</strong> +233 547343887</p></li>
                        <li> <p><strong><i class="fa fa-print"></i> Fax:</strong> +233 576588416</p></li>
                    </ul>
                    <div class="divide40"></div>
                    <h4>Get social</h4>
                    <ul class="list-inline social-1">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>

                </div>
            </div><!--row-->
        </div>
        <div class="divide70"></div>
        
    <?php include 'interface/footer.php'; ?>
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
             <!--cantact form script-->
        <script src="js/contact_me.js" type="text/javascript"></script>
        <script src="js/jqBootstrapValidation.js" type="text/javascript"></script>

        <!--revolution slider plugins-->
        <script src="rs-plugin/js/jquery.themepunch.tools.min.js" type="text/javascript"></script>
        <script src="rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
         <script src="js/tweetie.min.js" type="text/javascript"></script>
        <!--on scroll animation-->
        <script src="js/wow.min.js" type="text/javascript"></script>
        <!--customizable plugin edit according to your needs-->
        <script src="js/real-estate-custom.js" type="text/javascript"></script>
        <script type='text/javascript' src='http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=true&amp;ver=3.6'></script>
      <script type='text/javascript' src='js/gmap3.infobox.min.js'></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".co").attr("class","active")
                function LoadMapProperty() {
                    var locations = new Array(
                            [38.951399, -76.958463]
                            );
                    var types = new Array(
                            'family-house'
                            );
                    var markers = new Array();
                    var plainMarkers = new Array();

                    var mapOptions = {
                        center: new google.maps.LatLng(38.951399, -76.958463),
                        zoom: 14,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        scrollwheel: false
                    };

                    var map = new google.maps.Map(document.getElementById('property-map'), mapOptions);

                    $.each(locations, function (index, location) {
                        var marker = new google.maps.Marker({
                            position: new google.maps.LatLng(location[0], location[1]),
                            map: map,
                            
                        });

                        var myOptions = {
                            draggable: true,
                            content: '<div class="marker ' + types[index] + '"><div class="marker-inner"></div></div>',
                            disableAutoPan: true,
                            pixelOffset: new google.maps.Size(-21, -58),
                            position: new google.maps.LatLng(location[0], location[1]),
                            closeBoxURL: "",
                            isHidden: false,
                            // pane: "mapPane",
                            enableEventPropagation: true
                        };
                        marker.marker = new InfoBox(myOptions);
                        marker.marker.isHidden = false;
                        marker.marker.open(map, marker);
                        markers.push(marker);
                    });

                    google.maps.event.addListener(map, 'zoom_changed', function () {
                        $.each(markers, function (index, marker) {
                            marker.infobox.close();
                        });
                    });
                }

                google.maps.event.addDomListener(window, 'load', LoadMapProperty);

                var dragFlag = false;
                var start = 0, end = 0;

                function thisTouchStart(e) {
                    dragFlag = true;
                    start = e.touches[0].pageY;
                }

                function thisTouchEnd() {
                    dragFlag = false;
                }

                function thisTouchMove(e) {
                    if (!dragFlag)
                        return;
                    end = e.touches[0].pageY;
                    window.scrollBy(0, (start - end));
                }

                document.getElementById("property-map").addEventListener("touchstart", thisTouchStart, true);
                document.getElementById("property-map").addEventListener("touchend", thisTouchEnd, true);
                document.getElementById("property-map").addEventListener("touchmove", thisTouchMove, true);
            });

        </script>


    </body>

</html>
