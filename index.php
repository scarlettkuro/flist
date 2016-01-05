<?php
require_once 'model/User.php';
require_once 'model/Userlist.php';
require_once 'lib/limonade.php';

dispatch('/', 'MainController::index');

//visitors
dispatch('/api/users', 'UserAPIController::users');
dispatch('/api/users/blacklist', 'UserAPIController::blacklist');
dispatch('/api/users/add', 'UserAPIController::add');
dispatch('/api/users/block/:id', 'UserAPIController::block');
dispatch('/api/users/unblock/:id', 'UserAPIController::unblock');

run();
?>
