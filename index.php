<?php

$params = explode('/', $_GET['url']);
session_start();

if ($params[0] == 'select') {
    if (!isset($_SESSION['acc'])) {
        include ('./main/login.html');
    } else {
        include ('./main/select.html');
    }
}

if ($params[0] == 'home') {
    if (!isset($_SESSION['acc'])) {
        include ('./main/login.html');
    } else {
        include ('./main/Admin.php');
        new Admin();
    }
}

if ($params[0] == 'reserv') {
    if (!isset($_SESSION['acc'])) {
        include ('./main/login.html');
    } else {
        include ('./main/reserv.html');
        new Admin();
    }
}


if ($params[0] == 'login') {
    include ('./main/login.html');
}

if ($params[0] == 'signup') {
    include ('./main/signup.html');
}

include ("./main/DataBase.php");
$db = new DataBase();
$db->selectPage($params[0]);
