<?php
/**
 * Created by PhpStorm.
 * User: donic
 * Date: 6/3/2016
 * Time: 5:04 PM
 */
class Logout extends Controller {

    function __construct(){
        parent::__construct();
        //echo 'login controller <br>';
    }

    public function index(){
        $this->view->render('logout/logout');
    }
}