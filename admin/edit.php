<?php

      $title = $_POST['title'];



      $content = $_POST['content'];

 //       mkdir('memo');
        include('./admin/editor.html');
        file_put_contents($title, $content);
