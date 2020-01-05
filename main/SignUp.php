<?php
include ("DataBase.php");
$db = new DataBase();
$db->createUserTable();
$db->insertUser($_POST['account'], password_hash($_POST['password'], PASSWORD_BCRYPT));

http_response_code( 301 ) ;
header( "Location: ../login/" ) ;
exit;