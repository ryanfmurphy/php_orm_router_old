<?php
class MyController extends Controller {
    public static function action_test() {
        #$companies = Company::get();
        #return json_encode($companies);
        return 'yep it works';
    }
    public static function action_other() {
        return 'this 1 too';
    }
}
