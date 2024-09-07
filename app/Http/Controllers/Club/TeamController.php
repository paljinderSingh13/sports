<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use App\Models\Club\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
         $teams = Team::where('club_id',$id)->get();
        return view('team.list',compact('id','teams'));
    }

    public function info()
    {
        return view('team.info');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //
        return view('team.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'club_id'   => 'required|integer',
            'name'      => 'required|string|max:255',
            'age_group' => 'required|string|max:255',
            'season'    => 'required|string|max:255',
            'status'    => 'required|string|in:1,0',
        ]);

        // Create a new Team instance and save the data
        Team::create([
            'club_id'   => $request->club_id,
            'name'      => $request->name,
            'age_group' => $request->age_group,
            'season'    => $request->season,
            'status'    => $request->status,
        ]);

        // Redirect with success message
        return redirect()->route('team.list',$request->club_id)->with('success', 'Team created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $team = Team::find($id);
        $team->delete();

        // Redirect back with a success message
        return back()->with('success', 'Team deleted successfully.');
    }
}
