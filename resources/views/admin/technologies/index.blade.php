@extends('layouts/admin')

@section('content')
    <div class="bg-black">

        <a href="{{route('admin.technologies.create')}}"><button>Nuova tecnologia</button></a>

        <table class="mt-5 table  bg-dark text-white">
            <thead>
                <th>
                    Titolo
                </th>
                <th>
                    Apri
                </th>
        </thead>
        
        <tbody>
            @foreach($technologies as $technology)
            <tr>
                <td>{{$technology->name}}</td>
                <td><a href="{{route('admin.technologies.show', $technology->id)}}"><i class="fa-solid fa-file-arrow-down"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection