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
      <th scope="col">trama</th>
    </tr>
  </thead>
  <tbody> 
    <tr>
      <th scope="row">{{$film_dett->id}}</th>
      <td>{{$film_dett->name}}</td>
      <td>{{$film_dett->cast}}</td>
      <td>{{$film_dett->genre}}</td>
      <td>{{$film_dett->preview}}</td>
    </tr>
       
  </tbody>
</table>
</p>
@endsection