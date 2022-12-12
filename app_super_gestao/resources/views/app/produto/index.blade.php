@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de produtos</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:90%; margin-left: auto; margin-right: auto;">
                <table class="table" border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>peso</th>
                            <th>Unidade ID</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($produtos as $produto)
                        <tr>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->descricao }}</td>
                            <td>{{ $produto->peso }}</td>
                            <td>{{ $produto->unidade_id}}</td>
                            <td><a href="{{ route('produto.show', $produto->id) }}">Visualizar</a></td>
                            <td>
                                <form id="form_{{$produto->id}}" action="{{ route('produto.destroy', $produto->id) }}" method="POST">
                                    @method('DELETE')
                                    {{ csrf_field() }}
                                    {{-- <button type="submit">Excluir</button> --}}
                                    <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                            <td><a href="{{ route('produto.edit', $produto->id) }}">Editar</a></td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $produtos->appends($request)->links() }} --}}
                <br>
                Exibindo {{ $produtos->count() }} produtos de {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }}
                
            </div>
        </div>
    </div>
@endsection