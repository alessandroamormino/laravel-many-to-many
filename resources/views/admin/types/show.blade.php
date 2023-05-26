@extends('layouts/admin')

@section('content')

<div class="main">
  <h1>All projects of type: "{{$type->name}}"</h1>

  @if(count($type->projects) > 0)
    {{-- <table class="table table-dark">
      <thead>
        <th>Titolo</th>
        <th>Slug</th>
        <th>Dettaglio</th>
      </thead>
      <tbody>
        @foreach($type->projects as $project)
          <tr>
            <td>{{$project->title}}</td>
            <td>{{$project->slug}}</td>
            <td>
              <a href="{{route('admin.projects.show', $project)}}"><i class="fa-solid fa-magnifying-glass"></i></a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table> --}}

    <div class="cards">
      @foreach($type->projects as $project)
        <div class="card-projects">
          <img src="{{asset('storage/' . $project->thumb)}}" alt="{{$project->title}} image">
          <div class="content">
            <h1>{{$project->title}}</h1>
            <h6>Type: {{$project->type?->name}}</h6>
            <hr>
            <p>{{$project->content}}</p>
            <div class="d-flex mt-2"> 
              @foreach($project->technologies as $tech)
                <span class="badge rounded-pill mx-1" style="border: 1px solid {{$tech->color}}">{{$tech->name}}</span>
              @endforeach
            </div>
            <div class="links">
              <a href="{{$project->repo}}">Source Code</a>
              <a href="{{route('admin.projects.show', $project)}}">Details</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>


  @else
    <em>No project of this type</em>
  @endif

  <div class="button-section">
    
      {{-- Aggiungo un bottone per modificare il progetto --}}
      <button class="btn"><a href="{{route('admin.types.edit', $type)}}">Edit Type</a></button>
    
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-danger rounded-0" data-bs-toggle="modal" data-bs-target="#deleteType">
        Delete Type
      </button>
    
      <!-- Modal -->
      <div class="modal fade" id="deleteType" tabindex="-1" aria-labelledby="deleteTypeLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Type</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Are you sure you want to delete this type? 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <form action="{{route('admin.types.destroy', $type)}}" method="POST">
                @csrf
                @method('DELETE')
      
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </div>
          </div>
        </div>
      </div>

  </div>

  <div class="mt-5">
    <a href="{{route('admin.types.index')}}">Go back to all types</a>
  </div>
  
</div>
@endsection