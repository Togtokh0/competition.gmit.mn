<?php
include('db.php');
if (isset($_FILES["image"]["name"])) {
  $uploadOk=1;
  $error="";
  $target_dir = "uploads/xml/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  if ($_FILES["image"]["size"] > 41943039) {
    $error .="Энэ зураг хэт өдөр хэмжээтэй байна.";
    $uploadOk = 0;
  }
  $name=$target_dir.htmlspecialchars( basename( $_FILES["image"]["name"]));
  if(  $uploadOk==1){
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
      $sql = "INSERT INTO `upload_image` ( `url`) VALUES ('$name')";
      if(mysqli_query($db, $sql)){
        $data = array(
         'success'  => true,
         'errors' => $name
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
   $data = array(
    'success'  => false,
    'errors' =>$error
  );
 }










  echo json_encode($data);
}
 ?>
