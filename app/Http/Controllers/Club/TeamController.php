<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use App\Models\Club\Team;
use App\Models\Club\Club;
use App\Models\Club\Player;
use App\Models\Club\Administrator;
use App\Models\Club\Schedule;
use App\Models\Club\ClubAdministrator as CA;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function allTeamDashboard(){

        $id =  session('club_id');
       //echo session('club_id');
       //dump($id);\
       $teams = Team::withCount('players')->where('club_id',$id)->get();
       // dd($teams);
       $pluck_teams = Team::where('club_id',$id)->pluck('id');
    //    dd($pluck_teams->all());
       
        $players = Player::with(['teamMeta.team','administrator.user'])->where('club_id', $id)->get();

         //dd($players);
       
        $scheduleTournaments = Schedule::with('team')->whereIn('team_id',$pluck_teams)->where('type','Tournaments')->get();

        $scheduleGame = Schedule::with('team')->whereIn('team_id',$pluck_teams)->where('type','Game')->get();
        $schedulePractice = Schedule::with('team')->whereIn('team_id',$pluck_teams)->where('type','Practice')->get();
        $title = "Team Management";



        if(auth()->user()->role == 'player' || auth()->user()->role == 'player_administrator'){
            $playerMetaTeam = PlayerMetaTeam::where('user_id',auth()->user()->id)->pluck('team_id');
            $teams = Team::withCount('players')->whereIn('id',$playerMetaTeam)->get();
            $pluck_teams = Team::where('club_id',$id)->whereIn('id',$playerMetaTeam)->pluck('id');
            $teamPlayersGet = PlayerMetaTeam::whereIn('team_id',$pluck_teams)->pluck('player_id');
            $players = Player::with(['teamMeta.team','administrator.user'])->whereIn('id',$teamPlayersGet)->get();
            $scheduleTournaments = Schedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Tournaments')->get();
            $scheduleGame = Schedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Game')->get();
            $schedulePractice = Schedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Practice')->get();
            $title = "Player Management";
        }

        return view('team.allTeam', compact('id','title','teams' , 'players', 'scheduleTournaments', 'scheduleGame','schedulePractice'));
    }

    public function teamDashboard(){

        $id =  session('club_id');
       //echo session('club_id');
       //dd($id);
       $club_administrator = CA::where('club_id',$id)->get();
       $teams = Team::withCount('players')->where('club_id',$id)->get();
       // dd($teams);
       $pluck_teams = Team::with('')->where('club_id',$id)->pluck('id');
    //    dd($pluck_teams->all());
       
        $players = Player::with(['teamMeta.team','administrator.user'])->where('club_id', $id)->get();

         //dd($players);
       
        $scheduleTournaments = Schedule::with('team')->whereIn('team_id',$pluck_teams)->where('type','Tournaments')->get();

        $scheduleGame = Schedule::with('team')->whereIn('team_id',$pluck_teams)->where('type','Game')->get();
        $schedulePractice = Schedule::with('team')->whereIn('team_id',$pluck_teams)->where('type','Practice')->get();
        $title = "Management";
        $administrators = Administrator::with('teamAdmin')->whereIn('team_id',$pluck_teams)->get();


        if(auth()->user()->role == 'player' || auth()->user()->role == 'player_administrator'){
            $playerMetaTeam = PlayerMetaTeam::where('user_id',auth()->user()->id)->pluck('team_id');
            $teams = Team::withCount('players')->whereIn('id',$playerMetaTeam)->get();
            $pluck_teams = Team::where('club_id',$id)->whereIn('id',$playerMetaTeam)->pluck('id');
            $teamPlayersGet = PlayerMetaTeam::whereIn('team_id',$pluck_teams)->pluck('player_id');
            $players = Player::with(['teamMeta.team','administrator.user'])->whereIn('id',$teamPlayersGet)->get();
            $scheduleTournaments = Schedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Tournaments')->get();
            $scheduleGame = Schedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Game')->get();
            $schedulePractice = Schedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Practice')->get();
            $title = "Player Management";
        }

        return view('team.teamDashboard', compact('id','title','teams','club_administrator' ,'administrators', 'players', 'scheduleTournaments', 'scheduleGame','schedulePractice'));
    }

    public function teamDashboardSchedule(){

        $id =  session('club_id');
       //echo session('club_id');
       //dump($id);
       $club_administrator = CA::where('club_id',$id)->get();
       $teams = Team::withCount('players')->where('club_id',$id)->get();
       // dd($teams);
       $pluck_teams = Team::where('club_id',$id)->pluck('id');
    //    dd($pluck_teams->all());
       
        $players = Player::with(['teamMeta.team','administrator.user'])->where('club_id', $id)->get();

         //dd($players);
       
        $scheduleTournaments = Schedule::with('team')->whereIn('team_id',$pluck_teams)->where('type','Tournaments')->get();

        $scheduleGame = Schedule::with('team')->whereIn('team_id',$pluck_teams)->where('type','Game')->get();
        $schedulePractice = Schedule::with('team')->whereIn('team_id',$pluck_teams)->where('type','Practice')->get();
        $title = "Management";



        if(auth()->user()->role == 'player' || auth()->user()->role == 'player_administrator'){
            $playerMetaTeam = PlayerMetaTeam::where('user_id',auth()->user()->id)->pluck('team_id');
            $teams = Team::withCount('players')->whereIn('id',$playerMetaTeam)->get();
            $pluck_teams = Team::where('club_id',$id)->whereIn('id',$playerMetaTeam)->pluck('id');
            $teamPlayersGet = PlayerMetaTeam::whereIn('team_id',$pluck_teams)->pluck('player_id');
            $players = Player::with(['teamMeta.team','administrator.user'])->whereIn('id',$teamPlayersGet)->get();
            $scheduleTournaments = Schedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Tournaments')->get();
            $scheduleGame = Schedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Game')->get();
            $schedulePractice = Schedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Practice')->get();
            $title = "Player Management";
        }

        return view('team.teamSchedule', compact('id','title','teams','club_administrator' , 'players', 'scheduleTournaments', 'scheduleGame','schedulePractice'));
    }



    public function index($id)
    {
        $id = base64_decode($id);
       
         $teams = Team::where('club_id',$id)->get();
        return view('team.list', compact('id','teams'));
    }

    public function info($id)
    {
        $id = base64_decode($id);
        $players = Player::where('team_id',$id)->get();
        $administrators = Administrator::where('team_id',$id)->get();
        $scheduleTournaments = Schedule::where('team_id',$id)->where('type','Tournaments')->get();
        $scheduleGame = Schedule::where('team_id',$id)->where('type','Game')->get();
        $schedulePractice = Schedule::where('team_id',$id)->where('type','Practice')->get();
        return view('team.info',compact('id','players','administrators','scheduleTournaments','scheduleGame','schedulePractice'));
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
        return redirect()->route('club.dashboard', base64_encode($request->club_id))->with('success', 'Team created successfully!');
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
        return redirect()->route('club.dashboard', base64_encode($team->club_id))
            ->with('success', 'Team updated successfully.');
    }

    public function updateStatus(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        $team->status = !$team->status; // Toggle status
        $team->save();

        return redirect()->route('club.dashboard')->with('success', 'Team status updated successfully.');
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
