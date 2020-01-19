<?php
class DataBase {
    private $pdo = null;
    function __construct() {
        try {
            // データベースに接続
            $this->pdo = new PDO(
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
    }

    public function createPageTable() {
        $sql = "CREATE TABLE IF NOT EXISTS `page_tbl`"
        ."("
        . "`id` INT auto_increment primary key,"
        . "`title` TEXT,"
        . "`filename` TEXT,"
        . "`permalink` TEXT"
        .");";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }

    public function createUserTable() {
        $sql = "CREATE TABLE IF NOT EXISTS `user_tbl`"
        ."("
        . "`id` INT auto_increment primary key,"
        . "`name` TEXT,"
        . "`password` TEXT"
        .");";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }

    public function createReservTable() {
        $sql = "CREATE TABLE IF NOT EXISTS `reserv_tbl`"
        ."("
        . "`id` INT auto_increment primary key,"
        . "`name` TEXT,"
        . "`date` DATE,"
        . "`tel` TEXT,"
        . "`email` TEXT"
        .");";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }


    public function insertPage($title, $filename1, $permalink) {
        $stmt = $this->pdo->prepare("INSERT INTO page_tbl (permalink, filename1, title) VALUES (:permalink, :filename1, :title)");
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':filename1', $filename1, PDO::PARAM_STR);
        $stmt->bindParam(':permalink', $permalink, PDO::PARAM_STR);
        
        $stmt->execute();
    }

    public function insertUser($name, $password) {
        $stmt = $this->pdo->prepare("INSERT INTO user_tbl (password, name) VALUES (:password, :name)");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        
        $stmt->execute();
    }

    public function insertReserv($name, $date, $email, $tel) {
        $stmt = $this->pdo->prepare("INSERT INTO reserv_tbl (tel, email, date, name) VALUES (:tel, :email, :date, :name)");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        
        $stmt->execute();
    }

    public function selectTitle($page) {
        $stmt = $this->pdo->query("SELECT * FROM page_tbl");
        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
            if ($page == $row["permalink"]) {
                return $row["title"];
            }
        }        
    }

    public function selectPage($page) {
        $stmt = $this->pdo->query("SELECT * FROM page_tbl");
        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
            if ($page == $row["permalink"]) {
                include ('./pages/'. $row["filename"]);        
            }
        }        
    }

    public function selectUser($account, $password) {
        $stmt = $this->pdo->query("SELECT * FROM user_tbl WHERE name = '".$account."'");
        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($password, $row["password"])) {
                return true;
            }
        }
        return false;
    }

    public function selectReserv() {
        $stmt = $this->pdo->query("SELECT * FROM reserv_tbl ORDER BY date");
        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
            echo $row["name"]." ".$row["date"]." ".$row["tel"]." ".$row["email"]."<br>";
        }
    }

}