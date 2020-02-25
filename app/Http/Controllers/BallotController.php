<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Models\User;
use App\Models\Student;
use App\Models\Election;
use App\Models\Position;
use App\Models\Candidate;
use App\Models\Level;
use App\Models\Section;
use App\Models\Schedule;
use App\Models\Balot;
use App\Models\Partylist;
use Redirect,Requests,Hash,Validator,Auth,Carbon\Carbon;
use App\Services\Repositories\Resource\ResourceRepository;

class BallotController extends Controller
{
    protected $user;
    protected $student;
    protected $ballot;
	protected $request;

    function __construct(User $user,Student $student,Balot $ballot,Request $request)
    {
        $this->user = new ResourceRepository($user);
        $this->ballot = new ResourceRepository($ballot);
        $this->student = new ResourceRepository($student);
    	$this->request = $request; 
    }

    public function index()
    {     
    	return view('pages.ballot.index')
    		->with([
                'title' => 'My Ballot',
                'active' => 'My Ballot',
                'breadcrumbs' => [
                    'title' => 'Election Ballot',
                    'icon' => 'la la-hand-pointer-o',
                    'main' => 'Vote'
                ],
                'data' => $this->candidates(),
                'partylist' => $this->partylists()
            ]);
    }

    public function partylists()
    {   
        $date = Carbon::now('Asia/Singapore');

        if(Election::where('voting_start','<=',$date)
                       ->where('voting_end','>=',$date)
                       ->whereStatus(1)
                       ->count() <= 0){
            return false;
        }

        $election = Election::where('voting_start','<=',$date)
                       ->where('voting_end','>=',$date)
                       ->whereStatus(1);

        $eid = $election->count() != 0 ? $election->first()->id : 0;

        return Partylist::whereElection_id($eid)->whereStatus(1)->get();
    }

    public function mySection()
    {
        $id = Auth::user()->id;
        $std = $this->student->getAll(['user_id' => $id])->first();
        $section_id = $std->section_id;
        $section = Section::find($section_id)->gradelevel_id; 

        return $section;
    }

    public function candidates()
    {   
        $date = Carbon::now('Asia/Singapore');
        $eligibility = $this->mySection();

        if(Election::where('voting_start','<=',$date)
                       ->where('voting_end','>=',$date)
                       ->whereStatus(1)
                       ->count() <= 0){
            return false;
        }

        // Get all positions
        $positions = Position::whereStatus(1)
                        ->get();

        // Get current Election
        $election = Election::where('voting_start','<=',$date)
                       ->where('voting_end','>=',$date)
                       ->whereStatus(1)
                       ->first();

        // Get partylists
        $partylists = Partylist::whereElection_id($election->id)
                        ->get();

        $tally = array();

        foreach ($positions as $pos) {
            if ($pos->eligibility == 'all' || $pos->eligibility == $eligibility) { 
                $lists = array();
                foreach ($partylists as $party) { 
                    $candidates = Candidate::wherePartylist_id($party->id)
                        ->wherePosition_id($pos->id)->get();

                    foreach ($candidates as $can) {
                        array_push($lists, [
                            "candidate_id" => $can->id,
                            "details" => $this->studentData($can->student_id),
                            "votes" => Balot::whereElection_id($election->id)->whereCandidate_id($can->id)->wherePosition($pos->id)->count()
                        ]);
                    }
                }
                array_push($tally, [
                    "position_id" => $pos->id,
                    "position" => $pos->name,
                    "data" => $lists
                ]);
            }
        }

        return ($tally);

    }

    public function studentData($id)
    {
        $student = Student::find($id);

        return [
            'id' => $student->user_id,
            'lrn' => $student->lrn,
            'name' => $student->fname.' '.$student->mname.' '.$student->lname,
            'img'  => (User::whereUsername($student->lrn)->count() != 0) ? User::whereUsername($student->lrn)->first()->img : 'default.png'
        ];
    }

    public function partyVote()
    {
        $votes = array();
        $date = Carbon::now('Asia/Singapore');

        $election_id = Election::where('voting_start','<=',$date)
                       ->where('voting_end','>=',$date)
                       ->whereStatus(1)
                       ->first()->id;

        $params = Candidate::wherePartylist_id($this->request->partylist)->whereStatus(1)->get();

        $user_id = Auth::user()->id;
        $mydata = Student::whereUser_id($user_id)->first();
        $gradelevel = Level::find(Section::find($mydata->section_id)->gradelevel_id)->level;
        $section = Section::find($mydata->section_id)->name;
        $schedule = Schedule::find(Level::find(Section::find($mydata->section_id)->gradelevel_id)->schedule_id)->type; 

        foreach ($params as $k => $v) {
            $object = [
                "election_id" => $election_id,
                "user_id" => $user_id,
                "candidate_id" => $v->id,
                "position" => str_replace("'", "", $v->position_id),
                "gradelevel" => $gradelevel,
                "section" => $section,
                "schedule" => $schedule,
                "status" => 1
            ];

            array_push($votes, $object);
            $this->ballot->create($object);
        }
 
        return Redirect::route('ballot')
            ->with([
                "success" => "Thank you, Your ballot was successfuly saved !"
            ]);

    }

    public function vote()
    {
        $votes = array();
        $params = $this->request->vote;
        $date = Carbon::now('Asia/Singapore');

        if (count($params) <= 0) {
            return Redirect::route('ballot')
                ->with([
                    "error" => "Please vote atleast 1 candidate !"
                ]);
        }
        
        if($this->request->has('partylist')){
            return $this->partyVote();
        }

        $election_id = Election::where('voting_start','<=',$date)
                       ->where('voting_end','>=',$date)
                       ->whereStatus(1)
                       ->first()->id;

        $user_id = Auth::user()->id;
        $mydata = Student::whereUser_id($user_id)->first();
        $gradelevel = Level::find(Section::find($mydata->section_id)->gradelevel_id)->level;
        $section = Section::find($mydata->section_id)->name;
        $schedule = Schedule::find(Level::find(Section::find($mydata->section_id)->gradelevel_id)->schedule_id)->type; 

        foreach ($params as $k => $v) {
            $object = [
                "election_id" => $election_id,
                "user_id" => $user_id,
                "candidate_id" => $v,
                "position" => str_replace("'", "", $k),
                "gradelevel" => $gradelevel,
                "section" => $section,
                "schedule" => $schedule,
                "status" => 1
            ];

            array_push($votes, $object);
            $this->ballot->create($object);
        }

        return Redirect::route('ballot')
            ->with([
                "success" => "Thank you, Your ballot was successfuly saved !"
            ]);
    }
}










