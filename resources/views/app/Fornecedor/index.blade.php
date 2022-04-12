<h1>Forncedores</h1>

@if(count($fornecedores) > 0 && count($fornecedores) <= 5)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) > 5)
    <h3>Existem vários fornecedores cadastrados</h3>
@else
    <h3>Ainda não existem fornecedores cadastrados</h3>
@endif

<br>
<br>
@dd($fornecedores)