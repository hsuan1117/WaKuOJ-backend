<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];
    public function exams(): HasMany
    {
        return $this->hasMany(Exam::class);
    }
    public function units() : HasMany {
        return $this->hasMany(Unit::class);
    }

    public function students(): BelongsToMany {
        return $this->belongsToMany(User::class, 'attended_course', 'course_id', 'user_id');
    }

    public function teachers(): BelongsToMany {
        return $this->belongsToMany(User::class, 'own_course', 'course_id', 'user_id');
    }
}
