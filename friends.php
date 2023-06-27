<?php


require_once('Models/UsersDataSet.php');

$view = new stdClass();
$view->pageTitle = 'All Users';
//var_dump($_POST);


$usersDataSet = new UsersDataSet();
$view->usersDataSet = $usersDataSet->getAllUsers();


require_once("logincontroller.php");
require_once('Views/friends.phtml');
