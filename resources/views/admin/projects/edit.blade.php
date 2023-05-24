@extends('layouts/admin')

@section('content')

<main>

    <div class="container create-section">
    


        <form action="{{route('admin.projects.update', $project->slug)}}" method="POST">
          @csrf
          @method('PUT')
    
          <div class="mb-3">
            <label class="my-label" for="title">Titolo</label>
            <input class="@error('title') is-invalid @enderror" type="text" id="title" name="title"  value="{{old('title') ?? $project->title}}">
            @error('title')
              <div class="invalid-feedback">
                Il titolo non è stato inserito correttamente - {{$message}}
              </div>
            @enderror

          </div>
    
          <div class="mb-3">
            <label class="my-label" for="description">Descrizione</label>
            <textarea class="@error('description') is-invalid @enderror" id="description" name="description" >{{old('description') ?? $project->description}}</textarea>
            @error('description')
              <div class="invalid-feedback">
                La descrizione non è stata inserita correttamente - {{$message}}
              </div>
            @enderror
          </div>

    
          <div class="mb-3">
            <label class="my-label" for="link">Link</label>
            <input class="@error('link') is-invalid @enderror" type="text" id="link" name="link"  value="{{old('link') ?? $project->link}}">
            @error('link')
              <div class="invalid-feedback">
                Il link non è stato inserito correttamente - {{$message}}
              </div>
            @enderror
          </div>

          <div class="mb-3">
            <label class="my-label" for="type_id">Tipologia</label>
            <select class="@error('type_id') is-invalid @enderror" id="type_id" name="type_id" >
             <option value="0"> - </option>
              @foreach ($types as $singleType)
              <option value="{{$singleType->id}}">{{$singleType->title}}</option>
                  
              @endforeach
            </select>
            @error('type_id')
              <div class="invalid-feedback">
                Il type non è stato inserito correttamente - {{$message}}
              </div>
            @enderror
          </div>
    
          <button class="btn btn-primary my-btn" type="submit">Modifica</button>
        </form>
    
      </div>

      <a href="{{route('admin.projects.show', $project->slug)}}">Torna alla lista dei progetti</a>
    </main>
    
@endsection