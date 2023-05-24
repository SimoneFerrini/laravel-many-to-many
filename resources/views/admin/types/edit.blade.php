@extends('layouts/admin')

@section('content')

<main>

    <div class="container create-section">
    


        <form action="{{route('admin.types.update', $type->slug)}}" method="POST">
          @csrf
          @method('PUT')
    
          <div class="mb-3">
            <label class="my-label" for="title">Titolo</label>
            <input class="@error('title') is-invalid @enderror" type="text" id="title" name="title"  value="{{old('title') ?? $type->title}}">
            @error('title')
              <div class="invalid-feedback">
                Il titolo non è stato inserito correttamente - {{$message}}
              </div>
            @enderror

          </div>
    
          <div class="mb-3">
            <label class="my-label" for="description">Descrizione</label>
            <textarea class="@error('description') is-invalid @enderror" id="description" name="description" >{{old('description') ?? $type->description}}</textarea>
            @error('description')
              <div class="invalid-feedback">
                La descrizione non è stata inserita correttamente - {{$message}}
              </div>
            @enderror
          </div>
    
          <button class="btn btn-primary my-btn" type="submit">Modifica</button>
        </form>
    
      </div>

      <a href="{{route('admin.projects.show', $type->slug)}}">Torna alla lista dei progetti</a>
    </main>
    
@endsection