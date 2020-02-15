<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;
    protected $table = 'tasks';
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'done',
        'duedate'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
