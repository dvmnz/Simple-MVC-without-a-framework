<?php

//the function for calling the actions on the controller
function call($controller,$action){

  //first we load the php file, with the correct controller and model
require_once("controller/$controller.php");
require_once("model/$controller.php");

//we call the action function on the controller
$controller=new $controller;
$controller->{$action}();
}


//an array, for the allowed controllers and their respective actions
$controllers = array('product' => ['all','showAll','add','delete'],
                        'comment' => ['all','showAll','allFromUser','delete','add']);


  //we check, if the invoked action is part of our mvc code
  //without this check, a malicous product, could execute arbitrary code
  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('errorController', 'error');
    }
  } else {
    call('errorController', 'error');
  }



?>