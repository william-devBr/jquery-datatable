<?php

namespace app\classes;

class Functions {

     public static function view($view, $data = null){

             if(!is_array($view)) {
                  throw new Exception("Erros processing view", 1);
             }
             if(!empty($data) && is_array($data)){
                  extract($data);
             }

             foreach($view as $file){

                 include("../app/views/".$file.".php");
             }
     }
}