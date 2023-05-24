@extends('layouts/admin')

@section('content')
    <div class="pt5">

        <h1>{{$type->title}}</h1>
        <br>
        <hr>
        <br>
        <p>Descrizione: {{$type->description}}</p>
        <br>
        <hr>
        <br>
        <p>Slug: {{$type->slug}}</p>
        <hr>
        
        <a href="{{route('admin.types.index')}}">Torna alla lista delle tipologie</a>
        <div>
            <a href="{{route('admin.types.edit', $type->slug)}}"><button class="btn btn-primary">Modifica</button></a>
            <form action="{{route('admin.types.destroy', $type->slug)}}" method="POST">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger" type="submit">Elimina</button>
            </form>
        </div>
    </div>
@endsection