@extends ('layouts.app')

@section ('title', 'gestione film')

@section ('content')
<h1>Carica il tuo film</h1>

<div class= "container">
<form method="post" action ="">
@method ('POST')
@csrf

  <div class="form-group">
    <label for="inputMovie">Titolo film</label>
    <input type="text" class="form-control" name ="name"id="inputMovie" >
  </div>
  <div class="form-group">
    <label for="inputCast">Cast</label>
    <input type="text" class="form-control" name ="cast"id="inputCast" >
  </div>

  <div class="form-group">
    <label for="inputGenere">Genere</label>
    <select class="form-control" name="Genere" id="inputGenere">
      <option value=""selected>--seleziona--</option>
      <option value="Fantasy">Fantasy</option>
      <option value="Thriller">Thriller</option>
      <option value="Commedia">Commedia</option>
      <option value="Horror">Horror</option>
    </select>
  </div>


  <div class="form-group">
    <label for="inputTrama">Trama</label>
    <input type="text" class="form-control" name ="preview"id="inputTrama" >
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection