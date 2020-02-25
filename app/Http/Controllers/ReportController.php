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

class ReportController extends Controller
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
    	return view('pages.reports.index')
    		->with([ 
    			'active' => 'Report',
    			'title' => 'Report',
    			'breadcrumbs' => [
    				'title' => 'Report',
    				'icon' => 'la la-cog',
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
            case 'Student Lists':
                    return $this->studentLists();
                break;
            case 'Candidate Lists';
                    return $this->candidateLists();
                break;
            case 'Election Result';
                    return $this->results();
                break;
            case 'Voting Tally';
                    return $this->tally();
                break;
            case 'Section Voting Tally';
                    return $this->sectionTally();
                break;
            default:
                return Redirect::route('report');
                break;
        }
    }

    public function sectionTally()
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

        $sections = Section::where('status',1)->get();
        $tally = array();

        foreach ($positions as $pos) {
            $lists = array();
            foreach ($partylists as $party) { 
                $candidates = Candidate::wherePartylist_id($party->id)
                    ->wherePosition_id($pos->id)->get();

                foreach ($candidates as $can) {
                    $votes = Balot::whereElection_id($eid)->whereCandidate_id($can->id)->wherePosition($pos->id)->get();
                    $section = [];

                    foreach ($sections as $kk => $vv) {
                        $section[$vv->id] = 0;
                    }

                    if($votes){ 
                        foreach ($votes as $xx => $yy) {
                            $tempStdId = $yy->user_id; 
                            $tempStdSection = Student::whereUser_id($tempStdId)->first()->section_id;
                            $tempStdLvl = Section::find($tempStdSection)->id; 

                            $section[$tempStdLvl] = $section[$tempStdLvl] + 1; 
                        }
                    }
                    array_push($lists, [
                        "partylist" => $party->id,
                        "student_id" => $can->student_id,
                        "section" => $section
                    ]);
                }
            }
            asort($lists);
            array_push($tally, [
                "position" => $pos->name,
                "data" => $lists
            ]);
        }

        return view('pages.reports.print.sections')
            ->with([
                'data' => $tally,
                'sections' => $sections,
                'sy' => $this->schoolyear
            ]);

    }

    public function tally()
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

        $levels = Level::where('status',1)->get();
        $tally = array();

        foreach ($positions as $pos) {
            $lists = array();
            foreach ($partylists as $party) { 
                $candidates = Candidate::wherePartylist_id($party->id)
                    ->wherePosition_id($pos->id)->get();

                foreach ($candidates as $can) {
                    $votes = Balot::whereElection_id($eid)->whereCandidate_id($can->id)->wherePosition($pos->id)->get();
                    $level = [];

                    foreach ($levels as $kk => $vv) {
                        $level[$vv->level] = 0;
                    }

                    if($votes){ 
                        foreach ($votes as $xx => $yy) {
                            $tempStdId = $yy->user_id; 
                            $tempStdSection = Student::whereUser_id($tempStdId)->first()->section_id;
                            $tempStdLvl = Section::find($tempStdSection)->gradelevel_id;
                            $finalStdLvl = Level::find($tempStdLvl)->level;

                            $level[$finalStdLvl] = $level[$finalStdLvl] + 1; 
                        }
                    }
                    array_push($lists, [
                        "partylist" => $party->id,
                        "student_id" => $can->student_id,
                        "levels" => $level
                    ]);
                }
            }
            asort($lists);
            array_push($tally, [
                "position" => $pos->name,
                "data" => $lists
            ]);
        }

        return view('pages.reports.print.tally')
            ->with([
                'data' => $tally,
                'level' => $levels,
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

        return view('pages.reports.print.results')
            ->with([
                'data' => $tally,
                'sy' => $this->schoolyear
            ]);
    }

    public function studentLists()
    {
        $data = $this->student->getAll(['schoolyear' => $this->schoolyear ]);

        return view('pages.reports.print.student')
            ->with([
                'data' => $data,
                'sy' => $this->schoolyear
            ]);
    }

    public function candidateLists()
    {
        $election_id = $this->election->getAll(['schoolyear' => $this->schoolyear ]);
        $esy = $election_id->count() != 0 ? $election_id->first()->schoolyear : 0;
        $partylists = $this->partylist->getAll(['election_id' => $esy]);
        $data = array();

        foreach ($partylists as $k => $v) {
            $candid = $this->candidate->getAll(['partylist_id' => $v->id]);
            if($candid){
                foreach ($candid as $x => $y) {
                    array_push($data, [
                        'student_id' => $y->student_id,
                        'position_id' => $y->position_id,
                        'partylist' => $v->name
                    ]);
                }
            }
        } 
        return view('pages.reports.print.candidate')
            ->with([
                'data' => $data,
                'sy' => $this->schoolyear
            ]);
    }
}
