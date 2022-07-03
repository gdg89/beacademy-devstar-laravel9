<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>Listagem de Usuarios</title>
</head>
<body class="p-5">
    <h1>Listagem de Usuarios</h1>
    <table class="table table-success table-striped w-50 mt-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Registration Date</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user) <!--Creando o loop para imprimir tabela na view, llamando a variavel $user  da user controller -->
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ date('d/m/Y - H:i', strtotime($user->created_at)) }}</td>
                <td><a href="{{ route('users.show', $user->id) }}" class="btn btn-info">Visualizar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>