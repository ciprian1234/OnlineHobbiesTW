<?php
/**
 * Created by PhpStorm.
 * User: donic
 * Date: 6/3/2016
 * Time: 2:09 PM
 */

class Article extends Controller {

    function __construct(){
        parent::__construct();
        //echo 'error controller <br>';
    }

    public function index(){
        $this->view->render('article/article_template');
    }
}