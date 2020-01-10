<?php
include ("./DataBase.php");
$db = new DataBase();
$db->createReservTable();
$db->insertReserv($_POST['name'], $_POST['date'], $_POST['email'], $_POST['tel']);
echo $_POST['name']."様で、".$_POST['date']."で御予約いただきました。";
echo "連絡先：".$_POST['email']." ".$_POST['tel'];

