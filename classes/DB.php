<?php

//DataBase
class DB{
  private static $_instance = null;
     private $_pdo,
             $_query,
             $_error = false,
             $_results,
             $_count = 0;

     private function __construct() {
         try {
             $this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
         } catch(PDOException $e) {
             die($e->getMessage());
         }
     }


     public static function getInstance() {
         if(!isset(self::$_instance)) {
             self::$_instance = new DB();
         }
         return self::$_instance;
     }

     public function query($sql){
       $prep = $this->_pdo->prepare($sql);
       $prep->execute();

       return $prep->fetchAll(PDO::FETCH_OBJ);
     }



}

?>
