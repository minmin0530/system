<?php
class HTML {
    private $db;
    function __construct() {
        include ("./main/DataBase.php");
        $this->db = new DataBase();
        $this->db->createPageTable();        
    }
    
    function head($page) {
        echo "<!Doctype html>";
        echo "<html>";
        echo "<head>";
        echo "<title>";
        echo $this->db->selectTitle( $page );
        echo "</title>";
        echo "<meta charset='utf-8'>";
        echo "</head>";
        echo "<body>";
    }

    function header($sitename) {
        echo "<header>";
        echo "<h1>";
        echo $sitename;
        echo "</h1>";
        echo "</header>";
    }

    function article($page) {
        echo "<article>";
        $this->db->selectPage( $page );
        echo "</article>";
    }

    function footer($copyright) {
        echo "<footer>";
        echo $copyright;
        echo "</footer>";
    }
}