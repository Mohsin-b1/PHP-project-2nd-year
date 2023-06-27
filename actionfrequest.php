<?php

include($_SERVER['DOCUMENT_ROOT'].'/cmvc_social/config.php'); 
require_once('Models/UsersDataSet.php');

 $info['id']=$_REQUEST['id'];
$info['status']=$_REQUEST['status'];
$usersDataSet = new UsersDataSet();
$usersDataRec = $usersDataSet->updateRequest($info);

  $msg = "<div class='alert alert-success'>Operation Successfully.</div>";
 header("location:myfriends.php?msg=$msg");exit;