<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class UserProject
 * @package App\Models
 * @version April 20, 2021, 5:39 am WIB
 *
 * @property foreignId $user_id
 * @property foreignId $project_id
 */
class UserProject extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'user_projects';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'project_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
