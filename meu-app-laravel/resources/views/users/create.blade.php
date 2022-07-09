@extends('template.users')
@section('title','Novo Usuario')
@section('body')

<center>
    <h1> Novo Usuario</h1>
    @if ($errors->any()){
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)<!--llamando todo los erros para exibir en el alert con $errors->all() -->
                {{$error }}
            @endforeach
        </div>
    @endif

    <form class="w-25" action="{{ route('users.store') }}" method="POST"><!--Defino a rota no action="" -->
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" id="name" aria-describedby="Nome" name="name">
    </div>
    <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" aria-describedby="email" name="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
    <div class="mb-3">
        <label for="password" class="form-label">Senha</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    
    <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</center>

@endsection