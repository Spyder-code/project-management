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
            if ($data->count()!=0) {
                $a = 0;
                foreach ($data as $task ) {
                    if ($task->status==1) {
                        $a = $a + 1;
                    }
                }
                if($a==$data->count()){
                    Project::find($item->id)->update(['status'=>1]);
                };
            }
        }
    }
}
