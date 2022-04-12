<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() 
    {
        $fornecedores = ['Fornecedor1', 'Fornecedor2', 'Fornecedor3', 'Fornecedor4', 'Fornecedor5'];
        return view('app.Fornecedor.index', compact('fornecedores'));
    }
}
