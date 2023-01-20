<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Unit extends Model
{
    use HasFactory;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function practice(): BelongsToMany
    {
        return $this->belongsToMany(Problem::class, 'practice');
    }

    public function homework(): BelongsToMany
    {
        return $this->belongsToMany(Problem::class, 'homework');
    }
}
