@extends('layouts/admin')

@section('content')

<div class="main">
  <h1>Tutti i progetti della tecnologia {{$technology->name}}</h1>

  @if(count($technology->projects) > 0)
    <table class="table table-dark">
      <thead>
        <th>Titolo</th>
        <th>Slug</th>
        <th>Dettaglio</th>
      </thead>
      <tbody>
        @foreach($technology->projects as $project)
          <tr>
            <td>{{$project->title}}</td>
            <td>{{$project->slug}}</td>
            <td>
              <a href="{{route('admin.projects.show', $project)}}"><i class="fa-solid fa-magnifying-glass"></i></a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <em>Nessun progetto realizzato con questa tecnologia</em>
  @endif

  <div class="button-section">
    
      {{-- Aggiungo un bottone per modificare il progetto --}}
      <button class="btn"><a href="{{route('admin.technologies.edit', $technology)}}">Modifica Tecnologia</a></button>
    
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-danger rounded-0" data-bs-toggle="modal" data-bs-target="#deleteTech">
        Cancella Tipologia
      </button>
    
      <!-- Modal -->
      <div class="modal fade" id="deleteTech" tabindex="-1" aria-labelledby="deleteTechLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Cancella Tecnologia</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Sei sicuro di voler cancellare la tecnologia? 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
              <form action="{{route('admin.technologies.destroy', $technology)}}" method="POST">
                @csrf
                @method('DELETE')
      
                <button type="submit" class="btn btn-danger">Elimina</button>
              </form>
            </div>
          </div>
        </div>
      </div>

  </div>

  <div class="mt-5">
    <a href="{{route('admin.technologies.index')}}">Torna all'elenco di tutte le tipologie</a>
  </div>
  
</div>
@endsection