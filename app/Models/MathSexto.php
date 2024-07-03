<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MathSexto extends Model
{
    use HasFactory;
    protected $fillable = [
        'mathPSX1',
        'mathPSX2',
        'mathPSX3',
        'mathPSX4',
        'mathPSX5',
        'mathPSX6',
        'mathPSX7',
        'mathPSX8',
        'mathPSX9',
        'mathPSX10',
        'ObservationmathPSX',
        'ObservationmathPSX2',
        'ObservationmathPSX3',
        'ObservationmathPSX4',
        'averagePSX',
        'attemptsPSX',
        'correctPSX',
        'incorrectPSX'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
