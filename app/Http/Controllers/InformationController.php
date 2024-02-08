<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Information;

class InformationController extends Controller
{
    public function index(){
        // Fetch all information from the database
        $allInformation = Information::all();
        return view('information.index', ['Information' => $allInformation]);

    }

    public function create(){
        return view('information.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'suffix' => 'nullable|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'service' => 'required|in:STUDY,WORK,LIVE',
        ]);

        // Create a new Information instance and save it to the database
        $information = new Information();
        $information->first_name = $request->input('first_name');
        $information->middle_name = $request->input('middle_name');
        $information->last_name = $request->input('last_name');
        $information->suffix = $request->input('suffix');
        $information->email = $request->input('email');
        $information->phone = $request->input('phone');
        $information->service = $request->input('service');
        
        $information->save();

        // Fetch all information from the database again
        $allInformation = Information::all();

        // Redirect the user back or wherever you want
        return view('information.index', ['Information' => $allInformation])->with('success', 'Information submitted successfully!');
    }
    public function edit(Information $information){
        return view('information.edit', compact('information'));
    }
    public function update(Request $request, Information $information){
        $data = $request->validate([
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'suffix' => 'nullable|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'service' => 'required|in:STUDY,WORK,LIVE',
        ]);

        // Update the information instance
        $information->update($data);

        // Redirect the user back or wherever you want
        return redirect()->route('information.index')->with('success', 'Information updated successfully!');
    }
    public function destroy(Information $information)
{
    $information->delete();
    return redirect()->route('information.index')->with('success', 'Information deleted successfully!');
}

}
