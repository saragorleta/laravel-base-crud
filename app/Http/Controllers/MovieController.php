<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     * Visualizza un elenco della risorsa.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $film_sel = Movie::all();
        $data = [
            'films'=> $film_sel
        ];
        return view('movies.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * Mostra il modulo per creare una nuova risorsa.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view (' movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request -> all();

        // inseriamo il validate
        $request ->validate([
            name=> 'required|unique:movies|max:255',
            cast=> 'required|unique:movies|max:255',
            genre=> 'required|unique:movies|max:255',
            preview=> 'required|unique:movies|text',

        ]);
        $movieNew = new Movie();

        $movieNew ->fill($data);

        $movieNew-> save();
//con save mi crea la riga con l'id
        return redirect()->route('movies.show', $movieNew);



    }

    /**
     * Display the specified resource.
     * Visualizza la risorsa specificata.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $film_dettagli)   
      {
        /**$film_dettagli = Movie::find($id);*/

        if ($film_dettagli){
            //per passargli la chiave $film_dettagli al file edit.blade.php
             //dobbiamo trasformarla in un array associativo 
         
        $data = [
            'film_dett' => $film_dettagli
            
        ];
        return view('movies.show', $data);
        }

        abort ('404');
      }

      /**public function show($id)   
      {
        $film_dettagli = Movie::find($id);

        if ($film_dettagli){
        $data = [
            'film_dett' => $film_dettagli
        ];
        return view('movies.show', $data);
        }

        abort ('404');
      }




    /**
     * Show the form for editing the specified resource.
     * Mostra il modulo per modificare la risorsa specificata.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $film_dettagli)
    {
        // la parte di edit è uguale alla show
        //cambia solo la rotta = 'movies.edit'
        if ($film_dettagli){
            $data = [
                'film_dett' => $film_dettagli
            ];
            return view('movies.edit', $data);
            }
    
            abort ('404');
    }

    /**
     * Update the specified resource in storage.
     * Aggiorna la risorsa specificata in archivio.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $film_dettagli)
    {
        $data = $request ->all();
        $film_dettagli-> update($data);
        return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     * Rimuovi la risorsa specificata dalla memoria.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
      $movie-> delete();
      return redirect()-> route('movies.index')->with('status', 'Film cancellato!');
    }
}
/*->with('status', 'Film cancellato!'); serve per far comparire una barra
sul browser come fosse un alert che avvisa quando l'articolo viene cancellato.
da inserire su index.blade.php:
@if (session('status'))
  <div class="alert alert-success">{{session('status')}}
  </div>
@endif */