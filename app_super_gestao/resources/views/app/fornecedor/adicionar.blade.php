@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicionar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            {{ $msg ?? '' }}
            <div style="width:30%; margin-left: auto; margin-right: auto;">
                <form action="{{ route('app.fornecedor.adicionar') }}" method="post">
                    <input type="hidden" name="id" value="{{ $fornecedor->id ?? '' }}">
                    {{ csrf_field() }}
                    <input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{ $fornecedor->nome ?? old('nome') }}"/>
                    <p style="color: red;">{{ $errors->has('nome') ? $errors->first('nome') : ''}}</p>
                    <input type="text" name="site" placeholder="Site" class="borda-preta" value="{{ $fornecedor->site ?? old('site') }}"/>
                    <p style="color: red;">{{ $errors->has('site') ? $errors->first('site') : ''}}</p>
                    <input type="text" name="uf" placeholder="UF" class="borda-preta" value="{{ $fornecedor->uf ?? old('uf') }}"/>
                    <p style="color: red;">{{ $errors->has('uf') ? $errors->first('uf') : ''}}</p>
                    <input type="email" name="email" placeholder="E-mail" class="borda-preta" value="{{ $fornecedor->email ?? old('email') }}"/>
                    <p style="color: red;">{{ $errors->has('email') ? $errors->first('email') : ''}}</p>
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection