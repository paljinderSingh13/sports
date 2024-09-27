<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Club\Team;
use App\Models\Club\Club;
use App\Models\Club\ClubAdministrator as CA;
use App\Models\Club\Player;
use App\Models\User;
use App\Models\Club\Schedule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Hash;
class ClubAdministrator extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function clubDashboard(){

        $id =  session('club_id');
       //echo session('club_id');
       //dump($id);
       $club_administrator = CA::where('club_id',$id)->get();
       $teams = Team::where('club_id',$id)->get();
       //dd($teams);
       $pluck_teams = Team::where('club_id',$id)->pluck('id');
       
        $players = Player::with('team')->whereIn('team_id', $pluck_teams)->get();
       
        $scheduleTournaments = Schedule::with('team')->whereIn('team_id',$pluck_teams)->where('type','Tournaments')->get();

        $scheduleGame = Schedule::with('team')->whereIn('team_id',$pluck_teams)->where('type','Game')->get();
        $schedulePractice = Schedule::with('team')->whereIn('team_id',$pluck_teams)->where('type','Practice')->get();
        $title = "Management";

        return view('club.dashboard', compact('id','title','teams','club_administrator' , 'players', 'scheduleTournaments', 'scheduleGame','schedulePractice'));
    }


    public function index()
    {
        $id =  session('club_id');
        $club_administrator = CA::where('club_id',$id)->get();
        $title = "Club Administrator";
        return view('club.administrator.list', compact('id', 'title', 'club_administrator'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        echo "club administrator";
        echo session('club_id');

       
        return view('club.administrator.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|min:10|max:13',
            'email' => 'required|email|max:255|unique:clubs,email',
        ]);
          
        // Check if validation fails
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Handle logo upload
        $logoPath = null;
        if ($request->hasFile('image')) {
            $logo = $request->file('image');
             $targetPath = public_path('pictures');
             if (!file_exists($targetPath)) {
                mkdir($targetPath, 0777, true);
            }

            $fileName = time() . '_' . $logo->getClientOriginalName();
            $logo->move($targetPath, $fileName);
            $logoPath = 'pictures/' . $fileName;
        }
        $pass = Hash::make($request->password);
        $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'role' => 'club',
                'password' => $pass,

        ]);
        // Create a new club record
        $club = new CA();
        $club->image = $logoPath;
        $club->user_id = $user->id;
        $club->club_id = session('club_id');
        $club->name = $request->input('name');
        $club->phone = $request->input('phone');
        $club->role = $request->input('role');
        $club->email = $request->input('email');
        $club->save();

        // Redirect with success message
        return redirect()->route('club.dashboard')->with('success', 'Club Administrator created successfully!');

       
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
