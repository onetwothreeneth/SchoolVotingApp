<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Models\Partylist; 
use App\Models\Election; 
use Redirect,Requests,Hash,Validator,Auth;
use App\Services\Repositories\Resource\ResourceRepository;

class PartyListController extends Controller
{
    protected $partylist; 
	protected $request;
    protected $id;

    function __construct(Partylist $partylist,Request $request)
    { 
        $this->partylist = new ResourceRepository($partylist);
    	$this->request = $request; 
    }

    public function valid($election)
    {
        $this->id = Election::findorfail($election);
    }

    public function index($election)
    {  
        $this->valid($election);

    	return view('pages.partylist.index')
    		->with([
	    		'title' => 'Election',
	    		'active' => 'Election',
	    		'breadcrumbs' => [
	    			'title' => 'PartyList',
	    			'icon' => 'la la-legal',
                    'main' => Election::find($election)->sy(),
                    'sub' => 'Records'
	    		],
                'election' => $election,
	    		'data' => $this->partylist->getAll(['election_id' => $election ])
    	]);
    }

    public function add($election)
    {   
        $parameters = [
            'name' => $this->request->name,
            'election_id' => $election,
            'vision' => $this->request->vision,
            'status' => 1
        ];
        
        if ($this->partylist->getCount($parameters) != 0) {
            return Redirect::route('partylist',$election)
                ->with([
                    'error' => 'Partylist already exists !' 
                ]);
        }

        $this->partylist->create($parameters);

        return Redirect::route('partylist',$election)
            ->with([
                'success' => 'Partylist has been successfuly added !'
            ]);
    }

    public function update($election,$id)
    {   
        $parameters = [
            'name' => $this->request->name,
            'election_id' => $election,
            'vision' => $this->request->vision,
        ];
 
        if ($this->partylist->getCount($parameters,$id) >= 1) {
            return Redirect::route('partylist',$election)
                ->with([
                    'error' => 'Partylist already exists !' 
                ]);
        }

        $this->partylist->update($id,$parameters);

        return Redirect::route('partylist',$election)
            ->with([
                'success' => 'Partylist has been successfuly updated !'
            ]);
    }

    public function delete($election,$id)
    {
    	$this->partylist->delete($id);

    	return Redirect::route('partylist',$election)
    		->with([
    			'success' => 'Partylist has been successfuly deleted !'
    		]);

    }
}
