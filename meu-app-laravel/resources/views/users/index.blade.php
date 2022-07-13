@extends('template.users') <!--llamamos el arquivo users -->
@section('title', 'Listagem de Usuarios')
@section('body')
<center>
    <h1>Listagem de Usuarios</h1>
    <a href="{{route('users.create')}}" class="btn btn-dark">Criar novo Usuario</a>
    <table class="table table-success table-striped w-75 mt-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Image</th>
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
                @if($user->image)
                <td><img src="{{asset( 'storage/'.$user->image) }}"  width="60px" heigth="60px" class="rounded-circle"></td>
                @else
                <td><img src="{{ asset( 'storage/profile/avatar.png') }}"  width="60px" heigth="60px" class="rounded-circle"></td>
                @endif
                <td>{{ date('d/m/Y - H:i', strtotime($user->created_at)) }}</td>
                <td><a href="{{ route('users.show', $user->id) }}" class="btn btn-info">Visualizar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="justify-content-center pagination">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>
</center>
@endsection
