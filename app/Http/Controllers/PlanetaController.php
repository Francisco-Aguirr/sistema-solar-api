<?php

namespace App\Http\Controllers;

use App\Models\Planeta;
use Illuminate\Http\Request;

class PlanetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Planeta::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $planeta = new Planeta();

        $request->validate([
            'name'=> 'required',
            'info' => 'required'
        ]);

        $planeta->name = $request->name;
        $planeta->info = $request->info;
        $planeta->save();

        return $planeta;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Planeta  $planeta
     * @return \Illuminate\Http\Response
     */
    public function show(Planeta $planeta)
    {
        return $planeta;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Planeta  $planeta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Planeta $planeta)
    {
        $request->validate([
            'name'=> 'required',
            'info' => 'required'
        ]);

        $planeta->name = $request->name;
        $planeta->info = $request->info;
        $planeta->update();

        return $planeta;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Planeta  $planeta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Planeta $planeta)
    {
        if(is_null($planeta)){
            return response()->json('objeto no encontrado', 404);
        }

        $planeta->delete();

        return response()->noContent();
    }
}
