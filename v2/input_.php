<?php
include('db.php');
if (isset($_POST['body'])) {
  $uploadOk = 1;
  $error="";
  if($_FILES["image"]["name"]){
    $target_dir = "uploads/jpg/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    if ($_FILES["image"]["size"] > 41943039) {
      $error .="Энэ зураг хэт өдөр хэмжээтэй байна.";
      $uploadOk = 0;
    }
    $name=$target_dir.htmlspecialchars( basename( $_FILES["image"]["name"]));
    if(@$_FILES["file"]["name"]){
      $target_dir_2 = "uploads/file/";
      $target_file_2 = $target_dir_2 . basename($_FILES["file"]["name"]);
      if ($_FILES["file"]["size"] > 41943039) {
        $error .="Энэ файл хэт өдөр хэмжээтэй байна.";
        $uploadOk = 0;
      }
      $file=$target_dir_2.htmlspecialchars( basename( $_FILES["file"]["name"]));
    }else{
      $file=null;
    }
  }else{
    $error .="Зураг заавал оруулах";
    $uploadOk = 0;
  }


  if ($uploadOk == 0) {
    $data = array(
     'success'  => false,
     'errors' => $error
    );
  } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      if($file){
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file_2)){
          $data = array(
           'success'  => false,
           'errors' => null
          );
          $title = mysqli_real_escape_string($db, $_POST['title']);
          $about = htmlentities(mysqli_real_escape_string($db, $_POST['about']));
          $body = mysqli_real_escape_string($db, $_POST['body']);
          $id =rand_number(6);
          $sql = "INSERT INTO news (id,title_en,title_mon, dis,body_en,body_mon,photo,user,time_s,file)
           VALUES ('$id','$title','$title','$about','$body','$body','$name','$user_id','$time','$file')";

          if(mysqli_query($db, $sql)){
            $data = array(
             'success'  => true,
             'errors' => null
            );
          }else{
            $data = array(
             'success'  => false,
             'errors' => $sql
            );
          }
        }else{
          $data = array(
           'success'  => false,
           'errors' => "Уучлаарай, таны файлыг байршуулахад алдаа гарлаа."
          );
        }
      }else{
        $data = array(
         'success'  => false,
         'errors' => null
        );
        $title = mysqli_real_escape_string($db, $_POST['title']);
        $about = htmlentities(mysqli_real_escape_string($db, $_POST['about']));
        $body = mysqli_real_escape_string($db, $_POST['body']);
        $id =rand_number(6);
        $sql = "INSERT INTO news (id,title_en,title_mon, dis,body_en,body_mon,photo,user,time_s,file)
         VALUES ('$id','$title','$title','$about','$body','$body','$name','$user_id','$time','$file')";

        if(mysqli_query($db, $sql)){
          $data = array(
           'success'  => true,
           'errors' => null
          );
        }else{
          $data = array(
           'success'  => false,
           'errors' => $sql
          );
        }
      }
    } else {
      $data = array(
       'success'  => false,
       'errors' => "Уучлаарай, таны файлыг байршуулахад алдаа гарлаа."
      );
    }
  }
  echo json_encode($data);
}else{
  $data = array(
   'success'  => false,
   'errors' => "Уучлаарай, таны файлыг байршуулахад алдаа гарлаа."
  );
  echo json_encode($data);
}
 ?>
