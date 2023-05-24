@extends('layouts/admin')

@section('content')
<h3>Aggiungi una tecnologia</h3>
<div class="container p-5">
  <form action="{{route('admin.technologies.store')}}" method="POST">
    @csrf
  
    <div class="row mb-3">
      <label for="name">Nome Tecnologia</label>
      <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{old('name')}}">
      {{-- espongo messaggio di errore --}}
      @error('name')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="row col-1 mb-3">
      <label for="color">Colore</label>
      <input class="form-control @error('color') is-invalid @enderror" type="color" id="color" name="color" value="{{old('color')}}">
      {{-- espongo messaggio di errore --}}
      @error('color')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>
  
    <div class="button-section mt-5">
      <button class="btn btn-secondary" type="submit">Aggiungi!</button>
    </div>
  </form>

</div>

@endsection