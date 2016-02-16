<?php
# Ryan Murphy Feb 2016
# direct /api/* to its own router, everything else to WordPress

$ControllerClass = null;

require_once('util/includes.php');

$route = $ControllerClass::check_route();
if (!$route) $route = $ControllerClass::action_404();

$ControllerClass::do_route($route);

