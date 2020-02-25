<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;   
use App\Models\Student;    
use App\Models\Section; 
use App\Models\Sy;
use Redirect,Requests,Hash,Validator,Auth,URL,UrlGenerator,Carbon\Carbon;
use App\Services\Repositories\Resource\ResourceRepository;

class StudentController extends Controller
{
    protected $student; 
    protected $section; 
    protected $sy;
	protected $request;

    function __construct(Student $student,Section $section,Sy $sy,Request $request)
    { 
        $this->student = new ResourceRepository($student);
        $this->section = new ResourceRepository($section);
        $this->sy = new ResourceRepository($sy);
    	$this->request = $request; 
    }

    public function index()
    {  
    	return view('pages.student.index')
    		->with([
	    		'title' => 'Student',
	    		'active' => 'Student',
	    		'breadcrumbs' => [
	    			'title' => 'Student',
	    			'icon' => 'la la-university',
	    			'main' => 'Records'
	    		],
	    		'data' => $this->student->getAll(),
                'section' => $this->section->getAll(),
                'sy' => $this->sy->getAll()
    	]);
    }

    public function add()
    {   
        $age = date('Y',strtotime($this->request->birthday));
        $now = date('Y',strtotime(Carbon::now()));
        $interval = $now-$age; 
        $default = $this->defaultPass($this->request->birthday);

        $parameters = [
            'lrn' => $this->request->lrn, 
			'section_id' => $this->request->section, 
			'email' => $this->request->email, 
			'schoolyear' => $this->request->sy, 
			'fname' => $this->request->fname, 
			'mname' => $this->request->mname, 
			'lname' => $this->request->lname, 
			'age' => $interval, 
			'gender' => $this->request->gender, 
			'address' => $this->request->address, 
			'parent' => $this->request->parent, 
			'active' => 0, 
			'default' => $default, 
            'status' => 1
        ];
        
        if ($this->student->getCount($parameters) != 0) {
            return Redirect::route('student')
                ->with([
                    'error' => 'Student already exists !' 
                ]);
        }

        if (strlen($this->request->lrn) != 12) {
            return Redirect::route('student')
                ->with([
                    'error' => 'LRN should be 13 digit !' 
                ]);
        }

        $this->student->create($parameters);

        return Redirect::route('student')
            ->with([
                'success' => 'Student has been successfuly added !'
            ]);
    }

    public function defaultPass($pass)
    {
        $password = $pass; 
        $toTime = strtotime($password); 
        $toDate = date('m-d-Y',$toTime); 
        $toClean = str_replace('_', '', $toDate);
        $toClean2 = str_replace('/', '', $toClean); 
        $toHash = Hash::make($toClean2);

        return $toHash;
    }

    public function update($id)
    {   
        $check = [
            'lrn' => $this->request->lrn, 
            'section_id' => $this->request->section, 
            'email' => $this->request->email, 
            'schoolyear' => $this->request->sy, 
            'fname' => $this->request->fname, 
            'mname' => $this->request->mname, 
            'lname' => $this->request->lname, 
            'age' => $this->request->age, 
            'gender' => $this->request->gender, 
            'address' => $this->request->address, 
            'paresnt' => $this->request->parent 
        ];

        $parameters = [ 
            'section_id' => $this->request->section, 
            'email' => $this->request->email, 
            'schoolyear' => $this->request->sy, 
            'fname' => $this->request->fname, 
            'mname' => $this->request->mname, 
            'lname' => $this->request->lname, 
            'age' => $this->request->age, 
            'gender' => $this->request->gender, 
            'address' => $this->request->address, 
            'paresnt' => $this->request->parent 
        ];
 
        if ($this->student->getCount($check,$id) >= 1) {
            return Redirect::route('student')
                ->with([
                    'error' => 'Student already exists !' 
                ]);
        }

        // if (strlen($this->request->lrn) != 12) {
        //     return Redirect::route('student')
        //         ->with([
        //             'error' => 'LRN should be 13 digit !' 
        //         ]);
        // }


        if(isset($this->request->birthday)){
            $parameters['default'] = $this->defaultPass($this->request->birthday);
        }
 
        $this->student->update($id,$parameters);

        return Redirect::route('student')
            ->with([
                'success' => 'Student has been successfuly updated !'
            ]);
    }

    public function import()
    {
    	$file = $this->request->file('file');
		$filename = str_replace(' ', '_', $file->getClientOriginalName());
		$file->move(public_path("/uploads/student/"), $filename);
		$path = public_path("/uploads/student/") . $filename;

    	$handle = fopen($path, "r");
		$header = true;
        $total = 0;
		while ($csvLine = fgetcsv($handle, 1000, ",")) {
			if ($header) {
				$header = false;
			} else {
                if($csvLine[1] != ''){ 
                    $data = array();
    				$data = [
    					'section_id' => $csvLine[0], 
    					'lrn' => $csvLine[1], 
    					'email' => $csvLine[2], 
    					'schoolyear' => $this->request->sy, 
    					'fname' => $csvLine[3], 
    					'mname' => $csvLine[4], 
    					'lname' => $csvLine[5], 
    					'age' => $csvLine[7], 
    					'gender' => $csvLine[8], 
    					'address' => $csvLine[9], 
    					'parent' => $csvLine[10], 
    					'active' => 0, 
    					'default' => $this->defaultPass($csvLine[6]),
    					'status' => 1
    				];
                    $this->student->create($data);
                    $total = $total + 1;
                }
			}
		}  

        return Redirect::route('student')
            ->with([
                'success' => $total.' Students has been successfuly imported !'
            ]);
    }

    public function delete($id)
    {
    	$this->student->delete($id);

    	return Redirect::route('student')
    		->with([
    			'success' => 'Student has been successfuly deleted !'
    		]);

    }
}
