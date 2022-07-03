@extends('template.users') <!--llamamos el arquivo users -->
@section('title', 'Listagem de Usuarios')
@section('body')
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
@endsection
