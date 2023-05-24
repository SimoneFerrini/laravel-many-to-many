@extends('layouts/admin')

@section('content')

<main>

    <div class="container create-section">
    


        <form action="{{route('admin.technologies.store')}}" method="POST">
          @csrf
    
          <div class="mb-3">
            <label class="my-label" for="name">Titolo</label>
            <input class="@error('name') is-invalid @enderror" type="text" id="name" name="name"  value="{{old('name')}}">
            @error('name')
              <div class="invalid-feedback">
                Il nome non è stato inserito correttamente - {{$message}}
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

      <a href="{{route('admin.technologies.index')}}">Torna alla lista delle tecnologie</a>
    </main>
    
@endsection