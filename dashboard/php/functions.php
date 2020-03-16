<?php
session_start();
include "config.php";
?>
<body style="background:rgba(23,43,21,0.1);">
    


<?php

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







if(isset($_POST["registerBtn"])){
   $name = $_POST["name"];
   $email = $_POST["email"];
   $phone = $_POST["phone"];
   $username =$_POST["runame"];
   $password = $_POST["rpass"];
   $rpassword = $_POST["rrpass"];
   $avatar = $_POST["avatar"];
   // $rpassword = $("#rpassword").val();
   if($password!=$rpassword){
    echo "Passwords must match";
   }else{



       $password = md5($password);
      $sql ="INSERT INTO `user`(`id`, `username`, `name`, `email`, `password`, `contact`, `avatar`, `date_joined`,`uType`) VALUES ('','$username','$name','$email','$password','$phone','$avatar','$now','4')";

      $sql = mysqli_query($con,$sql);
      if($sql){
        echo "<script>alert('Registration Successful \n Please login to start'</script>";
        header("location: ../index.php");
      }else{
        echo mysqli_error($con);
      }

   }

} if(isset($_POST["loginBtn"])){
    $username=$_POST["luname"];
    $password=$_POST["lpass"];
    $password=md5($password);

    $sql = mysqli_query($con,"SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password' AND `uType`='4'");
    if(mysqli_num_rows($sql)>0){
        while($row=mysqli_fetch_assoc($sql)){
            $_SESSION["name"] =$row["name"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["avatar"] = $row["avatar"];
            $_SESSION["phone"] = $row["contact"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["password"] = $row["password"];
            $_SESSION["signature"] = md5($_SESSION["password"]);
            $id=$row["id"];
            $_SESSION["id"] = $id;
            $activity = "logIn";
            $through = activityLog($id,$activity);
            
                // echo $through;
            if($through=="Success"){
                header("location: ../home.php");
            }

        }
    }else{
        echo "<br/><br/><p style='width:40%; text-align:center; position:absolute;left:30%;top:30%' class='alert alert-danger'>We do not have this username and password match.<br/> 
                 or maybe You don't have an account yet,\n";
                echo "<br/><br/><a href=\"../index.php\">Back</a></p>";
        // header("location: ../index.php");
        echo mysqli_error($con);
    }

}else if(isset($_POST["addLandlord"])){
    $name = $_POST["name"];
    $uname = $_POST["uname"];
    $email = $_POST["email"];
    $password =md5($_POST["password"]);
    $tel = $_POST["tel"];
    $id =  $_SESSION["id"];

    $sql = mysqli_query($con,"INSERT INTO `user`(`id`, `username`, `name`, `email`, `password`, `contact`, `avatar`, `date_joined`, `uType`) VALUES ('','$uname','$name','$email','$password','$tel','1','$now','3') ");

    if($sql){
      $through = activityLog($id,"User3add");
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
       $through = activityLog($id,"apartmentAdd");
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
            $activity = "Password Change";

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
        $activity = "Contact Update";
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