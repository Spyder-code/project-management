<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\UserProject;
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
        return view('home');
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
}
