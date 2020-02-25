<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Models\Candidate; 
use App\Models\Student;  
use App\Models\Partylist; 
use App\Models\Position; 
use App\Models\Election; 
use App\Models\Level; 
use App\Models\Section; 
use Redirect,Requests,Hash,Validator,Auth;
use App\Services\Repositories\Resource\ResourceRepository;

class CandidateController extends Controller
{
    protected $candidate; 
    protected $position; 
	protected $student;
    protected $id;

    function __construct(Candidate $candidate,Position $position,Student $student,Request $request)
    { 
        $this->candidate = new ResourceRepository($candidate);
        $this->student = new ResourceRepository($student);
        $this->position = new ResourceRepository($position);
    	$this->request = $request; 
    }

    public function valid($party)
    {
        $this->id = Partylist::findorfail($party);
    }

    public function index($party)
    {  
        $this->valid($party); 
        $candidates = array();
        $positions = array();
        $unavailble = Candidate::wherePartylist_id($party)->whereStatus(1)->get();

        foreach ($unavailble as $k => $v) {
            array_push($candidates, $v->student_id); 
            array_push($positions, $v->position_id);
        }

    	return view('pages.candidate.index')
    		->with([
	    		'title' => 'Election',
	    		'active' => 'Election',
	    		'breadcrumbs' => [
	    			'title' => 'Candidates',
	    			'icon' => 'la la-sitemap',
                    'main' => Partylist::find($party)->name,
                    'sub' => 'Records'
	    		],
	    		'data' => $this->candidate->getAll(['partylist_id' => $party ]),
                'party' => $party,
                'position' => $this->position->getAll(),
                'positions' => $positions,
                'candidates' => $candidates,
                'student' => $this->student->getAll(['schoolyear' => Election::find(Partylist::find($party)->election_id)->schoolyear ])
    	]);
    }

    public function add($party)
    {   
        $parameters = [
            'student_id' => $this->request->student,
            'position_id' => $this->request->position,
            'intro' => $this->request->intro, 
            'gpa' => $this->request->gpa,
            'photo' => 'default.png',
            'status' => 1
        ];
        
        if ($this->candidate->getCount($parameters) != 0) {
            return Redirect::route('candidate',$party)
                ->with([
                    'error' => 'Candidate already exists !' 
                ]);
        }

        if ($this->request->gpa <= 84) {
            return Redirect::route('candidate',$party)
                ->with([
                    'error' => 'Candidate should have greater than 85% GPA !'
                ]);
        }

        $level = Section::find(Student::find($this->request->student)->section_id)->gradelevel_id;
        $eligibility = Position::find($this->request->position)->eligibility;

        if ($eligibility != 'all') {
            if ($level != $eligibility) {
                return Redirect::route('candidate',$party)
                    ->with([
                        'error' => "Per grade level position should match its candidate's grade leve ! "
                    ]);
            }
        }

        $parameters['partylist_id'] = $party;

        $files = ['file_coc','file_grade','file_goodmoral','file_consent'];

        for ($i=0; $i < count($files) ; $i++) {  
            $file = $this->request->file($files[$i]);
            $filename = str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path("/uploads/files/"), $filename);
            $parameters[$files[$i]] = $filename;
        }

        $this->candidate->create($parameters);

        return Redirect::route('candidate',$party)
            ->with([
                'success' => 'Candidate has been successfuly added !'
            ]);
    }

    public function update($party,$id)
    {   
        $parameters = [ 
            'intro' => $this->request->intro, 
            'gpa' => $this->request->gpa 
        ];

        $files = ['file_coc','file_grade','file_goodmoral','file_consent'];

        for ($i=0; $i < count($files) ; $i++) {  
            if($this->request->hasFile($files[$i])){
                $file = $this->request->file($files[$i]);
                $filename = str_replace(' ', '_', $file->getClientOriginalName());
                $file->move(public_path("/uploads/files/"), $filename);
                $parameters[$files[$i]] = $filename;   
            }
        }
        
        $this->candidate->update($id,$parameters);

        return Redirect::route('candidate',$party)
            ->with([
                'success' => 'Candidate has been successfuly updated !'
            ]);
    }

    public function delete($party,$id)
    {
    	$this->candidate->delete($id);

    	return Redirect::route('candidate',$party)
    		->with([
    			'success' => 'Candidate has been successfuly deleted !'
    		]);

    }
}
