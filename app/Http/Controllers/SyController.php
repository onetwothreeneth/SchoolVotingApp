<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Models\Sy;
use Redirect,Requests,Hash,Validator,Auth;
use App\Services\Repositories\Resource\ResourceRepository;

class SyController extends Controller
{
	protected $sy;
	protected $request;

    function __construct(Sy $sy,Request $request)
    {
    	$this->sy = new ResourceRepository($sy);
    	$this->request = $request; 
    }

    public function index()
    {  
    	return view('pages.schoolyear.index')
    		->with([
	    		'title' => 'School Year',
	    		'active' => 'School Year',
	    		'breadcrumbs' => [
	    			'title' => 'School Year',
	    			'icon' => 'la la-calendar-o',
	    			'main' => 'Records'
	    		],
	    		'data' => $this->sy->getAll()
    	]);
    }

    public function add()
    {  
    	$data = explode(' - ', $this->request->sy);
    	$parameters = [
    		'sy_start' => $data[0],
    		'sy_end' => $data[1],
    		'status' => 1
    	];

    	if ($this->sy->getCount($parameters) != 0) {
	    	return Redirect::route('sy')
	    		->with([
	    			'error' => 'School year already exists !'
	    		]);
    	}

    	if (date('Y') != $data[0]) {
	    	return Redirect::route('sy')
	    		->with([
	    			'error' => 'You cannot add future School Year !'
	    		]);
    	}

    	$this->sy->create($parameters);

    	return Redirect::route('sy')
    		->with([
    			'success' => 'School year has been successfuly added !'
    		]);
    }

    public function delete($id)
    {
    	$this->sy->delete($id);

    	return Redirect::route('sy')
    		->with([
    			'success' => 'School year has been successfuly deleted !'
    		]);

    }
}
