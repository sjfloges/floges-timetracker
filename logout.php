<?php


require_once('initialize.php');
$auth->doLogout();
session_unset();

header('Location: login.php');
