<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrolle extends Model {

    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'enrolles';

    protected $fillable = [
        'user_type',
        'course_code',
    ];
}
