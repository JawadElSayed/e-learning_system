<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Assignment extends Model {

    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'assignments';

    protected $fillable = [
        'course_id',
        'user_id',
        'title',
        'assignment',
        'due_to',
    ];
}
