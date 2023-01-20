<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', # 0: judge, 1: text, 2: select, 3: multiple select
        'title',
        'description',
        'public'
    ];

    protected $hidden = [
        'pool_id'
    ];

    public function pool()
    {
        return $this->belongsTo(Pool::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
