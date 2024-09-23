<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use App\Models\Club\Schedule;
use App\Models\Club\Team;
use Illuminate\Http\Request;

class ScheduleController extends Controller
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
        $teams = Team::get();
        return view('team.schedule.create',compact('id','teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $validated = $request->validate([
            'type' => 'required|string|in:Tournaments,Game,Practice',
            
            'status' => 'required',
        ]);

        // Create a new schedule record
        $schedule = new Schedule();

            // Assign request data to the model fields
            $schedule->team_id = $request->input('team_id');
            $schedule->name = $request->input('name');
            $schedule->type = $request->input('type');
            $schedule->opposing_team_id = $request->input('opposing_team_id');
            $schedule->purpose_detail = $request->input('purpose_detail');
            $schedule->timing_from = $request->input('time_from');
            $schedule->timing_to = $request->input('time_to');
            $schedule->location = $request->input('location');
            $schedule->city = $request->input('city');
            $schedule->date = $request->input('date');
            $schedule->time = $request->input('time');
            $schedule->date_from = $request->input('date_from');
            $schedule->date_to = $request->input('date_to');
            $schedule->status = $request->input('status');
            // Save the data to the database
            $schedule->save();
        // Redirect to a route with a success message
        return redirect()->route('team.info',base64_encode($request->input('team_id')))->with('success', 'Schedule created successfully.');

   
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
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
        $schedule = Schedule::find($id);
        $teams = Team::get();
        return view('team.schedule.edit',compact('id','schedule','teams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $id = base64_decode($id);

         $schedule = Schedule::findOrFail($id);

        // Update the schedule with validated data
        $schedule->update([
            'type' => $request['type'],
            'status' => $request['status'],
            'opposing_team_id' => $request['opposing_team_id'] ?? null,
            'location' => $request['location'] ?? null,
            'city' => $request['city'] ?? null,
            'date' => $request['date'] ?? null,
            'time' => $request['time'] ?? null,
            'purpose_detail' => $request['purpose_detail'] ?? null,
            'date_from' => $request['date_from'] ?? null,
            'date_to' => $request['date_to'] ?? null,
            'timing_from' => $request['time_from'] ?? null,
            'timing_to' => $request['time_to'] ?? null,
        ]);

        // Redirect back with a success message
        return redirect()->route('team.info',base64_encode($schedule->team_id))->with('success', 'Schedule updated successfully.');
    
    }

     public function updateStatus(Request $request, $id)
    {
       $id = base64_decode($id);
        $schedule = Schedule::findOrFail($id);
        $schedule->status = !$schedule->status; // Toggle status
        $schedule->save();

        return back()->with('success', 'Schedule status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
       $id = base64_decode($id);
        $schedule = Schedule::find($id);
        $schedule->delete();

        // Redirect back with a success message
        return back()->with('success', 'Schedule deleted successfully.');
    }
}
