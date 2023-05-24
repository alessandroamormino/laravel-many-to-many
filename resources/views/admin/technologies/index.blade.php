@extends('layouts/admin')

@section('content')

<h3>Tutte le tecnologie</h3>

<table class="table table-dark ">
  <thead>
    <th>Nome</th>
    <th>Colore</th>
    <th>Slug</th>
    <th>N. Progetti</th>
    <th>Dettaglio</th>
  </thead>

  <tbody>

    @foreach($technologies as $tech)
    <tr>
      <td>{{$tech->name}}</td>
      <td>
        <span style="background-color: {{$tech->color}}">{{$tech->color}}</span>
      </td>
      <td>{{$tech->slug}}</td>
      <td>{{count($tech->projects)}}</td>
      <td><a href="{{route('admin.technologies.show', $tech)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
    </tr>
    @endforeach


  </tbody>
</table>

<button class="btn">
  <a href="{{route('admin.technologies.create')}}">Aggiungi Tecnologia</a>
</button>

@endsection