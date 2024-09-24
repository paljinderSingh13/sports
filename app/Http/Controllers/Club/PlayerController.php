<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use App\Models\Club\Player;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //
        $id = base64_decode($id);
        $player['permanent'] = Player::select('priority')->where('type','permanent')->where('team_id',$id)->pluck('priority')->toArray();
        $player['substitute'] = Player::select('priority')->where('type','substitute')->where('team_id',$id)->pluck('priority')->toArray();
         return view('team.players.create', compact('id','player'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validation rules
        $request->validate([
            'team_id' => 'required|exists:teams,id',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'priority' => 'required|integer',
            'dob' => 'required|date',
            'proof_id' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255|unique:players,email',
            'status' => 'required|boolean',
        ]);

         $pass = Hash::make($request->password);
        $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'role' => 'player',
                'password' => $pass,

        ]);
        $player = new Player();
        $player->team_id = $request->team_id;
        $player->name = $request->name;
        $player->user_id = $user->id;
        $player->type = $request->type;
        $player->priority = $request->priority;
        $player->dob = $request->dob;
        $player->phone = $request->phone;
        $player->email = $request->email;
        $player->status = $request->status;

         if ($request->hasFile('picture')) {
            // Generate a unique filename and store the picture in the public directory
            $picture = $request->file('picture');
            $pictureName = time() . '_' . $picture->getClientOriginalName();
            $picture->move(public_path('teams/'.$request->team_id.'/pictures'), $pictureName);
            $player->picture = 'teams/'.$request->team_id.'/pictures/' . $pictureName;
        }

        if ($request->hasFile('proof_id')) {
            // Generate a unique filename and store the proof_id in the public directory
            $proof = $request->file('proof_id');
            $proofName = time() . '_' . $proof->getClientOriginalName();
            $proof->move(public_path('teams/'.$request->team_id.'/proofs'), $proofName);
            $player->proof_id = 'teams/'.$request->team_id.'/proofs/' . $proofName;
        }

        $player->save();

        return redirect()->route('team.info', base64_encode($player->team_id))->with('success', 'Player created successfully.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $id = base64_decode($id);
        $player = Player::where('id',$id)->first();
        $players['permanent'] = Player::select('priority')->where('type','permanent')->where('team_id',$player->team_id)->pluck('priority')->toArray();
        $players['substitute'] = Player::select('priority')->where('type','substitute')->where('team_id',$player->team_id)->pluck('priority')->toArray();
        return view('team.players.edit',compact('player','players'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $request->validate([
            'team_id' => 'required|exists:teams,id',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'priority' => 'required|integer',
            'dob' => 'required|date',
            'proof_id' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'status' => 'required|boolean',
        ]);

    // Find the player by ID
        $player = Player::findOrFail($id);
        $player->team_id = $request->team_id;
        $player->name = $request->name;
        $player->type = $request->type;
        $player->priority = $request->priority;
        $player->dob = $request->dob;
        $player->phone = $request->phone;
        $player->email = $request->email;
        $player->status = $request->status;

        // Handle picture upload
        if ($request->hasFile('picture')) {
            // Delete the old picture if it exists
            if ($player->picture && file_exists(public_path($player->picture))) {
                unlink(public_path($player->picture));
            }
            // Generate a unique filename and store the picture in the public directory
            $picture = $request->file('picture');
            $pictureName = time() . '_' . $picture->getClientOriginalName();
            $picture->move(public_path('teams/' . $request->team_id . '/pictures'), $pictureName);
            $player->picture = 'teams/' . $request->team_id . '/pictures/' . $pictureName;
        }

        // Handle proof_id document upload
        if ($request->hasFile('proof_id')) {
            // Delete the old proof document if it exists
            if ($player->proof_id && file_exists(public_path($player->proof_id))) {
                unlink(public_path($player->proof_id));
            }
            // Generate a unique filename and store the proof_id in the public directory
            $proof = $request->file('proof_id');
            $proofName = time() . '_' . $proof->getClientOriginalName();
            $proof->move(public_path('teams/' . $request->team_id . '/proofs'), $proofName);
            $player->proof_id = 'teams/' . $request->team_id . '/proofs/' . $proofName;
        }

        // Save the updated player details
        $player->save();

        // Redirect with success message
        return back()->with('success', 'Player updated successfully.');


    }

      public function updateStatus(Request $request, $id)
    {
        $id = base64_decode($id);
        $player = Player::findOrFail($id);
        $player->status = !$player->status; // Toggle status
        $player->save();

        return back()->with('success', 'Player status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        $id = base64_decode($id);
        $team = Player::find($id);
        $team->delete();

        // Redirect back with a success message
        return back()->with('success', 'Player deleted successfully.');
    }
}
