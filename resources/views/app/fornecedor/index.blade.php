<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fornecedor</title>
</head>
<body>
    <h1>Fornecedor</h1>
    @if (count($fornecedores) > 0 && count($fornecedores) < 10)
        <h3>Existem fornecedores cadastrados</h3>
    @endif
</body>
</html>