@extends('layouts/admin')

@section('content')

    <div class="container mt-5">
        <span> Benvenuto, clicca nel link per accedere ai progetti: </span>
        <a href="{{route('admin.projects.index')}}">Vedi i progetti</a>
        <br>
        <hr>
        <br>
        <span>oppure accedi alle tipologie di progetto qui: </span>
        <a href="{{route('admin.types.index')}}">Vedi le tipologie di progetto</a>

    </div>
    
@endsection