<?php
include('../db.php');
$data = array(
 'success'  => false,
 'errors' => "no_id"
);
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $sql = "DELETE FROM `news` WHERE `news`.`id` = '$id'";
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
echo json_encode($data);
 ?>
