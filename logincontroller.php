<?php


//var_dump($_SESSION);
//include($_SERVER['DOCUMENT_ROOT'].'/webdev/cmvc_social/config.php'); 
include($_SERVER['DOCUMENT_ROOT'].'/cmvc_social/config.php'); 

require_once(SERVER_PATH."Models/UsersDataSet.php");
$model = new UsersDataSet();

// Checks if login button has been pressed
if (isset($_POST["loginbutton"])) {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
  //  echo $username;
   // echo $password." remove these after, only for debugging";

    if ($user_rec = $model->validateLogin($username , $password)) {
       //print_r($user_rec);	exit;
		$_SESSION = $user_rec;
       //$msg= "<div class='alert alert-success'>Welcome ".$username." You are logged in</div>";  // Change for unique message
        $_SESSION["login"] = $username;
    }
    else // could do relevant user advice based on if username meets syntax, or if password does
    {
       $msg= "<div class='alert alert-danger'>Error in username and password</div>";
    }
	header("location:index.php?msg=$msg");exit;
}

if (isset($_POST["logoutbutton"]))
{
     $msg = "<div class='alert alert-success'>Logged Out Successfully.</div>";
	 foreach($_SESSION as $key=>$value){
   		unset($_SESSION[$key]);
	 }
    session_destroy();
	header("location:index.php?msg=$msg");exit;
}
