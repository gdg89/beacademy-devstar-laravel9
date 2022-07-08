@extends('template.users')
@section('title', "Usuario {$user->name}")
@section('body')

<center>
    <h1> Usuario {{$user->name}}</h1>

    <form class="w-25" action="{{ route('users.update', $user->id) }}" method="post"><!--Defino a rota no action="" -->
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" id="name" aria-describedby="Nome" name="name" value="{{$user->name}}">
    </div>
    <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" aria-describedby="email" name="email" value="{{$user->email}}">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
    <div class="mb-3">
        <label for="password" class="form-label">Senha</label>
        <input type="password" class="form-control" id="password" name="password" >
    </div>
    
    <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</center>






@endsection