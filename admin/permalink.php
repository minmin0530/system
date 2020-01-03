<?php

      $permalink = $_POST['permalink'];
      $name = $_POST['title'];



      $content = $_POST['content'];

 //       mkdir('memo');
        // include('./admin/editor.html');
        file_put_contents('../pages/'.$name, $content);

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
    echo "success connecting DB";
    echo "000";
 
} catch (PDOException $e) {
 
    /* エラー時は、とりあえず、エラーメッセージを表示 */
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e->getMessage());
}

$sql = "CREATE TABLE IF NOT EXISTS `page_tbl`"
."("
. "`id` INT auto_increment primary key,"
. "`name` TEXT,"
. "`permalink` TEXT"
.");";

$stmt = $pdo -> prepare($sql);
$stmt -> execute();

$stmt = $pdo -> prepare("INSERT INTO page_tbl (permalink, name) VALUES (:permalink, :name)");
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':permalink', $permalink, PDO::PARAM_STR);

$stmt->execute();
$stmt = $pdo->query("SELECT * FROM page_tbl");// ORDER BY no ASC");
while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    $name = $row["name"];
    $permalink = $row["permalink"];
echo<<<EOF
<div>
ファイル名{$name} パーマリンク{$permalink}です
</div>
EOF;
}