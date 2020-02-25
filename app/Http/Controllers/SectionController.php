<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Models\Level;
use App\Models\Section;
use Redirect,Requests,Hash,Validator,Auth;
use App\Services\Repositories\Resource\ResourceRepository;

class SectionController extends Controller
{
    protected $section;
    protected $level;
	protected $request;

    function __construct(Level $level,Section $section,Request $request)
    {
        $this->level = new ResourceRepository($level);
        $this->section = new ResourceRepository($section);
    	$this->request = $request; 
    }

    public function index()
    {  
    	return view('pages.section.index')
    		->with([
	    		'title' => 'Section',
	    		'active' => 'Section',
	    		'breadcrumbs' => [
	    			'title' => 'Section',
	    			'icon' => 'la la-university',
	    			'main' => 'Records'
	    		],
	    		'data' => $this->section->getAll(),
                'level' => $this->level->getAll()
    	]);
    }

    public function add()
    {   
        $parameters = [
            'name' => $this->request->section,
            'gradelevel_id' => $this->request->level,
            'status' => 1
        ];
        
        if ($this->section->getCount($parameters) != 0) {
            return Redirect::route('section')
                ->with([
                    'error' => 'Section already exists !' 
                ]);
        }

        $this->section->create($parameters);

        return Redirect::route('section')
            ->with([
                'success' => 'Section has been successfuly added !'
            ]);
    }

    public function update($id)
    {   
        $parameters = [
            'name' => $this->request->section,
            'gradelevel_id' => $this->request->level,
            'status' => 1
        ];
 
        if ($this->section->getCount($parameters,$id) >= 1) {
            return Redirect::route('section')
                ->with([
                    'error' => 'Section already exists !' 
                ]);
        }

        $this->section->update($id,$parameters);

        return Redirect::route('section')
            ->with([
                'success' => 'Section has been successfuly updated !'
            ]);
    }

    public function delete($id)
    {
    	$this->section->delete($id);

    	return Redirect::route('section')
    		->with([
    			'success' => 'Section has been successfuly deleted !'
    		]);

    }
}
