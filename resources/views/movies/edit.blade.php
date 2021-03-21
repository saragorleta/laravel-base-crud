@extends ('layouts.app')

@section ('title', 'gestione film')

@section ('content')
<h1>Carica il tuo film</h1>

<div class= "container">
<form method="post" action ="{{route('movies.update', film_dett->$id)}}">
@method ('PUT')
@csrf

  <div class="form-group">
    <label for="inputMovie">Titolo film</label>
    <input type="text" class="form-control" name ="name"id="inputMovie" 
    value ="{{film_dett->name}}" >
  </div>
  <div class="form-group">
    <label for="inputCast">Cast</label>
    <input type="text" class="form-control" name ="cast"id="inputCast" 
    value ="{{film_dett->cast}}">
  </div>

  <div class="form-group">
    <label for="inputGenere">Genere</label>
    <select class="form-control" name="genre" id="inputGenere"
    value ="{{film_dett->genre}}">
      <option value=""selected>--seleziona--</option>
      <option value="Fantasy"{{ $film_dett -> genre == 'Fantasy' ? 'selected=selected' : ''}}>Fantasy</option>
      <option value="Thriller" {{ $film_dett -> genre == 'Thriller' ? 'selected=selected' : ''}}>Thriller</option>
      <option value="Commedia" {{ $film_dett -> genre == 'Commedia' ? 'selected=selected' : ''}}>Commedia</option>
      <option value="Horror" {{ $film_dett -> genre == 'Horror' ? 'selected=selected' : ''}}>Horror</option>
    </select>
  </div>


  <div class="form-group">
    <label for="inputTrama">Trama</label>
    <input type="text" class="form-control" name ="preview"id="inputTrama" 
    value ="{{film_dett->preview}}">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection