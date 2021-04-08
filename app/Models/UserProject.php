<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class UserProject
 * @package App\Models
 * @version April 8, 2021, 3:55 am UTC
 *
 * @property integer $project_id
 * @property integer $user_id
 */
class UserProject extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'user_projects';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'project_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'project_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'project_id' => 'required',
        'user_id' => 'required'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
