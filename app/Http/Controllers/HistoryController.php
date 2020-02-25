<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;   
use App\Models\Sy;
use App\Models\Student;
use App\Models\Candidate;
use App\Models\Partylist;
use App\Models\Level;
use App\Models\Section;
use App\Models\Election;
use App\Models\Position;
use App\Models\Balot;
use App\Models\User;
use Redirect,Requests,Hash,Validator,Auth,Carbon\Carbon;
use App\Services\Repositories\Resource\ResourceRepository;

class HistoryController extends Controller
{
    protected $sy;
    protected $partylist;
    protected $student;
    protected $candidate;
    protected $election;
    protected $request;
    protected $schoolyear;

    function __construct(Sy $sy,Student $student,Candidate $candidate,Partylist $partylist,Election $election,Request $request)
    {
        $this->sy = new ResourceRepository($sy);
        $this->student = new ResourceRepository($student);
        $this->candidate = new ResourceRepository($candidate);
        $this->partylist = new ResourceRepository($partylist);
        $this->election = new ResourceRepository($election);
        $this->request = $request; 
    }

    public function index()
    { 
    	return view('pages.history.index')
    		->with([ 
    			'active' => 'History',
    			'title' => 'History',
    			'breadcrumbs' => [
    				'title' => 'History',
    				'icon' => 'la la-list',
    				'main' => 'Choose School Year',
    			],
                'data' => $this->sy->getAll()
    		]);
    }

    public function generate()
    {
        $this->schoolyear = $this->request->sy;
        $type = $this->request->type;

        switch ($type) { 
            case 'Election Result';
                    return $this->results();
                break;
            case 'Ballot';
                    return $this->ballot();
                break;
            default:
                return Redirect::route('history');
                break;
        }
    }
 
    public function ballot()
    {
        $user_id = Auth::user()->id;
        $sy = $this->schoolyear;
        $election = Election::whereSchoolyear($sy);
        $eid = $election->count() != 0 ? $election->first()->id : 0;
        $votes = Balot::whereUser_id($user_id)->whereElection_id($eid)->get();

        return view('pages.history.view.ballot')
            ->with([
                'data' => $votes,
                'sy' => $this->schoolyear
            ]);
    }

    public function results()
    {
        $date = Carbon::now('Asia/Singapore');

        // Get all positions
        $positions = Position::whereStatus(1)
                        ->get();

        // Get current Election
        $election = Election::whereSchoolyear($this->schoolyear);

        $eid = $election->count() != 0 ? $election->first()->id : 0;
        // Get partylists
        $partylists = Partylist::whereElection_id($eid)
                        ->get();

        $tally = array();

        foreach ($positions as $pos) {
            $lists = array();
            foreach ($partylists as $party) { 
                $candidates = Candidate::wherePartylist_id($party->id)
                    ->wherePosition_id($pos->id)->get();

                foreach ($candidates as $can) {
                    array_push($lists, [
                        "partylist" => $party->id,
                        "student_id" => $can->student_id,
                        "votes" => Balot::whereElection_id($eid)->whereCandidate_id($can->id)->wherePosition($pos->id)->count()
                    ]);
                }
            }
            asort($lists);
            array_push($tally, [
                "position" => $pos->name,
                "data" => $lists
            ]);
        }

        return view('pages.history.view.result')
            ->with([
                'data' => $tally,
                'sy' => $this->schoolyear
            ]);
    }
}
