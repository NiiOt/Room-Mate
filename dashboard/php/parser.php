<?php
session_start();
include "config.php";

if(!empty($_FILES)){
 	$post_img = $_FILES['file']['name']; 
	$temp = $_FILES['file']['tmp_name'];
	$dir_separator = DIRECTORY_SEPARATOR;
	$folder = "uploads";
	$destination_path =$folder.$dir_separator;

	$img =  $_FILES['file']['name'];
	$img = explode(".", $_FILES['file']['name']);
	$ext = end($img);

	if($ext =='png' || $ext=='PNG' || $ext=='jpg' || $ext=='JPG' || $ext=='jpeg' ||$ext =='JPEG' || $ext=='gif' ||$ext=='GIF'){
			if($ext =='png' || $ext=='PNG'){
				$src = imagecreatefrompng($temp);
			}

			if( $ext=='jpg' || $ext=='JPG' || $ext=='jpeg' ||$ext =='JPEG'){
				$src = imagecreatefromjpeg($temp);
			}

			if($ext=='gif' ||$ext=='GIF'){
				$src = imagecreatefromgif($temp);
			}

			  $watermark = imagecreatefrompng('stamp1.png');
			    // get the width and height of the watermark image
			  $water_width = imagesx($watermark);
			  $water_height = imagesy($watermark);

			  // get the width and height of the main image image
			  $main_width = imagesx($src);
			  $main_height = imagesy($src);

			  // Set the dimension of the area you want to place your watermark we use 0
			  // from x-axis and 0 from y-axis 
			  $dime_x = 100;
			  $dime_y = 100;
			  imagecopy($src, $watermark, $dime_x, $dime_y, 0, 0, $water_width, $water_height);


			list($width_min,$height_min) = getimagesize($temp);
			$newwidth_min = 550; //Compressing width
			$newheight_min = ($height_min/$width_min) * $newwidth_min;
			$tmp_min = imagecreatetruecolor($newwidth_min, $newheight_min);

			imagecopyresampled($tmp_min, $src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min);
			$save = "e".time().".".$ext;
			$upload = imagejpeg($tmp_min,$destination_path.$save);


		// echo "$upload";
			$apartment_id = $_SESSION["ipaid"];
			$sql = mysqli_query($con,"INSERT INTO `apartment_img`(`id`,`apartment_id`, `img`, `add_date`) VALUES ('','$apartment_id','$save','$now')");
			if($sql){
				echo "<script>alert('Image uploaded Successfully')</script>";

			}else{
				echo "Failed to insert into db".mysqli_error($con);
			}
	}

}

?>