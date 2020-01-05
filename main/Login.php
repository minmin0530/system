<?php
session_start();

include ("DataBase.php");
$db = new DataBase();

if ($db->selectUser($_POST['account'], $_POST['password'])) {
    // フォームから送信されてくるユーザID
    $userId = $_POST['account'];
     
    if (!isset($_SESSION[$userId])) {
        // 初めてのユーザはセッションにユーザIDをセット
        $_SESSION[$userId] = $userId;
    }

    include ('../main/select.html');
} else {
    include ('./login.html');
    echo "間違っています";
}