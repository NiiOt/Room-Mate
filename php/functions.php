<?php
session_start();
include "config.php";

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




$status = $_POST["status"];

if($status=="signup"){
   $name = $_POST["name"];
   $email = $_POST["email"];
   $phone = $_POST["phone"];
   $username =$_POST["username"];
   $password = $_POST["password"];
   $avatar = $_POST["avatar"];
   $password = md5($password);
   // $rpassword = $("#rpassword").val();

  $sql ="INSERT INTO `user`(`id`, `username`, `name`, `email`, `password`, `contact`, `avatar`, `date_joined`) VALUES ('','$username','$name','$email','$password','$phone','$avatar','$now')";

  $sql = mysqli_query($con,$sql);
  if($sql){
  	echo "Success";
  }else{
  	echo mysqli_error($con);
  }





}else if($status=="usernameExistence"){
	$uname = $_POST["username"];

	$sql = mysqli_query($con,"SELECT `username` FROM `user` WHERE `username`='$uname'");
	if(mysqli_num_rows($sql)>0){
		echo "Exists";
	}else{
		echo mysqli_error($con);
	}




}else if($status=="logIn"){
	$username=$_POST["username"];
	$password=$_POST["password"];
	$password=md5($password);

	$sql = mysqli_query($con,"SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password'");
	if(mysqli_num_rows($sql)>0){
		while($row=mysqli_fetch_assoc($sql)){
			$_SESSION["name"] =$row["name"];
			$_SESSION["username"] = $row["username"];
			$_SESSION["avatar"] = $row["avatar"];
			$_SESSION["phone"] = $row["contact"];
			$_SESSION["avatar"] = $row["avatar"];
			$_SESSION["password"] = $password;
			$id=$row["id"];
			$_SESSION["id"] = $id;
			$activity = "logIn";
			$through = activityLog($id,$activity);
			echo $through;
		}
	}else{
		echo mysqli_error($con);
	}

}else if($status=="getUser"){
	if($_SESSION["name"]!=""){

		$username = $_SESSION["username"];
		// $avatar  = $
		echo strtoupper($username);
	}else{
		echo "Out";
	}

}else if($status=="getUserImg"){
	echo $_SESSION["avatar"];

}else if($status=="logout"){

	$id = $_SESSION["id"];
	$logout = activityLog($id,"logOut");
	session_destroy();
	echo $logout;

}else if($status=="getMsg"){
	$id =$_SESSION["id"];

	$sql = mysqli_query($con,"SELECT * FROM `messages` WHERE `rid` = '$id'");
		if(mysqli_num_rows($sql)>0){

			while($row=mysqli_fetch_assoc($sql)){
				$msg =$row["message"];
				$msgDate = $row["sent_on"];

				echo "   <div class='col s12 m12'>
				            <div class='card horizontal'>
				            
				                  <div class='card-stacked'>
				                    <div class='card-content'>
				                      <p class='text-center'>
				                        <strong>From: Admin</strong><br/>
				                        $msg<br/>
				                        <strong>$msgDate</strong>

				                      </p>
				                                
				                    </div>
				                 </div>
				            </div>
				         </div>";
			}
		}else{
			echo "<center><br/>No message</center>";
		}

}else if($status=="loadHomes"){
	$sql = mysqli_query($con,"SELECT `name`,`apartment`.`id`,`regions`.`region`,`amount`,`description`,`apartment_img`.`img` FROM `apartment`,`regions`,`apartment_img` WHERE `apartment`.`region`=`regions`.`id` AND `apartment_img`.`apartment_id`=`apartment`.`id` AND `apartment`.`available` = 'YES' AND `approved`='YES' GROUP BY `apartment_img`.`apartment_id` ");

	if(mysqli_num_rows($sql)>0){
		while($row = mysqli_fetch_assoc($sql)){
			$id = $row["id"];
			$name = $row["name"];
			$region = $row["region"];
			$amount = $row["amount"];
			$description =$row["description"];
			$img = $row["img"];
 			echo "<div class='col m3'>
			       
			          <div class='card horizontal'>
			            <div class='card-image'>
			              <img src='dashboard/php/uploads/$img' class='img-responsive'>
			            </div>
			            <div class='card-stacked'>
			              <div class='card-content'>
			                <p class='text-center'><Strong class='text-info'>".strtoupper($name)."</Strong><br/>
			                <p class='text-center'>".strtolower($description)."<br/>
			                <p class='text-center'><Strong>$region</Strong><br/>
			                             
			              </div>
			              <div class='card-action'>
			               
			               <a type='button' id='$id'  class='view waves-effect waves-light left'><i class='fa fa-eye'></i><span> View Details</span></a>
			              </div>

			            </div>
			          </div>
			         </div>"; 
		}
		echo "<link type='text/css' rel='stylesheet' href='css/materialize.min.css' media='screen,projection'/><script src='js/scripts.js'></script>'";
	}else{
		echo "No data";
	}

}else if($status=="saveHomeId"){
	$id = $_POST["id"];
	$_SESSION["home_id"] = $id;

	echo "Success";


}else if($status=="viewHome"){
	$id = $_SESSION["home_id"];
	    $sql = mysqli_query($con,"SELECT `apartment`.`id`,`apartment`.`name`,`regions`.`region`,`district`.`name` AS `district`,`town`,`hse_no`,`digital_add`,`description`,`apo`, `amount`,`available`,`user`.`name` AS `contact_person`,`user`.`contact` FROM `apartment`,`district`,`regions`,`user` WHERE (`apartment`.`region`=`regions`.`id`) AND (`apartment`.`district`=`district`.`id` ) AND (`apartment`.`contact_person` = `user`.`id`) AND `apartment`.`id`='$id'");
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
                     $contact_person = $row["contact_person"];
                     $contact = $row["contact"];

                     echo "  
				                    <!-- <span class='card-title'>Card Title</span> -->
				                     
				                    <div class='fixed-action-btn horizontal'>
				                          <a class='btn-floating btn-large '>
				                            <i class='fa fa-reorder'></i>
				                          </a>
				                          <ul>
				                            <li> <a href='tel:$contact' class='btn-floating pull-right waves-effect waves-light blue'><i class='fa fa-phone'></i></a></li>
				                            <li><a href='maito:niiotphenom@gmail.com' class='btn-floating pull-right waves-effect waves-light yellow'><i class='fa fa-envelope'></i></a></li>
				                            <li><a href='tel:+233547343887' class='btn-floating pull-right  waves-effect waves-light green'><i class='fa fa-share'></i></a></li>
				                           
				                          </ul>
				                        </div>
				                          </div>
					                  <div class='card-content'>
					                    <!-- <i class=''>Double tap an image to save</i> -->
					                    <table class='table table-striped'>

				                     	<tr rowspan='2'>Details</tr>
				                        <tr> <td class='text-default'>Apartment Name.:</td><td> $name</td></tr>
				                        <tr> <td class='text-default'>House No.:</td><td> $hse_no</td></tr>
				                        <tr><td>Location.:</td><td> $town</td></tr>
				                       <tr> <td>District.:</td><td> $district</td></tr>
				                       <tr> <td>Region: </td><td>$region</td></tr>
				                        <tr><td>Contact Person:</td><td> $contact_person</td></tr>
				                       <tr> <td>Digital Address:</td><td>$digital_add</td></tr>
				                        <tr><td>Description: </td><td>$description</td></tr>
				                        <tr><td>Rent per Year.: </td><td>GH¢ $amount</td></tr>
				                        <tr><td>Advance Payment Option.: </td><td>".getAdvance($apo)."</td></tr>
				                       
				                       </div>
                
              </div>
            </div>";
		}
	}


}else if($status=="favID"){
	$id = $_SESSION["home_id"];
	echo "$id";



}else if($status=="loadHomeImg"){
	$id = $_SESSION["home_id"];
	$sql = mysqli_query($con,"SELECT `img` FROM `apartment_img` WHERE `apartment_id`='$id'");
	if(mysqli_num_rows($sql)>0){
		$x=0;
		while($row=mysqli_fetch_assoc($sql)){
			$img = $row["img"];
			$x++;
			echo "<a class='carousel-item' href='#$x!'><img src='dashboard/php/uploads/$img'></a>";
		} 
	}else{
		echo "No image uploaded";
	}




}else if($status=="setFav"){
	$aid = $_POST["id"];   //APARTMENT ID
	$uid = $_SESSION["id"];	//USER ID

	$sql = mysqli_query($con,"INSERT INTO `favourites`(`id`, `user_id`, `apartment_id`, `fav_date`) VALUES('','$uid','$aid','$now')");
	if($sql){
			$activity = "Apartment $aid Favourited";
			$through = activityLog($uid,$activity);
			echo "$through";
	}else{
		echo mysqli_query($con);
	}


}else if($status=="removeFav"){
	$aid = $_POST["id"];   //APARTMENT ID
	$uid = $_SESSION["id"];	//USER ID

	$sql = mysqli_query($con,"DELETE FROM `favourites` WHERE `apartment_id`='$aid'");
	if($sql){
			$activity = "Apartment $aid Unavourited";
			$through = activityLog($uid,$activity);
			echo "$through";
	}else{
		echo mysqli_query($con);
	}

}else if($status=="getFavourite"){
	$aid = $_POST["favID"];
	$uid = $_SESSION["id"];

	$sql = mysqli_query($con,"SELECT * FROM `favourites` WHERE `apartment_id`='$aid' AND `user_id`='$uid'");
	if(mysqli_num_rows($sql)>0){
		echo "Has";
	}else{
		echo "No".mysqli_error($con);
	}


}else if($status=="loadFav"){
	$uid = $_SESSION["id"];

	$sql = mysqli_query($con,"SELECT `name`,`apartment`.`id`,`regions`.`region`,`amount`,`description`,`apartment_img`.`img`,`favourites`.`apartment_id` FROM `apartment`,`regions`,`apartment_img`,`favourites` WHERE `apartment`.`region`=`regions`.`id` AND `apartment_img`.`apartment_id`=`apartment`.`id` AND `apartment`.`available` = 'YES' AND `apartment`.`id`=`favourites`.`apartment_id` AND `favourites`.`user_id`='$uid' GROUP BY `apartment_img`.`apartment_id`");

	if(mysqli_num_rows($sql)>0){
		while($row = mysqli_fetch_assoc($sql)){
			$id = $row["id"];
			$name = $row["name"];
			$region = $row["region"];
			$amount = $row["amount"];
			$description =$row["description"];
			$img = $row["img"];
 			echo "<div class='col s12 m3'>
			       
			          <div class='card horizontal'>
			            <div class='card-image'>
			              <img src='dashboard/php/uploads/$img' class='img-responsive'>
			            </div>
			            <div class='card-stacked'>
			              <div class='card-content'>
			                <p class='text-center'><Strong class='text-info'>".strtoupper($name)."</Strong><br/>
			                <p class='text-center'>".strtolower($description)."<br/>
			                <p class='text-center'><Strong>$region</Strong><br/>
			             
			                
			              </div>
			              <div class='card-action'>
			               <!-- <a class='waves-effect waves-light modal-trigger left'  href='#mololdal1'><i class='material-icons'></i><span> View Details</span></a> -->
			               <a type='button' id='$id'  class='view  waves-effect waves-light left'><i class='fa fa-eye'></i><span> View Details</span></a>
			              </div>

			            </div>
			          </div>
			         </div>"; 
		}
		echo "<link type='text/css' rel='stylesheet' href='css/materialize.min.css'  media='screen,projection'/><script src='js/scripts.js'></script>'";
	}else{
		echo "No data";
	}


}else if($status=="search"){
	$text = $_POST["text"];
	$sql = mysqli_query($con,"SELECT `apartment`.`name` AS `aname`,`apartment`.`id`,`town`,`description`,`regions`.`region`,`amount`,`district`.`name`,`apartment_img`.`img` FROM `apartment` INNER JOIN `regions` ON `apartment`.`region`=`regions`.`id` INNER JOIN `district` ON `district`.`id` = `apartment`.`district` INNER JOIN `apartment_img` ON `apartment_img`.`apartment_id` = `apartment`.`id` WHERE `approved`='YES' AND `available`='YES' AND `regions`.`region`LIKE '%$text%' OR `apartment`.`name` LIKE '%$text%' OR `district`.`name` LIKE '%$text%' OR `town` LIKE '%$text%' OR `description` LIKE '%$text%' OR `amount` LIKE '%text%' GROUP BY `apartment`.`id`");


	if(mysqli_num_rows($sql)>0){
		while($row = mysqli_fetch_assoc($sql)){
			$id = $row["id"];
			$name = $row["aname"];
			$region = $row["region"];
			$amount = $row["amount"];
			$description =$row["description"];
			$img = $row["img"];
 			echo "<div class='col s12 m3'>
			       
			          <div class='card horizontal'>
			            <div class='card-image'>
			              <img src='dashboard/php/uploads/$img' class='img-responsive'>
			            </div>
			            <div class='card-stacked'>
			              <div class='card-content'>
			                <p class='text-center'><Strong class='text-info'>".strtoupper($name)."</Strong><br/>
			                <p class='text-center'>".strtolower($description)."<br/>
			                <p class='text-center'><Strong>$region</Strong><br/>
			             
			                
			              </div>
			              <div class='card-action'>
			               
			               <a type='button' id='$id'  class='view  waves-effect waves-light left'><i class='fa fa-eye'></i><span> View Details</span></a>
			              </div>

			            </div>
			          </div>
			         </div>"; 
		}
		echo "<link type='text/css' rel='stylesheet' href='css/materialize.min.css' media='screen,projection'/><script src='js/scripts.js'></script>'";
	}else{
		echo "<center>No matching data. Please pull release to refresh</center>";
	}

}//SETTINGS AJAX//
else if($status=="getOldPass"){
	$oldPass = md5($_POST["oldPass"]);
	$comPass = $_SESSION["password"];

	if($oldPass==$comPass){
		echo "Good";
	}else{
		echo "thief";
	}
}else if($status=="changePass"){
	$newPass = md5($_POST["newPass"]);
	$uid = $_SESSION["id"];

	$sql = mysqli_query($con,"UPDATE `user` SET `password`='$newPass' WHERE `id` = '$uid'");
	if($sql){
		$activity = "passChange";
		$through = activityLog($uid,$activity);
		echo $through;
	}else{
		echo mysqli_error($con);
	}

}else if($status=="getAvatar"){
	$avatar = $_SESSION["avatar"];
	echo "$avatar";

}else if($status=="changeAvatar"){
	$newAvatar = $_POST["newAvatar"];
	$uid = $_SESSION["id"];
	$oldAvatar = $_SESSION["avatar"];
	$sql = mysqli_query($con,"UPDATE`user` SET `avatar`='$newAvatar' WHERE `id`='$uid'");
	if($sql){
		$activity = "avatar".$oldAvatar." changed to".$newAvatar;

		$through= activityLog($uid,$activity);
		$_SESSION["avatar"] = $newAvatar;
		echo "$through";
	}else{
		echo mysqli_error($con);
	}
}





















?>