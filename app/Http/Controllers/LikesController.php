<?php

namespace App\Http\Controllers;

use App\Models\Rutina;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rutina  $rutina
     * @return \Illuminate\Http\Response
     */
    public function show(Rutina $rutina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rutina  $rutina
     * @return \Illuminate\Http\Response
     */
    public function edit(Rutina $rutina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rutina  $rutina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rutina $rutina)
    {
        //
        return auth()->user()->megusta()->toggle($rutina);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rutina  $rutina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rutina $rutina)
    {
        //
    }
}
