<?php

include($_SERVER['DOCUMENT_ROOT'].'/cmvc_social/config.php'); 
require_once('Models/UsersDataSet.php');

$view = new stdClass();
$view->pageTitle = 'Friends';
//var_dump($_POST);
 
$usersDataSet = new UsersDataSet();
$usersDataRec = $usersDataSet->getFriends($_SESSION['UserID']);


require_once("logincontroller.php");
require_once('Views/myfriends.phtml');
