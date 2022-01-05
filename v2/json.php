<?php include('db.php') ?>
<?php
	if (isset($_POST['g-recaptcha-response'])) {
		$data=[];
    $secret_key = '6LfqLuEZAAAAABUQ22qlA7d-V4xB9LBZrb1Hl2z6';

    $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);

    $response_data = json_decode($response);
		if($_POST['type']==='login'){
			$email = e($_POST['email']);

	    $password = e($_POST['password']);

	    $password = md5($password);

	    $email_cheke = mysqli_query($db, "SELECT * FROM users WHERE user_email='$email'  LIMIT 1");

	    if(!$response_data->success){
	      $captcha_error = "Captcha баталгаажуулалт амжилтгүй болсон";
	    }else{
	      $captcha_error = true;
	    }
	    if (@mysqli_num_rows($email_cheke) == 1){
	      $email_error= true;
	      $pass_cheke = mysqli_query($db, "SELECT * FROM users WHERE user_email='$email' AND user_pass='$password' LIMIT 1");
	      if (@mysqli_num_rows($pass_cheke) == 1){
	        $pass_error=true;
	      }else{
	        $pass_error="Нууц үг буруу";
	      }
	    }else{
	      $email_error = "И-мэйл бүртгэгдээгүй байна";
	      $pass_error = "Нууц үг буруу";
	    }
	    $errors = array(
	     'email'  => $email_error,
	     'pass'  => $pass_error,
	     'captcha'  => $captcha_error,
	    );
	    if($email_error === true && $pass_error === true && $captcha_error === true){
	      $logged_in_user = mysqli_fetch_assoc($pass_cheke);
	      $_SESSION['user_data'] = $logged_in_user;
	      $success =true;
	    }else {
	      $success =false;
	    }
	    $data = array(
	     'success'  => $success,
	     'errors'   => $errors,
	    );
		}
		if($_POST['type']==='reg'){
			if(!$response_data->success){
	      $captcha_error = "Captcha баталгаажуулалт амжилтгүй болсон";
	    }else{
	      $captcha_error = true;
	    }
			 $email = $_POST['email'];
			$email_cheke = mysqli_query($db, "SELECT * FROM users WHERE user_email='$email'  LIMIT 1");
			if (mysqli_num_rows($email_cheke) == 1){
				$email_error = "И-мэйл бүртгэлтэй байна";
				$success =false;
			}else{
					$email_error =true;
					if($captcha_error){
							$username = $_POST['username'];
							$password_1 =$_POST['password'];
							$phone = $_POST['phone'];
							$user_web = $_POST['user_web'];
							$address = $_POST['address'];
							$user_type = $_POST['user_type'];
							$role_type = $_POST['role_type'];
					  	$password = md5($password_1);
							function user_id_rand($length = 10) {
									return substr(str_shuffle(str_repeat($x='0123456789', ceil($length/strlen($x)) )),1,$length);
							}
							$user_id = user_id_rand();
							$query = "INSERT INTO users (user_id,user_name, user_email, user_pass,user_phone,user_web,user_address,user_role,user_type,acc_type,role_type,cr_date,role_up_date)
							VALUES ('$user_id','$username', '$email', '$password',  '$phone', '$user_web', '$address','user', '$user_type', '1', '$role_type', '$time', '$time')";
							mysqli_query($db, $query);
							$success =true;
					}else{
						$success =false;
					}
			}
			$errors = array(
	     'email'  => $email_error,
	     'captcha'  => $captcha_error,
	    );
			$data = array(
	     'success'  => $success,
	     'errors'   => $errors,
	    );
		}
   echo json_encode($data);
	}

  function e($val){
    global $db;
    return mysqli_real_escape_string($db, trim($val));
  }

?>
