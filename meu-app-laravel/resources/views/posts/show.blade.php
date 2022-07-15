@extends('template.users')
@section('title',"Listagem de Postagens do {$user->name}")
@section('body')
<div class="w-75 m-auto p-3">
    <h1>Postagens do {{ $user->name }}</h1>

        @foreach($posts as $post)
            <div class=mb-3>
                <label for="" class="form-label">Identification N°: {{ $post->id }}</label><br>
                <label for="" class="form-label">Status: {{ $post->active?'Ativo':'Inativo' }}</label><br>
                <label for="" class="form-label">Title: {{ $post->title }}</label><br>
                <textarea class="form-control" rows="5">Posts: {{ $post->post }}</textarea><br>
            </div>

        @endforeach
</div>
    



@endsection