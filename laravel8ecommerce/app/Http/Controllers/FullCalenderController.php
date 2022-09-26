<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class FullCalenderController extends Controller
{
    public function index(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
    	}
    	return view('fullcalender.full-calender');
    }

    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->type == 'add')
    		{
    			$event = Event::create([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'update')
    		{
    			$event = Event::find($request->id)->update([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'delete')
    		{
    			$event = Event::find($request->id)->delete();

    			return response()->json($event);
    		}

			//new
			if($request->type == 'view')
    		{
    			$event = Event::find($request->id);
				
				// return view('fullcalender.full-calender', compact('event'));

    			// return response()->json($event);

			
				$userData['data'] = $event;

				return response()->json($userData);
				exit;
				
    		}
    	}
    }
	public function indexofView(Request $request)
    {
    
    		$data = Event::orderBy('id', 'DESC')
                       ->get();
          
    	return view('fullcalender.newfullCal', compact('data'));
    }
	

}
