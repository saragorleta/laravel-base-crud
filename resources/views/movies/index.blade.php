@extends('layouts.app')

@section ('title','pagina home')

@section('content')
<h1>Elenco Film</h1>
<p>
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
        <a href="{{ route('movies.show', ['movie'=> $film->id])}}"
        class="btn btn-info">Dettagli</a>
        <a href="{{ route('movies.edit', ['movie'=> $film->id])}}"
        class="btn btn-warning">Modifica</a>
      </td>
    </tr>

    @endforeach
  </tbody>
</table>
</p>
@endsection