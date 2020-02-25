<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Models\Level;
use App\Models\Position;
use Redirect,Requests,Hash,Validator,Auth;
use App\Services\Repositories\Resource\ResourceRepository;

class PositionController extends Controller
{
    protected $position;
    protected $level;
	protected $request;

    function __construct(Level $level,Position $position,Request $request)
    {
        $this->level = new ResourceRepository($level);
        $this->position = new ResourceRepository($position);
    	$this->request = $request; 
    }

    public function index()
    {  
    	return view('pages.position.index')
    		->with([
	    		'title' => 'Position',
	    		'active' => 'Position',
	    		'breadcrumbs' => [
	    			'title' => 'Position',
	    			'icon' => 'la la-line-chart',
	    			'main' => 'Records'
	    		],
	    		'data' => $this->position->getAll(),
                'level' => $this->level->getAll()
    	]);
    }

    public function add()
    {   
        $parameters = [
            'name' => $this->request->name,
            'eligibility' => $this->request->eligibility,
            'status' => 1
        ];
        
        if ($this->position->getCount($parameters) != 0) {
            return Redirect::route('position')
                ->with([
                    'error' => 'Position already exists !' 
                ]);
        }

        $this->position->create($parameters);

        return Redirect::route('position')
            ->with([
                'success' => 'Position has been successfuly added !'
            ]);
    }

    public function update($id)
    {   
        $parameters = [
            'name' => $this->request->name,
            'eligibility' => $this->request->eligibility,
        ];
 
        if ($this->position->getCount($parameters,$id) >= 1) {
            return Redirect::route('position')
                ->with([
                    'error' => 'Position already exists !' 
                ]);
        }

        $this->position->update($id,$parameters);

        return Redirect::route('position')
            ->with([
                'success' => 'Position has been successfuly updated !'
            ]);
    }

    public function delete($id)
    {
    	$this->position->delete($id);

    	return Redirect::route('position')
    		->with([
    			'success' => 'Position has been successfuly deleted !'
    		]);

    }
}
