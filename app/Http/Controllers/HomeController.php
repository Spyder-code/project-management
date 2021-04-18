<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\TimeEntries;
use App\Models\User;
use App\Models\UserProject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $karyawan = TimeEntries::whereDate('created_at', Carbon::today())->where('user_id',Auth::id())->where('status',0)->first();
        $karyawanAbsen = TimeEntries::whereDate('created_at', Carbon::today())->where('user_id',Auth::id())->where('status',1)->first();
        $user = User::where('role','karyawan')->count();
        $absen = TimeEntries::whereDate('created_at', Carbon::today())->where('status',1)->count();
        $belum = $user - $absen;
        $no = $belum/$user*100;
        $yes = $absen/$user*100;
        return view('home', compact('karyawan','karyawanAbsen','no','yes'));
    }

    public function project()
    {
        $project = UserProject::all()->where('user_id',Auth::id());
        return view('karyawan.project', compact('project'));
    }

    public function projectDetail($id)
    {
        $data = Task::all()->where('project_id',$id);
        $project = Project::find($id);
        $sudah = $data->where('status',1)->count();
        return view('karyawan.projectDetail',compact('data','project','sudah'));
    }
    public function projectTask()
    {
        $project = UserProject::all()->where('user_id',Auth::id());
        $task = array();
        foreach ($project as $item ) {
            $data = $item->project_id;
            array_push($task,$data);
        }
        $data = Task::all()->whereIn('project_id',$task);
        return view('karyawan.projectAndTask', compact('data'));
    }

    public function updateStatus(Request $request)
    {
        Task::find($request->task_id)->update(['status'=>$request->status]);
        return back();
    }

    public function postAbsen()
    {
            TimeEntries::create([
                'user_id' => Auth::id(),
                'time_start' => Carbon::now()->timestamp,
            ]);
        return back();
    }

    public function absenEnd(Request $request)
    {
        TimeEntries::find($request->id)->update([
            'time_end' => Carbon::now()->timestamp,
            'status' => 1,
        ]);
        return back();
    }

    public function absenDestroy(Request $request)
    {
        TimeEntries::destroy($request->id);
        return back();
    }
}
