<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Models\Schedule;
use Redirect,Requests,Hash,Validator,Auth;
use App\Services\Repositories\Resource\ResourceRepository;

class ScheduleController extends Controller
{
	protected $schedule;
	protected $request;

    function __construct(Schedule $schedule,Request $request)
    {
    	$this->schedule = new ResourceRepository($schedule);
    	$this->request = $request; 
    }

    public function index()
    {  
    	return view('pages.schedule.index')
    		->with([
	    		'title' => 'Schedule',
	    		'active' => 'Schedule',
	    		'breadcrumbs' => [
	    			'title' => 'Schedule',
	    			'icon' => 'la la-calendar-o',
	    			'main' => 'Records'
	    		],
	    		'data' => $this->schedule->getAll()
    	]);
    }

    public function add()
    {   
        $parameters = [
            'type' => $this->request->type,
            'sched_start' => $this->request->sched_start,
            'sched_end' => $this->request->sched_end,
            'status' => 1
        ];
        
        if (strtotime($parameters['sched_start']) >= strtotime($parameters['sched_end'])) {
            return Redirect::route('schedule')
                ->with([
                    'error' => 'Invalid Schedule time !' 
                ]);
        }

        if ($this->schedule->getCount($parameters) != 0) {
            return Redirect::route('schedule')
                ->with([
                    'error' => 'Schedule already exists !' 
                ]);
        }

        $this->schedule->create($parameters);

        return Redirect::route('schedule')
            ->with([
                'success' => 'Schedule has been successfuly added !'
            ]);
    }

    public function update($id)
    {   
        $parameters = [
            'type' => $this->request->type,
            'sched_start' => $this->request->sched_start,
            'sched_end' => $this->request->sched_end
        ];
 
        if (strtotime($parameters['sched_start']) >= strtotime($parameters['sched_end'])) {
            return Redirect::route('schedule')
                ->with([
                    'error' => 'Invalid Schedule time !' 
                ]);
        }
        
        if ($this->schedule->getCount($parameters,$id) != 0) {
            return Redirect::route('schedule')
                ->with([
                    'error' => 'Schedule already exists !' 
                ]);
        }

        $this->schedule->update($id,$parameters);

        return Redirect::route('schedule')
            ->with([
                'success' => 'Schedule has been successfuly updated !'
            ]);
    }

    public function delete($id)
    {
    	$this->schedule->delete($id);

    	return Redirect::route('schedule')
    		->with([
    			'success' => 'Schedule has been successfuly deleted !'
    		]);

    }
}
