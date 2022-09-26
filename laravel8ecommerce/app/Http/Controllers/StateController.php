<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Countries;
use Illuminate\Support\Facades\DB;

class StateController extends Controller
{
    //
    public function index()
    {
        // $states = State::all();

        // return view('NewLogin.state')->with('states', $states);
        $states = State::paginate(5);
        // return view('NewLogin.state', ['states'=>$states])->with('no', 1);

        $countries = Countries::all();

        return view('NewLogin.state')->with('countries', $countries)->with('states', $states)->with('no', 1);

      
    }
    public function index1()
    {
        $countries = Countries::all();

        return view('NewLogin.state')->with('countries', $countries);
    }
   
    public function addState(Request $request)
    {
        $request->validate([
            'state'=>'required',
            'country_key'=>'required'
        ]);

        $data = $request->all();

        State::create([
            'state' => $data['state'],
            'country_key' => $data['country_key'],
            'status' => '1'
        ]);

        return redirect('/state')->with('success', 'State Added Successfully');
    }
    public function updateState(Request $request)
    {
        $state = State::where('id', $request->id)->first();
        $state->country_key = $request->country_key;
        $state->state = $request->state;
        $state->save();


        return redirect('/state')->with('success', 'State has been Updated Successfully');

    }
    public function updateForm($id)
    {

        $state = State::where('id', $id)->first();
        $countries = Countries::all();

        // return view('NewLogin.state')->with('countries', $countries);
        return view('NewLogin.state', ['state'=>$state]);

    }
    public function deleteState($id)
    {
        $state = State::find($id)->delete();

        return redirect('/state')->with('success', 'State is Deleted Successfully');
    }

}
