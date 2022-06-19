@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Fornecedor</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="color: green; font-weight: bold">{{ $msg }}</div>
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form action="{{ route('app.fornecedor.adicionar') }}" method="post">
                    @csrf
                    <input type="text" name="nome" class="borda-preta" placeholder="Nome">
                    <div style="color: red; font-weight: bold">
                        {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                    </div>
                    <input type="text" name="site" class="borda-preta" placeholder="Site">
                    <div style="color: red; font-weight: bold">
                        {{ $errors->has('site') ? $errors->first('site') : '' }}
                    </div>
                    <input type="text" name="uf" class="borda-preta" placeholder="UF">
                    <div style="color: red; font-weight: bold">
                        {{ $errors->has('uf') ? $errors->first('uf') : '' }}
                    </div>
                    <input type="text" name="email" class="borda-preta" placeholder="Email">
                    <div style="color: red; font-weight: bold">
                        {{ $errors->has('email') ? $errors->first('email') : '' }}
                    </div>
                    <button type="submit" class="borda-preta">Adicionar</button>
                </form>
            </div>
        </div>
    </div>
    
@endsection