<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Models\Election;
use App\Models\Sy;
use Redirect,Requests,Hash,Validator,Auth;
use App\Services\Repositories\Resource\ResourceRepository;

class ElectionController extends Controller
{
    protected $election;
    protected $sy;
	protected $request;

    function __construct(Election $election,Sy $sy,Request $request)
    {
        $this->election = new ResourceRepository($election);
        $this->sy = new ResourceRepository($sy);
    	$this->request = $request; 
    }

    public function index()
    {  
    	return view('pages.election.index')
    		->with([
	    		'title' => 'Election',
	    		'active' => 'Election',
	    		'breadcrumbs' => [
	    			'title' => 'Election',
	    			'icon' => 'la la-hand-pointer-o',
	    			'main' => 'Records'
	    		],
	    		'data' => $this->election->getAll(),
                'sy' => $this->sy->getAll()
    	]);
    }

    public function add()
    {   
        $parameters = [
            'schoolyear' => $this->request->sy,
            'voting_start' => $this->request->voting_start,
            'voting_end' => $this->request->voting_end,
            'status' => 1
        ];
        
        if (strtotime($parameters['voting_start']) >= strtotime($parameters['voting_end'])) {
            return Redirect::route('election')
                ->with([
                    'error' => 'Invalid Voting date !' 
                ]);
        }

        if ($this->election->getCount($parameters) != 0) {
            return Redirect::route('election')
                ->with([
                    'error' => 'Elected already exists !' 
                ]);
        }

        $this->election->create($parameters);

        return Redirect::route('election')
            ->with([
                'success' => 'Election has been successfuly added !'
            ]);
    }

    public function update($id)
    {   
        $parameters = [
            'schoolyear' => $this->request->sy,
            'voting_start' => $this->request->voting_start,
            'voting_end' => $this->request->voting_end
        ];
 
        if (strtotime($parameters['voting_start']) >= strtotime($parameters['voting_end'])) {
            return Redirect::route('election')
                ->with([
                    'error' => 'Invalid Voting date !' 
                ]);
        }
        
        if ($this->election->getCount($parameters,$id) != 0) {
            return Redirect::route('election')
                ->with([
                    'error' => 'Election already exists !' 
                ]);
        }

        $this->election->update($id,$parameters);

        return Redirect::route('election')
            ->with([
                'success' => 'Election has been successfuly updated !'
            ]);
    }

    public function delete($id)
    {
    	$this->election->delete($id);

    	return Redirect::route('election')
    		->with([
    			'success' => 'Election has been successfuly deleted !'
    		]);

    }
}
