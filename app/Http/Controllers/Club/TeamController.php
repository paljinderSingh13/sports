<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use App\Models\Club\Team;
use App\Models\Club\Player;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $id = base64_decode($id);
         $teams = Team::where('club_id',$id)->get();
        return view('team.list',compact('id','teams'));
    }

    public function info($id)
    {
        $id = base64_decode($id);
        $players = Player::where('team_id',$id)->get();
        return view('team.info',compact('id','players'));
    }
    public function tform()
    {
        return view('team.tform');
    }
    public function tlist()
    {
        return view('team.tlist');
    }
    public function adminlist()
    {
        return view('team.adminlist');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //
        $id = base64_decode($id);
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
        return back()->with('success', 'Team created successfully!');
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
    public function edit($id)
    {
        //
        $team_id = base64_decode($id);
        $team = Team::where('id',$team_id)->first();
        return view('team.edit',compact('team_id','team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $id = base64_decode($id);
        $team = Team::where('id',$id)->first();
        $request->validate([
            'name' => 'required|string|max:255',
            'age_group' => 'required|string|max:255',
            'season' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        // Update the team
        $team->update([
            'name' => $request->name,
            'age_group' => $request->age_group,
            'season' => $request->season,
            'status' => $request->status,
        ]);

        // Redirect with a success message
        return redirect()->route('team.list', base64_encode($team->club_id))
            ->with('success', 'Team updated successfully.');
    }

    public function updateStatus(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        $team->status = !$team->status; // Toggle status
        $team->save();

        return back()->with('success', 'Team status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $id = base64_decode($id);
        $team = Team::find($id);
        $team->delete();

        // Redirect back with a success message
        return back()->with('success', 'Team deleted successfully.');
    }
}
