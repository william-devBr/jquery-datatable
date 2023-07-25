<?php

namespace app\classes;
use PDO;
use Exception;

 class Database {

      static $conn = null;

      private function conecta(){
             //abre conexão
           @$this->conn = new PDO(APP_MYSQL.":host=".APP_HOST.";dbname=".APP_DATABASE.";charset=utf8",APP_USER,APP_PASS,array(PDO::ATTR_PERSISTENT=>true));

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
      }
 
      private function disconecta(){
        //encerra conexão
          return $this->conn = null;
      }

      public function select($select, $data = []) {
          $select = trim($select);
          if(!preg_match("/^SELECT/i", $select)) {
              die("ERROR PROCESSING REQUEST FOR SELECT");
          }

          $this->conecta();
          $results = null;

          try{

             if(!empty($data)) {
                 $sql = $this->conn->prepare($select);
                 $sql->execute($data);
                 $results = $sql->fetchAll(PDO::FETCH_CLASS);
             }else {

                 $sql = $this->conn->prepare($select);
                 $sql->execute();
                 $results = $sql->fetchAll(PDO::FETCH_CLASS);
             }

          } catch(PDOException $e) {
             return false;
          }
          $this->disconecta();
          return $results;
      }

      public function insert($insert, $data =[]){

          $insert = trim($insert);
          if(!preg_match("/^INSERT/i", $insert)) {
              die("ERROR PROCESSING FOR INSERT");
          }

          $this->conecta();
        try{
          if(!empty($data)){

             $sql = $this->conn->prepare($insert);
             $sql->execute($data);

          } else {
            $sql = $this->conn->prepare($insert);
            $sql->execute();

          }
        } catch(PDOException $e) {
             return false;
        }

        $this->disconecta();

      }

      public function update($update, $data =[]){

         $update = trim($update);
         
         if(!preg_match("/^UPDATE/i", $update)) {
             die("ERROR PROCESSING FOR UPDATE");
         }
 
             $this->conecta();
         
         try {
            if(!empty($data)) {

                  $exec = $this->conn->prepare($update);
                  $exec->execute($data);
             
            } else {

                $exec = $this->conn->prepare($update);
                $exec->execute();
            }

                } catch (PDOException $e) {
                return false;        
                }
            $this->disconecta();
      }

      public function delete($delete, $data =[]) {
        $delete = trim($delete);
         
        if(!preg_match("/^DELETE/i", $delete)) {
            die("ERROR PROCESSING FOR DELETE");
        }

            $this->conecta();
        
        try {
           if(!empty($data)) {

                 $exec = $this->conn->prepare($delete);
                 $exec->execute($data);
            
           } else {

               $exec = $this->conn->prepare($update);
               $exec->execute();
           }

               } catch (PDOException $e) {
               return false;        
               }
           $this->disconecta();
      }
 }