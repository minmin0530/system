<?php

class Admin {
    function __construct() {
/*
        echo '<script>function visible(i){';
        echo ' if (document.getElementsByClassName("button")[i].innerHTML == "閉じる") {';
        echo 'document.getElementsByClassName("hidden")[i].style.display = "none";';
        echo 'document.getElementsByClassName("button")[i].innerHTML = "編集";} ';
        echo 'else {';
        echo 'document.getElementsByClassName("hidden")[i].style.display="block";';
        echo 'document.getElementsByClassName("button")[i].innerHTML = "閉じる";';
        echo '}';
        echo '}</script>';
        $path = $_SERVER['DOCUMENT_ROOT'];
        $dirs = scandir($path);
        $i = 0;
        foreach ($dirs as $dir) {
            if ($dir == '.' || $dir == '..') { continue; }
            echo '<div style="width:300px;"><span style="margin-left:100px; " >'.$dir.'</span><button class="button" style="float: right;" onclick="visible('.$i.');">編集</button></div><span class="hidden" style="display:none; margin-left:100px;" >';
            if (is_dir($dir)) {
                $dirs2 = scandir($path.'/'.$dir);
                foreach ($dirs2 as $dir2) {
                    if ($dir2 == '.' || $dir2 == '..') { continue; }
                    echo $dir.'/'.$dir2.'<a href="#">編集</a></br>';
                }
            }
            echo '</span>';
            $i += 1;
        }
*/
        // echo "<h1>管理画面</h1>";
        // echo "<h2>記事作成</h2>";
 
//        include('./admin/editor.html');
//        include('./admin/createDirectory.html');
//        include('./admin/rename.html');       
        include('./admin/permalink.html');
    }
}