<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MathDecimo extends Model
{
    use HasFactory;
    protected $fillable = [
        'mathPD1',
        'mathPD2',
        'mathPD3',
        'mathPD4',
        'mathPD5',
        'mathPD6',
        'mathPD7',
        'mathPD8',
        'mathPD9',
        'mathPD10',
        'ObservationmathPD',
        'ObservationmathPD2',
        'ObservationmathPD3',
        'ObservationmathPD4',
        'averagePD',
        'attemptsPD',
        'correctPD',
        'incorrectPD'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
