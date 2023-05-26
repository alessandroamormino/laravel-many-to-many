@extends('layouts/admin')

@section('content')

<div class="main">
  <h1>Project: {{$project->title}}</h1>
  <hr>
  <div class="card-projects">
    <img src="{{asset('storage/' . $project->thumb)}}" alt="{{$project->title}} image">
    <div class="content">
      <h1>{{$project->title}}</h1>
      <h6>Tipologia: {{$project->type?->name}}</h6>
      <hr>
      <p>
        Descrizione: {{$project->content}}
      </p>
      <div class="d-flex mt-2"> 
        @foreach($project->technologies as $tech)
          <span class="badge rounded-pill mx-1" style="border: 1px solid {{$tech->color}}">{{$tech->name}}</span>
        @endforeach
      </div>
      <div class="links">
        <a href="{{$project->repo}}">Source Code</a>
      </div>
    </div>
  </div>

  {{-- Sezione bottoni --}}

  <div class="button-section">
    {{-- Aggiungo un bottone per modificare il progetto --}}
    <button class="btn btn-secondary"><a href="{{route('admin.projects.edit', $project)}}">Modifica Progetto</a></button>
  
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProject">
      Cancella Progetto
    </button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="deleteProject" tabindex="-1" aria-labelledby="deleteProjectLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Cancella Progetto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Sei sicuro di voler cancellare il progetto? 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
          <form action="{{route('admin.projects.destroy', $project)}}" method="POST">
            @csrf
            @method('DELETE')
  
            <button type="submit" class="btn btn-danger">Elimina</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-5">
    <a href="{{route('admin.projects.index')}}">Torna all'elenco dei progetti</a>
  </div>
  
</div>
@endsection