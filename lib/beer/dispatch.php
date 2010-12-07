<?php

require_once DIR_BEER.DS.'Controller.php';

$Controller = $module.'Controller';
$Action = $action.'Action';
include DIR_APP_MODULE.$Controller.'.php';
$Controller = new $Controller;
$Controller->lunch( $Action );