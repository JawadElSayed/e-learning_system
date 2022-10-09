<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Submit extends Model {

    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'submits';

    protected $fillable = [
        'user_type',
        'assignment_id',
        'file',
    ];
}
