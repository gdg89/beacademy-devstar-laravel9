@extends('template.users')
@section('title', $title)
@section('body')
 <!-- message -->
         @if(session()->has('edit'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Parabens!</strong> {{ session()->get('edit') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

<div class=" container w-75 p-4 m-auto">
    <h1>Usuario {{$user -> name}}</h1>
    <p><a href="{{route('users.index')}}">Voltar</a></p>
    <table class="table table-success table-striped  mt-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Postagens</th>
                <th scope="col">Registration Date</th>
                <th scope="col" colspan="2" class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            
            <tr>
                <th scope="row">{{ $user->id }}</th>
                @if($user->image)
                <td><img src="{{asset( 'storage/'.$user->image) }}"  width="60px" heigth="60px" class="rounded-circle"></td>
                @else
                <td><img src="{{ asset( 'storage/profile/avatar.png') }}"  width="60px" heigth="60px" class="rounded-circle"></td>
                @endif
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><a href="{{ route('posts.show', $user->id) }}" class="btn outline-dark">Postagens -  {{$user->posts->count()}}</a></td>
                <td>{{ date('d/m/Y - H:i', strtotime($user->created_at)) }}</td>
                <td class="text-center">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Editar</a></td>
                <td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" >
                        @method('DELETE')
                        @csrf

                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                </td>
                    
            </tr>
        </tbody>
    </table>
</div>
@endsection