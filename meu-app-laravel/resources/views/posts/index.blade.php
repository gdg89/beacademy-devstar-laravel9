@extends('template.users') <!--llamamos el arquivo users -->
@section('title', 'Listagem de Postagens')
@section('body')
<center>
    <h1>Listagem de Postagens</h1>
    <table class="table table-success table-striped w-75 mt-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Usuario</th>
                <th scope="col">Titulo</th>
                <th scope="col">Postagem</th>
                <th scope="col">Registration Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post) <!--Creando o loop para imprimir tabela na view, llamando a variavel $posts  da post controller -->
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->post }}</td>
                <td>{{ date('d/m/Y - H:i', strtotime($post->created_at)) }}</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
    
</center>
@endsection
