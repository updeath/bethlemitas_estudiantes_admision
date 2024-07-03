<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MathQuinto extends Model
{
    use HasFactory;

    protected $fillable = [
        'mathPQ1',
        'mathPQ2',
        'mathPQ3',
        'mathPQ4',
        'mathPQ5',
        'mathPQ6',
        'mathPQ7',
        'mathPQ8',
        'mathPQ9',
        'mathPQ10',
        'ObservationmathPQ',
        'ObservationmathPQ2',
        'ObservationmathPQ3',
        'ObservationmathPQ4',
        'averagePQ', 'attemptsPQ', 'correctPQ','incorrectPQ'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
