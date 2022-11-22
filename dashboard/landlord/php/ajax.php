<?php
session_start();
include "../php/config.php";

function activityLog($uid,$activity){
    include "config.php";
    $sessionkey = time();
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
        		echo "<div data-src='../php/uploads/$img' class='col-sm-2 col-xs-6'>
                        <div class='lightbox-item'>
                            <img src='../php/uploads/$img' alt=''/>
                        </div>
                    </div>";
        	}
        	echo "<p><i class='zmdi zmdi-home'></i>$name</p> <script src='vendors/bower_components/lightgallery/lib/lightgallery-all.min.js'></script>";
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
                $activity = "Apart.$aid avail_$available";
                $through = activityLog($uid,$activity);
                echo "$through";
            }
            break;

            case 'getAvatar':
               # code...
              $avatar = $_SESSION["avatar"];
              echo "$avatar";
              
            break; 

            case 'getAgentProps':
            #code ...
             $uid = $_SESSION["id"];//ACTIVE LOGGED IN ADMIN
             $sql = mysqli_query($con,"SELECT COUNT(`id`) AS `number` FROM `apartment` WHERE `contact_person`='$uid' ");
                while($row=mysqli_fetch_assoc($sql)){
                    $number = $row["number"];

                    echo "$number";
                }
            break;

              case 'approvedProps':
            #code ...
             $uid = $_SESSION["id"];//ACTIVE LOGGED IN ADMIN
             $sql = mysqli_query($con,"SELECT COUNT(`id`) AS `number` FROM `apartment` WHERE `contact_person`='$uid' AND `approved` = 'YES' ");
                while($row=mysqli_fetch_assoc($sql)){
                    $number = $row["number"];

                    echo "$number";
                }
            break;

              case 'pendingApproval':
            #code ...
             $uid = $_SESSION["id"];//ACTIVE LOGGED IN ADMIN
             $sql = mysqli_query($con,"SELECT COUNT(`id`) AS `number` FROM `apartment` WHERE `contact_person`='$uid' AND `approved` = 'NO' ");
                while($row=mysqli_fetch_assoc($sql)){
                    $number = $row["number"];

                    echo "$number";
                }
            break;

            case 'stillAvailable':
            #code ...
             $uid = $_SESSION["id"];//ACTIVE LOGGED IN ADMIN
             $sql = mysqli_query($con,"SELECT COUNT(`id`) AS `number` FROM `apartment` WHERE `contact_person`='$uid' AND `available` = 'YES' ");
                while($row=mysqli_fetch_assoc($sql)){
                    $number = $row["number"];

                    echo "$number";
                }
            break;




	default:
		# code...
		break;
}



?>