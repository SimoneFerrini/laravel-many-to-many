@extends('layouts/admin')

@section('content')
    <div class="pt5">
        <div class="w-50 p-3 mx-auto">

            <img class="w-100 p-3" src="{{asset('storage/' . $project->cover_image)}}" alt="cover-image">
        </div>
        <br>
        <hr>
        <br>
        <h1>{{$project->title}}</h1>
        <br>
        <hr>
        <br>
        <p>{{$project->description}}</p>
        <br>
        <hr>
        <br>
        <p>{{$project->type ? $project->type->title : '-' }}</p>
        <br>
        <hr>
        <br>
        <span> Technologies: </span>
            @foreach ($project->technologies as $technology)
                <span>{{$technology->name}} </span>
            @endforeach
        
        <hr>
        <a href="{{$project->link}}">Scarica progetto</a><br>
        <a href="{{route('admin.projects.index')}}">Torna alla lista dei progetti</a>
        <div>
            <a href="{{route('admin.projects.edit', $project->slug)}}"><button class="btn btn-primary">Modifica</button></a>
            <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger" type="submit">Elimina</button>
            </form>
        </div>
    </div>
@endsection