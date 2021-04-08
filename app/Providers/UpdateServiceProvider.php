<?php

namespace App\Providers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\ServiceProvider;

class UpdateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
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
