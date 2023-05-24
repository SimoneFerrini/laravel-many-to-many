@extends('layouts/admin')

@section('content')
    <div class="bg-black">

        <a href="{{route('admin.types.create')}}"><button>Nuova tipologia</button></a>

        <table class="mt-5 table  bg-dark text-white">
            <thead>
                <th>
                    Titolo
                </th>
                <th>
                    Descrizione
                </th>
                <th>
                    Visualizza
                </th>
        </thead>
        
        <tbody>
            @foreach($types as $type)
            <tr>
                <td>{{$type->title}}</td>
                <td>{{$type->description}}</td>
                <td><a href="{{route('admin.types.show', $type->slug)}}">Apri</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection