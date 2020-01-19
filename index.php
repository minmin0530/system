<?php

$params = explode('/', $_GET['url']);
session_start();

if ($params[0] == '') {
    include ('./main/index.html');
    exit;
}

if ($params[0] == 'select') {
    if (!isset($_SESSION['account'])) {
        include ('./main/login.html');
    } else {
        include ('./main/select.html');
    }
    exit;
}

if ($params[0] == 'home') {
    if (!isset($_SESSION['account'])) {
        include ('./main/login.html');
    } else {
        include ('./main/Admin.php');
        new Admin();
    }
    exit;
}

if ($params[0] == 'reserv') {
    if (!isset($_SESSION['account'])) {
        include ('./main/login.html');
    } else {
        include ('./main/reserv.html');
        new Admin();
    }
    exit;
}

if ($params[0] == 'reservlist') {
    include ('./main/ReservList.php');
    exit;
}


if ($params[0] == 'login') {
    include ('./main/login.html');
    exit;
}

if ($params[0] == 'signup') {
    include ('./main/signup.html');
    exit;
}


include ("./admin/HTML.php");
$html = new HTML();
$html->head( $params[0] );
$html->header( "SiteName" );
$html->article( $params[0] );
$html->footer( "copyright sitename." );
