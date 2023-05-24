@extends('layouts/admin')

@section('content')

<main>

    <div class="container create-section">
    


      <form action="{{route('admin.technologies.update', $technology->id)}}" method="POST">
        @csrf
        @method('PUT')
  
        <div class="mb-3">
          <label class="my-label" for="name">Titolo</label>
          <input class="@error('name') is-invalid @enderror" type="text" id="name" name="name"  value="{{old('name')?? $technology->name}}">
          @error('name')
            <div class="invalid-feedback">
              Il nome non è stato inserito correttamente - {{$message}}
            </div>
          @enderror

        </div>
  
        <div class="mb-3">
          <label class="my-label" for="description">Descrizione</label>
          <textarea class="@error('description') is-invalid @enderror" id="description" name="description" >{{old('description')?? $technology->description}}</textarea>
          @error('description')
            <div class="invalid-feedback">
              La descrizione non è stata inserita correttamente - {{$message}}
            </div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="my-label" for="color">Colore - HEX - </label>
          <input class="@error('color') is-invalid @enderror" type="color" id="color" name="color"  value="{{old('color')?? $technology->color}}">
          @error('color')
            <div class="invalid-feedback">
              Il colore non è stato inserito correttamente - {{$message}}
            </div>
          @enderror

        </div>
  
    
          <button class="btn btn-primary my-btn" type="submit">Modifica</button>
        </form>
    
      </div>

      <a href="{{route('admin.technologies.show', $technology->id)}}">Torna alla lista dei progetti</a>
    </main>
    
@endsection