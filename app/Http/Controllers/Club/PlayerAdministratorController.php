<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Club\PlayerMetaAdministrator;
use App\Models\User;
use App\Models\Club\Player;
use Hash;

class PlayerAdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $PlayerMetaAdministrators = PlayerMetaAdministrator::with(['user','teamMeta','player'=>function($q){
                $q->with('teamMeta')->get();
        }])->orderBy('id','desc')->get();
        return view('team.players.administrator.list',compact('PlayerMetaAdministrators'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id =  session('club_id');
        $players = Player::where('club_id',$id)->get();
        return view('team.players.administrator.create',compact('players'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users',
                'phone' => 'required|max:15',
                'password' => 'required|min:8',
            ]);

            $admin = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'role' => 'player_administrator',
                'password' => Hash::make($request->password),
            ]);
            PlayerMetaAdministrator::create([
                    'user_id' => $admin->id,
                    'player_id' => $request->player_id,
                    'club_id' => $request->club_id,
                ]);

            return redirect()->route('player.administrator.list')->with('success','Administrator added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $id = base64_decode($id);
        $playeradmin = PlayerMetaAdministrator::where('id',$id)->first();
        return view('team.players.administrator.edit',compact('playeradmin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $id = base64_decode($id);
        $playeradmin = PlayerMetaAdministrator::where('id',$id)->first();
         $adminUser = User::find($playeradmin->user_id);
            $adminUser->name = $request->name;
            $adminUser->email = $request->email;
            $adminUser->phone = $request->phone;
            $adminUser->status = $request->status;
            $adminUser->save();

        return back()->with('success', 'Admin updated successfully.');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $playerId = base64_decode($id);
        $player = PlayerMetaAdministrator::findOrFail($playerId);
        $user = User::findOrFail($player->user_id);

        // Delete player and associated user
        $player->delete();
        $user->delete();

        // Redirect back with a success message
        return back()->with('success', 'player administrator deleted successfully.');
    }
}
