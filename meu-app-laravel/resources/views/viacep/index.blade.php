<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Via Cep</title>
</head>
<body>
    <div>
        <form action="{{route('viacep.index.post')}}" method="post">
            @csrf
            <label for="cep">Informe seu cep: </label><br>
            <input id="cep" type="text" name="cep">
            <br><br>
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>