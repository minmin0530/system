<?php
include ("../main/DataBase.php");
$db = new DataBase();
$db->createPageTable();
$db->insertPage($_POST['title'], $_POST['permalink']);
file_put_contents('../pages/'.$_POST['title'], $_POST['content']);
