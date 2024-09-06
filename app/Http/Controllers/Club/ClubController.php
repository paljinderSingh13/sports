<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use App\Models\Club\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function designfour()
    {
        //
        return view('club.designfour');
    }
    public function designthree()
    {
        //
        return view('club.designthree');
    }
    public function designtwo()
    {
        //
        return view('club.designtwo');
    }
    public function design()
    {
        //
        return view('club.design');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('club.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('club.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Club $club)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Club $club)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Club $club)
    {
        //
    }
}
