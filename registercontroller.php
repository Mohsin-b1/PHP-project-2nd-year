<?php 
//require_once($_SERVER['DOCUMENT_ROOT']."/webdev/cmvc_social/config.php");
require_once($_SERVER['DOCUMENT_ROOT']."/cmvc_social/config.php");
require_once(SERVER_PATH. "/Models/UsersDataSet.php");
//var_dump($_SESSION);
function upload_image( $imageSource, $imageName, $Img = "img_" ){
	
    $Extension   = strtolower(substr($imageName, strrpos($imageName, ".") + 1));

    $newFileName = uniqid($Img) . "." . $Extension;
 

    $newFileName = SERVER_PATH. "/images/" . $newFileName;
	
    if (@copy($imageSource, $newFileName)) {

        return basename($newFileName);

    } else {
			
        return -1;

    }
}

$msg='';
// Checks if login button has been pressed
if (isset($_POST["register"])) { 
	$model = new UsersDataSet();
	
	array_walk_recursive($_REQUEST, function(&$item, $key) {
		$item = addslashes($item);
	});
	 
	$infoUser = $_REQUEST;
  if (requiredUser($_REQUEST, $msg) == 1) {
	
			if ( validateUser($_REQUEST, $msg) == 1) { 
				
				
				$img  = upload_image($_FILES['ProfileImage']['tmp_name'] , $_FILES['ProfileImage']['name']);
				
				if($img!=-1){ 
					$infoUser['ProfileImage']=$img;
				}
				 else{$infoUser['ProfileImage']='';}
				$model = new UsersDataSet();
 				$infoUser['Password'] 	=md5($infoUser['Password']);
				
				$id = $model->register($infoUser);

				 if($id>0){
					 $msg  = '<div class="alert alert-success">Registration successfull.</div>';
					 header("location:register.php?msg=$msg");exit;
				 }
				
				
			}
			else{
				$redirect_url ="location:register.php?msg=$msg";
				foreach($infoUser as $key=>$value)
				$redirect_url.="&$key=$value";
				header("$redirect_url");
				exit;
			}

			
		}else{
			$redirect_url ="location:register.php?msg=$msg";
			foreach($infoUser as $key=>$value)
			$redirect_url.="&$key=$value";
			
			header("$redirect_url");
			exit;
			}
			

			if ($id > 0) {

			 

				$redirect_url ="location:register.php?msg=$msg";
				foreach($infoUser as $key=>$value)
				$redirect_url.="&$key=$value";
				header("$redirect_url");

				exit;

			} 
}
else // could do relevant user advice based on if username meets syntax, or if password does
{
	echo "Error in username and password";
}


function validateUser($info, &$msg)

    {

        $user   = $info;

 
        extract($user);

 
        

        $model = new UsersDataSet();

        

        $user = $model->getUserByUserName($Username);

     

        if ($user && !empty($user)) {   

            $msg = "<div class='alert alert-danger'>The user name you entered is already in use or invalid. Please enter another user name.</div>";

            return -1;

        }

        

        $user = $model->getUserByEmail($EmailAddress);

        

        if ($user && !empty($user)) {

            $msg = "<div class='alert alert-danger'>The email address you entered is already in use or invalid. Please enter another email address.</div>";

            return -1;

        }

        return 1;

    }

function requiredUser($info, &$msg){

        $user   = $info;
        extract($user);

            if (empty($Username)) {

                $msg = "<div class='alert alert-danger'>User Name is required!</div> ";

                return -1;

            }
            

            if (empty($EmailAddress)) {

                $msg = "<div class='alert alert-danger'>Email is required! </div>";

                return -1;

            }

			if (empty($Firstname)) {
	
				$msg = "  <div class='alert alert-danger'>First Name is required!</div> ";
	
				return -1;
	
			}


        if (empty($Password)) {

             

                $msg = "<div class='alert alert-danger'>Password is required! </div>";

                return -1;

           

        }

        return 1;

    }

    
