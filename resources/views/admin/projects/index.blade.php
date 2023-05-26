@extends('layouts/admin')

@section('content')

<h3>Tutti i progetti</h3>

<table class="table table-dark table-hover">
  <thead>
    <th>Titolo</th>
    <th>Descrizione</th>
    <th>Slug</th>
    <th>Immagine</th>
    <th>Tipologia</th>
    <th>Tecnologie</th>
    <th>Repo</th>
    <th>Dettaglio</th>
  </thead>

  <tbody>

    @foreach($projects as $project)
    <tr>
      <td class="colored">{{$project->title}}</td>
      <td>{{$project->content}}</td>
      <td>{{$project->slug}}</td>
      <td>{{$project->thumb}}</td>
      <td>{{$project->type?->name}}</td>
      <td>
        @php
          $techNames = [];
          foreach($project->technologies as $tech){
            $techNames[] = $tech->name;
          }
          echo implode(', ', $techNames);
        @endphp
      </td>
      <td>{{$project->repo}}</td>
      <td class="colored"><a href="{{route('admin.projects.show', $project->slug)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
    </tr>
    @endforeach


  </tbody>
</table>

<button class="btn">
  <a href="{{route('admin.projects.create')}}">Aggiungi Progetto</a>
</button>

@endsection