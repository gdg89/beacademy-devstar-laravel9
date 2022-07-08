@extends('template.users')
@section('title', $title)
@section('body')
<body class="p-4">
    <h1>Usuario {{$user -> name}}</h1>
    <p><a href="{{route('users.index')}}">Voltar</a></p>
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
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Editar</a>
                    <a href="" class="btn btn-danger">Deletar</a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection