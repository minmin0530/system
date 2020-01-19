<?php
include ("../main/DataBase.php");
$db = new DataBase();
$db->createPageTable();
$db->insertPage($_POST['title'], $_POST['filename'], $_POST['permalink']);
file_put_contents('../pages/'.$_POST['filename'], $_POST['content']);
