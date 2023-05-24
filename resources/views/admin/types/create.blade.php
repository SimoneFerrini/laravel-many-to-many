@extends('layouts/admin')

@section('content')

<main>

    <div class="container create-section">
    


        <form action="{{route('admin.types.store')}}" method="POST">
          @csrf
    
          <div class="mb-3">
            <label class="my-label" for="title">Titolo</label>
            <input class="@error('title') is-invalid @enderror" type="text" id="title" name="title"  value="{{old('title')}}">
            @error('title')
              <div class="invalid-feedback">
                Il titolo non è stato inserito correttamente - {{$message}}
              </div>
            @enderror

          </div>
    
          <div class="mb-3">
            <label class="my-label" for="description">Descrizione</label>
            <textarea class="@error('description') is-invalid @enderror" id="description" name="description" >{{old('description')}}</textarea>
            @error('description')
              <div class="invalid-feedback">
                La descrizione non è stata inserita correttamente - {{$message}}
              </div>
            @enderror
          </div>
    
          <button class="btn btn-primary my-btn" type="submit">Add</button>
        </form>
    
      </div>

      <a href="{{route('admin.types.index')}}">Torna alla lista delle tipologie</a>
    </main>
    
@endsection