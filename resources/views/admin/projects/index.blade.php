@extends('layouts/admin')

@section('content')
    <div class="bg-black">

        <a href="{{route('admin.projects.create')}}"><button>Nuovo Progetto</button></a>

        <table class="mt-5 table  bg-dark text-white">
            <thead>
                <th>
                    Titolo
                </th>
                <th>
                    Descrizione
                </th>
                <th>
                    Slug
                </th>
            <th>
                Download
            </th>
        </thead>
        
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{$project->title}}</td>
                <td>{{$project->description}}</td>
                <td>{{$project->slug}}</td>
                <td><a href="{{route('admin.projects.show', $project->slug)}}"><i class="fa-solid fa-file-arrow-down"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection