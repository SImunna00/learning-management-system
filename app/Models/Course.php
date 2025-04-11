<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title', 'course_code', 'description', 'image', 'media', 'category_id', 'instructor_id'
    ];
}
