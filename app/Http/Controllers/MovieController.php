<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $film_dettagli)   
      {
        /**$film_dettagli = Movie::find($id);*/

        if ($film_dettagli){
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
     *
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
