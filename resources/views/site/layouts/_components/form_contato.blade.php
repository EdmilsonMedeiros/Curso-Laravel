{{ $slot }}
@isset($x)
    {{ $x }}
@endisset
<form action="{{ route('site.contato') }}" method="POST">
    {{ csrf_field() }}
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $class }}">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{ $class }}">
    {{ $errors->has('telefone') ? $errors->first('telefone' ) : '' }}
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $class }}">
    {{ $errors->has('email') ? $errors->first('email') : '' }}
    <br>
    <select name="motivo_contatos_id" class="{{ $class }}" value="{{ old('motivo_contato') }}">
        @foreach ($motivo_contato as $key => $motivo_contato)
            <option value="{{ $motivo_contato->id }}">{{ $motivo_contato->motivo_contato }}</option>
        @endforeach
    </select>
    {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }}
    <br>
    <textarea name="mensagem" value="{{ old('mensagem') }}" class="{{ $class }}">Preencha aqui a sua mensagem</textarea>
    {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
    <br>
    <button type="submit" class="{{ $class }}">ENVIAR</button>
</form>
@if ($errors->any())
    <div style="position:absolute; top:0px; left:0px; width:100%; background-color:red;">
        @foreach ($errors->all() as $erro)
            {{ $erro }}<br>
        @endforeach
    </div>
@endif

