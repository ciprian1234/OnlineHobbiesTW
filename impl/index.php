<?php
//session_destroy();
session_start();
require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'core/View.php';
require_once 'core/Model.php';
require_once 'core/Database.php';
require_once 'models/UserEntity.php';

require_once 'config.php';

$app = new App();

?>