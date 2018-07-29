<?php
//our entry into the web application

//all the requests will pass through this file


//we load the db connection config file
require_once("db.php");

//we read the product intent into two variables
//$controller and $action passed over query string
if(isset($_GET["controller"])&&isset($_GET["action"])){
$controller=$_GET["controller"];
$action=$_GET["action"];
}
else
{
//in case the product doesnt give us this values, we set them to a default controller and action
$controller="product";
$action="all";
}

//we load up our routing code, that will execute the action on the controller
require_once("routes.php");

?>