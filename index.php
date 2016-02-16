<?php
# Ryan Murphy Feb 2016
# direct /api/* to its own router, everything else to WordPress

$ControllerClass = null;

/*
function snake_case2CapCase($strn) {
    $words = str_replace('_', ' ', $strn);
    return str_replace(' ', '', ucwords($words));
}
*/

foreach (glob('classes/*.php') as $class_file) {
    include($class_file);
}

foreach (glob('controllers/*.php') as $controller_file) {
    if (!$ControllerClass) {
        #$controller_name = basename($controller_file, '.php');
        #$ControllerClass = snake_case2CapCase($controller_name);
        $ControllerClass = basename($controller_file, '.php');
    }
    include($controller_file);
}
if (!$ControllerClass) {
    $ControllerClass = 'Controller';
}

foreach (glob('models/*.php') as $model_file) {
    include($model_file);
}

$route = $ControllerClass::check_route();
if (!$route) $route = $ControllerClass::action_404();

$ControllerClass::do_route($route);

