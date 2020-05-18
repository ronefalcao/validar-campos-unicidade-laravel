# validacaolaravel

Ola pessoal,
Este Projeto é para ajudar as pessoas que busca aplicar uma validação em dados com varios campos de unicidade.

   
        
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
    
