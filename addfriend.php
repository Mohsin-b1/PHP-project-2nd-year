<?php

include($_SERVER['DOCUMENT_ROOT'].'/cmvc_social/config.php'); 
require_once('Models/UsersDataSet.php');
$info['request_to']=$_REQUEST['request_to'];
$info['request_by']=$_SESSION['UserID'];
 $info['status']='Requested';
$usersDataSet = new UsersDataSet();
$usersDataRec = $usersDataSet->addRequest($info);

  $msg = "<div class='alert alert-success'>Operation Successfully.</div>";
 header("location:myfriends.php?msg=$msg");exit;