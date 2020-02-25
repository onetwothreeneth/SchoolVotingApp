<?php 

namespace App\Services;
use App\Models\Election;
use App\Models\Student;
use App\Models\Section;
use App\Models\Balot;
use App\Models\Schedule;
use App\Models\Level;
use Auth,Carbon\Carbon;

class Acl 
{
	
	function __construct()
	{
		// parent::construct;
	}

	public static function locked()
	{
		return [
			'School Year',
			'Schedule',
			'Grade Level',
			'Section',
			'Student',
			'Position',
			'Election'
		];
	}

	public static function status()
	{
		return Election::isStarted() ? true : false;
	}

	public static function comming()
	{
		return (Election::upComming()) == false ? false : Election::upComming();
	}

	public static function isSchedule()
	{
		$id = Auth::user()->username;
		$std = Student::whereLrn($id)->first();
		$section = $std->section_id;
		$level = Section::find($section)->gradelevel_id;
		$sched = Level::find($level)->schedule_id;
		$data = Schedule::find($sched);
		$now = strtotime(date('H:i',strtotime(Carbon::now('Asia/Singapore'))));
		$start = strtotime($data->sched_start);
		$end = strtotime($data->sched_end);

		return ($start <= $now && $end >= $now) ? 'true' : date('h:i A',strtotime($data->sched_start)).' - '.date('h:i A',strtotime($data->sched_end));
	}

	public static function isVoted()
	{
		$date = Carbon::now('Asia/Singapore');
		$id = Auth::user()->id;
		$election = Election::where('voting_start','<=',$date)
                       ->where('voting_end','>=',$date)
                       ->whereStatus(1)
                       ->first();
        $checker = Balot::whereUser_id($id)->whereElection_id($election->id)->count();

        return $checker <= 0 ? true : false;
	}

	public static function disabled($title)
	{
		if (self::status()) {
			if (in_array($title, self::locked())) {
				return 'disabled="true"';
			} 
		}

		return 'access';
	}

}