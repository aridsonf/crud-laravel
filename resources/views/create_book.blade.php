@extends('templates.template')

@section('content')

<h1 class="text-center">@if(isset($book)) Editar @else Cadastrar @endif</h1> <hr>

<div class="col-8 m-auto">
        
    

    @if(isset($book))
        <form name="formEdit" id="formEdit">
        <input type="hidden" id="book_id" value="{{$book->id}}">
        
    @else
        <form name="formCad" id="formCad">
    @endif
        @csrf
        
        <div class="text-centrer mt-4 mb-4 p-2 alert alert-success d-none messageBox" role="alert">
        </div>
        
        <input class="form-control" type="text" name="title" id="title" placeholder="Título:" value="{{$book->title ?? ''}}" required><br>
        <select class="form-control" type="text" name="id_user" id="id_user" placeholder="Autor:" required>
            <option value="{{$book->relUsers->id ?? ''}}">{{$book->relUsers->name ?? 'Autor'}}</option>
            @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select><br>
        <input class="form-control" type="number" name="pages" id="pages" placeholder="Páginas:" value="{{$book->pages ?? ''}}" required><br>
        <input class="form-control" type="number" step="0.01" name="prices" id="prices" placeholder="Preço:" value="{{$book->prices ?? ''}}" required><br>
        <input class="btn btn-primary @if(isset($book)) js-update @else js-create @endif" type="submit" value="@if(isset($book)) Editar @else Cadastrar @endif">          
    </form>
    <div class="mt-3">
        <a href="{{url('books')}}" >
            <button class="btn btn-dark">Voltar</button>
        </a>
        </div>
</div>

<script src="{{url("assets/js/create-update_ajax.js")}}"></script>

@endsection