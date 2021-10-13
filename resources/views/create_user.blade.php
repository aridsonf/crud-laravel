@extends('templates.template')

@section('content')

<h1 class="text-center">Cadastrar</h1> <hr>

<div class="col-8 m-auto">
    <form name="formCad" id="formCad" method="post" action="{{url('books')}}">
        @csrf
        <input class="form-control" type="text" name="title" id="title" placeholder="Título:"><br>
        <select class="form-control" type="text" name="id_user" id="id_user" placeholder="Autor:">
            <option value="">Autor</option>
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select><br>
        <input class="form-control" type="number" name="pages" id="pages" placeholder="Páginas:"><br>
        <input class="form-control" type="number" step="0.01" name="prices" id="prices" placeholder="Preço:"><br>
        <div class="text-center mt-3 mb-4">
        <input class="btn btn-primary" type="submit" value="Cadastrar">         
        <a href="{{url("books/")}}" >
            <button class="btn btn-dark">Voltar</button>
        </a>
        </div>
    </form>
</div>



@endsection