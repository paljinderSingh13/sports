<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use App\Models\Club\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClubController extends Controller
{
    public function listtwo()
    {
        //
        return view('club.listtwo');
    }
    public function login()
    {
        //
        return view('club.login');
    }
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
        $clubs = Club::all();
        return view('club.list',compact('clubs'));
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
        // Validation rules
        $validator = Validator::make($request->all(), [
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'contact_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:clubs,email',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Handle logo upload
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
             $targetPath = public_path('logos');
             if (!file_exists($targetPath)) {
                mkdir($targetPath, 0777, true);
            }

            $fileName = time() . '_' . $logo->getClientOriginalName();
            $logo->move($targetPath, $fileName);
            $logoPath = 'logos/' . $fileName;
        }

        // Create a new club record
        $club = new Club();
        $club->logo = $logoPath;
        $club->name = $request->input('name');
        $club->address = $request->input('address');
        $club->city = $request->input('city');
        $club->state = $request->input('state');
        $club->country = $request->input('country');
        $club->postal_code = $request->input('postal_code');
        $club->contact_name = $request->input('contact_name');
        $club->phone = $request->input('phone');
        $club->email = $request->input('email');
        $club->save();

        // Redirect with success message
        return redirect()->route('club.create')->with('success', 'Club created successfully!');
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
    public function destroy($id)
    {
        $club = Club::find($id);
        $club->delete();

        // Redirect back with a success message
        return redirect()->route('club.list')->with('success', 'Club deleted successfully.');
    }
}
