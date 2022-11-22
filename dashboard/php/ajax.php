<?php
session_start();
include "config.php";


function activityLog($uid,$activity){
    include "config.php";
    $sessionkey =  $_SESSION["sessionkey"];
    $now = date("d-m-Y h:i:sa");
    $sql = mysqli_query($con,"INSERT INTO `logs`(`id`, `uid`, `act_time`,`session_key`,`activity`) VALUES ('','$uid','$now','$sessionkey','$activity')");
    if($sql){
        $_SESSION["sessionkey"] = $sessionkey;
        return "Success";
    }else{
        return mysqli_error($con);
    }
}


$status = $_POST["status"];

switch ($status) {
	case 'getRecepient':
		$rid = $_POST["rid"];
		$sql = mysqli_query($con,"SELECT `name`,`username` FROM `user` WHERE `id` ='$rid'");
		 if(mysqli_num_rows($sql)>0){
            while($row=mysqli_fetch_assoc($sql)){
            	$name =$row["name"];
                $username = $row["username"];
            	echo $name."*".$username."*".$rid;
            }
         }


		break;
	
	case 'sendMsg':
		# code...
		$rid = $_POST["rid"];
		$msg = $_POST["msg"];
		$sid = $_SESSION["id"];
		$sql = mysqli_query($con,"INSERT INTO `messages`(`id`, `sid`, `rid`, `message`, `sent_on`) VALUES ('','$sid','$rid','$msg','$now')");
		if($sql){
			echo "Success";

		}else{
			echo mysqli_error($con);
		}
		break;



	case 'getUname':
		# code...
		$uname=$_POST["uname"];
		$sql = mysqli_query($con,"SELECT `username` FROM `user` WHERE `username`='$uname'");
		if(mysqli_num_rows($sql)>0){
			echo "Exists";
		}else{
			echo "Success";
		}

		break;

		case 'getDistrict':
		     $region = $_POST["region"];

            $sql = mysqli_query($con,"SELECT `name`,`id` FROM `district` WHERE `region`='$region' ORDER BY `name`"  );
            if(mysqli_num_rows($sql)>0){
                while($row=mysqli_fetch_assoc($sql)){
                    $id = $row["id"];
                    $name =$row["name"];
                    // $username = $row["username"];
                    echo "<option value='$id'>$name </option>";
                }
            }
        break;

        case 'secureApartmentID':
        	# code...
        $id = $_POST["id"];

        $_SESSION["ipaid"]=$id; //ipaid = image processing apartment id
        $sql = mysqli_query($con,"SELECT `img`,`name` FROM `apartment_img`,`apartment` WHERE `apartment_id`='$id' AND `apartment`.`id`='$id'");
        if(mysqli_num_rows($sql)>0){
        	while($row=mysqli_fetch_assoc($sql)){
        		$img = $row["img"];
        		$name = $row["name"];
        		echo "<div data-src='php/uploads/$img' class='col-md-2 col-sm-4 col-xs-6'>
                        <div class='lightbox-item p-item'>
                            <img src='php/uploads/$img' alt=''/>
                        </div>
                    </div>";
        	}
            echo "<h1><i class='zmdi zmdi-home'></i>$name</h1> <script src='vendors/bower_components/lightgallery/lib/lightgallery-all.min.js'></script>  <script src='js/app.min.js'></script>";
        }else{
        	echo "<strong class='text-center'><center>No images uploaded</center></strong>";
        }
        break;

        case 'updateAvailability':
            # code...
            $available = $_POST["available"];
            $aid = $_POST["id"];//APARTMENT ID
            $uid = $_SESSION["id"];//ACTIVE LOGGED IN ADMIN

            $sql = mysqli_query($con, "UPDATE `apartment` SET `available`='$available' WHERE `id`='$aid'");
            if($sql){
                $activity = "Changed Apartment with ID $aid availability to $available";
                $through = activityLog($uid,$activity);
                echo "$through";
            }
            break;


             case 'updateApproval':
            # code...
            $approve = $_POST["approve"];
            $aid = $_POST["id"];//APARTMENT ID
            $uid = $_SESSION["id"];//ACTIVE LOGGED IN ADMIN

            $sql = mysqli_query($con, "UPDATE `apartment` SET `approved`='$approve' WHERE `id`='$aid'");
            if($sql){
                $activity = "Changed Apartment with ID $aid Approval to $approve";
                $through = activityLog($uid,$activity);
                echo "$through";
            }
            break;





            //DASHBOARD
            case 'getTenants':
                # code...
                $sql = mysqli_query($con,"SELECT COUNT(`id`) AS `number` FROM `user` WHERE `uType`='1'");
                while($row=mysqli_fetch_assoc($sql)){
                    $number = $row["number"];

                    echo "$number";
                }
                break;


                case 'getLandLords':
                # code...
                $sql = mysqli_query($con,"SELECT COUNT(`id`) AS `number` FROM `user` WHERE `uType`='3'");
                while($row=mysqli_fetch_assoc($sql)){
                    $number = $row["number"];

                    echo "$number";
                }
                break;

                case 'getAgents':
                # code...
                $sql = mysqli_query($con,"SELECT COUNT(`id`) AS `number` FROM `user` WHERE `uType`='2'");
                while($row=mysqli_fetch_assoc($sql)){
                    $number = $row["number"];

                    echo "$number";
                }
                break;

                  case 'getAdmins':
                # code...
                $sql = mysqli_query($con,"SELECT COUNT(`id`) AS `number` FROM `user` WHERE `uType`='4'");
                while($row=mysqli_fetch_assoc($sql)){
                    $number = $row["number"];

                    echo "$number";
                }
                break;

                case 'getUsers':
                # code...
                $sql = mysqli_query($con,"SELECT COUNT(`id`) AS `number` FROM `user`");
                while($row=mysqli_fetch_assoc($sql)){
                    $number = $row["number"];

                    echo "$number";
                }
                break;

                 case 'getLogs':
                # code...
                $sql = mysqli_query($con,"SELECT COUNT(`id`) AS `number` FROM `logs`");
                while($row=mysqli_fetch_assoc($sql)){
                    $number = $row["number"];

                    echo "$number";
                }
                break;

                 case 'getImages':
                # code...
                $sql = mysqli_query($con,"SELECT COUNT(`id`) AS `number` FROM `apartment_img`");
                while($row=mysqli_fetch_assoc($sql)){
                    $number = $row["number"];

                    echo "$number";
                }
                break;

                  case 'getApartments':
                # code...
                $sql = mysqli_query($con,"SELECT COUNT(`id`) AS `number` FROM `apartment`");
                while($row=mysqli_fetch_assoc($sql)){
                    $number = $row["number"];

                    echo "$number";
                }
                break;

                case 'homeSearch':// From landing Page
                 $district = $_POST["district"];
                 $ptype = $_POST["ptype"];
                    # code...
                $sql = mysqli_query($con,"SELECT `apartment`.`name`,`apartment`.`id`,`regions`.`region`,`amount`,`description`,`apartment_img`.`img`,`district`.`name` AS `district`,`type` FROM `apartment`,`regions`,`apartment_img`,`district`,`property_type` WHERE `apartment`.`region`=`regions`.`id` AND `apartment_img`.`apartment_id`=`apartment`.`id` AND `apartment`.`available` = 'YES' AND `approved`='YES' AND `district`.`id` = `apartment`.`district` AND `apartment`.`district`='$district' AND `apartment`.`p_type`=`property_type`.`id` AND `apartment`.`p_type`='$ptype'  GROUP BY `apartment_img`.`apartment_id`");

                    echo "<h2 class='title-section clearfix'> Search Results for $ptype in $district:</h2>";
                    if(mysqli_num_rows($sql)>0){

                        while($row = mysqli_fetch_assoc($sql)){
                            $id = $row["id"];
                            $name = $row["name"];
                            $region = $row["region"];
                            $amount = number_format($row["amount"],2);
                            $description =$row["description"];
                            $img = $row["img"];
                            $district = $row["district"];
                            $p_type = $row["type"];
                            echo " <div class='col-sm-6 col-md-3 margin30 viewHome' id='$id' title='$name'>
                                        <div class='property clearfix'>
                                            <div class='image'>
                                                <div class='content'>
                                                    <a href='#' class='viewHome' id='$id'><i class='fa fa-search-plus'></i></a>
                                                    <img src='../dashboard/php/uploads/$img'  height='150px' width='300px' alt=''>
                                                    <span class='label-property'>Rent/Year</span>
                                                    <span class='label-price'>GH¢ $amount</span>
                                                </div><!--content-->
                                            </div><!--image-->
                                            <div class='property-detail'>
                                                 <h5 class='title'><a href='#'>$name</a> <a class='pull-right'>($p_type)</a></h5>
                                                <span class='location'>$region</span>
                                                <div class='pull-left'>
                                                    <p><b>District:</b> $district</p>
                                                </div>
                                               
                                            </div><!--property details-->
                                        </div><!--property-->
                                    </div><!--property columns-->";
                                }echo "<script src='js/real-estate-custom.js'></script>";
                            }else{

                                echo "No results found for this district";
                            } 


                
                    break;

            case 'getAvatar':
               # code...
              $avatar = $_SESSION["avatar"];
              echo "$avatar";
              
            break; 


            case 'verifyUsername':


            break;

	   default:
		# code...
		break;
}



?>