<?php


require_once('Models/UsersDataSet.php');

$view = new stdClass();
$view->pageTitle = 'My Profile';
 
require_once('Views/myProfile.phtml');
