<?php
include('db.php');
if (isset($_POST['profile_avatar_remove'])) {
  $number = $_POST['number'];
  $link= $_POST['link'];
  $address = $_POST['address'];
  $uploadOk = 1;
  $error="";
  if($_FILES["profile_avatar"]["name"]){
    $target_dir = "uploads/jpg/";
    $target_file = $target_dir . basename($_FILES["profile_avatar"]["name"]);
    if ($_FILES["profile_avatar"]["size"] > 41943039) {
      $error .="Энэ зураг хэт өдөр хэмжээтэй байна.";
      $uploadOk = 0;
    }
    $name=$target_dir.htmlspecialchars( basename( $_FILES["profile_avatar"]["name"]));
    if(move_uploaded_file($_FILES["profile_avatar"]["tmp_name"], $target_file)){
      $sql = "UPDATE `users` SET `user_address` = '$address',`user_phone` = '$number',`user_web` = '$link',`photo` = '$name' WHERE `users`.`user_id` = '$user_id'; ";


      if(mysqli_query($db, $sql)){
        $_SESSION['user_data']['user_address']=$address;
          $_SESSION['user_data']['user_phone']=$number;
            $_SESSION['user_data']['user_web']=$link;
              $_SESSION['user_data']['photo']=$name;
        $data = array(
         'success'  => true,
         'errors' => null
        );
      }else{
        $data = array(
         'success'  => false,
         'errors' =>  "database error"
       );
      }

   }else{
     $data = array(
      'success'  => false,
      'errors' => "Хуулахд алдаа гарлаа"
    );
   }
  }else{
    $sql = "UPDATE `users` SET `user_address` = '$address',`user_phone` = '$number',`user_web` = '$link' WHERE `users`.`user_id` = '$user_id'; ";


    if(mysqli_query($db, $sql)){
      $_SESSION['user_data']['user_address']=$address;
        $_SESSION['user_data']['user_phone']=$number;
          $_SESSION['user_data']['user_web']=$link;
      $data = array(
       'success'  => true,
       'errors' => null
      );
    }else{
      $data = array(
       'success'  => false,
       'errors' =>  "database error"
     );
    }
  }
  echo json_encode($data);
}
 ?>
