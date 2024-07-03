<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MathSeptimo extends Model
{
    use HasFactory;

    protected $table = 'math_septimos';
    protected $fillable = [
        'mathPS1',
        'mathPS2',
        'mathPS3',
        'mathPS4',
        'mathPS5',
        'mathPS6',
        'mathPS7',
        'mathPS8',
        'mathPS9',
        'mathPS10',
        'ObservationmathPS',
        'ObservationmathPS2',
        'ObservationmathPS3',
        'ObservationmathPS4',
        'averagePS',
        'attemptsPS',
        'correctPS',
        'incorrectPS'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
