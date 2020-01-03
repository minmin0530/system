<?php

$params = explode('/', $_GET['url']);

if ($params[0] == 'home') {
    include ('./main/Admin.php');
    new Admin();
}

$pdo = null;
try {
 
    // データベースに接続
    $pdo = new PDO(
        'mysql:dbname=ar7;host=localhost;charset=utf8',
        'root',
        'root',
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    );
 
} catch (PDOException $e) {
 
    /* エラー時は、とりあえず、エラーメッセージを表示 */
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e->getMessage());
}

$stmt = $pdo->query("SELECT * FROM page_tbl");// ORDER BY no ASC");
while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    if ($params[0] == $row["permalink"]) {
        include ('./pages/'. $row["name"]);

    }
}