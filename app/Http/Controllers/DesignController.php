<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesignController extends Controller
{
    
    public function players()
    {
        //
        return view('design.players');
    }
    public function playerform()
    {
        //
        return view('design.playerform');
    }
}
