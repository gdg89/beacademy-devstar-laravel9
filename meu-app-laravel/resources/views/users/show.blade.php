<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>Usuario {{$user -> name}}</title>
</head>
<body class="p-4">
    <h1>Usuario {{$user -> name}}</h1>
    <p><a href="{{route('user.index')}}">Voltar</a></p>
    <table class="table table-success table-striped w-50 mt-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Registration Date</th>
                <th scope="col" colspan="2" class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ date('d/m/Y - H:i', strtotime($user->created_at)) }}</td>
                <td class="text-center">
                    <a href="" class="btn btn-warning">Editar</a>
                    <a href="" class="btn btn-danger">Deletar</a>
                </td>
            </tr>
        </tbody>
    </table>
    
</body>
</html>