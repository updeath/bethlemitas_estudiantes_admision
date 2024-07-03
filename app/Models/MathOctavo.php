<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MathOctavo extends Model
{
    use HasFactory;
    protected $fillable = [
        'mathPO1',
        'mathPO2',
        'mathPO3',
        'mathPO4',
        'mathPO5',
        'mathPO6',
        'mathPO7',
        'mathPO8',
        'mathPO9',
        'mathPO10',
        'ObservationmathPO',
        'ObservationmathPO2',
        'ObservationmathPO3',
        'ObservationmathPO4',
        'averagePO',
        'attemptsPO',
        'correctPO',
        'incorrectPO'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
