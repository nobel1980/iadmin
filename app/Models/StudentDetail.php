<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'detail_date',
        'std_no',
        'attand',
        'home_work',
        'exam_name',
        'exam_result',
        'comment',
        'gard_comment',
    ];

    /**
     * Get the student associated with the user.
     */
    public function student()
    {
        return $this->hasOne(\App\Models\Student::class);
    }
}