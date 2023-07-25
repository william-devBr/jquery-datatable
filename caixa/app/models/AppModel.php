<?php
namespace app\models;
use app\classes\Database;

class AppModel {
    
    static public function novo_lancamento($data){

        $params = [
            ':tipo' => $data['tipo'],
            ':valor'=>  $data['valor'],
            ':descricao' => $data['descricao']
        ];
        $db = new Database();
        try{

        $db->insert("
        INSERT INTO lancamentos 
        VALUES (0,:tipo,:valor,:descricao,NOW(),NOW()) ",
         $params); 
         return true;
        } catch(PDOException $e) {
             return false;
        }
    }

    static public function lista_lancamentos(){

        $db = new Database();

        return $db->select("SELECT * FROM lancamentos ORDER BY id DESC");
    }

    static public function load_page(){

        $db = new Database();

        return $db->select("SELECT tipo,valor FROM lancamentos");
    }
}