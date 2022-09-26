<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Countries;
use Illuminate\Support\Facades\Session;


class CountryController extends Controller
{
    //
    public function index()
    { 
        // $country = Countries::all();
        $country = Countries::paginate(5);


        return view('NewLogin.country', ['country'=>$country])->with('no', 1);

        // if($country->count() > 0)
        // {
        //     return view('NewLogin.country', ['country'=>$country])->with('no', 1);
        // }else{
        //     return view('NewLogin.emptyfile', ['country'=>$country]);
        // }
       
        // return view('NewLogin.country');
        
    }

    public function addCountry(Request $request)
    {
        $request->validate([
                'country' => 'required',
                'code' => 'required|unique:countries'
        ]);

        $data = $request->all();

        Countries::create([
            'country' =>$data['country'],
            'code' => $data['code'],
            'status' => 1
        ]);

        return redirect('/country')->with('success', 'Country Added Successfully');

    }

    public function updateCountry(Request $request)
    {
        $country = Countries::where('id', $request->id)->first();
        $country->country = $request->country;
        $country->code = $request->code;
        $country->save();
        // return "Country has been Updated Successfully";
        return redirect('/country')->with('success', 'Country Has been Updated Successfully');
    }
    public function updateForm($id)
    {
        $country = Countries::where('id', $id)->first();
        return view('NewLogin.country', ['country'=>$country]);

      
    }
    public function getCountry(){
        $country = Countries::all();
        return view('NewLogin.country', ['country'=>$country]);
    }
    public function deleteCountry($id)
    {
        //  $data = Countries::where('id', $id)->delete();

        
        // return "Post is deleted successfully!";
        // return redirect('/country')->with('success', 'Country is Deleted Successfully');

        $country = Countries::find($id)->delete();
        return redirect('/country')->with('success', 'Country is Deleted Successfully');

    
  
    }
}
