<?php

namespace App\Http\Middleware;

use App\Models\Project;
use App\Models\Task;
use Closure;
use Illuminate\Http\Request;

class Status
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $project = Project::all();
        foreach ($project as $item ) {
            $data = Task::all()->where('project_id',$item->id);
            $sudah = $data->where('status',1)->count();
            if($sudah==$data->count()){
                Project::find($item->id)->update(['status'=>1]);
            };
        }
    }
}
