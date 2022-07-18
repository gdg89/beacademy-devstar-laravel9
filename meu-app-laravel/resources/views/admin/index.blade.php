@extends('template.users')
@section('title', 'Listagem de Usuários')
@section('body')

<!-- Card do Dashboard -->
<div class="card mt-5" style="width: 30rem;">
  <img src="{{ asset('storage/dashboard.jpg') }}" class="card-img-top" alt="Dashboard">
  <div class="card-body">
    <h5 class="card-title">Bem vindo ao Dashboard</h5>
    <p class="card-text">#pay.livre #be.academy #laravel</p>
    
  </div>
</div>

@endsection