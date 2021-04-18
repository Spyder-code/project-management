<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeEntries extends Model
{
    use HasFactory;

    public $table = 'time_entries';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'time_start',
        'time_end',
        'status'
    ];

    /**
    * Validation rules
    *
    * @var array
    */

    protected $casts = [
       'id' => 'integer',
       'user_id' => 'integer',
       'time_start' => 'datetime',
       'time_end' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

