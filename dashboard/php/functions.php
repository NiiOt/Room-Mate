<?php
session_start();
include "config.php";
?>
<body style="background:rgba(23,43,21,0.1);">
    


<?php

function activityLog($uid,$activity){
    include "config.php";
    $sessionkey = $_SESSION["sessionkey"];
    $now = date("d-m-Y h:i:sa");
    $sql = mysqli_query($con,"INSERT INTO `logs`(`id`, `uid`, `act_time`,`session_key`,`activity`) VALUES ('','$uid','$now','$sessionkey','$activity')");
    if($sql){
        $_SESSION["sessionkey"] = $sessionkey;
        return "Success";
    }else{
        return mysqli_error($con);
    }
}







 if(isset($_POST["addLandlord"])){
    $name = $_POST["name"];
    $uname = $_POST["uname"];
    $email = $_POST["email"];
    $password =md5($_POST["password"]);
    $tel = $_POST["tel"];
    $id =  $_SESSION["id"];

    $sql = mysqli_query($con,"INSERT INTO `user`(`id`, `username`, `name`, `email`, `password`, `contact`, `avatar`, `date_joined`, `uType`) VALUES ('','$uname','$name','$email','$password','$tel','1','$now','3') ");

    if($sql){
      $through = activityLog($id,"Added a landlord");
      if($through =="Success"){

          echo "<script>alert('User3 Addition Successful')</script>";
          header("location: ../landlord.php");
      }
    }else{
      echo mysqli_error($con);
    }

}else if(isset($_POST["addApartment"])){
  $name = $_POST["name"];
  $region = $_POST["region"];
  $district = $_POST["district"];
  $town = $_POST["town"];
  $hse_no = $_POST["hse_no"];
  $apo = $_POST["apo"];
  $description = $_POST["description"];
  $digital_add = $_POST["digital_add"];
  $amount = $_POST["amount"];
  $currency = $_POST["currency"];
  // $amount = $currency." ".$amount;
  $contact_person = $_POST["contact_person"];
  $contract_type = $_POST["contract_type"];
  $p_type = $_POST["p_type"];
    $id =  $_SESSION["id"];
  $sql = mysqli_query($con,"INSERT INTO `apartment`(`id`, `name`, `region`, `district`, `town`, `hse_no`, `apo`, `description`, `digital_add`, `amount`, `contact_person`, `date_added`, `available`,`contract_type`,`p_type`,`currency`) VALUES ('','$name','$region','$district','$town','$hse_no','$apo','$description','$digital_add','$amount','$contact_person','$now','YES','$contract_type','$p_type','$currency')");
  if($sql){
       $through = activityLog($id,"Added an apartment");
       if($through =="Success"){

          echo "<script>alert('Apartment Addition Successful')</script>";
          header("location: ../apartments.php");
      }
  }else{
    echo mysqli_error($con);
  }


}
//SETTINGS
else if(isset($_POST["passChange"])){
    $opass = md5($_POST["opass"]);
    $npass = md5($_POST["npass"]);
    // $rpass = $_POST["rpass"];

    if($opass!=$_SESSION["password"]){
        
        echo "<script>alert('Unknown old password entered')</script>";
    }else{
        $id = $_SESSION["id"];
        $sql =mysqli_query($con,"UPDATE `user` SET `password`='$npass' WHERE `id`='$id'");
        if($sql){
            $_SESSION["password"]=$npass;
            $activity = "Changed Password";

            $through = activityLog($id,$activity);
            if($through=='Success'){
              header("Location:../settings.php");
              echo "<script>alert('Password Changed Successfully')</script>";
            }
        }else{
            echo mysqli_error($con);
        }
    }

}else if(isset($_POST["contactChange"])){
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $id = $_SESSION["id"];

    $sql = mysqli_query($con,"UPDATE `user` SET `email`='$email',`contact`='$phone' WHERE `id`='$id'");
    if($sql){
        $_SESSION["phone"] = $phone;
        $_SESSION["email"] = $email;
        $activity = "Updated Contact Details";
        $through = activityLog($id,$activity);
        if($through =='Success'){

          echo "<script>alert('Contact Updated Successfully')</script>";
          header("location: ../settings.php");
        }
    }
}else if(isset($_POST["avatarChange"])){
    $newAvatar = $_POST["avatar"];
    $uid = $_SESSION["id"];
    $oldAvatar = $_SESSION["avatar"];
    $sql = mysqli_query($con,"UPDATE`user` SET `avatar`='$newAvatar' WHERE `id`='$uid'");
    if($sql){
      $activity = "avatar".$oldAvatar." changed to".$newAvatar;

      $through= activityLog($uid,$activity);
      // echo "$through";
      if($through=="Success"){
         $_SESSION["avatar"] = $newAvatar;
         echo "<script>alert('Contact Updated Successfully')</script>";
         header("Location:../settings.php");
      }
    }else{
      echo mysqli_error($con);
    }
}









?>
</body>