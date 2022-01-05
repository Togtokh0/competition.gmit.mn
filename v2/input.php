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

      $file=null;

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
          $amount = htmlentities(mysqli_real_escape_string($db, $_POST['amount']));
          $ex_date = mysqli_real_escape_string($db, $_POST['ex_date']);
          $about = htmlentities(mysqli_real_escape_string($db, $_POST['about']));
          $body = mysqli_real_escape_string($db, $_POST['body']);
          $huree = mysqli_real_escape_string($db, $_POST['huree']);
          $nohtsol = mysqli_real_escape_string($db, $_POST['nohtsol']);
          $id =rand_number(6);
          $sql = "INSERT INTO problems (id,name ,dis ,amount ,upload_date ,ex_date ,body,user_id,photo,huree,nohtsol,file) VALUES ('$id','$title','$about','$amount','$time','$ex_date','$body','$user_id','$name','$huree','$nohtsol','$file')";


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
        $amount = htmlentities(mysqli_real_escape_string($db, $_POST['amount']));
        $ex_date = mysqli_real_escape_string($db, $_POST['ex_date']);
        $about = htmlentities(mysqli_real_escape_string($db, $_POST['about']));
        $body = mysqli_real_escape_string($db, $_POST['body']);
        $huree = mysqli_real_escape_string($db, $_POST['huree']);
        $nohtsol = mysqli_real_escape_string($db, $_POST['nohtsol']);
        $id =rand_number(6);
        $sql = "INSERT INTO problems (id,name ,dis ,amount ,upload_date ,ex_date ,body,user_id,photo,huree,nohtsol,file) VALUES ('$id','$title','$about','$amount','$time','$ex_date','$body','$user_id','$name','$huree','$nohtsol','$file')";
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
              $sql_ = "INSERT INTO file (file_name, url,user_id, problem_id) VALUES ('$file_name', '$file','$user_id','$id')";
              mysqli_query($db, $sql_);

            }

          }
        }

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
