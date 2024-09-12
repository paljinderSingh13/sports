<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use App\Models\Club\Administrator;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */ 

   
    public function index($id)
    {
        //
        $team_id = $id;
        $administrators = Administrator::where('team_id',$id)->get();
        return view('team.administrator.list',compact('administrators','team_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //
         return view('team.administrator.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          // Validate incoming request data
        $validatedData = $request->validate([
            'team_id' => 'required|exists:teams,id', // Assumes there is a 'teams' table
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:50', // Customize as needed (e.g., 'admin', 'super-admin')
            'phone' => 'required|string|max:15|unique:administrators,phone',
            'email' => 'required|email|max:255|unique:administrators,email',
            'status' => 'required|in:active,inactive',
        ]);

        // Create a new administrator record
        $administrator = Administrator::create($validatedData);

        // Redirect or return a response (customize as needed)
        return redirect()->route('administrators.index') // Assuming you have a route named 'administrators.index'
            ->with('success', 'Administrator created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Administrator $administrator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Administrator $administrator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Administrator $administrator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $administrators = Administrator::where('id',$id)->delete();
        return back()->with('success', 'Administrator deleted successfully.');
    }
}
