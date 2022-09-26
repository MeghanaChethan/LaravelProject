<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cities;
use App\Models\State;
use App\Models\Countries;


class CityController extends Controller
{
    //
    public $selectedClass = null;
    public $sections = null;
    
    public function index()
    {
        $cities = Cities::paginate(5);
        // $states = State::all();
        // $countries = Countries::all();

        // return view('NewLogin.city')->with('countries', $countries)
        // ->with('states', $states)
        // ->with('cities', $cities)
        // ->with('no', 1);

        // $countries = Countries::all();

        // return view('NewLogin.city')->with('cities', $cities)->with('countries', $countries)->with('no', 1);
        return view('NewLogin.city')->with('cities', $cities)->with('no', 1);

    }

    public function addCity(Request $request)
    {
        $request->validate([
            'city' => 'required',
            'state_key' => 'required'
        ]);

        $data = $request->all();

      
        Cities::create([
            'city'=>$data['city'],
            'state_key' => $data['state_key'],
            'status' => '1'
        ]);

        return redirect('/city')->with('success', 'City Added Successfully');
    }

     public function getCountry()
     {
         $countries = Countries::all();
        //  return $countries;
        // return view('NewLogin.city')->with('countries', $countries);
        return view('NewLogin.city',compact("countries"));

     }
     public function getStates(Request $request)
     {

       
         $states = State::where('country_key', $request->id)
                ->get();

                if(count($states) > 0)
                {
                    return response()->json($states);

                }
       
     }

     public function getCities(Request $request)
     {
         $cities = Cities::where('state_key', $request->id)
                ->get();

                if(count($cities) > 0)
                {
                    return response()->json($cities);
                }
     }
     public function updateCity(Request $request)
     {
         $city = Cities::where('city_key', $request->id)->first();
         $city->city = $request->city;
         $city->state_key = $request->state_key;

         $city->save();

         return redirect('/city')->with('success', 'City has been Update Successfully');
     }
     public function updateForm($id)
     {
 
         $cityUpdate = Cities::where('city_key', $id)->first();
         $states = State::all();
 
         // return view('NewLogin.state')->with('countries', $countries);
         return view('NewLogin.city', ['cityUpdate'=>$cityUpdate]);
 
     }

   
}
