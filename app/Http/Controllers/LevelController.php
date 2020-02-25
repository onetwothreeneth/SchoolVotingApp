<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Models\Level;
use App\Models\Schedule;
use Redirect,Requests,Hash,Validator,Auth;
use App\Services\Repositories\Resource\ResourceRepository;

class LevelController extends Controller
{
    protected $schedule;
    protected $level;
	protected $request;

    function __construct(Level $level,Schedule $schedule,Request $request)
    {
        $this->level = new ResourceRepository($level);
        $this->schedule = new ResourceRepository($schedule);
    	$this->request = $request; 
    }

    public function index()
    {  
    	return view('pages.level.index')
    		->with([
	    		'title' => 'Grade Level',
	    		'active' => 'Grade Level',
	    		'breadcrumbs' => [
	    			'title' => 'Grade Level',
	    			'icon' => 'la la-bar-chart-o',
	    			'main' => 'Records'
	    		],
	    		'data' => $this->level->getAll(),
                'schedule' => $this->schedule->getAll()
    	]);
    }

    public function add()
    {   
        $parameters = [
            'level' => $this->request->level,
            'schedule_id' => $this->request->schedule_id,
            'status' => 1
        ];
        
        if ($this->level->getCount($parameters) != 0) {
            return Redirect::route('level')
                ->with([
                    'error' => 'Grade level already exists !' 
                ]);
        }

        $this->level->create($parameters);

        return Redirect::route('level')
            ->with([
                'success' => 'Level has been successfuly added !'
            ]);
    }

    public function update($id)
    {   
        $parameters = [
            'level' => $this->request->level,
            'schedule_id' => $this->request->schedule_id,
            'sched_end' => $this->request->sched_end
        ];
 
        if ($this->level->getCount($parameters,$id) >= 1) {
            return Redirect::route('level')
                ->with([
                    'error' => 'Grade level already exists !' 
                ]);
        }

        $this->level->update($id,$parameters);

        return Redirect::route('level')
            ->with([
                'success' => 'Level has been successfuly updated !'
            ]);
    }

    public function delete($id)
    {
    	$this->level->delete($id);

    	return Redirect::route('level')
    		->with([
    			'success' => 'Level has been successfuly deleted !'
    		]);

    }
}
