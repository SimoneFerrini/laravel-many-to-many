@extends('layouts/admin')

@section('content')
    <div class="pt5">

        <h1>{{$project->title}}</h1>
        <br>
        <hr>
        <br>
        <p>{{$project->description}}</p>
        <br>
        <hr>
        <br>
        <p>{{$project->type ? $project->type->title : '-' }}</p>
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