@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Produto</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            
            <div style="width:30%; margin-left: auto; margin-right: auto;">
                <form action="{{ route('produto.store') }}" method="post">
                    {{ csrf_field() }}
                    <input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{ old('nome') }}"/>
                    <p style="color: red;">{{ $errors->has('nome') ? $errors->first('nome') : ''}}</p>
                    <input type="text" name="descricao" placeholder="Descrição" class="borda-preta" value="{{ old('descricao') }}"/>
                    <p style="color: red;">{{ $errors->has('descricao') ? $errors->first('descricao') : ''}}</p>
                    <input type="text" name="peso" placeholder="Peso" class="borda-preta" value="{{ old('peso') }}"/>
                    <p style="color: red;">{{ $errors->has('peso') ? $errors->first('peso') : ''}}</p>
                    <select name="unidade_id" id="unidade_id" value="{{ old('unidade_id') }}">
                        <option selected disabled>-- Selecione a unidade de medida --</option>
                        @foreach ($unidades as $unidade)
                            <option value="{{ $unidade->id }}">{{ $unidade->descricao }}</option>
                        @endforeach
                    </select>
                    <p style="color: red;">{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}</p>
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection