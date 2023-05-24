@extends('layouts/admin')

@section('content')
    <div class="pt5">

        <h1>{{$technology->name}}</h1>
        <br>
        <hr>
        <br>
        <p>{{$technology->description}}</p>
        <br>
        <hr>
        <br>
        <span style="background-color:{{$technology->color}}; color:{{$technology->color}}">color</span>  {{$technology->color}}
        <br>
        <hr>
        <br>
        
        
        <hr>
        
        <a href="{{route('admin.technologies.index')}}">Torna alla lista delle tecnologie</a>
        <div>
            <a href="{{route('admin.technologies.edit', $technology->id)}}"><button class="btn btn-primary">Modifica</button></a>
            <form action="{{route('admin.technologies.destroy', $technology->id)}}" method="POST">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger" type="submit">Elimina</button>
            </form>
        </div>
    </div>
@endsection