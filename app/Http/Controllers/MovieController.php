<?php

namespace App\Http\Controllers;
use App\Movie;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies=Movie::select('name_movie','category',
        'status','synopsis','release_year','price_sale')
        ->get();
        return view('movies.index',compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_movie'   => 'required|string|min:4|max:100',
            'category'     => 'required|min:2',
            'status'   => 'required|string|min:4|max:25',
            'synopsis'   => 'required|string|min:4|max:200',
            'release_year'   => 'required',
            'price_sale'     => 'required|int'
            ]);

        $movieDB = new Movie;
        $movieDB->name_movie = $request->name_movie;
        $movieDB->category = $request->category;
        $movieDB->status = $request->status;
        $movieDB->synopsis = $request->synopsis;
        $movieDB->release_year = $request->release_year;
        $movieDB->price_sale = $request->price_sale;
        $movieDB->save();

         return redirect('movies')->with('agregado','ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movies=Movie::select('name_movie','category',
        'status','synopsis','release_year','price_sale')
        ->get();
        return view('registrado.home',compact('movies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
