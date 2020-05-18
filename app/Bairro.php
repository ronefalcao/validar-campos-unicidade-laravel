<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Bairro extends Model
{
    protected $table = "bairros";
    protected $primaryKey = "bairro_id";
    protected $fillable = [
        'bairro_nome',
        'cidade_id',
    ];


    public function validacao($data){
        
        $inscricao = $data['bairro_nome'];
        $cidade_id = isset($data['cidade_id']) ? $data['cidade_id'] : 0;
        $regras = [
            'bairro_nome' => ['required', Rule::unique($this->table, 'bairro_nome')
                ->where(function ($query) use ($inscricao, $cidade_id) {
                    $query->where('bairro_nome', $inscricao);
                    $query->where('cidade_id', $cidade_id);
                })],
            'cidade_id' => 'required',
             
        ];
        $mensagens = [
            'bairro_nome.required' => 'Bairro é obrigatório!',
            'bairro_nome.unique' => 'Bairro ja esta cadastrado!',
            'cidade_id.required' => 'Cidade é obrigatório!',
            

        ];
        return Validator::make($data, $regras, $mensagens);
    }

    public function validacaoUpdate($data, $id)
    {
        $inscricao = $data['bairro_nome'];
        $cidade_id = isset($data['cidade_id']) ? $data['cidade_id'] : 0;

        $regras = [
            'bairro_nome' => ['required', Rule::unique($this->table, 'bairro_nome')
                ->where(function ($query) use ($inscricao, $cidade_id) {
                    $query->where('bairro_nome', $inscricao);
                    $query->where('cidade_id', $cidade_id);
                })->ignore($id, 'bairro_id')],
            'cidade_id' => 'required',
             
        ];
        $mensagens = [
            'bairro_nome.required' => 'Bairro é obrigatório!',
            'bairro_nome.unique' => 'Bairro ja esta cadastrado!',
            'cidade_id.required' => 'Cidade é obrigatório!',
            

        ];
        return Validator::make($data, $regras, $mensagens);
    }

}
