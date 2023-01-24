<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Problem extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', # 0: judge, 1: text, 2: select, 3: multiple select
        'title',
        'description',

        # 此處的 public ：是否要顯示在Problems介面中（面向學生）
        'public',
        'author'
    ];

    protected $hidden = [
        # 題庫是面向出題者的
        'pool_id'
    ];

    public function pool()
    {
        return $this->belongsTo(Pool::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author', 'id', 'users');
    }
}
