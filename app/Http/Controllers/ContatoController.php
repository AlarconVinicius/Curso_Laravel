<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) 
    {
        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }
    public function salvar(Request $request) 
    {
        
        //realizar a validação dos dados do formulário recebidos no requerimento
        $regras = 
            [
                'nome' => 'required|min:3|max:40|unique:site_contatos',
                'telefone' => 'required',
                'email' => 'email',
                'motivo_contatos_id' => 'required',
                'mensagem' => 'required|max:2000'
            ];

        $feedback = 
            [
                'nome.required' => 'O campo nome precisa ser preenchido.',
                'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres.',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres.',
                'nome.unique' => 'O nome informado ja está em uso.',

                'telefone.required' => 'O telefone precisa ser preenchido.',
                
                'email.email' => 'O email informado não é válido.',
                
                'motivo_contatos_id.required' => 'O motivo do contato deve ser informado.',
                
                'required' => 'O campo :attribute precisa ser preenchido.', //outra forma de exibir mensagem
                'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres.',
            ];
            
        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        
        return redirect()->route('site.index');
    }
}

 // var_dump($_POST);
        /* echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        echo '<br>';
        print_r($request->input('nome'));
        echo '<br>';
        print_r($request->input('email')); */

        //MÉTODO 1
        /* $contato = new SiteContato();

        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        //print_r($contato->getAttributes()); //para recuperar os atributos de contato
        $contato->save(); */

        //MÉTODO 2
        /* $contato = new SiteContato();
        $contato->fill($request->all()); //Método create ou fill, ambos precisam indicar na model os parâmetros/\fill precisa do save();
        $contato->save(); */