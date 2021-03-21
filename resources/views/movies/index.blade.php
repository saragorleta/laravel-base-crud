@extends('layouts.app')

@section ('title','pagina home')

@section('content')
<h1>Elenco Film</h1>
@if (session('status'))
  <div class="alert alert-success">{{session('status')}}
  </div>
@endif
<a href="{{route('movies.create') }}">Inserisci un nuovo film</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome film</th>
      <th scope="col">cast</th>
      <th scope="col">genere</th>
    </tr>
  </thead>
  <tbody>
  @foreach($films as $film)
  
    <tr>
      <th scope="row">{{$film->id}}</th>
      <td>{{$film->name}}</td>
      <td>{{$film->cast}}</td>
      <td>{{$film->genre}}</td>
      <td>
        <a href="{{ route('movies.show', $film->id)}}"
        class="btn btn-info">Dettagli</a>
        <a href="{{ route('movies.edit', $film->id)}}"
        class="btn btn-warning">Modifica</a>
        <!-- UTILIZZIAMO IL FORM PER IL METHOD DELETE -->
        <form action="{{route('movies.destroy', $film->id)}}" method= "post"
        class="d-inline-block">
        @csrf
        @method ('DELETE')
        <button class="btn btn-danger">Delete</button>      
        </form>
      </td>
    </tr>

    @endforeach
  </tbody>
</table>

@endsection