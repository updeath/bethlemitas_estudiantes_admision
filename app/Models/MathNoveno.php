<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MathNoveno extends Model
{
    use HasFactory;

    protected $fillable = [
        'mathPNO1',
        'mathPNO2',
        'mathPNO3',
        'mathPNO4',
        'mathPNO5',
        'mathPNO6',
        'mathPNO7',
        'mathPNO8',
        'mathPNO9',
        'mathPNO10',
        'ObservationmathPNO',
        'ObservationmathPNO2',
        'ObservationmathPNO3',
        'ObservationmathPNO4',
        'averagePNO',
        'attemptsPNO',
        'correctPNO',
        'incorrectPNO'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
