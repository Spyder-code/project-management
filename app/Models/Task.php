<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Task
 * @package App\Models
 * @version April 8, 2021, 3:52 am UTC
 *
 * @property integer $project_id
 * @property string $name
 * @property string $description
 * @property integer $status
 */
class Task extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'tasks';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'project_id',
        'name',
        'description',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'project_id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'project_id' => 'required',
        'name' => 'required'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }
}
