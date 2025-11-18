<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'slug', 'description', 'image', 'level_id' , 'price','paid' , 'status','discount',
        'discount_expire' , 'lesson_num'
    ];

    public function level(){
        return $this->belongsTo(Level::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function scopeNotEnrolledBy($query, $studentId)
    {
        return $query->whereDoesntHave('enrollments', function ($q) use ($studentId) {
            $q->where('student_id', $studentId);
        });
    }
}
