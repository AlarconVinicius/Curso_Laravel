@extends('site.layouts.basico')

@section('titulo', 'Login')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width:30%; margin-left: auto; margin-right: auto;">
                <form action="{{ route('site.login') }}" method="post">
                    @csrf
                    <input name="usuario" value="{{ old('usuario') }}" type="text" placeholder="Usuário" class="borda-preta">
                    <div style="color: red; font-weight: bold">{{ $errors->has('usuario') ? $errors->first('usuario') : '' }}</div>
                    <input name="senha" value="{{ old('senha') }}" type="password" placeholder="Senha" class="borda-preta">
                    <div style="color: red; font-weight: bold">{{ $errors->has('senha') ? $errors->first('senha') : '' }}</div>
                    <button type="submit" class="borda-preta">Acessar</button>
                </form>
                <div style="color: red; font-weight: bold">
                    {{ isset($erro) && $erro != '' ? $erro : '' }}
                </div>
            </div>
        </div>  
    </div>

    @include('site.layouts._partials.rodape')
    
@endsection