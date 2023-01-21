<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pool extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',

        # 題庫是否公開 面向出題者
        'public'
    ];

    public function problems(): HasMany
    {
        return $this->hasMany(Problem::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_pool');
    }

    public function scopePublic($query)
    {
        return $query->where('public', true);
    }
}
