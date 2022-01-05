<?php
  session_start();
  require_once 'api/autoload.php';
	$facebook = new \Facebook\Facebook([
		'app_id'      => '467598577547586',
		'app_secret'     => '6031c337ef22d94a6cf4dfc55975a27b',
		'default_graph_version'  => 'v8.0'
	]);
  function rand_number($length) {
      return substr(str_shuffle(str_repeat($x='0123456789', ceil($length/strlen($x)) )),1,$length);
  }
function mail_v1($to,$subject,$msg){


}
$db = mysqli_connect("localhost", "admin", "admin_pass", "Industry_Platform");
$db -> set_charset("utf8");
@$user_id=$_SESSION['user_data']['user_id'];
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; date_default_timezone_set("Asia/Ulaanbaatar");
$time=(new DateTime())->format("Y-m-d G:i:s");
$time_short=(new DateTime())->format("Y-m-d");
$host_url="competition.gmit.mn/v2/";
$domain="competition.gmit.mn";
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user']);
  header('location: '.$host_url);
}
$head_form ="
<script async src=\"https://www.googletagmanager.com/gtag/js?id=G-2HK8GSNM63\"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-2HK8GSNM63');
</script>";
$page_fb ='<div class="fb-page" data-href="https://www.facebook.com/gmit.edu" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" ><blockquote cite="https://www.facebook.com/gmit.edu" class="fb-xfbml-parse-ignore" ><a href="https://www.facebook.com/gmit.edu">German Mongolian Institute for Resources and Technology - GMIT</a></blockquote></div>
';
//fb
$facebook_output = '';
$facebook_helper = $facebook->getRedirectLoginHelper();
$facebook_permissions = ['email'];
$facebook_login_url_l = $facebook_helper->getLoginUrl($host_url.'login.php', $facebook_permissions);
$facebook_login_url = $facebook_helper->getLoginUrl($host_url.'profile.php', $facebook_permissions);
$title = array('mon_name' =>'Үйлдвэртэй хамтын ажиллагааны платформ' ,'en_name'=>'Industry Platform' );
function pro_id_get($id){
  Global $db;
  $record = mysqli_query($db, "SELECT * FROM problems WHERE id='$id'");
    while ($row = mysqli_fetch_array($record )) {
      return $row;
      }
}
function user_id_get($id){
  Global $db;
  $record = mysqli_query($db, "SELECT * FROM users WHERE user_id='$id'");
    while ($row = mysqli_fetch_array($record )) {
      return $row;
      }
}
 ?>
