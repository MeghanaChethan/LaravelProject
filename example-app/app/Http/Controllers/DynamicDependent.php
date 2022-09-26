<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;

class DynamicDependent extends Controller
{
    //
    public function index()
    {
        $country_list = DB::table('country_state_city')
                        ->select('country')
                        ->groupBy('country')
                        ->get();

        return view('dynamic_dependent')->with('country_list', $country_list);
    }

    public function fetch1(Request $request)
    {
        $select = $request->get('select');  //select method recieve select variable data 
                                            //which is stored the select
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('country_state_city')
                ->where($select, $value)
                ->groupBy($dependent)
                ->get();

        $output = '<option value="">Select '.ucfirst($dependent).'</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }
        echo $output;

    }

    // mail
    public function txt_mail()
    {
        $info = array(
            'name' => "Alex"
        );
        Mail::send(['text' => 'mail'], $info, function ($message)
        {
            $message->to('iris.dev10@bfw.co.in', 'W3SCHOOLS')
                ->subject('Basic test eMail from W3schools.');
            $message->from('iris.dev10@bfw.co.in', 'Alex');
        });
        echo "Successfully sent the email";
    }
    
   
}
