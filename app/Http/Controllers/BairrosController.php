<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bairro;
class BairrosController extends Controller
{

    public function __construct()
    {
        $this->bairros = new Bairro();
  

    }
         

    public function store(Request $request){

         $validacao = $this->bairros->validacao($request->all(), 0);
        if ($validacao->fails()) {

            $lista = $validacao->errors();
            return  response()->json($lista);

        }

        try{

           $bairros =  $this->bairros->create($request->all());
           return  response()->json($bairros);

        } catch(Exception $e) {
 
            $erro = $e->getMessage();
            return  response()->json($erro);

        }
         
    }

    public function update(Request $request, $bairro_id){

        $validacao = $this->bairros->validacao($request->all(), $bairro_id);
       if ($validacao->fails()) {

           $lista = $validacao->errors();
           return  response()->json($lista);

       }

       try{

          $bairros =  $this->bairros->find($bairro_id);
          $bairros->update($request->all());
          return  response()->json($bairros);

       } catch(Exception $e) {

           $erro = $e->getMessage();
           return  response()->json($erro);

       }
        
   }
}
