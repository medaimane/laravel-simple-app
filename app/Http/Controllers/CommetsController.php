<?php

namespace App\Http\Controllers;

use App\Commets;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
     * @param  \App\Commets  $commets
     * @return \Illuminate\Http\Response
     */
    public function show(Commets $commets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commets  $commets
     * @return \Illuminate\Http\Response
     */
    public function edit(Commets $commets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commets  $commets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commets $commets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commets  $commets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commets $commets)
    {
        //
    }
}
