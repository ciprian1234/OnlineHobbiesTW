<?php
/**
 * Created by PhpStorm.
 * User: donic
 * Date: 6/3/2016
 * Time: 5:03 PM
 */
session_destroy();
//header("Location: {$_SERVER['HTTP_REFERER']}");
header("Location:".URL."home/index");
?>