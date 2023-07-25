<?php

namespace app\controllers;
use app\classes\Functions;
use app\models\AppModel;

class App {

     public static function index() {

        $lancamento = new AppModel();
        $results = $lancamento->lista_lancamentos();
        $load_page = $lancamento->load_page();
         
         
        $entradas = 0;
        $saidas = 0;
        $caixa = 0;

        foreach($load_page as $total) {

              if($total->tipo == 'entrada'){
                  $entradas += $total->valor;
              }elseif ($total->tipo == 'saida') {
                  $saidas += $total->valor;
              }
              
        }
        $caixa = $entradas - $saidas;
        $data = [
            'entradas' => $entradas,
            'saidas'=> $saidas,
            'caixa'=> $caixa,
            'lancamentos' => $results];
        

        Functions::view([
            "includes/html_header",
            "includes/header",
            "home",
            "includes/footer",
            "includes/html_footer"
        ],$data);
    }

    public function lancamento(){

        $data = json_decode(file_get_contents("php://input"), true);
        
        $arr = [
            'valor' =>  trim($data['valor']),
            'tipo' => $data['tipo'],
            'descricao' => trim($data['descricao'])
        ];
     
        if(AppModel::novo_lancamento($arr)) {
            echo json_encode(array("status"=>200));
        }else {
            echo json_encode(array("status"=>500));
        }

    }

}