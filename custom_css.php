<?php


// This file outputs custom css for group, if defined.

require_once('initialize.php');

header("Content-type: text/css; charset: UTF-8");
echo $user->getCustomCss();
