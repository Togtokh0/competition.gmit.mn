<?php
include('db.php');
  $db -> set_charset("utf8");
$error='';
if(isset($_POST['in_user_id'])){
  $data = array(
   'success'  => false,
   'errors' =>$error
  );

    $id_s=$_POST['id'];
      $file='null';


    $bio = $file;
    $body = $_POST['body'];
    $in_user_id = $_POST['in_user_id'];
    $rand__=rand_number(6);
      $sql = "INSERT INTO res (id, pro_id,user_id, file,body, in_date,in_user_id) VALUES ('$rand__', '$id_s','$user_id','$bio','$body','$time_short','$in_user_id')";
      mysqli_query($db, $sql);
      $data = array(
       'success'  => true,
       'errors' =>$error
      );
  for ($i=1; $i <=$_POST['count_files'] ; $i++) {
    if(@$_FILES["file_".$i]["name"]){
      $target_dir = "uploads/file/";
      $target_file = $target_dir . basename($_FILES["file_".$i]["name"]);
      if ($_FILES["file_".$i]["size"] > 41943039) {
        $error .="Энэ файл хэт өдөр хэмжээтэй байна.";
        $uploadOk = 0;
      }else{
        $file=$target_dir.htmlspecialchars( basename( $_FILES["file_".$i]["name"]));
        move_uploaded_file($_FILES["file_".$i]["tmp_name"], $target_file);
        $file_name=	$_POST['title_'.$i];
        $user_id=	$_POST['in_user_id'];
        $pro_id=$_POST['id'];
        $sql = "INSERT INTO file (file_name, url,user_id, problem_id) VALUES ('$file_name', '$file','$user_id','$rand__')";
        mysqli_query($db, $sql);

      }

    }
  }
  echo json_encode($data);
}

 ?>
