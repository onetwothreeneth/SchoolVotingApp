<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Models\User;
use App\Models\Student;
use App\Models\Election;
use App\Models\Position;
use App\Models\Candidate;
use App\Models\Balot;
use App\Models\Partylist;
use Redirect,Requests,Hash,Validator,Auth,Carbon\Carbon;
use App\Services\Repositories\Resource\ResourceRepository;

class DashboardController extends Controller
{
	protected $user;
	protected $request;

    function __construct(User $user,Request $request)
    {
    	$this->user = new ResourceRepository($user);
    	$this->request = $request; 
    }

    public function index()
    { 
    	$aclLevel = Auth::user()->type;
    	$data = $this->student(); 

    	return view('pages.dashboard.student')
    		->with($data);
    }

    public function student()
    {
        return [
            'title' => 'Dashboard',
            'active' => 'Dashboard',
            'breadcrumbs' => [
                'title' => 'Dashboard',
                'icon' => 'la la-area-chart',
                'main' => 'Summary'
            ],
            'tally' => $this->tally()
        ];
    }

    public function tally()
    {   
        $date = Carbon::now('Asia/Singapore');

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
            $lists = array();
            foreach ($partylists as $party) { 
                $candidates = Candidate::wherePartylist_id($party->id)
                    ->wherePosition_id($pos->id)->get();

                foreach ($candidates as $can) {
                    array_push($lists, [
                        "details" => $this->studentData($can->student_id),
                        "votes" => Balot::whereElection_id($election->id)->whereCandidate_id($can->id)->wherePosition($pos->id)->count()
                    ]);
                }
            }
            array_push($tally, [
                "position" => $pos->name,
                "data" => $lists
            ]);
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
}










