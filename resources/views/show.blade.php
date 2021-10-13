@extends('templates.template')

@section('content')

<h1 class="text-center">Visualizar</h1> <hr>

@php
    $user = $book->find($book->id)->relUsers
@endphp

<div class="col-8 m-auto">
    Id: {{$book->id}}<br>
    Titulo: {{$book->title}}<br>
    Páginas: {{$book->pages}}<br>
    Autor: {{$user->name}}<br>
    Preço: {{$book->prices}}<br>
    Email do autor: {{$user->email}}
    
</div>

<div class="text-center mt-3 mb-4">
    <a href="{{url("books/")}}" >
        <button class="btn btn-dark">Voltar</button>
    </a>
</div>


@endsection()